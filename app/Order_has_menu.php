<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_has_menu extends Model
{
    public $timestamps = false;

    public function menu()
    {
        return $this->hasMany('App\Menu');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}