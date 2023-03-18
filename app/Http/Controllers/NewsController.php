<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "news";
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

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->file('image')->store('assets/news', 'public'),
            'slug' => str()->slug($request->title)
        ]);
        toast()->success('Success', 'news has been created');
        return redirect()->route('admin.news');
    }


    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $param = $news->first();
        return view('pages.detail', [
            'param' => $param,
            'back' => 'news.index'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = News::where('id', $id)->first();
        $title = "news";
        return view('admin.edit.detail', compact('item', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = news::where('id', $id)->first();
        news::where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        toast()->success('Success', 'news has been updated');
        return redirect()->route('admin.news');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::where('id', $id)->first();
        $news->delete();

        toast()->success('Success', 'news has been deleted');
        return redirect()->back();
    }
}
