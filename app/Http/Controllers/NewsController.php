<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $news = [
        [
            'title' => 'Breaking News! Laravel 10 is out now!',
            'slug' => 'breaking-news-laravel-10-is-out-now',
        ],
        [
            'title' => 'People change from Vue to ReactJS, why?',
            'slug' => 'people-change-from-vue-to-reactjs-why',
        ],
        [
            'title' => 'Polinema teach reactjs to students, what do you think?',
            'slug' => 'polinema-teach-reactjs-to-students-what-do-you-think',
        ]
    ];
    public function index() {
        $news = $this->news;
        return view('pages.news', compact('news'));
    }

    public function show($param) {
        $news = $this->news;
        $param = array_search($param, array_column($news, 'slug'));
        $param = $news[$param];
        return view('pages.detail', [
            'param' => $param,
            'back' => 'news'
        ]);
    }
}
