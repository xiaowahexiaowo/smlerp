   <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>订单编号</th> <th>客户名称</th> <th>应收款总金额</th> <th>已收款金额</th> <th>剩余应收金额</th> <th>业务员</th> <th>会计</th> <th>核对人</th> <th>备注说明</th>

              </tr>
            </thead>

            <tbody>
 @foreach($receivables as $receivable)
              <tr>


                <td>{{$receivable->order_id}}</td> <td>{{$receivable->customer_name}}</td> <td>{{$receivable->receivable_amount}}</td> <td>{{$receivable->received}}</td> <td>{{$receivable->remaining_receivables}}</td> <td>{{$receivable->user_name}}</td> <td>{{$receivable->accountant}}</td> <td>{{$receivable->check_man}}</td> <td>{{$receivable->remark}}</td>


              </tr>
@endforeach
            </tbody>
