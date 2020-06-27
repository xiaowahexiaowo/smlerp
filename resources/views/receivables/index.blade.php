@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          应收款统计
          <a class="btn btn-success float-xs-right" href="{{ route('exports.receivablesdetails') }}">导出</a>
        </h1>
      </div>

      <div class="card-body">
        @if($receivables->count())
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
          </table>
          {!! $receivables->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">空的!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
