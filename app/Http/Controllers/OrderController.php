<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

use App\Http\Requests;

class OrderController extends Controller
{
    public function save (){

        $order_id=DB::table('orders')->insertGetId([
            'price'=>Input::get('price'),
            'adres'=>Input::get('address'),
            'phone'=>Input::get('phone'),
            'restoraunt_id'=>Input::get('restoraunt_id'),
        ]);
        $menu = Input::get('menu');

        foreach ($menu as $m) {
            if (!isset($m['components'])){
                DB::table('order_has_menu')->insert([
                    'menu_id'=>$m['menu_id'],
                    'order_id'=>$order_id,
                    'quantity'=>$m['quantity']
                ]);
            } else {
                $menu_id=DB::table('orders')->insertGetId([
                    'name'=>$m['menu']['name'],
                    'price'=>$m['menu']['price'],
                    'is_client_recipe'=>1,
                    'is_static'=>1,
                    'restoraunt_id'=>Input::get('restoraunt_id'),
                    'descriptin'=>'new',
                ]);
                foreach ($m['components'] as $c){
                    DB::table('components')->insert([
                       'measure_id'=>1,
                        'product_id'=>$c['product_id'],
                        'menu_id'=>$menu_id
                    ]);
                    DB::table('order_has_menu')->insert([
                        'menu_id'=>$menu_id,
                        'order_id'=>$order_id,
                        'quantity'=>$m['quantity']
                    ]);
                }
            }
        }

        return '';
    }
}
