<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index() {
        $items = Program::all();
        $title = "programs";
        return view('layout.pages', compact('items', 'title'));
    }

    public function show(Program $program) {
        $param = $program->first();
        return view('pages.detail', [
            'param' => $param,
            'back' => 'programs.index'
        ]);
    }
}
