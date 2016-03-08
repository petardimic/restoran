<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id','quantity', 'price'
    ];
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
    public function measure()
    {
        return $this->belongsTo('App\Measure');
    }
}
