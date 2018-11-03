<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use PhpParser\Node\Expr\Print_;
use PhpParser\Node\Stmt\Echo_;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('can:post.tag');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tag.show', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.tag.tag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);

        $request->validate([
            'tag' => 'required',
            'slug' => 'required',
        ],
        [
                'tag.required' => 'This tag is required!',
                'slug.required' => 'This slug is required!',
            ]);
        Tag::create([
            'name' => $request->tag,
            'slug' => $request->slug,
        ]);
        return redirect(route('tag.index'))->with('status', 'Tag Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::where('id',$id)->first();
//       print_r($tag->name);
        return view('admin.tag.edit', compact('tag'));
//        echo $id;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request);
        $request->validate([
            'tag' => 'required',
            'slug' => 'required',
        ],
        [
            'tag.required' => 'This tag is required!',
            'slug.required' => 'This slug is required!',
        ]);
        Tag::FindOrFail($id)->update([
            'name' => $request->tag,
            'slug' => $request->slug,
        ]);
        return redirect(route('tag.index'))->with('status', 'Tag Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Tag::FindOrFail($id)->delete();
        return redirect()->back()->with('status', 'Delete Successfully');
    }
}
