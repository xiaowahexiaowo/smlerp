@extends('layouts.app')


@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          销售单详情order-detail /

            创建create

        </h1>
      </div>

      <div class="card-body">

          <form action="{{ route('orderdetails.store') }}" method="POST" accept-charset="UTF-8">


          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="order_id" value="{{ $orders->order_id}}">

                <div class="form-group">
                    <label for="generating_unit_type-field">机组型号 或者配件编号generating_unit_type  or Part number</label>
                    <input class="form-control" type="text" name="generating_unit_type" id="generating_unit_type-field" value=""  required />
                </div>
                <div class="form-group">
                    <label for="count-field">数量count</label>
                    <input class="form-control" type="text" name="count" id="count-field" value=""  required />
                </div>
                <div class="form-group">
                    <label for="warehousing_price-field">单价Unit Price</label>
                    <input class="form-control" type="text" name="warehousing_price" id="warehousing_price-field" value=""  required />
                </div>

                <div class="form-group">
                	<label for="remarks-field">备注remark</label>
                	<input class="form-control" type="text" name="remarks" id="remarks-field" value=""  required />
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
