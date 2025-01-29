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

    /**
     * Update the specified resource in storage.
     */
    public function ScoreCalculation(Request $request)
{
    try {
        // Log request data for debugging
        \Log::info('Request data:', $request->all());

        // Get authenticated user
        $user = $request->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Validate request
        $request->validate([
            'codserie' => 'required|string'
        ]);

        // Log user and codserie
        \Log::info('User:', ['id' => $user->id]);
        \Log::info('Codserie:', ['codserie' => $request->codserie]);

        // Get all results for the user and codserie
        $results = Rezultat::where('iduser', $user->id)
            ->where('codserie', $request->codserie)
            ->get();

        // Calculate total and average
        $total = $results->sum('punctaj');
        $count = $results->count();
        $average = $count > 0 ? $total / $count : 0;

        return response()->json([
            'success' => true,
            'data' => [
                'user_id' => $user->id,
                'codserie' => $request->codserie,
                'total_score' => $total,
                'average_score' => round($average, 2),
                'attempts' => $count
            ]
        ]);
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Error in ScoreCalculation:', ['error' => $e->getMessage()]);
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

}
