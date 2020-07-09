@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          物品统计 goods count /
          @if($stock->id)
            编辑 edit#{{ $stock->id }}
          @else
            创建 create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($stock->id)
          <form action="{{ route('stocks.update', $stock->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('stocks.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<label for="generating_unit_no-field">机组编号generating_unit_no</label>
                	<input class="form-control" type="text" name="generating_unit_no" id="generating_unit_no-field" value="{{ old('generating_unit_no', $stock->generating_unit_no ) }}" required />
                </div>

                <div class="form-group">
                    <label for="init_ stock-field">初期库存init_ stock</label>
                    <input class="form-control" type="text" name="init_stock" id="init_ stock-field" value="{{ old('init_stock', $stock->init_stock ) }}" required/>
                </div>

                <div class="form-group">
                	<label for="remark-field">备注说明reamrk</label>
                	<input class="form-control" type="text" name="remark" id="remark-field" value="{{ old('remark', $stock->remark ) }}" required/>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('stocks.index') }}"> <- 返回back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
