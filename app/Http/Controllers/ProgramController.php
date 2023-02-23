<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index() {
        $programs = Program::all();
        return view('pages.program', compact('programs'));
    }

    public function show(Program $program) {
        $param = $program->first();
        return view('pages.detail', [
            'param' => $param,
            'back' => 'programs.index'
        ]);
    }
}
