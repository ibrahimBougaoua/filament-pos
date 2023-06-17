<?php

namespace IbrahimBougaoua\FilamentPos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationValue extends Model
{
    use HasFactory;

    protected $fillable = [
        "value",
        "variation_id"
    ];

}
