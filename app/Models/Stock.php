<?php

namespace App\Models;

class Stock extends Model
{
    protected $fillable = ['product_type', 'generating_unit_type', 'power', 'phases_number', 'unit', 'init_stock', 'warehousing_count', 'out_count', 'inventory_quantity', 'warehousing_price', 'stock_amount', 'remark'];
}
