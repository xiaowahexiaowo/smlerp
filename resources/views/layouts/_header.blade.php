<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
<div class="container">
    <!-- Branding Image -->
    <a class="navbar-brand " href="{{ url('/') }}">
    SmlErp
    </a>
    <a class="navbar-brand " href="{{ url('/orders') }}">
    销售单
    </a>
  <!--   <a class="navbar-brand " href="{{ url('/orders/showDetail') }}"> -->
    <a class="navbar-brand " href="{{ route('orders.order_detail') }}">
    销售单明细
    </a>
  <a class="navbar-brand " href="{{ route('collecteds.index') }}">
    收款明细
    </a>
      <a class="navbar-brand " href="{{ route('receivables.index') }}">
    应收账款统计
    </a>
         <a class="navbar-brand " href="{{ route('stocks.index') }}">
    物品库存统计
    </a>
     <a class="navbar-brand " href="{{ route('instocks.index') }}">
    入库单
    </a>
     <a class="navbar-brand " href="{{ route('instocks.instock_detail') }}">
    入库明细
    </a>
      <a class="navbar-brand " href="{{ route('outstocks.index') }}">
    出库单
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav mr-auto">

    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
        @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="https://cdn.learnku.com/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px">
            {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="">个人中心</a>
            <a class="dropdown-item" href="">编辑资料</a>
              @can('manage_users')
                <a class="dropdown-item" href="{{ url(config('administrator.uri')) }}">
                  <i class="fas fa-tachometer-alt mr-2"></i>
                  管理后台
                </a>
                <div class="dropdown-divider"></div>
              @endcan
            <div class="dropdown-divider"></div>

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
