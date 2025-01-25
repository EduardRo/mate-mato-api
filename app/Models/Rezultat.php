<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezultat extends Model
{
    use HasFactory;
    protected $table='rezultate';

    protected $fillable=[
        'iduser',
        'idtest',
        'codserie',
        'codtest',
        'punctaj',
        'enunt',
        'raspuns',
        'raspuns_corect',
        'calea'
    ];
}
