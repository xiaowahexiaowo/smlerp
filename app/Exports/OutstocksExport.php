<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Request;
use App\Models\Outstock;
class OutstocksExport implements FromView
    {

                    use Exportable;

        public function view(): View
            {
                 // 获取上一次请求的参数

        $date_begin=Request::old('date_begin');
        $date_end=Request::old('date_end');

   if($date_begin&&$date_end){
          $outstocks = Outstock::whereBetween('out_date',[$date_begin,$date_end])->with('outstockdetails')->orderBy('out_date', 'desc')->paginate(30);
      }else{
          $outstocks = Outstock::with('outstockdetails')->orderBy('out_date', 'desc')->paginate(30);
      }

                return view('exports.outstockdetails'
                    , [
                    // Order::with('orderdetails','user')
                            // 'orders' => Order::all()
                     // 'orders' => Order::with('orderdetails','user')->get()
                        'outstocks' => $outstocks
                        ]
                    );

            }
    }

