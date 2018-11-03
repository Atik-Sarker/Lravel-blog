<?php

namespace App\Http\Controllers\Admin;

use App\Appearance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppearanceController extends Controller
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
        $appearance = Appearance::where('id', 1)->first();

        return view('admin.appearance.show', compact('appearance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logoCreate()
    {
        return view('admin.appearance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bannerStore(Request $request)
    {
        return $request->all();
//
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function show(Appearance $appearance)
    {
//        return $request->all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function edit(Appearance $appearance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appearance $appearance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appearance $appearance)
    {
        //
    }
}
