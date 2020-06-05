@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Collected / Show #{{ $collected->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('collecteds.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('collecteds.edit', $collected->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Order_id</label>
<p>
	{{ $collected->order_id }}
</p> <label>Collection_date</label>
<p>
	{{ $collected->collection_date }}
</p> <label>Customer_name</label>
<p>
	{{ $collected->customer_name }}
</p> <label>Collected_amount</label>
<p>
	{{ $collected->collected_amount }}
</p> <label>Payment_method</label>
<p>
	{{ $collected->payment_method }}
</p> <label>Payee</label>
<p>
	{{ $collected->payee }}
</p> <label>Check_man</label>
<p>
	{{ $collected->check_man }}
</p> <label>Remark</label>
<p>
	{{ $collected->remark }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
