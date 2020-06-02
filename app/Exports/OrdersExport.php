<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Request;
use App\Models\Order;
class OrdersExport implements FromView
    {

                    use Exportable;

        public function view(): View
            {
                 // 获取上一次请求的参数
               $order_type=Request::old('order_type');
        $date_begin=Request::old('date_begin');
        $date_end=Request::old('date_end');

        if($order_type){
            if($date_begin&&$date_end){
                $orders = Order::where('order_type',$order_type)->whereBetween('order_date',[$date_begin,$date_end])->with('orderdetails','user')->orderBy('order_date', 'desc')->paginate(30);
            }else{
                $orders = Order::where('order_type',$order_type)->with('orderdetails','user')->orderBy('order_date', 'desc')->paginate(30);
            }
        }elseif ($date_begin&&$date_end) {
             $orders = Order::whereBetween('order_date',[$date_begin,$date_end])->with('orderdetails','user')->orderBy('order_date', 'desc')->paginate(30);
        }else{
            $orders = Order::with('orderdetails','user')->orderBy('order_date', 'desc')->paginate(30);
        }

                return view('exports.orderdetails'
                    , [
                    // Order::with('orderdetails','user')
                            // 'orders' => Order::all()
                     // 'orders' => Order::with('orderdetails','user')->get()
                        'orders' => $orders
                        ]
                    );

            }
    }

