<?php

namespace App\Models;

class Receivable extends Model
{
    protected $fillable = ['order_id', 'customer_name', 'receivable_amount', 'received', 'remaining_receivables', 'user_name', 'accountant', 'check_man', 'remark'];
}
