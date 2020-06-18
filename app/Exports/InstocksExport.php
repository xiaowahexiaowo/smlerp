<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Request;
use App\Models\Instock;
class InstocksExport implements FromView
    {

                    use Exportable;

        public function view(): View
            {
                 // 获取上一次请求的参数

        $date_begin=Request::old('date_begin');
        $date_end=Request::old('date_end');

   if($date_begin&&$date_end){
          $instocks = Instock::whereBetween('in_date',[$date_begin,$date_end])->with('instockdetails')->orderBy('in_date', 'desc')->paginate(30);
      }else{
          $instocks = Instock::with('instockdetails')->orderBy('in_date', 'desc')->paginate(30);
      }

                return view('exports.instockdetails'
                    , [
                    // Order::with('orderdetails','user')
                            // 'orders' => Order::all()
                     // 'orders' => Order::with('orderdetails','user')->get()
                        'instocks' => $instocks
                        ]
                    );

            }
    }

