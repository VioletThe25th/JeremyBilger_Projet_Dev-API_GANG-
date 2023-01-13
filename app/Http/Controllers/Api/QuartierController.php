<?php

namespace App\Http\Controllers\Api;

use App\Models\Quartier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateQuartierRequest;
use App\Http\Resources\Api\V1\QuartierResource;
use App\Http\Resources\Api\V1\QuartierCollection;

class QuartierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new QuartierCollection(Quartier::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateQuartierRequest $request)
    {
        $user = Quartier::create($request->validated());
        return response()->json([
            'message' => 'Gang created',
            'gang' => new QuartierResource($user)
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
        return new QuartierResource(Quartier::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuartierRequest $request, Quartier $quartier)
    {
        $quartier->update($request->except([
            '_token', 
            '_method'
        ]));
        return response()->json([
            'status' => 'success', 
            'message' => 'Quartier updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quartier $quartier)
    {
        $quartier->delete();

        return response()->json([
            'status' => 'success', 
            'message' => 'Quartier deleted successfully'
        ]);
    }
}
