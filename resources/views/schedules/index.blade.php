@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          排产单
          <a class="btn btn-success float-xs-right" href="{{ route('schedules.create') }}">创建</a>
        </h1>
      </div>

      <div class="card-body">
        @if($schedules->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>下发日期</th> <th>交货日期</th> <th>计划编号</th> <th>分类</th>
                <th class="text-xs-right">操作</th>
              </tr>
            </thead>

            <tbody>
              @foreach($schedules as $schedule)
              <tr>
                <td class="text-xs-center"><strong>{{$schedule->id}}</strong></td>

                <td>{{$schedule->start_date}}</td> <td>{{$schedule->delivery_date}}</td> <td>{{$schedule->plan_no}}</td> <td>{{$schedule->category}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('schedules.show', $schedule->id) }}">
                    查看详细
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('schedules.edit', $schedule->id) }}">
                    编辑
                  </a>

                  <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除 </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $schedules->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">空的!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
