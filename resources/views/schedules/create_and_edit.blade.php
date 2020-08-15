@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          排产发货明细 /schedule detail
          @if($schedule->id)
            编辑 edit#{{ $schedule->id }}
          @else
            创建 create
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
                    <label for="schedules_id-field">排产单号schedules_id</label>
                    <input class="form-control" type="text" name="schedules_id" id="schedules_id-field" value="{{ old('schedules_id', $schedule->schedules_id ) }}" />
                </div>
                <div class="form-group">
                  <label for="schedules_state-field">排产单状态schedules_state</label>
                   <select class="form-control" name="schedules_state" required>
                  <option value="" hidden disabled {{ $schedule->schedules_state ? '' : 'selected' }}>请选择分类</option>

                      <option value="排产已发货" {{ $schedule->schedules_state == '排产已发货' ? 'selected' : '' }}>
                        排产已发货  have delivered goods
                      </option>
                      <option value="排产未发货" {{ $schedule->schedules_state == '排产未发货' ? 'selected' : '' }}>
                        排产未发货  wait deliver goods
                      </option>
                      <option value="排产未生产" {{ $schedule->schedules_state == '排产未生产' ? 'selected' : '' }}>
                        排产未生产  wait product goods
                      </option>

                </select>
                </div>

                <div class="form-group">
                	<label for="appendix-field">附件appendix</label>
                    <textarea name="appendix" id="appendix-field" class="form-control" rows="3"  required >{{ old('appendix', $schedule->appendix ) }}</textarea>
                </div>

                   <div class="form-group mb-4">
                  <label for="" class="avatar-label">文件上传PO-Upload</label>
                  <input type="file" name="avatar" class="form-control-file" >
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('schedules.index') }}"> <- 返回back</a>
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
