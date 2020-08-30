 <table class="table table-sm table-striped">
            <thead>
              <tr>
             <th>订单编号</th>  <th>日期</th> <th>客户名称</th> <th>金额</th> <th>付款方式</th> <th>收款人</th> <th>核对人</th> <th>备注说明</th>

              </tr>
                  <tr>
             <th>order id</th>  <th>date</th> <th>customer name</th> <th>collected_amount</th> <th>payment_method</th> <th>payee</th> <th>check man</th> <th>remark</th>

              </tr>
            </thead>

            <tbody>
              @foreach($collecteds as $collected)
              <tr>


                <td>{{$collected->order_id}}</td> <td>{{$collected->collection_date->toDateString()}}</td> <td>{{$collected->customer_name}}</td> <td>{{$collected->collected_amount}}</td> <td>{{$collected->payment_method}}</td> <td>{{$collected->payee}}</td> <td>{{$collected->check_man}}</td> <td>{{$collected->remark}}</td>


              </tr>
              @endforeach
            </tbody>
          </table>
