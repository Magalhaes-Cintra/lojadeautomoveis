<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class van extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'modelo',
        'cor',
        'ano',
        'id',
    ];
}
