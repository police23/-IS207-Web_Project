@extends('layouts.app')
@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Thông tin tài khoản</h2>
      @if(session('success'))
        <div class="alert alert-success" style="padding: 0.5rem;">
          {{ session('success') }}
        </div>
      @endif
      <div class="row">
        <div class="col-lg-3">
          @include('user.account-nav')
        </div>
        <div class="col-lg-9">
          <div class="page-content my-account__edit">
            <div class="my-account__edit-form">
              <form name="account_edit_form" action="{{ route('profile.update') }}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12 text-center">
                    <div class="my-3">
                      <img id="profile_picture_preview" src="{{ $user->image_profile ? asset('images/avatar/' . $user->image_profile) : asset('default-profile.png') }}" alt="Profile Picture" class="img-thumbnail" style="width: 150px; height: 150px;">
                      <div class="my-3">
                        <input type="file" name="image_profile" accept="image/*" class="form-control-file" style="display: none;" id="image_profile_input" onchange="previewImage(event)">
                        <button type="button" class="btn btn-secondary" onclick="document.getElementById('image_profile_input').click();">Thay đổi ảnh đại diện</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="my-3 position-relative">
                      <label for="username" class="font-weight-bold" style="font-size: 1.2em;">Tên tài khoản</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tên tài khoản" name="username" value="{{ $user->username }}" required="" readonly>
                        <div class="input-group-append" style="margin-left: 0.3cm;">
                          <span class="input-group-text" style="margin-top: 0.25cm;"><i class="fas fa-edit edit-icon" onclick="toggleEdit(this)"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="my-3 position-relative">
                      <label for="fullname" class="font-weight-bold" style="font-size: 1.2em;">Họ và tên</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Họ và tên" name="fullname" value="{{ $user->fullname }}" required="" readonly>
                        <div class="input-group-append" style="margin-left: 0.3cm;">
                          <span class="input-group-text" style="margin-top: 0.25cm;"><i class="fas fa-edit edit-icon" onclick="toggleEdit(this)"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="my-3 position-relative">
                      <label for="gender" class="font-weight-bold" style="font-size: 1.2em;">Giới tính</label>
                      <div class="input-group">
                        <select class="form-control" name="gender" required="" disabled>
                          <option value="0" {{ $user->gender == '0' ? 'selected' : '' }}>Nam</option>
                          <option value="1" {{ $user->gender == '1' ? 'selected' : '' }}>Nữ</option>
                          <option value="2" {{ $user->gender == '2' ? 'selected' : '' }}>Khác</option>
                        </select>
                        <div class="input-group-append" style="margin-left: 0.5cm;">
                          <span class="input-group-text" style="margin-top: 0.25cm;"><i class="fas fa-edit edit-icon" onclick="toggleEdit(this)"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="my-3 position-relative">
                      <label for="phonenumber" class="font-weight-bold" style="font-size: 1.2em;">Số điện thoại</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Số điện thoại" name="phonenumber" value="{{ $user->phonenumber }}" required="" readonly>
                        <div class="input-group-append" style="margin-left: 0.3cm;">
                          <span class="input-group-text" style="margin-top: 0.25cm;"><i class="fas fa-edit edit-icon" onclick="toggleEdit(this)"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="my-3 position-relative">
                      <label for="email" class="font-weight-bold" style="font-size: 1.2em;">Email</label>
                      <div class="input-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}" required="" readonly>
                        <div class="input-group-append" style="margin-left: 0.3cm;">
                          <span class="input-group-text" style="margin-top: 0.25cm;"><i class="fas fa-edit edit-icon" onclick="toggleEdit(this)"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="my-3 position-relative">
                      <label for="address" class="font-weight-bold" style="font-size: 1.2em;">Địa chỉ</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Địa chỉ" name="address" value="{{ $user->address }}" required="" readonly>
                        <div class="input-group-append" style="margin-left: 0.3cm;">
                          <span class="input-group-text" style="margin-top: 0.25cm;"><i class="fas fa-edit edit-icon" onclick="toggleEdit(this)"></i></span>
                        </div>
                      </div>
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

<script>
  function toggleEdit(icon) {
    const input = icon.closest('.input-group').querySelector('input, select');
    if (input.tagName === 'SELECT') {
      input.disabled = !input.disabled;
    } else {
      input.readOnly = !input.readOnly;
    }
    input.focus();
  }

  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
      const output = document.getElementById('profile_picture_preview');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>