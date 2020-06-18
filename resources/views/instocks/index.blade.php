@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          入库单
          <a class="btn btn-success float-xs-right" href="{{ route('instocks.create') }}">创建</a>
        </h1>
      </div>

      <div class="card-body">
        @if($instocks->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">入库单号</th>
                <th>入库类型</th> <th>批次</th> <th>日期</th> <th>供应商</th> <th>入库人</th> <th>收料仓库</th>
                <th class="text-xs-right">操作</th>
              </tr>
            </thead>

            <tbody>
              @foreach($instocks as $instock)
              <tr>
                <td class="text-xs-center">{{$instock->id}}</td>

                <td>{{$instock->stock_type}}</td> <td>{{$instock->batch}}</td> <td>{{$instock->in_date}}</td> <td>{{$instock->supplier}}</td> <td>{{$instock->stock_man}}</td> <td>{{$instock->stock_factory}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('instocks.show', $instock->id) }}">
                    查看
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('instocks.edit', $instock->id) }}">
                    编辑
                  </a>

                  <form action="{{ route('instocks.destroy', $instock->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除</button>
                  </form>

                   <a class="btn btn-sm btn-success" href="{{ route('instocks.create_detail', $instock->id) }}">
                    添加明细
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $instocks->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">空的!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
