<?php

namespace App\Http\Controllers;

use App\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $links = SocialLink::all();
        return view('admin.social.show', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'email' => 'email',
//            'phone' => 'numeric',
//            'facebook' => 'string',
//            'youtube' => 'string',
//            'google' => 'string',
//            'twitter' => 'string',
//            'linkedin' => 'string',
//        ]);
//        return $request->all();
        SocialLink::create($request->except('_token'));
        echo 'done';


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLink $socialLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $links = SocialLink::find($id);
        return view('admin.social.edit', compact('links'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $social = SocialLink::findOrFail($id);
        $social->email = $request->email;
        $social->phone = $request->phone;
        $social->facebook = $request->facebook;
        $social->youtube = $request->youtube;
        $social->google = $request->google;
        $social->twitter = $request->twitter;
        $social->linkedin = $request->linkedin;
        $social->save();
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialLink $socialLink)
    {
        //
    }
}
