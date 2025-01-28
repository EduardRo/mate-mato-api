<?php

namespace App\Http\Controllers;

use App\Models\Abonament;
use Illuminate\Http\Request;

class AbonamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Abonament::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Abonament $abonament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Abonament $abonament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Abonament $abonament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abonament $abonament)
    {
        //
    }
}
