<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $codclasa = $request->route('codclasa');
        $serie_array=[];
        //$series = Serie::all()->toArray();
        $series = Serie::where('codclasa',$codclasa)->get();
        foreach ($series as $serie){
            $pr=($serie);
            array_push($serie_array,$pr);

        }

        //print_r(json_encode($serie_array));
        return response()->json($serie_array);

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
    public function show(Serie $serie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serie $serie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $serie)
    {
        //
    }
}
