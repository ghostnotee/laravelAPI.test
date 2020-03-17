<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id, $r_type = 'test')
    {
        $name = "Product 1";
        //return "Product id: $id, Type: $r_type";
        //return view('product', ['id' => $id, 'name' => 'Product 1', 'r_type' => $r_type]);
        //return view('product', compact('id', 'name', 'r_type'));
        return view('product')->with('id', $id)->with('name', $name)->with('r_type', $r_type);
    }
}
