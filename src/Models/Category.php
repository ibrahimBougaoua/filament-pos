<?php

namespace IbrahimBougaoua\FilamentPos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status',
        'cate_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }
}
