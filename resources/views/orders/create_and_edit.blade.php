@extends('layouts.app')


@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          销售单 order/
          @if($order->id)
            编辑 edit#{{ $order->id }}
          @else
            创建 create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($order->id)
          <form action="{{ route('orders.update', $order->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('orders.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">



                <div class="form-group">
                    <label for="order_id-field">订单编号P.O no</label>
                    <input class="form-control" type="text" name="order_id" id="order_id-field" value="{{ old('order_id', $order->order_id ) }}"  required />
                </div>
                <div class="form-group">
                	<label for="order_type-field">订单类型 P.O_type</label>
                	    <select class="form-control" name="order_type" required>
                  <option value="" hidden disabled {{ $order->id ? '' : 'selected' }}>请选择分类</option>

                      <option value="预订单" {{ $order->order_type == '预订单' ? 'selected' : '' }}>
                        预订单Advance order
                      </option>
                       <option value="全款订单" {{ $order->order_type == '全款订单' ? 'selected' : '' }}>
                        全款订单full order
                      </option>
                       <option value="补发货" {{ $order->order_type == '补发货' ? 'selected' : '' }}>
                        补发货reissue
                      </option>
                      <option value="赊销订单" {{ $order->order_type == '赊销订单' ? 'selected' : '' }}>
                        赊销订单sales on account order
                      </option>

                </select>
                </div>
                <div class="form-group">
                    <label for="order_date-field">订单日期P.O_date</label>
                    <input class="form-control" type="text" name="order_date" id="order_date-field" value="{{ old('order_date', $order->order_date ) }}"  required />
                </div>
                <div class="form-group">
                	<label for="order_ticket-field">订单摘要P.O_detail</label>
                	          <select class="form-control" name="order_ticket" required>
                  <option value="" hidden disabled {{ $order->id ? '' : 'selected' }}>请选择分类</option>

                      <option value="开票" {{ $order->order_ticket == '开票' ? 'selected' : '' }}>
                        开票draw a bill
                      </option>
                       <option value="不开票" {{ $order->order_ticket == '不开票' ? 'selected' : '' }}>
                        不开票not draw a bill
                      </option>
                </select>
                </div>
                <div class="form-group">
                	<label for="customer_name-field">客户名称client_name</label>
                <input class="form-control" type="text" name="customer_name" id="customer_name-field" value="{{ old('customer_name', $order->customer_name) }}"  required />
                </div>

                  <div class="form-group">
                  <label for="address-field">客户地址client_address</label>
                <input class="form-control" type="text" name="address" id="address-field" value="{{ old('address', $order->address) }}"  required />
                </div>

                  <div class="form-group">
                  <label for="email-field">客户邮箱client_mail</label>
                <input class="form-control" type="text" name="email" id="email-field" value="{{ old('email', $order->email) }}"  required />
                </div>

                        <div class="form-group">
                  <label for="phone-field">客户电话client_tel</label>
                <input class="form-control" type="text" name="phone" id="phone-field" value="{{ old('phone', $order->phone) }}"  required />
                </div>

                <div class="form-group">
                	<label for="payment_type-field">支付类别payment_type</label>
                	         <select class="form-control" name="payment_type" required>
                  <option value="" hidden disabled {{ $order->id ? '' : 'selected' }}>请选择分类</option>

                      <option value="全款" {{ $order->payment_type == '全款' ? 'selected' : '' }}>
                        全款Full payment
                      </option>
                       <option value="定金" {{ $order->payment_type == '定金' ? 'selected' : '' }}>
                        定金Deposit
                      </option>
                </select>
                </div>

                <div class="form-group">
                	<label for="payment_method-field">支付方式payment_terms</label>
                 <select class="form-control" name="payment_method" required>
                  <option value="" hidden disabled {{ $order->id ? '' : 'selected' }}>请选择分类</option>

                      <option value="现金" {{ $order->payment_method == '现金' ? 'selected' : '' }}>
                        现金cash
                      </option>
                       <option value="支票" {{ $order->payment_method == '支票' ? 'selected' : '' }}>
                        支票cheque
                      </option>
                       <option value="其他" {{ $order->payment_method == '其他' ? 'selected' : '' }}>
                        其他other
                      </option>
                </select>
                </div>

                <div class="form-group">
                    <label for="payment_amount-field">支付金额payment_amount</label>
                    <input class="form-control" type="text" name="payment_amount" id="payment_amount-field" value="{{ old('payment_amount', $order->payment_amount ) }}"  required />
                </div>
                <div class="form-group">
                    <label for="tax_deductible-field">可抵免税款2307</label>
                    <input class="form-control" type="text" name="tax_deductible" id="tax_deductible-field" value="{{ old('tax_deductible', $order->tax_deductible ) }}"  required />
                </div>



                <div class="form-group orders-body">
                	<label for="appendix-field">附件appendix</label>
                	<textarea name="appendix" id="appendix-field" class="form-control" rows="3"  required >{{ old('appendix', $order->appendix ) }}</textarea>
                </div>

                <div class="form-group mb-4">
                  <label for="" class="avatar-label">文件上传</label>
                  <input type="file" name="avatar" class="form-control-file" >


          </div>


                    <div class="form-group">
                  <label for="remark-field">备注remark</label>
                  <input class="form-control" type="text" name="remark" id="remark-field" value="{{ old('remark', $order->remark ) }}"  required />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('orders.index') }}"> <- 返回back</a>
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
