<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Role;
use App\User;
use App\Photo;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{

    public function index()
    {
        $users = User::paginate(5);

        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }


    public function store(UsersRequest $request)
    {
        if(trim($request->password) == ''){
            $input = $request->except('password');

        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }



        if($file =  $request->file('photo_id')){

            $name = time(). $file->getClientOriginalName(); 
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;

        }

        
        User::create($input);

        // Flash message (session)
        Session::flash('created_user', 'The user has been created');

        return redirect('/admin/users');
    }


    public function show($id)
    {
        return view('admin.users.show');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
       

        if(trim($request->password) == ''){
            $input = $request->except('password');

        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file =  $request->file('photo_id') ){

            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;

        }
        $user->update($input);




        // Flash message (session)
        Session::flash('updated_user', 'The user has been updated');


        return redirect('/admin/users');

    }


    public function destroy($id)
    {
        //delete user without removing image from folder
        // User::findOrFail($id)->delete();

        //delete user with removing image from folder
        $user = User::findOrFail($id);
        unlink(public_path() . $user->photo->file);
        $user->delete();

        // Flash message
        Session::flash('deleted_user', 'The user has been deleted');

        return redirect('/admin/users');
    }
}
