<?php

namespace App\Models;

class Instock extends Model
{
    protected $fillable = ['stock_type', 'batch', 'in_date', 'supplier', 'stock_man', 'stock_factory'];
}
