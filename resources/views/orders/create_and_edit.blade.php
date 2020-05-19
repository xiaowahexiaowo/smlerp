@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          销售单 /
          @if($order->id)
            编辑 #{{ $order->id }}
          @else
            创建
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
                    <label for="order_no-field">No 号</label>
                    <input class="form-control" type="text" name="order_no" id="order_no-field" value="{{ old('order_no', $order->order_no ) }}" />
                </div>
                <div class="form-group">
                    <label for="order_id-field">订单编号</label>
                    <input class="form-control" type="text" name="order_id" id="order_id-field" value="{{ old('order_id', $order->order_id ) }}" />
                </div>
                <div class="form-group">
                	<label for="order_type-field">订单类型</label>
                	    <select class="form-control" name="order_type" required>
                  <option value="" hidden disabled {{ $order->id ? '' : 'selected' }}>请选择分类</option>

                      <option value="预订单" {{ $order->order_type == '预订单' ? 'selected' : '' }}>
                        预订单
                      </option>
                       <option value="全款订单" {{ $order->order_type == '全款订单' ? 'selected' : '' }}>
                        全款订单
                      </option>
                       <option value="补发货" {{ $order->order_type == '补发货' ? 'selected' : '' }}>
                        补发货
                      </option>
                      <option value="赊销订单" {{ $order->order_type == '赊销订单' ? 'selected' : '' }}>
                        赊销订单
                      </option>

                </select>
                </div>
                <div class="form-group">
                    <label for="order_date-field">订单日期</label>
                    <input class="form-control" type="text" name="order_date" id="order_date-field" value="{{ old('order_date', $order->order_date ) }}" />
                </div>
                <div class="form-group">
                	<label for="order_ticket-field">订单摘要</label>
                	          <select class="form-control" name="order_ticket" required>
                  <option value="" hidden disabled {{ $order->id ? '' : 'selected' }}>请选择分类</option>

                      <option value="开票" {{ $order->order_ticket == '开票' ? 'selected' : '' }}>
                        开票
                      </option>
                       <option value="不开票" {{ $order->order_ticket == '不开票' ? 'selected' : '' }}>
                        不开票
                      </option>
                </select>
                </div>
                <div class="form-group">
                	<label for="customer_name-field">客户名称</label>
                <input class="form-control" type="text" name="customer_name" id="customer_name-field" value="{{ old('customer_name', $order->customer_name) }}" />
                </div>

                <div class="form-group">
                	<label for="payment_type-field">支付类别</label>
                	         <select class="form-control" name="payment_type" required>
                  <option value="" hidden disabled {{ $order->id ? '' : 'selected' }}>请选择分类</option>

                      <option value="全款" {{ $order->payment_type == '全款' ? 'selected' : '' }}>
                        全款
                      </option>
                       <option value="定金" {{ $order->payment_type == '定金' ? 'selected' : '' }}>
                        定金
                      </option>
                </select>
                </div>

                <div class="form-group">
                	<label for="payment_method-field">支付方式</label>
                 <select class="form-control" name="payment_method" required>
                  <option value="" hidden disabled {{ $order->id ? '' : 'selected' }}>请选择分类</option>

                      <option value="现金" {{ $order->payment_method == '现金' ? 'selected' : '' }}>
                        现金
                      </option>
                       <option value="支票" {{ $order->payment_method == '支票' ? 'selected' : '' }}>
                        支票
                      </option>
                       <option value="其他" {{ $order->payment_method == '其他' ? 'selected' : '' }}>
                        其他
                      </option>
                </select>
                </div>
                <div class="form-group">
                	<label for="remark-field">备注</label>
                	<input class="form-control" type="text" name="remark" id="remark-field" value="{{ old('remark', $order->remark ) }}" />
                </div>
                <div class="form-group">
                    <label for="payment_amount-field">支付金额</label>
                    <input class="form-control" type="text" name="payment_amount" id="payment_amount-field" value="{{ old('payment_amount', $order->payment_amount ) }}" />
                </div>
                <div class="form-group">
                    <label for="tax_deductible-field">可抵免税款</label>
                    <input class="form-control" type="text" name="tax_deductible" id="tax_deductible-field" value="{{ old('tax_deductible', $order->tax_deductible ) }}" />
                </div>



                <div class="form-group orders-body">
                	<label for="appendix-field">附件</label>
                	<textarea name="appendix" id="appendix-field" class="form-control" rows="3">{{ old('appendix', $order->appendix ) }}</textarea>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
            <a class="btn btn-link float-xs-right" href="{{ route('orders.index') }}"> <- 返回</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.zh-CN.min.js') }}"></script>
  <script>
   $('#order_date-field').datepicker({
    language:"zh-CN"
   });
  </script>
   <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

  <script>
    $(document).ready(function() {
      var editor = new Simditor({
        textarea: $('#appendix-field'),
           upload: {
          url: '{{ route('orders.upload_image') }}',
          params: {
            _token: '{{ csrf_token() }}'
          },
          fileKey: 'upload_file',
          connectionCount: 4,
          leaveConfirm: '文件上传中，关闭此页面将取消上传。'
        },
        pasteImage: true,
      });
    });
  </script>
@stop
