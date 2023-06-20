<?php

namespace IbrahimBougaoua\FilamentPos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "sku",
        "default_purchase_price",
        "dpp_inc_tax",
        "profit_percent",
        "default_sell_price",
        "sell_price_inc_tax",
        "image",
        "variation_value_id",
        "product_variation_id",
        "product_id",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,"product_id");
    }

    public function variation()
    {
        return $this->belongsTo(Variation::class,"product_variation_id");
    }

    public function value()
    {
        return $this->belongsTo(VariationValue::class,"variation_value_id");
    }
}
