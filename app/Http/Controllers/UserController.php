<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\User;
use Hash;
use Config;

class UserController extends Controller
{
    function login(){

        if (Auth::attempt(['name'=>Input::get('login'), 'password'=>Input::get('password')], Input::get('remember'))) {
            switch (Auth::user()->position_id){
                case  Config::get('constants.COOK_POSITION_ID'):
                    return ['url'=>'/cook'];
                    break;
                case  Config::get('constants.DIRECTOR_POSITION_ID'):
                    return ['url'=>'/director'];
                    break;
                case  Config::get('constants.OFFICIANT_POSITION_ID'):
                    return ['url'=>'/officiant'];
                    break;
            }
        }
    }
}
