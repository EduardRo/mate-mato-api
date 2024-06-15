<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\MyTeste;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.php
     */
    public function index()
    {
        //
    }

     /**
     * Create the test from the codserie.
     */
    public function test(Request $request)
    {
        //$myTesteInstance = new MyTeste();
        $codserie = $request->route('codserie');
        //$myTesteInstance->createtest($codserie);
        if (class_exists(MyTeste::class)) {
            //echo "Class MyTeste exists<br>";
            $myTesteInstance = new MyTeste();
            print_r(json_encode($myTesteInstance->createtest($codserie))); // This will echo "TestCode bla bla"
            //print_r(json_encode($serie_array));
        } else {
            echo "Class MyTeste does not exist<br>";
        }
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
