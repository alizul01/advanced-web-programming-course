<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $products = [
        [
            'title' => 'Graphic Design',
            'slug' => 'graphic-design',
        ],
        [
            'title' => 'Web Design',
            'slug' => 'web-design',
        ],
        [
            'title' => 'Web Development',
            'slug' => 'web-development',
        ],
    ];
    public function index() {
        $products = $this->products;
        return view('pages.product', compact('products'));
    }

    public function show($param) {
        $products = $this->products;
        $param = array_search($param, array_column($products, 'slug'));
        $param = $products[$param];
        return view('pages.detail', [
            'param' => $param,
            'back' => 'products'
        ]);
    }
}
