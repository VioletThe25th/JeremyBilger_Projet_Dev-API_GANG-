<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateEtablissementRequest;
use App\Http\Resources\Api\V1\EtablissementResource;
use App\Http\Resources\Api\V1\EtablissementCollection;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new EtablissementCollection(Etablissement::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateEtablissementRequest $request)
    {
        $user = Etablissement::create($request->validated());
        return response()->json([
            'message' => 'Etablissement created',
            'etablissement' => new EtablissementResource($user)
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
        return new EtablissementResource(Etablissement::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEtablissementRequest $request, Etablissement $etablissement)
    {
        $etablissement->update($request->except([
            '_token', 
            '_method'
        ]));
        return response()->json([
            'status' => 'success', 
            'message' => 'Etablissement updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etablissement $etablissement)
    {
        $etablissement->delete();

        return response()->json([
            'status' => 'success', 
            'message' => 'Etablissement deleted successfully'
        ]);
    }
}
