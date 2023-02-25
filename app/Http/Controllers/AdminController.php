<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Products;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function userIndex() {
        $user = User::paginate(10);
        return view('admin.details.user', compact('user'));
    }

    public function programIndex() {
        $items = Program::paginate(10);
        return view('admin.details.pages', [
            'items' => $items,
            'title' => 'program'
        ]);
    }

    public function productIndex() {
        $items = Products::paginate(10);
        return view('admin.details.pages', [
            'items' => $items,
            'title' => 'products'
        ]);
    }

    public function newsIndex() {
        $items = News::paginate(10);
        return view('admin.details.pages', [
            'items' => $items,
            'title' => 'news'
        ]);
    }

    public function userShow($id) {
        $user = User::findOrFail($id);
        return view('admin.details.user-detail', compact('user'));
    }

    public function productsShow() {
        $items = User::paginate(10);
        return view('admin.details.pages', [
            'items' => $items,
            'title' => 'program'
        ]);
    }
}
