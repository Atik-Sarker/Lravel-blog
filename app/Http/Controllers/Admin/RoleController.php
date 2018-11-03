<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class RoleController extends Controller
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
        if (Auth::User()->id == 1) {
            $roles = Role::all();
            return view('admin.role.show', compact('roles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Admin $admin)
    {
        if (Auth::User()->id == 1) {
            $permissions = Permission::all();
            return view('admin.role.create', compact('permissions'));
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
                'name' => 'required|unique:roles'
            ]);
            $role = new Role();
            $role->name = $request->name;
            $role->save();
            $role->permissions()->sync($request->permission);
            return redirect(route('role.index'))->with('status', 'Role Create Successfully');
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
            $role = Role::FindOrFail($id);
            $permissions = Permission::all();
            return view('admin.role.edit', compact('role', 'permissions'));
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
                'name' => 'required'
            ]);

            $role = Role::FindOrFail($id);
            $role->name = $request->name;
            $role->save();
            $role->permissions()->sync($request->permission);
            return redirect(route('role.index'))->with('status', 'Role Update Successfully');
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
            Role::where('id', $id)->delete();
            return redirect()->back()->with('status', 'Role Delete Successfully');
        }
    return redirect(route('admin.dashboard'));
    }
}
