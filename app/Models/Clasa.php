<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasa extends Model
{
    use HasFactory;

    // Specify the custom table name
    protected $table = 'clase';

    // Specify the attributes that are mass assignable
    protected $fillable=['codclasa','denumireclasa','ordine'];
}
