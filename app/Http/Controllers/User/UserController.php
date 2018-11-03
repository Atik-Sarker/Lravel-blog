<?php

namespace App\Http\Controllers\User;

use App\Admin;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->id == 1)
        {
            $users = Admin::paginate(10);
            return view('admin.user.show', compact('users'));
        }
        return redirect(route('admin.dashboard'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::User()->id == 1)
        {
            $roles = Role::select('name', 'id')->orderBy('id', 'DESC')->get();
            return view('admin.user.create', compact('roles'));
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
        if (Auth::User()->id == 1)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:admins',
                'phone' => 'required|numeric|min:11',
                'password' => 'required|string|min:6|confirmed',
                'role[]' => 'required|numeric|max:3',
            ]);
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'status' => $request->status,
            ];
            $user = Admin::create($data);
            $user->roles()->sync($request->role);
            return redirect(route('user.index'))->with('status', 'User created successfully');
        }
        return redirect(route('admin.dashboard'));
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
        if (Auth::User()->id == 1)
        {
            $user = Admin::where('id',$id)->first();
            $roles = Role::select('name', 'id')->orderBy('id', 'DESC')->get();
            return view('admin.user.edit', compact('user', 'roles'));
        }
        return redirect(route('admin.dashboard'));
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
        if (Auth::User()->id == 1)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|numeric|min:11',
            ]);
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status,
            ];
            Admin::where('id', $id)->update($data);
            Admin::find($id)->roles()->sync($request->role);

            return redirect(route('user.index'))->with('status', 'User Update successfully');
        }
        return redirect(route('admin.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::User()->id == 1)
        {
            Admin::FindOrFail($id)->delete();
            return redirect()->back()->with('status', 'User Delect Successfully');
        }
        return redirect(route('admin.dashboard'));
    }
}
