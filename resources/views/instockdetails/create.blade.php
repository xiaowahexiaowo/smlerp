@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          入库明细/

         创建

        </h1>
      </div>

      <div class="card-body">

          <form action="{{ route('instockdetails.store') }}" method="POST" accept-charset="UTF-8">


          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <input type="hidden" name="stock_id" value="{{ $instocks->id}}">
            <input type="hidden" name="in_date" value="{{ $instocks->in_date}}">



                <div class="form-group">
                	<label for="generating_unit_no-field">机组编号</label>
                	<input class="form-control" type="text" name="generating_unit_no" id="generating_unit_no-field" value="" />
                </div>

                <div class="form-group">
                    <label for="warehousing_count-field">入库数量</label>
                    <input class="form-control" type="text" name="warehousing_count" id="warehousing_count-field" value="" />
                </div>


                <div class="form-group">
                	<label for="stock_man-field">入库人</label>
                	<input class="form-control" type="text" name="stock_man" id="stock_man-field" value="" />
                </div>
                <div class="form-group">
                	<label for="remark-field">备注</label>
                	<input class="form-control" type="text" name="remark" id="remark-field" value="" />
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
