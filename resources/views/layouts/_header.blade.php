<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
<div class="container">
    <!-- Branding Image -->
  <!--   <a class="navbar-brand " href="{{ url('/') }}">
    SmlErp
    </a> -->
    <li class="navbar-brand {{ active_class(if_route('orders.index')) }} ">
       <a  href="{{ url('/orders') }}">
    销售单order
    </a>
    </li>
<li class="navbar-brand {{ active_class(if_route('orders.order_detail')) }} ">
    <a href="{{ route('orders.order_detail') }}">
    销售单明细orderdetail
    </a>
  </li>
    <li class="navbar-brand {{ active_class(if_route('collecteds.index')) }} ">
    <a  href="{{ route('collecteds.index') }}">
    收款明细
    </a>
  </li>
    <li class="navbar-brand {{ active_class(if_route('receivables.index')) }} ">
      <a href="{{ route('receivables.index') }}">
    应收账款统计
    </a>
  </li>
    <li class="navbar-brand {{ active_class(if_route('stocks.index')) }} ">
         <a  href="{{ route('stocks.index') }}">
    物品库存统计
    </a>
  </li>
  <li class="navbar-brand {{ active_class(if_route('instocks.index')) }} ">
     <a  href="{{ route('instocks.index') }}">
    入库单
    </a>
  </li>
   <li class="navbar-brand {{ active_class(if_route('instocks.instock_detail')) }} ">
     <a  href="{{ route('instocks.instock_detail') }}">
    入库明细
    </a>
  </li>
   <li class="navbar-brand {{ active_class(if_route('outstocks.index')) }} ">
      <a  href="{{ route('outstocks.index') }}">
    出库单
    </a>
  </li>
   <li class="navbar-brand {{ active_class(if_route('outstocks.outstock_detail')) }} ">
    <a  href="{{ route('outstocks.outstock_detail') }}">
    出库明细
    </a>
  </li>
  <li class="navbar-brand {{ active_class(if_route('blackboards.index')) }} ">
    <a  href="{{ route('blackboards.index') }}">
    小黑板stock
    </a>
  </li>
    <li class="navbar-brand {{ active_class(if_route('schedules.index')) }} ">
     <a href="{{ route('schedules.index') }}">
    排产单schedules
    </a>
  </li>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
<!--     <ul class="navbar-nav mr-auto">

    </ul> -->

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
        @else
          <li class="nav-item notification-badge">
            <a class="nav-link mr-3 badge badge-pill badge-{{ Auth::user()->notification_count > 0 ? 'hint' : 'secondary' }} text-white" href="{{ route('notifications.index') }}">
              {{ Auth::user()->notification_count }}
            </a>
          </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="https://cdn.learnku.com/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px">
            {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @can('manage_users')
                <a class="dropdown-item" href="{{ url(config('administrator.uri')) }}">
                  <i class="fas fa-tachometer-alt mr-2"></i>
                  管理后台
                </a>
              @endcan

            <a class="dropdown-item" id="logout" href="#">
                <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                </form>
            </a>
            </div>
        </li>
        @endguest
    </ul>
    </div>


</div>



</nav>
