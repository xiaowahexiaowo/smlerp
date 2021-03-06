@extends('layouts.app')


@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          销售单 order/
            审核 check

        </h1>
      </div>

      <div class="card-body">

          <form action="{{ route('orders.update', $order->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">


          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">


                  <div class="form-group">
                  <label for="order_ticket-field">订单状态order_state</label>
                            <select class="form-control" name="order_state" required>
                  <option value="" hidden disabled {{ $order->id ? '' : 'selected' }}>请选择分类</option>


                      @can('1_check')
                       <option value="初步审核" {{ $order->order_state == '初步审核' ? 'selected' : '' }}>
                        初步审核 first check
                      </option>
                      @endcan

                      @can('2_check')
                       <option value="二次审核" {{ $order->order_state == '二次审核' ? 'selected' : '' }}>
                        二次审核 second check
                      </option>
                      @endcan

                      @can('3_check')
                       <option value="已通过" {{ $order->order_state == '已通过' ? 'selected' : '' }}>
                        审核通过 pass
                      </option>
                      @endcan


                      <option value="不通过" {{ $order->order_state == '不通过' ? 'selected' : '' }}>
                        不通过 un pass
                      </option>

                </select>
                </div>
                <div class="form-group">
                  <label for="remark-field">备注(不通过请填写备注进行提示！！)remark</label>
                  <input class="form-control" type="text" name="remark" id="remark-field" value=""  required />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('orders.index') }}"> <- 返回back</a>
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
   $('#order_date-field').datepicker({
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
