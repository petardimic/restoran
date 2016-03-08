<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'image','sale_native',
    ];
    public function purchases()
    {
        return $this->hasMany('App\Purshase');
    }
}
