@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          小黑板 blackboard/
          @if($blackboard->id)
            编辑 edit #{{ $blackboard->id }}
          @else
            创建 create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($blackboard->id)
          <form action="{{ route('blackboards.update', $blackboard->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('blackboards.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                    <label for="model_type-field">Model型号 model_type</label>
                    <input class="form-control" type="text" name="model_type" id="model_type-field" value="{{ old('model_type', $blackboard->model_type ) }}" />
                </div>
                <div class="form-group">
                    <label for="ava1b1-field">Ava1b1仓库可用  ava1b1 able</label>
                    <input class="form-control" type="text" name="ava1b1" id="ava1b1-field" value="{{ old('ava1b1', $blackboard->ava1b1 ) }}" />
                </div>
                <div class="form-group">
                    <label for="dp-field">Dp预付款 dp advance charge</label>
                    <input class="form-control" type="text" name="dp" id="dp-field" value="{{ old('dp', $blackboard->dp ) }}" />
                </div>
                <div class="form-group">
                    <label for="otw-field">Otw发货路上 Otw  On the way to delivery</label>
                    <input class="form-control" type="text" name="otw" id="otw-field" value="{{ old('otw', $blackboard->otw ) }}" />
                </div>
                <div class="form-group">
                    <label for="chn-field">Chn国内已生产 producted at home</label>
                    <input class="form-control" type="text" name="chn" id="chn-field" value="{{ old('chn', $blackboard->chn ) }}" />
                </div>
                <div class="form-group">
                    <label for="up-field">Up排产待作 Production needs to be done</label>
                    <input class="form-control" type="text" name="up" id="up-field" value="{{ old('up', $blackboard->up ) }}" />
                </div>
                <div class="form-group">
                    <label for="available_count-field">可用合计 Total available</label>
                    <input class="form-control" type="text" name="available_count" id="available_count-field" value="{{ old('available_count', $blackboard->available_count ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存 save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('blackboards.index') }}"> <- 返回  back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
