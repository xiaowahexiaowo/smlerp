<li class="media @if ( ! $loop->last) border-bottom @endif">


  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      <a href="">{{ $notification->data['user_name'] }}</a>
      创建的订单，编号：
      <a href="{{ $notification->data['order_link'] }}">{{ $notification->data['order_id'] }}</a>
      需要您的审核

      <span class="meta float-right" title="{{ $notification->created_at }}">
        <i class="far fa-clock"></i>
        {{ $notification->created_at->diffForHumans() }}
      </span>
    </div>

  </div>
</li>
