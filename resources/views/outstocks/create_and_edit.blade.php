@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          出库单 /
          @if($outstock->id)
            编辑 #{{ $outstock->id }}
          @else
            创建
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($outstock->id)
          <form action="{{ route('outstocks.update', $outstock->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('outstocks.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<label for="out_stock_type-field">出库类型</label>
                	 <select class="form-control" name="out_stock_type" required>
                  <option value="" hidden disabled {{ $outstock->id ? '' : 'selected' }}>请选择分类</option>

                      <option value="销售出库" {{ $outstock->out_stock_type == '销售出库' ? 'selected' : '' }}>
                        销售出库
                      </option>

   <option value="采购退货" {{ $outstock->out_stock_type == '采购退货' ? 'selected' : '' }}>
                        采购退货
                      </option>   <option value="错漏发" {{ $outstock->out_stock_type == '错漏发' ? 'selected' : '' }}>
                        错漏发
                      </option>   <option value="其它出库" {{ $outstock->out_stock_type == '其它出库' ? 'selected' : '' }}>
                        其它出库
                      </option>

                </select>
                </div>
                <div class="form-group">
                    <label for="out_date-field">出库日期</label>
                    <input class="form-control" type="text" name="out_date" id="out_date-field" value="{{ old('out_date', $outstock->out_date ) }}" required/>
                </div>
                <div class="form-group">
                	<label for="order_id-field">订单编号</label>
                	<input class="form-control" type="text" name="order_id" id="order_id-field" value="{{ old('order_id', $outstock->order_id ) }}" required/>
                </div>

                <div class="form-group">
                	<label for="out_stock_factory-field">出料仓库</label>
                	<input class="form-control" type="text" name="out_stock_factory" id="out_stock_factory-field" value="{{ old('out_stock_factory', $outstock->out_stock_factory ) }}" required/>
                </div>
                <div class="form-group">
                	<label for="remark-field">备注</label>
                	<input class="form-control" type="text" name="remark" id="remark-field" value="{{ old('remark', $outstock->remark ) }}" required/>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
            <a class="btn btn-link float-xs-right" href="{{ route('outstocks.index') }}"> <- 返回</a>
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
   $('#out_date-field').datepicker({
    language:"zh-CN"
   });
  </script>
@stop
