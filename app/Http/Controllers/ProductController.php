<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
class ProductController extends Controller
{
    function query (){
        return Product::all();
    }
}
