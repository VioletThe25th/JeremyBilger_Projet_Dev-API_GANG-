<?php

namespace App\Http\Controllers;

use App\Models\Gang;
use App\Http\Requests\StoreGangRequest;
use App\Http\Requests\UpdateGangRequest;

class GangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gangs = Gang::paginate(10);

        return view('gangs.index', compact('gangs'));
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
     * @param  \App\Http\Requests\StoreGangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Http\Response
     */
    public function show(Gang $gang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Http\Response
     */
    public function edit(Gang $gang)
    {
        return view('gangs.edit', compact('gang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGangRequest  $request
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGangRequest $request, Gang $gang)
    {
        $gang->update($request->except([
            '_token', 
            '_method'
        ]));

        return redirect()->route('gangs.index')
            ->with(['status' => 'success', 
                    'message' => 'Gang updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gang $gang)
    {
        $gang->delete();

        return redirect()->route('gangs.index')
            ->with(['status' => 'success', 
                    'message' => 'gang deleted successfully']);
    }
}
