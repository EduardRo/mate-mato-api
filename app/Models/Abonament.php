<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abonament extends Model
{
    //
    use HasFactory;

    protected $table = 'abonamente';

    protected $fillable = [
        'codabonament',
        'denumireabonament',
        'pret',
        'pretfaratva',
        'tva'
    ];

}
