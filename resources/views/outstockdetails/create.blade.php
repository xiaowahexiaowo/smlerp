@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          出库明细/out stock detail

         创建 create

        </h1>
      </div>

      <div class="card-body">

          <form action="{{ route('outstockdetails.store') }}" method="POST" accept-charset="UTF-8">


          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

         <input type="hidden" name="stock_id" value="{{$outstocks->id}}">
            <input type="hidden" name="out_date" value="{{ $outstocks->out_date}}">



                <div class="form-group">
                	<label for="generating_unit_no-field">机组编号generating_unit_no</label>
                	<input class="form-control" type="text" name="generating_unit_no" id="generating_unit_no-field" value="" />
                </div>

                <div class="form-group">
                    <label for="out_count-field">出库数量out_count</label>
                    <input class="form-control" type="text" name="out_count" id="out_count-field" value="" />
                </div>


                <div class="form-group">
                	<label for="remark-field">备注remark</label>
                	<input class="form-control" type="text" name="remark" id="remark-field" value="" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('outstocks.index') }}"> <- 返回back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
