@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          收款明细 collected detail
          <a class="btn btn-success float-xs-right" href="{{ route('collecteds.create') }}">创建 create</a>
        </h1>
                <h1>
       <!-- 这里编写查询 -->
          <a class="btn btn-success float-xs-right" href="{{ route('collecteds.export') }}">导出Excel export Excel</a>
            </h1>
          <form action="{{ route('collecteds.index') }}" method="GET" style="display: inline;">
                    {{csrf_field()}}



                <label for="date_begin-field">起始日期begin date</label>
                    <input class="" type="text" name="date_begin" id="date_begin" value="" />
                     <label for="date_end-field">截止日期end date</label>
                    <input class="" type="text" name="date_end" id="date_end" value="" />

                    <button type="submit" class="btn btn-sm btn-danger">查询 query</button>
          </form>
      </div>

      <div class="card-body">
        @if($collecteds->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
             <th>订单编号</th>  <th>日期</th> <th>客户名称</th> <th>金额</th> <th>付款方式</th> <th>收款人</th> <th>核对人</th> <th>备注说明</th>
                <th class="text-xs-right">操作</th>
              </tr>
                  <tr>
             <th>order id</th>  <th>date</th> <th>customer name</th> <th>collected_amount</th> <th>payment_method</th> <th>payee</th> <th>check man</th> <th>remark</th>
                <th class="text-xs-right">option</th>
              </tr>
            </thead>

            <tbody>
              @foreach($collecteds as $collected)
              <tr>


                <td>{{$collected->order_id}}</td> <td>{{$collected->collection_date->toDateString()}}</td> <td>{{$collected->customer_name}}</td> <td>{{$collected->collected_amount}}</td> <td>{{$collected->payment_method}}</td> <td>{{$collected->payee}}</td> <td>{{$collected->check_man}}</td> <td>{{$collected->remark}}</td>

                <td class="text-xs-right">

               <!-- 暂不提供编辑 -->
              <!--     <a class="btn btn-sm btn-warning" href="{{ route('collecteds.edit', $collected->id) }}">
                    编辑
                  </a> -->

                  <form action="{{ route('collecteds.destroy', $collected->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $collecteds->render() !!}
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
