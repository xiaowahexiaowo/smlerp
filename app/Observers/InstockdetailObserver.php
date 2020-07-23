<?php

namespace App\Observers;

use App\Models\Instockdetail;
use Illuminate\Support\Facades\DB;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class InstockdetailObserver
{
    public function created(Instockdetail $instockdetail)
    {
        //创建完后  更新物品统计表
        $generating_unit_type=$instockdetail->generating_unit_type;
        $stock=DB::table('stocks')->where('generating_unit_type',$generating_unit_type)->first();

            $warehousing_count=$stock->warehousing_count+$instockdetail->warehousing_count;

        $inventory_quantity=$stock->inventory_quantity+$instockdetail->warehousing_count;
        $stock_amount=$inventory_quantity*$stock->warehousing_price;
        DB::table('stocks')->where('generating_unit_type',$generating_unit_type)->update(['warehousing_count'=>$warehousing_count,'inventory_quantity'=>$inventory_quantity,'stock_amount'=>$stock_amount]);
    }

    public function deleting(Instockdetail $instockdetail){
              //删除后  更新物品统计表

        $generating_unit_type=$instockdetail->generating_unit_type;
        $stock=DB::table('stocks')->where('generating_unit_type',$generating_unit_type)->first();

            $warehousing_count=$stock->warehousing_count-$instockdetail->warehousing_count;
        $inventory_quantity=$stock->inventory_quantity-$instockdetail->warehousing_count;
        $stock_amount=$inventory_quantity*$stock->warehousing_price;
        DB::table('stocks')->where('generating_unit_type',$generating_unit_type)->update(['warehousing_count'=>$warehousing_count,'inventory_quantity'=>$inventory_quantity,'stock_amount'=>$stock_amount]);
    }


}
