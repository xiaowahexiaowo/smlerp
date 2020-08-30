<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Request;
use App\Models\Collected;
class CollectedsExport implements FromView
    {

                    use Exportable;

        public function view(): View
            {


                 // 获取上一次请求的参数

        $date_begin=Request::old('date_begin');
        $date_end=Request::old('date_end');


      if ($date_begin&&$date_end) {
             $collecteds = Collected::whereBetween('collection_date',[$date_begin,$date_end])->orderBy('collection_date', 'desc')->paginate(30);
        }else{
            $collecteds = Collected::orderBy('collection_date', 'desc')->paginate(30);
        }



                return view('exports.collecteds'
                    , [

                        'collecteds' => $collecteds
                        ]
                    );

            }
    }

