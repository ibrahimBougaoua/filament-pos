<?php

namespace IbrahimBougaoua\FilamentPos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function values()
    {
        return $this->hasMany(VariationValue::class, 'variation_id');
    }
}
