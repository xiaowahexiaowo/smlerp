@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          排产单 /
          @if($schedule->id)
            编辑 #{{ $schedule->id }}
          @else
            创建
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($schedule->id)
          <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('schedules.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                    <label for="start_date-field">下发日期</label>
                    <input class="form-control" type="text" name="start_date" id="start_date-field" value="{{ old('start_date', $schedule->start_date ) }}" />
                </div>
                <div class="form-group">
                    <label for="delivery_date-field">交货日期</label>
                    <input class="form-control" type="text" name="delivery_date" id="delivery_date-field" value="{{ old('delivery_date', $schedule->delivery_date ) }}" />
                </div>
                <div class="form-group">
                	<label for="plan_no-field">计划编号</label>
                	<input class="form-control" type="text" name="plan_no" id="plan_no-field" value="{{ old('plan_no', $schedule->plan_no ) }}" />
                </div>
                <div class="form-group">
                	<label for="category-field">类别</label>
                	<input class="form-control" type="text" name="category" id="category-field" value="{{ old('category', $schedule->category ) }}" />
                </div>
                <div class="form-group">
                	<label for="appendix-field">附件</label>
                    <textarea name="appendix" id="appendix-field" class="form-control" rows="3"  required >{{ old('appendix', $schedule->appendix ) }}</textarea>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
            <a class="btn btn-link float-xs-right" href="{{ route('schedules.index') }}"> <- 返回</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection




@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.zh-CN.min.js') }}"></script>
  <script>
   $('#start_date-field,#delivery_date-field').datepicker({
    language:"zh-CN"
   });
  </script>
   <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>
  <script>
    $(document).ready(function() {
      var editor = new Simditor({
        textarea: $('#appendix-field'),
          upload: {
          url: '{{ route('orders.upload_image') }}',
          params: {
            _token: '{{ csrf_token() }}'
          },
          fileKey: 'upload_file',
          connectionCount: 4,
          leaveConfirm: '文件上传中，关闭此页面将取消上传。'
        },
        pasteImage: true,
      });
    });
  </script>

@stop
