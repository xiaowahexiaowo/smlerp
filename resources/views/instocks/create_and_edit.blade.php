@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          入库单 /
          @if($instock->id)
            编辑 #{{ $instock->id }}
          @else
            创建
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($instock->id)
          <form action="{{ route('instocks.update', $instock->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('instocks.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<label for="stock_type-field">入库类型</label>

                        <select class="form-control" name="stock_type" required>
                  <option value="" hidden disabled {{ $instock->id ? '' : 'selected' }}>请选择分类</option>

                      <option value="采购入库" {{ $instock->stock_type == '采购入库' ? 'selected' : '' }}>
                        采购入库
                      </option>
                      <option value="盘点入库" {{ $instock->stock_type == '盘点入库' ? 'selected' : '' }}>
                        盘点入库
                      </option>
                      <option value="其他入库" {{ $instock->stock_type == '其他入库' ? 'selected' : '' }}>
                        其他入库
                      </option>
                      <option value="退货入库" {{ $instock->stock_type == '退货入库' ? 'selected' : '' }}>
                        退货入库
                      </option>
                      <option value="错漏发" {{ $instock->stock_type == '错漏发' ? 'selected' : '' }}>
                        错漏发
                      </option>


                </select>
                </div>
                <div class="form-group">
                	<label for="batch-field">批次</label>
                	<input class="form-control" type="text" name="batch" id="batch-field" value="{{ old('batch', $instock->batch ) }}" />
                </div>
                <div class="form-group">
                    <label for="in_date-field">日期</label>
                    <input class="form-control" type="text" name="in_date" id="in_date-field" value="{{ old('in_date', $instock->in_date ) }}" />
                </div>
                <div class="form-group">
                	<label for="supplier-field">供应商</label>
  <select class="form-control" name="supplier" required>
                   <option value="" hidden disabled {{ $instock->id ? '' : 'selected' }}>请选择分类</option>
                   <option value="发电设备" {{ $instock->supplier == '发电设备' ? 'selected' : '' }}>
                        发电设备
                      </option>
                      <option value="动力科技" {{ $instock->supplier == '动力科技' ? 'selected' : '' }}>
                        动力科技
                      </option>
                    </select>
                </div>
                <div class="form-group">
                	<label for="stock_man-field">入库人</label>
                	<input class="form-control" type="text" name="stock_man" id="stock_man-field" value="{{ old('stock_man', $instock->stock_man ) }}" />
                </div>
                <div class="form-group">
                	<label for="stock_factory-field">收料仓库</label>
                	<input class="form-control" type="text" name="stock_factory" id="stock_factory-field" value="{{ old('stock_factory', $instock->stock_factory ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
            <a class="btn btn-link float-xs-right" href="{{ route('instocks.index') }}"> <- 返回</a>
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
   $('#in_date-field').datepicker({
    language:"zh-CN"
   });
  </script>
@stop
