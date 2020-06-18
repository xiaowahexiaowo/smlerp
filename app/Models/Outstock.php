<?php

namespace App\Models;

class Outstock extends Model
{
    protected $fillable = ['out_stock_type', 'out_date', 'order_id', 'customer_name', 'user_name', 'out_stock_factory', 'remark'];
}
