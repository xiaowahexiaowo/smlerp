<?php

namespace App\Models;

class Outstockdetail extends Model
{
    protected $fillable = ['stock_id','out_date', 'order_id', 'product_type', 'generating_unit_type', 'generating_unit_no','power', 'phases_number', 'unit', 'out_count', 'warehousing_price', 'amount', 'remark'];

     public function outstock(){
      return $this->belongsTo(Outstock::class,'id','stock_id');
    }
}
