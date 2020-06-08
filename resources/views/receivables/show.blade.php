@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Receivable / Show #{{ $receivable->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('receivables.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('receivables.edit', $receivable->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Order_id</label>
<p>
	{{ $receivable->order_id }}
</p> <label>Customer_name</label>
<p>
	{{ $receivable->customer_name }}
</p> <label>Receivable_amount</label>
<p>
	{{ $receivable->receivable_amount }}
</p> <label>Received</label>
<p>
	{{ $receivable->received }}
</p> <label>Remaining_receivables</label>
<p>
	{{ $receivable->remaining_receivables }}
</p> <label>User_name</label>
<p>
	{{ $receivable->user_name }}
</p> <label>Accountant</label>
<p>
	{{ $receivable->accountant }}
</p> <label>Check_man</label>
<p>
	{{ $receivable->check_man }}
</p> <label>Remark</label>
<p>
	{{ $receivable->remark }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
