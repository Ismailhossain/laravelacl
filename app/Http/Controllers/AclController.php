<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\RoleUser;
use App\User;
use App\Permission;
use App\PermissionRole;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;


class AclController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $roles = Role::all();

        return View:: make('acl.show')->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::find($id);
        $permissions = Permission::all();
        return view('acl.update', compact('roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'role_title' => 'required',
//            'permission_title' => 'required'
        ]);

//        $permissions = $request->get( 'permission_title', [] );

        $role_id = Input::get('id');
        $roles = Role::find($role_id);

        $roles->permissions()->sync(Input::get('permission_title'));

        $roles->save();

        Session::flash('message', 'Successfully updated the ACL!');
        return Redirect::to('acl/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
