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
    public function userIndex() {
        $user = User::paginate(10);
        return view('admin.details.user', compact('user'));
    }

    public function userEdit(Request $request, $id) {
        $user = User::where('id', $id)->first();
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        toast()->success('Success', 'User has been updated');
        return redirect()->route('admin.user');
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
        $user = User::where('id', $id)->first();
        return view('admin.edit.user', compact('user'));
    }

    public function productsShow() {
        $items = User::paginate(10);
        return view('admin.edit.pages', [
            'items' => $items,
            'title' => 'program'
        ]);
    }

    public function userDelete($id) {
        $user = User::where('id', $id)->first();
        $user->delete();

        toast()->success('Success', 'User has been deleted');
        return redirect()->back();
    }

    public function productsDelete($id) {
        $products = Products::where('id', $id)->first();
        $products->delete();

        toast()->success('Success', 'products has been deleted');
        return redirect()->back();
    }

    public function programDelete($id) {
        $program = Program::where('id', $id)->first();
        $program->delete();

        toast()->success('Success', 'program has been deleted');
        return redirect()->back();
    }

    public function newsDelete($id) {
        $news = News::where('id', $id)->first();
        $news->delete();

        toast()->success('Success', 'news has been deleted');
        return redirect()->back();
    }

    public function productsEdit(Request $request, $id) {
        $products = Products::where('id', $id)->first();
        $products->delete();

        toast()->success('Success', 'products has been deleted');
        return redirect()->back();
    }
}
