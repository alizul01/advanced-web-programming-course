<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Products::all();

        return response()->json([
            'message' => 'success',
            'data' => Products::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Products::create($request->validated());

        return response()->json([
            'message' => 'success',
            'data' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Products $product)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
