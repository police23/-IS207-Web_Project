<ul class="account-nav">
<li><a href="{{ route('profile') }}" class="menu-link menu-link_us-s"><i class="fas fa-user"></i> Thông tin tài khoản</a></li>
<li><a href="{{ route('change-password') }}" class="menu-link menu-link_us-s"><i class="fas fa-lock"></i> Thay đổi mật khẩu</a></li>
<li><a href="{{ route('account.orders') }}" class="menu-link menu-link_us-s"><i class="fas fa-box"></i> Đơn hàng</a></li>
<li><a href="{{ route('logout') }}" class="menu-link menu-link_us-s" onclick="event.preventDefault(); if(confirm('Bạn có chắc chắn muốn đăng xuất ?')) { document.getElementById('logout-form').submit(); }"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</ul>