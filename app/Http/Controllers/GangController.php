<?php

namespace App\Http\Controllers;

use App\Models\Gang;
use Illuminate\Http\Request;
use App\Mail\CreateGangEmail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreGangRequest;

use App\Http\Requests\UpdateGangRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class GangController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(Gang::class, 'gang');
    // }

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
    public function create(Request $request)
    {

        if ($request->user()->cannot('create', Gang::class)) {
            abort(403);
        }


        return view('Gangs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGangRequest $request)
    {
        Gang::create($request -> validated());
        Mail::to('bilgerjeremy5705@gmail.com')->send(new CreateGangEmail($request->name, $request->quartier));
        return redirect() -> route('gangs.index');
    }

    public static function testcron() {
        Mail::to('adresse@email.fr')->send(new CreateGangEmail('Nom du gang', 'quartier du gang'));
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
