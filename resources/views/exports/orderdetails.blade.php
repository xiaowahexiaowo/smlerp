  <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>日期</th> <th>订单编号</th> <th>客户名称</th><th>订单类型</th> <th>业务员</th><th>机组编号</th><th>产品类型</th><th>机组型号</th><th>功率</th><th>相数</th><th>单位</th> <th>出库数量</th><th>单价</th><th>金额</th>
              </tr>
            </thead>

            <tbody>
              @foreach($orders as $order)
              @if(Auth::user()->id==$order->order_id)
               @foreach($order->orderdetails as $detail)
                @if($loop->first)
              <tr>

                                    <td>{{$order->order_date->toDateString()}}</td><td>{{$order->order_no}}</td><td>{{$order->customer_name}}</td><td>{{$order->order_type}}</td><td>{{$order->user->name}}</td><td>{{$detail->generating_unit_no}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->amount}}</td>

              </tr>
                @else

                   <tr>

                                    <td></td><td></td><td></td><td></td><td></td><td>{{$detail->generating_unit_no}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->amount}}</td>

                    </tr>
                 @endif
                @endforeach
              @endif
              @endforeach
            </tbody>
          </table>
