<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('can:post.category');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::paginate(10);;

        return view('admin.category.show', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.category');
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
            'category' => 'required',
            'slug' => 'required',
        ],
            [
                'category.required' => 'This category is required!',
                'slug.required' => 'This slug is required!',
            ]);
        category::create([
            'name' => $request->category,
            'slug' => $request->slug,
        ]);
        return redirect(route('category.index'))->with('status', 'Category Created Successfully');
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
        $category = category::where('id','=', $id)->first();

        return view('admin.category.edit', compact('category'));
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
            'category' => 'required',
            'slug' => 'required',
        ],
            [
                'category.required' => 'This category is required!',
                'slug.required' => 'This slug is required!',
            ]);
        category::FindOrFail($id)->update([
            'name' => $request->category,
            'slug' => $request->slug,
        ]);
        return redirect(route('category.index'))->with('status', 'Category Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::FindOrFail($id)->delete();
        return redirect()->back()->with('status', 'Delete Successfully');
    }
}
