<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezultat extends Model
{
    use HasFactory;
    protected $table='rezultats';

    protected $fillable=[
        'iduser',
        'codserie',
        'punctaj',

    ];
}
