
          <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>日期</th> <th>订单编号</th><th>客户名称</th><th>业务员</th> <th>产品类型</th><th>机组型号</th><th>功率</th><th>相数</th><th>单位</th> <th>出库数量</th><th>库存单价</th><th>金额</th><th>备注</th>
              </tr>

                   <tr>

                <th>date</th> <th>order_id</th><th>client_name</th><th>sales</th> <th>unit_type</th><th>unit_model</th><th>power</th><th>phase</th><th>unit</th> <th>out_count</th><th>warehousing_price</th><th>amount</th><th>remark</th>
              </tr>
            </thead>

            <tbody>
              @foreach($outstocks as $outstock)
               @foreach($outstock->outstockdetails as $detail)
                @if($loop->first)
              <tr>

                                    <td>{{$outstock->out_date}}</td><td>{{$outstock->order_id}}</td><td>{{$outstock->customer_name}}</td><td>{{$outstock->user_name}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->out_count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->amount}}</td><td>{{$detail->remark}}</td>

              </tr>
                @else

                   <tr>
         <td></td><td></td><td></td><td></td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->out_count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->amount}}</td><td>{{$detail->remark}}</td>


                    </tr>
                 @endif
                @endforeach
              @endforeach
            </tbody>
          </table>

