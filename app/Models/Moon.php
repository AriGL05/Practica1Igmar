<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moon extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'planet',
        'diameter_km',
        'mass_kg',
        'discovery_year',
        'discovery_by',
    ];
}
