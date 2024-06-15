<?php

namespace App\Http\Helpers;
use Illuminate\Support\Facades\DB;

class MyTeste {
    public function createtest($codserie) {
        //echo $codserie . " bla bla";
        $tests = DB::select('SELECT * FROM tests WHERE codserie = ?', [$codserie]);
        return $tests;
    }
}
?>
