<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::all();
        return view('pages.news', compact('news'));
    }

    public function show(News $news) {
        $param = $news->first();
        return view('pages.detail', [
            'param' => $param,
            'back' => 'news.index'
        ]);
    }
}
