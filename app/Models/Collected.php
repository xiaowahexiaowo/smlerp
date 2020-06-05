<?php

namespace App\Models;

class Collected extends Model
{
    protected $fillable = ['order_id', 'collection_date', 'customer_name', 'collected_amount', 'payment_method', 'payee', 'check_man', 'remark'];

       protected $dates = ['collection_date'];
}
