<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id, $r_type = 'test')
    {
        //return "Product id: $id, Type: $r_type";
        return view('product');
    }
}
