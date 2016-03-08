<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\User;
use Hash;

class UserController extends Controller
{
    function login(){
//        $user= new User;
//        $user->fill([
//            'name'=>'cook',
//            'password'=>Hash::make('cook'),
//            'email'=>'cook',
//            'position_id'=>1,
//        ]);
//        $user->save();
        if (Auth::attempt(['name'=>Input::get('login'), 'password'=>Input::get('password')], Input::get('remember'))) {
            return 1;
        } else {
            return 0;
        }
    }
}
