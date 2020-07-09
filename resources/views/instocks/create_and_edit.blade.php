@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          入库单 Instock /
          @if($instock->id)
            编辑edit #{{ $instock->id }}
          @else
            创建create
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
                	<label for="stock_type-field">入库类型instock_type</label>

                        <select class="form-control" name="stock_type" required>
                  <option value="" hidden disabled {{ $instock->id ? '' : 'selected' }}>请选择分类choose</option>

                      <option value="采购入库" {{ $instock->stock_type == '采购入库' ? 'selected' : '' }}>
                        采购入库Purchase warehousing
                      </option>
                      <option value="盘点入库" {{ $instock->stock_type == '盘点入库' ? 'selected' : '' }}>
                        盘点入库make an inventory
                      </option>
                      <option value="其他入库" {{ $instock->stock_type == '其他入库' ? 'selected' : '' }}>
                        其他入库other warehousing
                      </option>
                      <option value="退货入库" {{ $instock->stock_type == '退货入库' ? 'selected' : '' }}>
                        退货入库 return goods
                      </option>
                      <option value="错漏发" {{ $instock->stock_type == '错漏发' ? 'selected' : '' }}>
                        错漏发Mistakes and omissions
                      </option>


                </select>
                </div>
                <div class="form-group">
                	<label for="batch-field">批次batch</label>
                	<input class="form-control" type="text" name="batch" id="batch-field" value="{{ old('batch', $instock->batch ) }}" />
                </div>
                <div class="form-group">
                    <label for="in_date-field">日期date</label>
                    <input class="form-control" type="text" name="in_date" id="in_date-field" value="{{ old('in_date', $instock->in_date ) }}" />
                </div>
                <div class="form-group">
                	<label for="supplier-field">供应商supplier</label>
  <select class="form-control" name="supplier" required>
                   <option value="" hidden disabled {{ $instock->id ? '' : 'selected' }}>请选择分类</option>
                   <option value="发电设备" {{ $instock->supplier == '发电设备' ? 'selected' : '' }}>
                        发电设备Power generation equipment
                      </option>
                      <option value="动力科技" {{ $instock->supplier == '动力科技' ? 'selected' : '' }}>
                        动力科技Power technology
                      </option>
                    </select>
                </div>
                <div class="form-group">
                	<label for="stock_man-field">入库人stock_man</label>
                	<input class="form-control" type="text" name="stock_man" id="stock_man-field" value="{{ old('stock_man', $instock->stock_man ) }}" />
                </div>
                <div class="form-group">
                	<label for="stock_factory-field">收料仓库stock_factory</label>
                	<input class="form-control" type="text" name="stock_factory" id="stock_factory-field" value="{{ old('stock_factory', $instock->stock_factory ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('instocks.index') }}"> <- 返回back</a>
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
