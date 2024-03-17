<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ContentPromo;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $content = ContentPromo::all();
        return view('index', [
            'title' => 'Home',
            'product' => $product,
            'content' => $content
        ]);
    }

    public function ViewProduct()
    {
        $product = Product::all();
        return view('view-product', [
            'title' => 'Produk',
            'product' => $product,
        ]);
    }
}
