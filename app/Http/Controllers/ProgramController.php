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
        if (auth()->user()->role == 'admin') {
            $items = Program::paginate(10);
            return view('admin.details.pages', [
                'items' => $items,
                'title' => 'program'
            ]);
        }
        $items = Program::all();
        $title = "programs";
        return view('layout.pages', compact('items', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        $param = $program->first();
        return view('pages.detail', [
            'param' => $param,
            'back' => 'programs.index'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program = Program::where('id', $id)->first();
        return view('admin.details.pages', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $program = Program::where('id', $id)->first();
        Program::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        toast()->success('Success', 'program has been updated');
        return redirect()->route('program.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::where('id', $id)->first();
        $program->delete();

        Alert::success('Success', 'program has been deleted');
        return redirect()->back();
    }
}
