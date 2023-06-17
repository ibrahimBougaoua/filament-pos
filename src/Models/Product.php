<?php

namespace IbrahimBougaoua\FilamentPos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        "name",
        "slug",
        "sku",
        "barcode_type",
        "description",
        "price",
        "image",
        "status",
        "cate_id",
        "unit_id",
        "brand_id"
    ];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'sku' => $this->sku,
            'description' => $this->description,
            'barcode_type' => $this->barcode_type,
        ];
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class,"cate_id");
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,"unit_id");
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,"brand_id");
    }
}
