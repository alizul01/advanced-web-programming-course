<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Products;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index() {
        $data = [
            'news' => News::all()->count(),
            'product' => Products::all()->count(),
            'user' => User::all()->count(),
            'program' => Program::all()->count()
        ];
        return view('admin.dashboard', compact('data'));
    }
}
