@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          收款明细 / collected detail
          @if($collected->id)
            编辑 edit #{{ $collected->id }}
          @else
            创建 create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($collected->id)
          <form action="{{ route('collecteds.update', $collected->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('collecteds.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<label for="order_id-field">订单编号 order id</label>
                	<input class="form-control" type="text" name="order_id" id="order_id-field" value="{{ old('order_id', $collected->order_id ) }}"  required />
                </div>
                <div class="form-group">
                    <label for="collection_date-field">收款日期collection_date</label>
                    <input class="form-control" type="text" name="collection_date" id="collection_date-field" value="{{ old('collection_date', $collected->collection_date ) }}"  required />
                </div>

                <div class="form-group">
                    <label for="collected_amount-field">金额collected_amount</label>
                    <input class="form-control" type="text" name="collected_amount" id="collected_amount-field" value="{{ old('collected_amount', $collected->collected_amount ) }}"  required />
                </div>
                <div class="form-group">
                	<label for="payment_method-field">付款方式payment_method</label>
                	<input class="form-control" type="text" name="payment_method" id="payment_method-field" value="{{ old('payment_method', $collected->payment_method ) }}"  required />
                </div>
                <div class="form-group">
                	<label for="payee-field">收款人payee</label>
                	<input class="form-control" type="text" name="payee" id="payee-field" value="{{ old('payee', $collected->payee ) }}"  required />
                </div>
                <div class="form-group">
                	<label for="check_man-field">核对人check_man</label>
                	<input class="form-control" type="text" name="check_man" id="check_man-field" value="{{ old('check_man', $collected->check_man ) }}"  required />
                </div>
                <div class="form-group">
                	<label for="remark-field">备注remark</label>
                	<input class="form-control" type="text" name="remark" id="remark-field" value="{{ old('remark', $collected->remark ) }}"  required />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('collecteds.index') }}"> <- 返回back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">

@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.zh-CN.min.js') }}"></script>
  <script>
   $('#collection_date-field').datepicker({
    language:"zh-CN"
   });
  </script>
@stop
