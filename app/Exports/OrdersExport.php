<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use App\Models\Order;
class OrdersExport implements FromView
    {

                    use Exportable;

        public function view(): View
            {
                return view('exports.orderdetails', [
                            'orders' => Order::all()
                        ]);
            }
    }

