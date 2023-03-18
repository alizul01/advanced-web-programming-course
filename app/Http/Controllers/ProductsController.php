<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'admin' && request()->segment(1) == 'admin') {
            $items = Products::paginate(10);
            return view('admin.details.pages', [
                'items' => $items,
                'title' => 'products'
            ]);
        }
        $items = Products::all();
        $title = "products";
        return view('layout.pages', compact('items', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "products";
        return view('admin.create.detail', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Title is required',
            'content.required' => 'Content is required',
            'image.required' => 'Image is required',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max' => 'Image may not be greater than 2048 kilobytes',
        ]);

        Products::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->file('image')->store('assets/products', 'public'),
            'slug' => str()->slug($request->title)
        ]);
        toast()->success('Success', 'products has been created');
        return redirect()->route('products.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        $param = $products->first();
        return view('pages.detail', [
            'param' => $param,
            'back' => 'products.index'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Products::where('id', $id)->first();
        $title = "products";
        return view('admin.edit.detail', compact('item', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Products::where('id', $id)->first();
        Products::where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        toast()->success('Success', 'products has been updated');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Products::where('id', $id)->first();
        $products->delete();

        toast()->success('Success', 'products has been deleted');
        return redirect()->back();
    }
}
