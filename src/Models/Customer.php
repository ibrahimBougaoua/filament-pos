<?php

namespace IbrahimBougaoua\FilamentPos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "civility",
        "first_name",
        "last_name",
        "email",
        "address_line_1",
        "address_line_2",
        "mobile",
        "status",
        "type",
    ];
}
