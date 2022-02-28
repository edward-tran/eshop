<nav class="navbar navbar-expand-lg " style="background-color: #94a3ba;">
  <a class="navbar-brand" href="{{ url('/') }}" style="margin-left: 30px; color:white;">Mobile World </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-right:30px;">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item active">
        <a style="color:#fdf2f3;" class="nav-link" href="{{ url('/') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
        Trang chủ</a>
      </li>
      <li class="nav-item">
        <a style="color:#fdf2f3;" class="nav-link" href="{{ url('category') }}">
        <i class="fa fa-list-alt" aria-hidden="true"></i>
        Hãng</a>
      </li>
      @guest
      @if (Route::has('login'))
      <li class="nav-item">
        <a style="color:#fdf2f3;" class="nav-link" href="{{ route('login') }}">
        <i class="fa fa-sign-in" style="margin-right:5px;"></i>Đăng nhập</a>
      </li>
      @endif
        
      @if (Route::has('register'))
      <li class="nav-item">
        <a style="color:#fdf2f3;" class="nav-link" href="{{ route('register') }}">
        <i class="fa fa-user-plus" aria-hidden="true" style="margin-right: 5px;"></i>
          Đăng ký</a>
      </li>
      @endif
      @else
      <li class="nav-item">
        <a style="color:#fdf2f3;" class="nav-link" href="{{ url('cart') }}">
        <i class="fas fa-shopping-cart" ></i>
        Giỏ hàng ({{ DB::table('carts')->where('user_id', Auth::id())->count();}})
      </a>
      </li>
      <li class="nav-item">
        <a style="color:#fdf2f3;" class="nav-link" href="{{ url('my-order') }}">
        <i class="fa fa-folder" aria-hidden="true"></i>
        Đơn hàng
      </a>
      </li>
      <li><a style="color:#fdf2f3;" class="nav-link" href="{{ url('user-detail') }}">
      <i class="fa fa-user"  aria-hidden="true" style="margin-right: 5px;"></i>
      {{ Auth::user()->name }}</a></li>
      <li >
        <a style="color:#fdf2f3;" class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i>
            Đăng xuất
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
        </a>
      </li>
      @endguest
    </ul>
  </div>
</nav>