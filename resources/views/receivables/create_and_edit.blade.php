@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Receivable /
          @if($receivable->id)
            Edit #{{ $receivable->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($receivable->id)
          <form action="{{ route('receivables.update', $receivable->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('receivables.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="order_id-field">Order_id</label>
                	<input class="form-control" type="text" name="order_id" id="order_id-field" value="{{ old('order_id', $receivable->order_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="customer_name-field">Customer_name</label>
                	<input class="form-control" type="text" name="customer_name" id="customer_name-field" value="{{ old('customer_name', $receivable->customer_name ) }}" />
                </div> 
                <div class="form-group">
                    <label for="receivable_amount-field">Receivable_amount</label>
                    <input class="form-control" type="text" name="receivable_amount" id="receivable_amount-field" value="{{ old('receivable_amount', $receivable->receivable_amount ) }}" />
                </div> 
                <div class="form-group">
                    <label for="received-field">Received</label>
                    <input class="form-control" type="text" name="received" id="received-field" value="{{ old('received', $receivable->received ) }}" />
                </div> 
                <div class="form-group">
                    <label for="remaining_receivables-field">Remaining_receivables</label>
                    <input class="form-control" type="text" name="remaining_receivables" id="remaining_receivables-field" value="{{ old('remaining_receivables', $receivable->remaining_receivables ) }}" />
                </div> 
                <div class="form-group">
                	<label for="user_name-field">User_name</label>
                	<input class="form-control" type="text" name="user_name" id="user_name-field" value="{{ old('user_name', $receivable->user_name ) }}" />
                </div> 
                <div class="form-group">
                	<label for="accountant-field">Accountant</label>
                	<input class="form-control" type="text" name="accountant" id="accountant-field" value="{{ old('accountant', $receivable->accountant ) }}" />
                </div> 
                <div class="form-group">
                	<label for="check_man-field">Check_man</label>
                	<input class="form-control" type="text" name="check_man" id="check_man-field" value="{{ old('check_man', $receivable->check_man ) }}" />
                </div> 
                <div class="form-group">
                	<label for="remark-field">Remark</label>
                	<input class="form-control" type="text" name="remark" id="remark-field" value="{{ old('remark', $receivable->remark ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('receivables.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
