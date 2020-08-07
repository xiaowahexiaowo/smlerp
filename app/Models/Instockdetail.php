<?php

namespace App\Models;

class Instockdetail extends Model
{
    protected $fillable = ['in_date', 'stock_id', 'product_type', 'generating_unit_type','generating_unit_no', 'power', 'phases_number', 'unit', 'warehousing_count', 'warehousing_price', 'stock_amount', 'stock_man', 'remark'];

    public function instock(){
      return $this->belongsTo(Instock::class,'id','stock_id');
    }
}
