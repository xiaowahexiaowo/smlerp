@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-14">
    <div class="card ">
      <div class="card-header">
        <h1>销售单 /  #{{ $order->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('orders.index') }}"><- 返回</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('orders.edit', $order->id) }}">
                编辑
              </a>
            </div>
          </div>
        </div>
         <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>NO号</th> <th>订单编号</th> <th>订单类型</th> <th>订单日期</th> <th>订单摘要</th> <th>客户名称</th> <th>业务员</th> <th>支付类别</th> <th>支付总金额</th> <th>支付方式</th> <th>备注</th> <th>支付金额</th> <th>可抵免税款</th> <th>尚欠金额</th> <th>订单状态</th>

              </tr>
            </thead>

            <tbody>

              <tr>


                <td>{{$order->order_no}}</td> <td>{{$order->order_id}}</td> <td>{{$order->order_type}}</td> <td>{{$order->order_date->toDateString()}}</td> <td>{{$order->order_ticket}}</td> <td>{{$order->customer_name}}</td> <td>{{$order->user->name}}</td> <td>{{$order->payment_type}}</td> <td>{{$order->total_cost}}</td> <td>{{$order->payment_method}}</td> <td>{{$order->remark}}</td> <td>{{$order->payment_amount}}</td> <td>{{$order->tax_deductible}}</td> <td>{{$order->arrears}}</td> <td>{{$order->order_state}}</td>


              </tr>



            </tbody>
          </table>
          <p>附件：</p>
        <p>
                  {!! $order->appendix !!}
              </p>
        <br>

<!--         <label>No 号</label>
<p >
	{{ $order->order_no }}
</p> <label>订单编号</label>
<p>
	{{ $order->order_id }}
</p> <label>订单类型</label>
<p>
	{{ $order->order_type }}
</p> <label>订单日期</label>
<p>
	{{ $order->order_date->toDateString()}}
</p> <label>订单摘要</label>
<p>
	{{ $order->order_ticket }}
</p> <label>客户名称</label>
<p>
	{{ $order->customer_name }}
</p> <label>业务员</label>
<p>
	{{ $order->user->name }}
</p> <label>支付类别</label>
<p>
	{{ $order->payment_type }}
</p> <label>支付总金额</label>
<p>
	{{ $order->total_cost }}
</p> <label>支付方式</label>
<p>
	{{ $order->payment_method }}
</p> <label>备注</label>
<p>
	{{ $order->remark }}
</p> <label>支付金额</label>
<p>
	{{ $order->payment_amount }}
</p> <label>可抵免税款</label>
<p>
	{{ $order->tax_deductible }}
</p> <label>尚欠金额</label>
<p>
	{{ $order->arrears }}
</p> <label>订单状态</label>
<p>
	{{ $order->order_state }}
</p>
 <label>附件</label>
<p>
	{!! $order->appendix !!}
</p> -->
      </div>
    </div>
  </div>
</div>

@endsection
