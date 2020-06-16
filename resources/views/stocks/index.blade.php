@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          物品库存统计
          <a class="btn btn-success float-xs-right" href="{{ route('stocks.create') }}">创建</a>
        </h1>
      </div>

      <div class="card-body">
        @if($stocks->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>机组编号</th> <th>产品类型</th> <th>机组类型</th> <th>功率</th> <th>相数</th> <th>单位</th> <th>初期库存</th> <th>入库数量</th> <th>出库数量</th> <th>库存数量</th> <th>库存单价</th> <th>库存金额</th> <th>备注说明</th>
                <th class="text-xs-right">操作</th>
              </tr>
            </thead>

            <tbody>
              @foreach($stocks as $stock)
              <tr>


                <td>{{$stock->generating_unit_no}}</td> <td>{{$stock->product_type}}</td> <td>{{$stock->generating_unit_type}}</td> <td>{{$stock->power}}</td> <td>{{$stock->phases_number}}</td> <td>{{$stock->unit}}</td> <td>{{$stock->init_stock}}</td> <td>{{$stock->warehousing_count}}</td> <td>{{$stock->out_count}}</td> <td>{{$stock->inventory_quantity}}</td> <td>{{$stock->warehousing_price}}</td> <td>{{$stock->stock_amount}}</td> <td>{{$stock->remark}}</td>

                <td class="text-xs-right">




                  <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除 </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $stocks->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">空的!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
