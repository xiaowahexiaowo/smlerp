@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Order / Show #{{ $order->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('orders.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('orders.edit', $order->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Order_no</label>
<p>
	{{ $order->order_no }}
</p> <label>Order_id</label>
<p>
	{{ $order->order_id }}
</p> <label>Order_type</label>
<p>
	{{ $order->order_type }}
</p> <label>Order_date</label>
<p>
	{{ $order->order_date }}
</p> <label>Order_ticket</label>
<p>
	{{ $order->order_ticket }}
</p> <label>Customer_name</label>
<p>
	{{ $order->customer_name }}
</p> <label>User_id</label>
<p>
	{{ $order->user_id }}
</p> <label>Payment_type</label>
<p>
	{{ $order->payment_type }}
</p> <label>Total_cost</label>
<p>
	{{ $order->total_cost }}
</p> <label>Payment_method</label>
<p>
	{{ $order->payment_method }}
</p> <label>Remark</label>
<p>
	{{ $order->remark }}
</p> <label>Payment_amount</label>
<p>
	{{ $order->payment_amount }}
</p> <label>Tax_deductible</label>
<p>
	{{ $order->tax_deductible }}
</p> <label>Arrears</label>
<p>
	{{ $order->arrears }}
</p> <label>Order_state</label>
<p>
	{{ $order->order_state }}
</p> <label>Order_detail_id</label>
<p>
	{{ $order->order_detail_id }}
</p> <label>Appendix</label>
<p>
	{{ $order->appendix }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
