<?php

namespace App\Observers;

use App\Models\Outstockdetail;
use Illuminate\Support\Facades\DB;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class OutstockdetailObserver
{
    public function created(Outstockdetail $outstockdetail)
    {
        //创建完后  更新物品统计表
        $generating_unit_no=$outstockdetail->generating_unit_no;
        $stock=DB::table('stocks')->where('generating_unit_no',$generating_unit_no)->first();

            $out_count=$stock->out_count+$outstockdetail->out_count;

        $inventory_quantity=$stock->inventory_quantity-$out_count;
        $stock_amount=$inventory_quantity*$stock->warehousing_price;
        DB::table('stocks')->where('generating_unit_no',$generating_unit_no)->update(['out_count'=>$out_count,'inventory_quantity'=>$inventory_quantity,'stock_amount'=>$stock_amount]);
    }

    public function deleting(Outstockdetail $outstockdetail){
              //删除后  更新物品统计表

        $generating_unit_no=$outstockdetail->generating_unit_no;
        $stock=DB::table('stocks')->where('generating_unit_no',$generating_unit_no)->first();

            $out_count=$stock->out_count-$outstockdetail->out_count;
        $inventory_quantity=$stock->inventory_quantity+$outstockdetail->out_count;
        $stock_amount=$inventory_quantity*$stock->warehousing_price;
        DB::table('stocks')->where('generating_unit_no',$generating_unit_no)->update(['out_count'=>$out_count,'inventory_quantity'=>$inventory_quantity,'stock_amount'=>$stock_amount]);
    }
}
