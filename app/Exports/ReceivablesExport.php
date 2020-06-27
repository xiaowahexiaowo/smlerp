<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Request;
use App\Models\Receivable;
class ReceivablesExport implements FromView
    {

                    use Exportable;

        public function view(): View
            {
                 // 获取上一次请求的参数


          $receivables = Receivable::paginate(30);


                return view('exports.receivabledetails'
                    , [

                        'receivables' => $receivables
                        ]
                    );

            }
    }

