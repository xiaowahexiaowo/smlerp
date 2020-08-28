@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h1>入库单Instock /  #{{ $instock->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('instocks.index') }}"><- 返回back</a>
            </div>
            <div class="col-md-6">

            </div>
          </div>
        </div>
        <br>
 <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">入库单号</th>
                <th>入库类型</th> <th>批次</th> <th>日期</th> <th>供应商</th> <th>入库人</th> <th>收料仓库</th>

              </tr>

                <tr>
                <th class="text-xs-center">Instock id</th>
                <th>instock type</th> <th>batch</th> <th>date</th> <th>supplier</th> <th>stock man</th> <th>stack factory</th>

              </tr>
            </thead>

            <tbody>

              <tr>
                <td class="text-xs-center">{{$instock->id}}</td>

                <td>{{$instock->stock_type}}</td> <td>{{$instock->batch}}</td> <td>{{$instock->in_date}}</td> <td>{{$instock->supplier}}</td> <td>{{$instock->stock_man}}</td> <td>{{$instock->stock_factory}}</td>


              </tr>

            </tbody>
          </table>
 <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>日期</th> <th>入库编号</th><th>机组编号</th> <th>产品类型</th><th>机组型号</th><th>功率</th><th>相数</th><th>单位</th> <th>入库数量</th><th>库存单价</th><th>金额</th><th>入库人</th><th>备注</th><th>操作</th>
              </tr>

                 <tr>

              <th>date</th> <th>Instock id</th><th>unit_no</th><th>unit_type</th><th>unit_model</th><th>power</th><th>phase</th><th>unit</th> <th>warehousing_count</th><th>price</th><th>stock_amount</th><th>stock_man</th><th>remark</th><th>option</th>
              </tr>
            </thead>

            <tbody>

               @foreach($instock->instockdetails as $detail)

              <tr>

                                    <td>{{$detail->in_date}}</td><td>{{$detail->stock_id}}</td><td>{{$detail->generating_unit_no}}</td><td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->warehousing_count}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->stock_amount}}</td><td>{{$detail->stock_man}}</td><td>{{$detail->remark}}</td>
                                     <td  class="text-xs-right">
                   <form action="{{ route('instockdetails.destroy', $detail->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除 delete</button>
                  </form>
               </td>

              </tr>


                @endforeach

            </tbody>
          </table>


      </div>
    </div>
  </div>
</div>

@endsection
