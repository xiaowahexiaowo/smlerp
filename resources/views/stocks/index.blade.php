@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-12 ">
    <div class="card ">
      <div class="card-header">
        <h1>
          物品库存统计 goods stock count
          <a class="btn btn-success float-xs-right" href="{{ route('stocks.create') }}">创建create</a>
        </h1>
           <h1>
       <!-- 这里编写查询 -->
          <a class="btn btn-success float-xs-right" href="{{ route('stock
          s.export') }}">导出Excel export Excel</a>
            </h1>
          <form action="{{ route('stocks.index') }}" method="GET" style="display: inline;">
                    {{csrf_field()}}



                <label for="date_begin-field">起始日期begin date</label>
                    <input class="" type="text" name="date_begin" id="date_begin" value="" />
                     <label for="date_end-field">截止日期end date</label>
                    <input class="" type="text" name="date_end" id="date_end" value="" />

                    <button type="submit" class="btn btn-sm btn-danger">查询 query</button>
          </form>
      </div>

      <div class="card-body">
        @if($stocks->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>

                 <th>机组编号</th> <th>产品类型</th> <th>机组类型</th> <th>功率</th> <th>相数</th> <th>单位</th> <th>初期库存</th> <th>入库数量</th> <th>出库数量</th> <th>库存数量</th> <th>库存单价</th> <th>库存金额</th> <th>备注说明</th>
                <th class="text-xs-right">操作</th>
              </tr>
                   <tr>

              <th>unit_no</th> <th>unit_type</th> <th>unit_model</th> <th>power</th> <th>phase</th> <th>unit</th> <th>init_stock</th> <th>warehousing_count</th> <th>out_count</th> <th>inventory_quantity</th> <th>unit_price</th> <th>total_price</th> <th>remark</th>
                <th class="text-xs-right">option</th>
              </tr>
            </thead>

            <tbody>
              @foreach($stocks as $stock)
              <tr>


               <td>{{$stock->generating_unit_no}}</td><td>{{$stock->product_type}}</td> <td>{{$stock->generating_unit_type}}</td> <td>{{$stock->power}}</td> <td>{{$stock->phases_number}}</td> <td>{{$stock->unit}}</td> <td>{{$stock->init_stock}}</td> <td>{{$stock->warehousing_count}}</td> <td>{{$stock->out_count}}</td> <td>{{$stock->inventory_quantity}}</td> <td>{{$stock->warehousing_price}}</td> <td>{{$stock->stock_amount}}</td> <td>{{$stock->remark}}</td>

                <td class="text-xs-right">




                  <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除 delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $stocks->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">空的!empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
