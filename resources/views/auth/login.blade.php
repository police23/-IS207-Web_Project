@extends('layouts.app')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
      <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login"
            role="tab" aria-controls="tab-item-login" aria-selected="true" style="color: #7e3af2;">Đăng nhập</a>
        </li>
      </ul>
      <div class="tab-content pt-2" id="login_register_tab_content">
        <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
          <div class="login-form">
            @if ($errors->any())
                <div class="alert alert-danger py-2">
                    {{ $errors->first() }}
                </div>
            @endif
            <form method="POST" action="{{ route('login.submit') }}" name="login-form" class="needs-validation" novalidate="">
              @csrf
              <div class="form-floating mb-3">
                <input class="form-control form-control_gray " name="email" value="{{ old('email') }}" required="" autocomplete="email"
                  autofocus="">
                <label for="email">Email *</label>
              </div>

              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control form-control_gray " name="password" required=""
                  autocomplete="current-password">
                <label for="customerPasswodInput">Mật khẩu *</label>
              </div>

              <button class="btn btn-primary w-100 text-uppercase rounded-pill btn-sm" type="submit">Đăng nhập</button>

              <div class="customer-option mt-4 text-center">
                <span class="text-secondary">Chưa có tài khoản?</span>
                <a href="{{ route('register') }}" class="btn-text js-show-register">Tạo tài khoản</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
