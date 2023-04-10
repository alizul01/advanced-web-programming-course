<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PDFReportingService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.details.user', compact('user'));
    }

    public function exportToPDF() {
        $user = User::paginate(10);
        $pdf = new PDFReportingService();
        return $pdf->exportToPDF($user);
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
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.edit.user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        toast()->success('Success', 'User has been updated');
        return redirect()->route('admin.user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        toast()->success('Success', 'User has been deleted');
        return redirect()->back();
    }
}
