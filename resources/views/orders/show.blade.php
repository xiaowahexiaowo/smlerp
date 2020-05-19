@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
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
        <br>

        <label>No 号</label>
<p>
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
	{{ $order->user_id }}
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
</p>
      </div>
    </div>
  </div>
</div>

@endsection
