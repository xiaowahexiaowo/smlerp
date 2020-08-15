@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>排产发货明细schedules detail / 详细 detail</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('schedules.index') }}"><- 返回back</a>
            </div>
                  <div class="col-md-6">
            <a href="{{route('schedules.download',$schedule->id)}}" class="btn btn-large pull-right">
            <i class="btn btn-success">文件下载 </i>
        </a>
            </div>

          </div>
        </div>
        <br>
 <table class="table table-sm table-striped">
            <thead>
             <tr>
                <th class="text-xs-center">#</th>
                <th>排产单号</th> <th>排产单状态</th>
              </tr>
              <tr>
                <th class="text-xs-center">#</th>
                <th>schedules_id</th> <th>schedules_state</th>
              </tr>
            </thead>

            <tbody>

              <tr>
                <td class="text-xs-center"><strong>{{$schedule->id}}</strong></td>
         <td>{{$schedule->schedules_id}}</td> <td>{{$schedule->schedules_state}}</td>


              </tr>

            </tbody>
          </table>

          <p>{!!$schedule->appendix!!}</p>
      </div>
    </div>
  </div>
</div>

@endsection
