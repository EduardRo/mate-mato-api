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
        // Save the results from the quiz in the database

        $rezultat = new Rezultat();
        $rezultat->iduser = $request->iduser;
        $rezultat->idtest = $request->idtest;
        $rezultat->punctaj = $request->punctaj;
        $rezultat->raspuns = $request->raspuns;
        $rezultat->save();
        return  $request->all();
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
