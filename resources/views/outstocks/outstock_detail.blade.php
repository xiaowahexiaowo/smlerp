@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-13 ">
    <div class="card ">
      <div class="card-header">
        <h1>
       <!-- 这里编写查询 -->
          <a class="btn btn-success float-xs-right" href="{{ route('exports.outstockdetails') }}">导出Excel</a>
            </h1>
          <form action="{{ route('outstocks.outstock_detail') }}" method="GET" style="display: inline;">
                    {{csrf_field()}}


                <label for="date_begin-field">起始日期 begin date</label>
                    <input class="" type="text" name="date_begin" id="date_begin" value="" />
                     <label for="date_end-field">截止日期 end date</label>
                    <input class="" type="text" name="date_end" id="date_end" value="" />

                    <button type="submit" class="btn btn-sm btn-danger">查询 query </button>
          </form>

      </div>

      <div class="card-body">
        @if($outstocks->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>日期</th> <th>订单编号</th><th>客户名称</th><th>业务员</th> <th>产品类型</th><th>机组型号</th><th>功率</th><th>相数</th><th>单位</th> <th>出库数量</th><th>库存单价</th><th>金额</th><th>备注</th>
              </tr>

                   <tr>

                <th>date</th> <th>order_id</th><th>client_name</th><th>sales</th> <th>unit_type</th><th>unit_model</th><th>power</th><th>phase</th><th>unit</th> <th>out_count</th><th>warehousing_price</th><th>amount</th><th>remark</th>
              </tr>
            </thead>

            <tbody>
              @foreach($outstocks as $outstock)
               @foreach($outstock->outstockdetails as $detail)
                @if($loop->first)
              <tr>

                                    <td>{{$outstock->out_date}}</td><td>{{$outstock->order_id}}</td><td>{{$outstock->customer_name}}</td><td>{{$outstock->user_name}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->out_count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->amount}}</td><td>{{$detail->remark}}</td>

              </tr>
                @else

                   <tr>
         <td></td><td></td><td></td><td></td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->out_count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->amount}}</td><td>{{$detail->remark}}</td>


                    </tr>
                 @endif
                @endforeach
              @endforeach
            </tbody>
          </table>
          {!! $outstocks->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">空的!empty!</h3>
        @endif
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
   $('#date_begin,#date_end').datepicker({
    language:"zh-CN"
   });

  </script>
  @stop
