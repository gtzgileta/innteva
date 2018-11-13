<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller provides the functions to solve Innteva's test
    |
    */

    # [GET] Users List
    public function getList() {
        $data['users']=\App\User::get();
        return view('list',$data);
    }

    # [GET] New user
    public function getNew() {
        return view('new');
    }

    # [POST] New User
    public function postNew(Request $request) {

        $validate = $request->validate([
            'username' => 'required|unique:users,username|max:120',
            'names' => 'required|max:120',
            'paternal_surname' => 'required|max:120',
            'maternal_surname' => 'required|max:120',
            'email' => 'required|email|max:120',
            'password' => 'required'
        ]);

        $post = new \App\User;
        $post->username = $request->input('username');
        $post->names = $request->input('names');
        $post->paternal_surname = $request->input('paternal_surname');
        $post->maternal_surname = $request->input('maternal_surname');
        $post->email = $request->input('email');
        $post->password = bcrypt($request->input('password'));

        if($post->save())
            return Redirect::route('home')->with('global-success','¡Usuario creado con éxito!');
        else
            return Redirect::route('home')->with('global-success','Ocurrió un error al intentar crear un usuario, favor de intentar más tarde.');
    }

    # [GET] Edit user
    public function getEdit($username=null) {
        $data['user']=\App\User::where('username',$username)->first();
        return view('edit',$data);
    }

    # [POST] Edit User
    public function postEdit(Request $request,$username) {

        $validate = [
            'username' => 'required|unique:users,username|max:120',
            'names' => 'required|max:120',
            'paternal_surname' => 'required|max:120',
            'maternal_surname' => 'required|max:120',
            'email' => 'required|email|max:120'
        ];

        if(!empty($request->input('password')))
            $validate['password'] = 'required';

        $validate = $request->validate($validate);

        $update = \App\User::where('username',$username)->first();

        $update->username = $request->input('username');
        $update->names = $request->input('names');
        $update->paternal_surname = $request->input('paternal_surname');
        $update->maternal_surname = $request->input('maternal_surname');
        $update->email = $request->input('email');
        if(!empty($request->input('password'))) # IF PASSWORD FIELD IS UPDATED TOO
            $update->password = bcrypt($request->input('password'));

        if($update->save())
            return Redirect::route('home')->with('global-success','¡Usuario actualizado con éxito!');
        else
            return Redirect::route('home')->with('global-success','Ocurrió un error al intentar actualizar un usuario, favor de intentar más tarde.');
    }

    # [GET] Delete User
    public function delete($username) {
        $delete = \App\User::where('username',$username)->delete();

        if($delete)
            return Redirect::route('home')->with('global-success','¡Usuario eliminado con éxito!');
        else
            return Redirect::route('home')->with('global-error','No ha sido posible eliminar el usuario, favor de intentar más tarde.');
    }
}