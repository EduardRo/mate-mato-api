<?php

namespace App\Http\Controllers;

use App\Models\Rezultat;
use Illuminate\Http\Request;

class RezultatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    /*
    // Debug: Log the authenticated user
    \Log::info('Authenticated User:', ['user' => auth()->user()]);

    if (!auth()->check()) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    */
    // Validate the request data
    $request->validate([
        'iduser' => 'required|integer',
        'idtest' => 'required|integer',
        'codserie' => 'required|string',
        'codtest' => 'required|string',
        'punctaj' => 'required|integer',
        'enunt'=>'required|string',
        'raspuns' => 'required|string',
        'raspuns_corect' => 'required|string',
        'calea' => 'required|string',
    ]);

    // Save the results
    $rezultat = new Rezultat();
    $rezultat->iduser = $request->iduser;
    $rezultat->idtest = $request->idtest;
    $rezultat->codserie = $request->codserie;
    $rezultat->codtest = $request->codtest;
    $rezultat->punctaj = $request->punctaj;
    $rezultat->enunt = $request->enunt;
    $rezultat->raspuns = $request->raspuns;
    $rezultat->raspuns_corect = $request->raspuns_corect;
    $rezultat->calea = $request->calea;
    $rezultat->save();

    return response()->json(['message' => 'Results saved successfully', 'data' => $rezultat], 201);
}

    /**
     * Display the specified resource.
     */
    public function show(Rezultat $rezultat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rezultat $rezultat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rezultat $rezultat)
    {
        //
    }
}
