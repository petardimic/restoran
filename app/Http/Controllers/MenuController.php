<?php

namespace App\Http\Controllers;
use DB;
use Response;


use Illuminate\Http\Request;
use App\Menu;
use App\Http\Requests;

class MenuController extends Controller
{
    public function query($restoraunt_id){
        return Response::json(
            Menu::with('Components','Components.product','Components.measure')
            ->where('restoraunt_id', $restoraunt_id)
            ->where('is_client_recipe', 0)
            ->get()
        );
    }
}
