@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>排产单 / 详细 </h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('schedules.index') }}"><- 返回</a>
            </div>

          </div>
        </div>
        <br>
 <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>下发日期</th> <th>交货日期</th> <th>计划编号</th> <th>分类</th>

              </tr>
            </thead>

            <tbody>

              <tr>
                <td class="text-xs-center"><strong>{{$schedule->id}}</strong></td>

                <td>{{$schedule->start_date}}</td> <td>{{$schedule->delivery_date}}</td> <td>{{$schedule->plan_no}}</td> <td>{{$schedule->category}}</td>


              </tr>

            </tbody>
          </table>

          <p>{!!$schedule->appendix!!}</p>
      </div>
    </div>
  </div>
</div>

@endsection
