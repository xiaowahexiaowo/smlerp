@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Outstock / Show #{{ $outstock->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('outstocks.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('outstocks.edit', $outstock->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Out_stock_type</label>
<p>
	{{ $outstock->out_stock_type }}
</p> <label>Out_date</label>
<p>
	{{ $outstock->out_date }}
</p> <label>Order_id</label>
<p>
	{{ $outstock->order_id }}
</p> <label>Customer_name</label>
<p>
	{{ $outstock->customer_name }}
</p> <label>User_name</label>
<p>
	{{ $outstock->user_name }}
</p> <label>Out_stock_factory</label>
<p>
	{{ $outstock->out_stock_factory }}
</p> <label>Remark</label>
<p>
	{{ $outstock->remark }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
