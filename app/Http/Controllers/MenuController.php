<?php

namespace App\Http\Controllers;
use DB;
use Response;
use Illuminate\Http\Request;
use App\Menu;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

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
    public function save() {
        $menu = Input::all();

        if (isset($menu['id'])){
            DB::table('menu')
                ->where('id', $menu['id'])
                ->update([
                    'name' => $menu['name'],
                    'is_static' => $menu['is_static']
                ]);
            DB::table('components')->where('menu_id', $menu['id'])->delete();

        } else {
            $menu['id']=DB::table('menu')
                ->insertGetId([
                    'name' => $menu['name'],
                    'is_static' => isset($menu['is_static'])?$menu['is_static']:0,
                    'description' => $menu['description'],
                    'created_at'=> new \DateTime(),
                    'image'=> $menu['image'],
                    'price'=> 100,
                    'is_client_recipe'=>0,
                    'restoraunt_id' => $menu['restoraunt_id']
                ]);
        }
        foreach ($menu['components'] as $comp) {
            if (isset($comp['product_id'])) {
                DB::table('components')
                    ->insert([
                        'menu_id' => $menu['id'],
                        'product_id' => $comp['product_id'],
                        'quantity' => $comp['quantity'],
                        'measure_id' => 1,
                        'price' => isset($comp['price'])?$comp['price']:0,
                    ]);
            }
        }

        return $menu;
    }

    public function delete($id) {
         // Так я знаю про каскадне видалення друга ночі...
        DB::table('components')->where('menu_id', $id)->delete();
        DB::table('menu')->where('id', $id)->delete();
    return '';
    }

    }
