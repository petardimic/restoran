<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_has_menu extends Model
{
    protected $table = 'order_has_menu';

    public $timestamps = false;

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
    public function orders()
    {
        return $this->belongsTo('App\Order');
    }
}