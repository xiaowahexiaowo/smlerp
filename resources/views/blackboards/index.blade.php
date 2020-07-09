@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          小黑板  blackboard
          <a class="btn btn-success float-xs-right" href="{{ route('blackboards.create') }}">创建 create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($blackboards->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Model型号</th> <th>Ava1b1仓库可用</th> <th>Dp预付款</th> <th>Otw发货路上</th> <th>Chn国内已生产</th> <th>Up排产待作</th> <th>可用合计</th>
                <th class="text-xs-right">操作Option</th>
              </tr>

            </thead>

            <tbody>
              @foreach($blackboards as $blackboard)
              <tr>
                <td class="text-xs-center"><strong>{{$blackboard->id}}</strong></td>

                <td>{{$blackboard->model_type}}</td> <td>{{$blackboard->ava1b1}}</td> <td>{{$blackboard->dp}}</td> <td>{{$blackboard->otw}}</td> <td>{{$blackboard->chn}}</td> <td>{{$blackboard->up}}</td> <td>{{$blackboard->available_count}}</td>

                <td class="text-xs-right">


                  <a class="btn btn-sm btn-warning" href="{{ route('blackboards.edit', $blackboard->id) }}">
                    编辑edit
                  </a>

                  <form action="{{ route('blackboards.destroy', $blackboard->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $blackboards->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">空的! empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
