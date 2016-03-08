<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id', 'done_at', 'price', 'created_at','shelf_life','address'
    ];
    public function menuList()
    {
        return $this->hasMany('App\Order_has_menu');
    }

}
