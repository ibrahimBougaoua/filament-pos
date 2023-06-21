<?php

namespace IbrahimBougaoua\FilamentPos\Models;

use IbrahimBougaoua\FilamentPos\Traits\Multitenancy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory,Multitenancy;

    protected $table = 'fl_orders';

    protected $fillable = [
        "ref_amount",
        "service_charge",
        "discount",
        "order_bill",
        "vat",
        "vat_system",
        "cgst",
        "sgst",
        "total_payable",
        "bill_distribution",
        "paid_amount",
        "return_amount",
        "is_paid",
        "customer_id",
        "user_id"
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class,"order_id");
    }
}
