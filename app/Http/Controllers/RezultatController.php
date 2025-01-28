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
        'codserie' => 'required|string',
        'punctaj' => 'required|integer',

    ]);

    // Save the results
    $rezultat = new Rezultat();
    $rezultat->iduser = $request->iduser;
    $rezultat->codserie = $request->codserie;
    $rezultat->punctaj = $request->punctaj;
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
