@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-13 ">
    <div class="card ">
      <div class="card-header">
        <h1>
       <!-- 这里编写查询 -->
          <a class="btn btn-success float-xs-right" href="{{ route('exports.instockdetails') }}">导出Excel export Excel</a>
            </h1>
          <form action="{{ route('instocks.instock_detail') }}" method="GET" style="display: inline;">
                    {{csrf_field()}}


                <label for="date_begin-field">起始日期begin date</label>
                    <input class="" type="text" name="date_begin" id="date_begin" value="" />
                     <label for="date_end-field">截止日期end date</label>
                    <input class="" type="text" name="date_end" id="date_end" value="" />

                    <button type="submit" class="btn btn-sm btn-danger">查询 query </button>
          </form>

      </div>

      <div class="card-body">
        @if($instocks->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>日期</th> <th>入库编号</th> <th>产品类型</th><th>机组型号</th><th>功率</th><th>相数</th><th>单位</th> <th>入库数量</th><th>库存单价</th><th>金额</th><th>入库人</th><th>备注</th>
              </tr>

                      <tr>

                <th>date</th> <th>Instock id</th><th>unit_type</th><th>unit_model</th><th>power</th><th>phase</th><th>unit</th> <th>warehousing_count</th><th>price</th><th>stock_amount</th><th>stock_man</th><th>remark</th>
              </tr>
            </thead>

            <tbody>
              @foreach($instocks as $instock)
               @foreach($instock->instockdetails as $detail)
                @if($loop->first)
              <tr>

                                    <td>{{$instock->in_date}}</td><td>{{$instock->id}}</td><td>{{$detail->generating_unit_no}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->warehousing_count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->stock_amount}}</td><td>{{$detail->stock_man}}</td><td>{{$detail->remark}}</td>

              </tr>
                @else

                   <tr>
    <td></td><td></td><td>{{$detail->generating_unit_no}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->warehousing_count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->stock_amount}}</td><td></td><td>{{$detail->remark}}</td>


                    </tr>
                 @endif
                @endforeach
              @endforeach
            </tbody>
          </table>
          {!! $instocks->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">空的!empty！</h3>
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
