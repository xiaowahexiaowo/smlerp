<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    //csrf_token() 使用之后。 如果模型不专门写fillable 在fill 的时候 找不到csrf这个字段 所以写个fillable过滤掉
     protected $fillable = ['order_id','generating_unit_no','count','remarks'];

  public function order(){
    return $this->belongsTo(Order::class);
  }




}

