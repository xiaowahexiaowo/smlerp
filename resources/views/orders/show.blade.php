@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-14">
    <div class="card ">
      <div class="card-header">
        <h1>order /  #{{ $order->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('orders.index') }}"><- 返回back</a>
            </div>
            <div class="col-md-6">
            <a href="{{route('orders.download',$order->id)}}" class="btn btn-large pull-right">
            <i class="btn btn-success">文件下载 </i>
        </a>
            </div>
          </div>
        </div>
         <table class="table table-sm table-striped">
            <thead>
              <tr>

               <th>订单编号</th> <th>订单类型</th> <th>订单日期</th> <th>订单摘要</th> <th>客户名称</th> <th>业务员</th> <th>支付类别</th> <th>合同总金额</th> <th>支付方式</th> <th>备注</th> <th>支付金额</th> <th>可抵免税款</th> <th>尚欠金额</th> <th>订单状态</th>

              </tr>
              <tr>

               <th>P.O no</th> <th>P.O type</th> <th>P.O date</th> <th>P.O detail</th> <th>client name</th> <th>sales</th> <th>payment_type</th> <th>total_payment</th> <th>payment_terms</th> <th>note</th> <th>payment_amount</th> <th>2307</th> <th>balance</th> <th>P.O state</th>

              </tr>
            </thead>

            <tbody>

              <tr>


                 <td>{{$order->order_id}}</td> <td>{{$order->order_type}}</td> <td>{{$order->order_date->toDateString()}}</td> <td>{{$order->order_ticket}}</td> <td>{{$order->customer_name}}</td> <td>{{$order->user->name}}</td> <td>{{$order->payment_type}}</td> <td>{{$order->total_cost}}</td> <td>{{$order->payment_method}}</td> <td>{{$order->remark}}</td> <td>{{$order->payment_amount}}</td> <td>{{$order->tax_deductible}}</td> <td>{{$order->arrears}}</td> <td>{{$order->order_state}}</td>


              </tr>



            </tbody>
          </table>
          <p>附件：</p>
        <p>
                  {!! $order->appendix !!}
              </p>
      <p>客户地址：{{$order->address}} 客户邮箱：{{$order->email}}  客户电话:{{$order->phone}}</p>

        <br>
 <table class="table table-sm table-striped">
            <thead>
              <tr>

          <th>产品类型</th> <th>机组类型</th> <th>功率</th> <th>相数</th> <th>单位</th> <th>单价</th> <th>数量</th> <th>金额</th> <th>备注</th> <th>操作</th>

              </tr>

                   <tr>

              <th>unit_type</th><th>unit_model</th><th>power</th><th>phases</th><th>unit</th><th>unit price</th><th>amount</th><th>total price</th><th>remark</th> <th>option</th>

              </tr>
            </thead>
             <tbody>

             @foreach($order->orderdetails as $detail)
              <tr>
               <td>{{$detail->product_type}}</td><td>{{$detail->generating_unit_type}}</td><td>{{$detail->power}}</td><td>{{$detail->phases_number}}</td><td>{{$detail->unit}}</td><td>{{$detail->warehousing_price}}</td><td>{{$detail->count}}</td><td>{{$detail->amount}}</td><td>{{$detail->remarks}}</td>

               <td  class="text-xs-right">
                 @if($order->order_state=='待审核'||$order->order_state=='不通过')
                   <form action="{{ route('orderdetails.destroy', $detail->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">删除delete </button>
                  </form>
                  @endif
               </td>
              </tr>
              @endforeach
            </tbody>
 </table>

      </div>
    </div>
  </div>
</div>

@endsection
