<li class="media @if ( ! $loop->last) border-bottom @endif">


  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      <a href="">{{ $notification->data['user_name'] }}</a>
      @if($notification->data['order_state']=='不通过')
      您创建的订单，编号：
      <a href="{{ $notification->data['order_link'] }}">{{ $notification->data['order_id'] }}</a>
      审核不通过，请查看原因后，删除重新创建！
      @elseif($notification->data['order_state']=='已通过')
      您创建的订单，编号：
      <a href="{{ $notification->data['order_link'] }}">{{ $notification->data['order_id'] }}</a>
      已通过审核！
      @else
      创建的订单，编号：
      <a href="{{ $notification->data['order_link'] }}">{{ $notification->data['order_id'] }}</a>
      需要您的审核
      @endif
      <span class="meta float-right" title="{{ $notification->created_at }}">
        <i class="far fa-clock"></i>
        {{ $notification->created_at->diffForHumans() }}
      </span>
    </div>

  </div>
</li>
