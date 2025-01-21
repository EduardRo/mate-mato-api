<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Test;
use DB;


class TeorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function serii(Request $request)
    {
        //
        $codclasa = $request->route('codclasa');
        $serie_array=[];
        $series = Serie::where('codclasa',$codclasa)
        ->select('codclasa','codmaterie','codserie','denumireserie','ordine')
        ->orderby('codmaterie')
        ->orderby('codserie')
        ->orderby('ordine')
        ->get();
        foreach ($series as $serie){
            $pr=($serie);
            array_push($serie_array,$pr);

        }

        //print_r(json_encode($serie_array));
        return response()->json($serie_array);

    }

    public function teste(Request $request)
    {
        //
        $codclasa = $request->route('codclasa');
        $codserie = $request->route('codserie');

        $data = DB::table('serii')
            ->join('tests', 'serii.codserie', '=', 'tests.codserie')
            ->where('serii.codclasa', $codclasa)
            ->where('serii.codserie', $codserie)
            ->select(
                'serii.id as serie_id',
                'serii.codserie',
                'serii.denumireserie',
                'tests.id as test_id',
                'tests.codtest',
                'tests.enunt',
                'tests.raspuns',
                'tests.calea'
            )
            ->orderBy('serii.codmaterie')
            ->orderBy('serii.codserie')
            ->orderBy('serii.ordine')
            ->orderBy('tests.codtest')
            ->orderBy('tests.id')
            ->get();

        return response()->json($data);
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
