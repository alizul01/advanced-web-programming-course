<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $items = News::all();
        $title = "news";
        return view('layout.pages', compact('items', 'title'));
    }

    public function show($slug) {
        $param = News::where('slug', $slug)->firstOrFail();
        return view('pages.detail', [
            'param' => $param,
            'back' => 'news.index'
        ]);
    }

    public function create() {
        return view('admin.create');
    }
}
