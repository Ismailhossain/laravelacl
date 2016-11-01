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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//use Illuminate\Contracts\Pagination;

class UserController extends Controller
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
        $roles = Role::all();
        $permissions = Permission::all();

        return view('user.add', compact('roles','permissions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'             => 'required',                        // just a normal required validation
            'email'            => 'required|email|unique:users',     // required and must be unique in the table
            'role_title' => 'required',
            'image' => 'required',
            'password' => 'required|min:6|alpha_dash',
            'confirm_password' => 'same:password|required'
        ]);


        $user = new User ;
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->password = Hash::make($request->password) ;

        //for image uploading starts

        $imagefile = $request->image ;
        $imagefilename = str_random(8) . time() . '-'. $imagefile->getClientOriginalName();
        $imagefile->move(public_path().'/images/' , $imagefilename);
        $user->image = '/images/'.$imagefilename ;

        //image uploading ends

        $user->save() ;

//Get the user ID ceated just now
        $new_user = $user->id;

        foreach($request->input('role_title') as $roles)
        {
            $roleuser = new RoleUser;
            $roleuser->role_id = $roles;
            $roleuser->user_id = $new_user;
            $roleuser->save();

        }


        Session::flash('message', 'Successfully created User!');
        return Redirect::to('user/show');
//        return Redirect::back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = User::all();
//          $users = User::paginate(5);

        return view('user.show', compact('users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

//        $id = Request::segment(3);
        $users = User::find($id);
        $roles = Role::all();

        return view('user.update', compact('users','roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'             => 'required',                        // just a normal required validation
            'email'            => 'required|email',     // required and must be unique in the table
            'role_title' => 'required',
            'image' => 'required',
        ]);


        $user_id = Input::get('id');
        $user = User::find($user_id);
        $user->name = $request->name ;
        $user->email = $request->email ;

        //for image uploading starts

        $imagefile = $request->image ;
        $imagefilename = str_random(8) . time() . '-'. $imagefile->getClientOriginalName();
        $imagefile->move(public_path().'/images/' , $imagefilename);
        $user->image = '/images/'.$imagefilename ;

        //image uploading ends


        $user->roles()->sync(Input::get('role_title'));

        $user->save() ;

        Session::flash('message', 'Successfully created User!');

        return Redirect::to('user/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = User::find($id);
        $del->delete();


        if($del){
            Session::flash('message', 'Successfully deleted the user!');
            return Redirect::to('user/show');
        }
    }
}
