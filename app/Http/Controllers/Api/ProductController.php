<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Api\V1\ProductResource;
use App\Http\Resources\Api\V1\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProductCollection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateProductRequest $request)
    {
        $user = Product::create($request->validated());
        return response()->json([
            'message' => 'Product created',
            'product' => new ProductResource($user)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResource(Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //dd($request);
        $product->update($request->except([
            '_token', 
            '_method'
        ]));
        return response()->json([
            'status' => 'success', 
            'message' => 'Product updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'status' => 'success', 
            'message' => 'Product deleted successfully'
        ]);
    }
}
