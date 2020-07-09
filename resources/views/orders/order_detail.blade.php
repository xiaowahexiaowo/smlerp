@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-13 ">
    <div class="card ">
      <div class="card-header">
        <h1>
       <!-- 这里编写查询 -->
          <a class="btn btn-success float-xs-right" href="{{ route('orders.export') }}">导出Excel export Excel</a>
            </h1>
          <form action="{{ route('orders.order_detail') }}" method="GET" style="display: inline;">
                    {{csrf_field()}}
                  <label >订单类型order type</label>
                      <select class="" name="order_type">
                  <option value="" hidden disabled selected>请选择分类choose</option>

                      <option value="预订单" >
                        预订单 advance order
                      </option>
                       <option value="全款订单" >
                        全款订单Full payment
                      </option>
                       <option value="补发货" >
                        补发货reissue
                      </option>
                      <option value="赊销订单" >
                        赊销订单sales on account order
                      </option>

                </select>

                <label for="date_begin-field">起始日期begin date</label>
                    <input class="" type="text" name="date_begin" id="date_begin" value="" />
                     <label for="date_end-field">截止日期end date</label>
                    <input class="" type="text" name="date_end" id="date_end" value="" />

                    <button type="submit" class="btn btn-sm btn-danger">查询 query</button>
          </form>

      </div>

      <div class="card-body">
        @if($orders->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>日期</th> <th>订单编号</th> <th>客户名称</th><th>订单类型</th> <th>业务员</th><th>机组编号</th><th>产品类型</th><th>机组型号</th><th>功率</th><th>相数</th><th>单位</th> <th>出库数量</th><th>单价</th><th>金额</th>
              </tr>
                     <tr>

                <th>date</th> <th>order_id</th> <th>customer_name</th><th>order type</th> <th>saleman</th><th>generating_unit_no</th><th>product_type</th><th>generating_unit_type</th><th>power</th><th>phases_number</th><th>unit</th> <th>count</th><th>price</th><th>amount</th>
              </tr>
            </thead>

            <tbody>
              @foreach($orders as $order)
               @foreach($order->orderdetails as $detail)
                @if($loop->first)
              <tr>

                                    <td>{{$order->order_date->toDateString()}}</td><td>{{$order->order_no}}</td><td>{{$order->customer_name}}</td><td>{{$order->order_type}}</td><td>{{$order->user->name}}</td><td>{{$detail->generating_unit_no}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->amount}}</td>

              </tr>
                @else

                   <tr>

                                    <td></td><td></td><td></td><td></td><td></td><td>{{$detail->generating_unit_no}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->amount}}</td>

                    </tr>
                 @endif
                @endforeach
              @endforeach
            </tbody>
          </table>
          {!! $orders->render() !!}
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
