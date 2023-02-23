<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public $program = [
        [
            'title' => 'React JS Training Program',
            'slug' => 'react-js-training-program',
        ],
        [
            'title' => 'Laravel Training Program',
            'slug' => 'laravel-training-program',
        ],
        [
            'title' => 'Vue JS Training Program',
            'slug' => 'vue-js-training-program',
        ],
    ];
    public function index() {
        $programs = $this->program;
        return view('pages.program', compact('programs'));
    }

    public function show($param) {
        $program = $this->program;
        $param = array_search($param, array_column($program, 'slug'));
        $param = $program[$param];
        return view('pages.detail', [
            'param' => $param,
            'back' => 'program'
        ]);
    }
}
