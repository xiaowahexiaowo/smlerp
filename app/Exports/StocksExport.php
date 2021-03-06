<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Request;
use App\Models\Stock;
class StocksExport implements FromView
    {

        use Exportable;

        public function view(): View
            {


                 // 获取上一次请求的参数

            $date_begin=Request::old('date_begin');
            $date_end=Request::old('date_end');
            if($date_begin&&$date_end){
                $stocks = Stock::whereBetween('created_at',[$date_begin,$date_end])->orderBy('created_at', 'desc')->paginate(30);
            }else{
            $stocks = Stock::orderBy('created_at', 'desc')->paginate(30);
            }



                return view('exports.stocks'
                    , [

                        'stocks' => $stocks
                        ]
                    );



    }
    }

