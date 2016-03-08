<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id', 'price','quantity'
    ];
    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function measure()
    {
        return $this->belongsTo('App\Measure');
    }
}
