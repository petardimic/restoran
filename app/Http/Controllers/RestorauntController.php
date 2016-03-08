<?php

namespace App\Http\Controllers;

use App\Restoraunt;
use Illuminate\Http\Request;
use App\Http\Requests;

class RestorauntController extends Controller
{
    public function query (){
        return Restoraunt::all();
    }
}
