@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Order
          <a class="btn btn-success float-xs-right" href="{{ route('orders.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($orders->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Order_no</th> <th>Order_id</th> <th>Order_type</th> <th>Order_date</th> <th>Order_ticket</th> <th>Customer_name</th> <th>User_id</th> <th>Payment_type</th> <th>Total_cost</th> <th>Payment_method</th> <th>Remark</th> <th>Payment_amount</th> <th>Tax_deductible</th> <th>Arrears</th> <th>Order_state</th> <th>Order_detail_id</th> <th>Appendix</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($orders as $order)
              <tr>
                <td class="text-xs-center"><strong>{{$order->id}}</strong></td>

                <td>{{$order->order_no}}</td> <td>{{$order->order_id}}</td> <td>{{$order->order_type}}</td> <td>{{$order->order_date}}</td> <td>{{$order->order_ticket}}</td> <td>{{$order->customer_name}}</td> <td>{{$order->user_id}}</td> <td>{{$order->payment_type}}</td> <td>{{$order->total_cost}}</td> <td>{{$order->payment_method}}</td> <td>{{$order->remark}}</td> <td>{{$order->payment_amount}}</td> <td>{{$order->tax_deductible}}</td> <td>{{$order->arrears}}</td> <td>{{$order->order_state}}</td> <td>{{$order->order_detail_id}}</td> <td>{{$order->appendix}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('orders.show', $order->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('orders.edit', $order->id) }}">
                    E
                  </a>

                  <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $orders->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
