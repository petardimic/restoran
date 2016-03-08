<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restoraunt extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'created_on', 'name', 'address','phone','open_at','close_at','id',
    ];
    public function workers()
    {
        return $this->hasMany('App\User');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function menu()
    {
        return $this->hasMany('App\Menu');
    }
    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }
}
