<?php

namespace App\Models;

class Order extends Model
{
    protected $fillable = ['order_no', 'order_id', 'order_type', 'order_date', 'order_ticket', 'customer_name', 'user_id', 'payment_type', 'total_cost', 'payment_method', 'remark', 'payment_amount', 'tax_deductible', 'arrears', 'order_state', 'order_detail_id', 'appendix'];
    // 设定order_date返回类型为 时间类型 方便直接使用carbon 处理时间
    protected $dates = ['order_date'];

}
