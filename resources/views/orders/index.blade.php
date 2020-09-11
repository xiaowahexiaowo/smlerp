@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-13 ">
    <div class="card ">
      <div class="card-header">
        <h1>
          销售单order
          <a class="btn btn-success float-xs-right" href="{{ route('orders.create') }}">创建create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($orders->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                 <th>订单编号</th> <th>订单类型</th> <th>订单日期</th> <th>订单摘要</th> <th>客户名称</th> <th>业务员</th> <th>支付类别</th> <th>合同总金额</th> <th>支付方式</th> <th>备注</th> <th>定金金额</th> <th>可抵免税款</th> <th>尚欠金额</th> <th>订单状态</th>
                <th class="text-xs-right">操作</th>
              </tr>
              <tr>
                <th class="text-xs-center">#</th>
                 <th>P.O no</th> <th>P.O type</th> <th>P.O date</th> <th>P.O detail</th> <th>client name</th> <th>sales</th> <th>payment_type</th> <th>total_payment</th> <th>payment_terms</th> <th>note</th> <th>down payment</th> <th>2307</th> <th>balance</th> <th>P.O state</th>
                <th class="text-xs-right">option</th>
              </tr>
            </thead>

            <tbody>
              @foreach($orders as $order)
              <tr>
                <td class="text-xs-center"><strong>{{$order->id}}</strong></td>

               <td>{{$order->order_id}}</td> <td>{{$order->order_type}}</td> <td>{{$order->order_date->toDateString()}}</td> <td>{{$order->order_ticket}}</td> <td>{{$order->customer_name}}</td> <td>{{$order->user->name}}</td> <td>{{$order->payment_type}}</td> <td>{{$order->total_cost}}</td> <td>{{$order->payment_method}}</td> <td>{{$order->remark}}</td> <td>{{$order->payment_amount}}</td> <td>{{$order->tax_deductible}}</td> <td>{{$order->arrears}}</td> <td>{{$order->order_state}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('orders.show', $order->id) }}">
                    查看view
                  </a>

                 @if($order->order_state=='待审核')
                  <a class="btn btn-sm btn-warning" href="{{ route('orders.edit', $order->id) }}">
                    编辑edit
                  </a>
                  @endif

                @if($order->order_state=='待审核')
                  @can('1_check')
                  <a class="btn btn-sm btn-warning" href="{{ route('orders.check', $order->id) }}">
                    初步审核first check
                  </a>
                  @endcan
                 @elseif($order->order_state=='初步审核')
                 @can('2_check')
                 <a class="btn btn-sm btn-warning" href="{{ route('orders.check', $order->id) }}">
                    二次审核send check
                  </a>
                  @endcan
                  @elseif($order->order_state=='二次审核')
                  @can('3_check')
                      <a class="btn btn-sm btn-warning" href="{{ route('orders.check', $order->id) }}">
                    最终审核 end check
                  @endcan
                  @endif
                 @if($order->order_state=='不通过'||$order->order_state=='待审核')
                  <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除 delete</button>
                  </form>
                  @endif

                  @if($order->order_state=='待审核')
                  <a class="btn btn-sm btn-success" href="{{ route('orders.create_detail', $order->id) }}">
                    添加明细add detail
                  </a>
                  @endif

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $orders->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">空的!empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
