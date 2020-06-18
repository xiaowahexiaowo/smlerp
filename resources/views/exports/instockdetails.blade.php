   <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>日期</th> <th>入库编号</th> <th>机组编号</th><th>产品类型</th><th>机组型号</th><th>功率</th><th>相数</th><th>单位</th> <th>入库数量</th><th>库存单价</th><th>金额</th><th>入库人</th><th>备注</th>
              </tr>
            </thead>

            <tbody>
              @foreach($instocks as $instock)
               @foreach($instock->instockdetails as $detail)
                @if($loop->first)
              <tr>

                                    <td>{{$instock->in_date}}</td><td>{{$instock->id}}</td><td>{{$detail->generating_unit_no}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->warehousing_count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->stock_amount}}</td><td>{{$detail->stock_man}}</td><td>{{$detail->remark}}</td>

              </tr>
                @else

                   <tr>
    <td></td><td></td><td>{{$detail->generating_unit_no}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->warehousing_count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->stock_amount}}</td><td></td><td>{{$detail->remark}}</td>


                    </tr>
                 @endif
                @endforeach
              @endforeach
            </tbody>
          </table>
