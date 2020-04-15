@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Order /
          @if($order->id)
            Edit #{{ $order->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($order->id)
          <form action="{{ route('orders.update', $order->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('orders.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="order_no-field">Order_no</label>
                    <input class="form-control" type="text" name="order_no" id="order_no-field" value="{{ old('order_no', $order->order_no ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order_id-field">Order_id</label>
                    <input class="form-control" type="text" name="order_id" id="order_id-field" value="{{ old('order_id', $order->order_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="order_type-field">Order_type</label>
                	<input class="form-control" type="text" name="order_type" id="order_type-field" value="{{ old('order_type', $order->order_type ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order_date-field">Order_date</label>
                    <input class="form-control" type="text" name="order_date" id="order_date-field" value="{{ old('order_date', $order->order_date ) }}" />
                </div> 
                <div class="form-group">
                	<label for="order_ticket-field">Order_ticket</label>
                	<input class="form-control" type="text" name="order_ticket" id="order_ticket-field" value="{{ old('order_ticket', $order->order_ticket ) }}" />
                </div> 
                <div class="form-group">
                	<label for="customer_name-field">Customer_name</label>
                	<textarea name="customer_name" id="customer_name-field" class="form-control" rows="3">{{ old('customer_name', $order->customer_name ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $order->user_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="payment_type-field">Payment_type</label>
                	<input class="form-control" type="text" name="payment_type" id="payment_type-field" value="{{ old('payment_type', $order->payment_type ) }}" />
                </div> 
                <div class="form-group">
                    <label for="total_cost-field">Total_cost</label>
                    <input class="form-control" type="text" name="total_cost" id="total_cost-field" value="{{ old('total_cost', $order->total_cost ) }}" />
                </div> 
                <div class="form-group">
                	<label for="payment_method-field">Payment_method</label>
                	<input class="form-control" type="text" name="payment_method" id="payment_method-field" value="{{ old('payment_method', $order->payment_method ) }}" />
                </div> 
                <div class="form-group">
                	<label for="remark-field">Remark</label>
                	<input class="form-control" type="text" name="remark" id="remark-field" value="{{ old('remark', $order->remark ) }}" />
                </div> 
                <div class="form-group">
                    <label for="payment_amount-field">Payment_amount</label>
                    <input class="form-control" type="text" name="payment_amount" id="payment_amount-field" value="{{ old('payment_amount', $order->payment_amount ) }}" />
                </div> 
                <div class="form-group">
                    <label for="tax_deductible-field">Tax_deductible</label>
                    <input class="form-control" type="text" name="tax_deductible" id="tax_deductible-field" value="{{ old('tax_deductible', $order->tax_deductible ) }}" />
                </div> 
                <div class="form-group">
                    <label for="arrears-field">Arrears</label>
                    <input class="form-control" type="text" name="arrears" id="arrears-field" value="{{ old('arrears', $order->arrears ) }}" />
                </div> 
                <div class="form-group">
                	<label for="order_state-field">Order_state</label>
                	<input class="form-control" type="text" name="order_state" id="order_state-field" value="{{ old('order_state', $order->order_state ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order_detail_id-field">Order_detail_id</label>
                    <input class="form-control" type="text" name="order_detail_id" id="order_detail_id-field" value="{{ old('order_detail_id', $order->order_detail_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="appendix-field">Appendix</label>
                	<textarea name="appendix" id="appendix-field" class="form-control" rows="3">{{ old('appendix', $order->appendix ) }}</textarea>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('orders.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
