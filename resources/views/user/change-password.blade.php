@extends('layouts.app')
@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Thay đổi mật khẩu</h2>
      <div class="row">
        <div class="col-lg-3">
          @include('user.account-nav')
        </div>
        <div class="col-lg-9">
          <div class="page-content my-account__edit">
            <div class="my-account__edit-form">
              @if(session('success'))
                <div class="alert alert-success py-2">
                  {{ session('success') }}
                </div>
              @endif
              @if($errors->any())
                <div class="alert alert-danger py-2">
                  <ul>
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form name="change_password_form" action="{{ route('change-password.update') }}" method="POST" class="needs-validation" novalidate="">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-floating my-3">
                      <input type="password" class="form-control" id="old_password" name="old_password"
                        placeholder="Mật khẩu hiện tại" required="">
                      <label for="old_password">Mật khẩu hiện tại</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating my-3">
                      <input type="password" class="form-control" id="new_password" name="new_password"
                        placeholder="Mật khẩu mới" required="">
                      <label for="new_password">Mật khẩu mới</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating my-3">
                      <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation"
                        placeholder="Xác nhận mật khẩu mới" required="">
                      <label for="new_password_confirmation">Xác nhận mật khẩu mới</label>
                      <div class="invalid-feedback">Mật khẩu không khớp!</div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="my-3">
                      <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection