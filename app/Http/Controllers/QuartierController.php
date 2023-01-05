<?php

namespace App\Http\Controllers;

use App\Models\Quartier;
use App\Http\Requests\StoreQuartierRequest;
use App\Http\Requests\UpdateQuartierRequest;

class QuartierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quartiers = Quartier::paginate(20);

        return view('quartiers.index', compact('quartiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quartiers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuartierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuartierRequest $request)
    {
        Quartier::create($request->validated());

        return redirect()->route('quartiers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function show(Quartier $quartier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function edit(Quartier $quartier)
    {
        return view('quartiers.edit', compact('quartier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuartierRequest  $request
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuartierRequest $request, Quartier $quartier)
    {
        $quartier->update($request->except([
            '_token', 
            '_method'
        ]));

        return redirect()->route('quartiers.index')
            ->with(['status' => 'success', 
                    'message' => 'quartier updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quartier $quartier)
    {
        $quartier->delete();

        return redirect()->route('quartiers.index')
            ->with(['status' => 'success', 
                    'message' => 'quartier deleted successfully']);
    }
}
