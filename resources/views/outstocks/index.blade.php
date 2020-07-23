@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-12 ">
    <div class="card ">
      <div class="card-header">
        <h1>
          出库单out stock
          <a class="btn btn-success float-xs-right" href="{{ route('outstocks.create') }}">创建</a>
        </h1>
      </div>

      <div class="card-body">
        @if($outstocks->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>

                <th>出库类型</th> <th>日期</th> <th>订单编号</th> <th>客户名称</th> <th>业务员</th> <th>出料仓库</th> <th>备注</th>
                <th class="text-xs-right">操作</th>
              </tr>
                 <tr>

                <th>out stock type</th> <th>out_date</th> <th>order_id</th> <th>customer_name</th> <th>saleman</th> <th>out_stock_factory</th> <th>remark</th>
                <th class="text-xs-right">option</th>
              </tr>
            </thead>

            <tbody>
              @foreach($outstocks as $outstock)
              <tr>


                <td>{{$outstock->out_stock_type}}</td> <td>{{$outstock->out_date}}</td> <td>{{$outstock->order_id}}</td> <td>{{$outstock->customer_name}}</td> <td>{{$outstock->user_name}}</td> <td>{{$outstock->out_stock_factory}}</td> <td>{{$outstock->remark}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('outstocks.show', $outstock->id) }}">
                    查看view
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('outstocks.edit', $outstock->id) }}">
                    编辑edit
                  </a>

                  <form action="{{ route('outstocks.destroy', $outstock->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除delete </button>
                  </form>

                   <a class="btn btn-sm btn-success" href="{{ route('outstocks.create_detail', $outstock->id) }}">
                    添加明细 add detail
                  </a>
                </td>
              </tr>
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
