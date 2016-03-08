<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public $timestamps = false;

    protected $fillable = [
        'name', 'price', 'is_static','is_client_recipe', 'id', 'image','description',
    ];
    public function restoraunt()
    {
        return $this->belongsTo('App\Restoraunt');
    }
    public function orders()
    {
        return $this->hasMany('App\Order_has_menu');
    }
    public function components()
    {
        return $this->hasMany('App\Component');
    }
}
