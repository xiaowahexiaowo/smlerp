@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>出库单 outstock / 信息 information </h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('outstocks.index') }}"><- 返回back</a>
            </div>

          </div>
        </div>
        <br>
  <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>出库类型</th> <th>日期</th> <th>订单编号</th> <th>客户名称</th> <th>业务员</th> <th>出料仓库</th> <th>备注</th>

              </tr>
                <tr>

                <th>out stock type</th> <th>out_date</th> <th>order_id</th> <th>customer_name</th> <th>saleman</th> <th>out_stock_factory</th> <th>remark</th>

              </tr>
            </thead>

            <tbody>

              <tr>


                <td>{{$outstock->out_stock_type}}</td> <td>{{$outstock->out_date}}</td> <td>{{$outstock->order_id}}</td> <td>{{$outstock->customer_name}}</td> <td>{{$outstock->user_name}}</td> <td>{{$outstock->out_stock_factory}}</td> <td>{{$outstock->remark}}</td>


              </tr>

            </tbody>
          </table>



   <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>日期</th> <th>订单编号</th><th>客户名称</th><th>业务员</th> <th>机组编号</th><th>产品类型</th><th>机组型号</th><th>功率</th><th>相数</th><th>单位</th> <th>出库数量</th><th>库存单价</th><th>金额</th><th>备注</th><th>操作</th>
              </tr>

                 <tr>

                <th>date</th> <th>order_id</th><th>customer_name</th><th>saleman</th> <th>generating_unit_no</th><th>product_type</th><th>generating_unit_type</th><th>power</th><th>phases_number</th><th>unit</th> <th>out_count</th><th>warehousing_price</th><th>amount</th><th>remark</th><th>option</th>
              </tr>
            </thead>

            <tbody>

               @foreach($outstock->outstockdetails as $detail)
                @if($loop->first)
              <tr>

                                    <td>{{$outstock->out_date}}</td><td>{{$outstock->order_id}}</td><td>{{$outstock->customer_name}}</td><td>{{$outstock->user_name}}</td><td>{{$detail->generating_unit_no}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->out_count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->amount}}</td><td>{{$detail->remark}}</td> <td  class="text-xs-right">
                   <form action="{{ route('outstockdetails.destroy', $detail->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除delete </button>
                  </form>
               </td>

              </tr>
                @else

                   <tr>
         <td></td><td></td><td></td><td></td><td>{{$detail->generating_unit_no}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->out_count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->amount}}</td><td>{{$detail->remark}}</td>
  <td  class="text-xs-right">
                   <form action="{{ route('outstockdetails.destroy', $detail->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除 delete</button>
                  </form>
               </td>

                    </tr>
                 @endif
                @endforeach

            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

@endsection
