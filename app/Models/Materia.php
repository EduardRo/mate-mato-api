<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    // Specify the custom table name
    protected $table = 'materii';

    // Specify the attributes that are mass assignable
    protected $fillable=['codclasa','codmaterie','denumirematerie','ordine'];
}



