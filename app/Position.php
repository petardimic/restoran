<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name','id',
    ];
    public function users()
    {
        return $this->hasMany('App\User');
    }

}
