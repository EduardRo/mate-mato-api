<?php

namespace App\Http\Controllers;

use App\Models\Clasa;
use Illuminate\Http\Request;

class ClasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clase_array=[];
        $clase = Clasa::all();
        foreach($clase as $clasa){
            
            array_push($clase_array,$clasa);
        }

        print_r(json_encode($clase_array));


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
    public function show(Clasa $clasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clasa $clasa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clasa $clasa)
    {
        //
    }
}
