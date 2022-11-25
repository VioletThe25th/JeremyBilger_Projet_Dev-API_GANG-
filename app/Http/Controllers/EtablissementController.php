<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Http\Requests\StoreEtablissementRequest;
use App\Http\Requests\UpdateEtablissementRequest;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etablissements = Etablissement::paginate(10);

        return view('etablissements.index', compact('etablissements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEtablissementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEtablissementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function show(Etablissement $etablissement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function edit(Etablissement $etablissement)
    {
        return view('etablissements.edit', compact('etablissement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEtablissementRequest  $request
     * @param  \App\Models\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEtablissementRequest $request, Etablissement $etablissement)
    {
        $etablissement->update($request->except([
            '_token', 
            '_method'
        ]));

        return redirect()->route('etablissements.index')
            ->with(['status' => 'success', 
                    'message' => 'Etablissement updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etablissement $etablissement)
    {
        $etablissement->delete();

        return redirect()->route('etablissements.index')
            ->with(['status' => 'success', 
                    'message' => 'Etablissement deleted successfully']);
    }
}
