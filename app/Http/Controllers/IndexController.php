<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('index', [
            'title' => 'Home',
            'product' => $product
        ]);
    }
}
