<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin' && request()->segment(1) == 'admin') {
            $items = News::paginate(10);
            return view('admin.details.pages', [
                'items' => $items,
                'title' => 'news'
            ]);
        }
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
