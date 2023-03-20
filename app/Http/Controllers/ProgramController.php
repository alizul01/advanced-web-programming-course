<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'admin' && request()->segment(1) == 'admin') {
            $items = Program::paginate(10);
            return view('admin.details.pages', [
                'items' => $items,
                'title' => 'program'
            ]);
        }
        $items = Program::all();
        $title = "program";
        return view('layout.pages', compact('items', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "program";
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

        Program::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->file('image')->store('assets/program', 'public'),
            'slug' => str()->slug($request->title)
        ]);
        toast()->success('Success', 'program has been created');
        return redirect()->route('admin.program');
    }


    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        $param = $program;
        return view('pages.detail', [
            'param' => $param,
            'back' => 'program.index'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Program::where('id', $id)->first();
        $title = "program";
        return view('admin.edit.detail', compact('item', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $program = Program::where('id', $id)->first();
        Program::where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        toast()->success('Success', 'program has been updated');
        return redirect()->route('admin.program');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::where('id', $id)->first();
        $program->delete();

        toast()->success('Success', 'program has been deleted');
        return redirect()->back();
    }
}
