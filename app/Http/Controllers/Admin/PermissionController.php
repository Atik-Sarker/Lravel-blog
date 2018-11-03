<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
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
        if (Auth::User()->id == 1)
        {
            $permissions = Permission::all();
            return view('admin.permission.show', compact('permissions'));
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
            return view('admin.permission.create');
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
               'name' => 'required|max:50|unique:permissions',
               'for' => 'required',
            ]);
            $permission = new Permission;
            $permission->name = $request->name;
            $permission->for = $request->for;
            $permission->save();
            return redirect(route('permission.index'))->with('status', 'Permission Created successfully');
        }
        return redirect(route('admin.dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        if (Auth::User()->id == 1)
        {
             return view('admin.permission.edit', compact('permission'));
        }
        return redirect(route('admin.dashboard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        if (Auth::User()->id == 1)
        {
            $request->validate([
                'name' => 'required|max:50|unique:permissions',
                'for' => 'required',
            ]);
            $permission = Permission::FindOrFail($permission->id);
            $permission->name = $request->name;
            $permission->for = $request->for;
            $permission->save();
            return redirect(route('permission.index'))->with('status', 'Permission Update successfully');
        }
        return redirect(route('admin.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if (Auth::User()->id == 1)
        {
            Permission::FindOrFail($permission->id)->delete();
            return redirect()->back()->with('status', 'Permission Delete successfully');
        }
        return redirect(route('admin.dashboard'));
    }
}
