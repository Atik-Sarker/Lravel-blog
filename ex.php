<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::User()->can('post.create')){
            $tags = Tag::all();
            $categories = category::all();
            return view('admin.post.post', compact('tags', 'categories'));
        }
        return redirect(route('admin.dashboard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'tags' => 'required',
            'categories' => 'required',
            'postbody' => 'required',
            'image' => 'required',
        ],
            [
                'title.required' => 'This title is required!',
                'subtitle.required' => 'This Subtitle is required!',
                'slug.required' => 'This slug is required!',
                'tags.required' => 'This Tag is required!',
                'categories.required' => 'This Category is required!',
                'postbody.required' => 'This field is required! Write something about your post ',
                'image.required' => 'This Image field is required!',

            ]);
        $path = $request->file('image')->store('public/image');
        $id = Post::insertGetId([
            'title' => $request->title,
            'slug' => $request->slug,
            'subtitle' => $request->subtitle,
            'body' => $request->postbody,
            'status' => $request->publicationstatus,
            'posted_by' => Auth::User()->name,
            'image' => $request->$path,
            'created_at' => carbon::now(),
        ]);

        $ext = strtolower($request->file('image')->getClientOriginalExtension());
        $request->file('image')->storeAs(
            'public/newImage', "{$id}.{$ext}"
        );
        Storage::put("public/post/{$id}.txt", $request->post("postbody"));

        return $id;
//        if (Auth::User()->can('post.create'))
//        {
//            if ($request->hasFile('image'))
//            {
//                $path = $request->file('image')->store('public/image');
//            }
//            $post = new Post;
//            $post->title = $request->title;
//            $post->slug = $request->slug;
//            $post->subtitle = $request->subtitle;
//            $post->body = $request->postbody;
//            $post->status = $request->publicationstatus;
//            $post->posted_by = Auth::User()->name;
//            $post->image = $path;
//            $post->created_at = carbon::now();
//            $id = insertGetId($post->save());
//            $post->categories()->sync($request->categories);
//            $post->tags()->sync($request->tags);
//
//            return redirect(route('post.index'))->with('status', 'Insert Successfully');
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::User()->can('post.update')) {
            $post = Post::with('tags', 'categories')->findOrFail($id);
            $tags = Tag::all();
            $categories = category::all();
            $admin = Admin::all();
            return view('admin.post.edit', compact('post', 'tags', 'categories','admin'));
        }
        return redirect(route('admin.dashboard'));
    }

    /**
     * Update Post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'tags' => 'required',
            'categories' => 'required',
            'postbody' => 'required',
        ],
            [
                'title.required' => 'This title is required!',
                'subtitle.required' => 'This Subtitle is required!',
                'slug.required' => 'This Slug is required!',
                'tags.required' => 'This Tag is required!',
                'categories.required' => 'This Category is required!',
                'postbody.required' => 'This Field is required! Write something about your post ',
            ]);

        if ($request->hasFile('image')){
            $path = $request->file('image')->store('public/image');
            $post = Post::FindOrFail($id);
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->subtitle = $request->subtitle;
            $post->body = $request->postbody;
            $post->status = $request->publicationstatus;
            $post->posted_by = Auth::User()->name;
            $post->image = $path;
            $post->save();
            $post->categories()->sync($request->categories);
            $post->tags()->sync($request->tags);
            return redirect(route('post.index'))->with('status','Update Successfully');
        }

        $post = Post::FindOrFail($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->subtitle = $request->subtitle;
        $post->body = $request->postbody;
        $post->status = $request->publicationstatus;
        $post->posted_by = Auth::User()->name;
        $post->save();
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        return redirect(route('post.index'))->with('status','Update Successfully');
    }

    /**
     * Delete category
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->back()->with('status', 'Delete Successfully');
    }
}
