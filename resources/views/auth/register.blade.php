@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Đăng ký') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end d-flex justify-content-end">{{ __('Tên đăng nhập') }}<span class="text-danger" style="color: red;"> *</span></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control form-control_gray @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fullname" class="col-md-4 col-form-label text-md-end d-flex justify-content-end">{{ __('Họ và tên') }}<span class="text-danger" style="color: red;"> *</span></label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control form-control_gray @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname">

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end d-flex justify-content-end">{{ __('Giới tính') }}<span class="text-danger" style="color: red;"> *</span></label>

                            <div class="col-md-6">
                                <select id="gender" class="form-control form-control_gray @error('gender') is-invalid @enderror" name="gender" required>
                                    <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}>Nam</option>
                                    <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Nữ</option>
                                    <option value="2" {{ old('gender') == '2' ? 'selected' : '' }}>Khác</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dob" class="col-md-4 col-form-label text-md-end d-flex justify-content-end">{{ __('Ngày sinh') }}<span class="text-danger" style="color: red;"> *</span></label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control form-control_gray @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob">

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end d-flex justify-content-end">{{ __('Địa chỉ') }}<span class="text-danger" style="color: red;"> *</span></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control form-control_gray @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phonenumber" class="col-md-4 col-form-label text-md-end d-flex justify-content-end">{{ __('Số điện thoại') }}<span class="text-danger" style="color: red;"> *</span></label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="text" class="form-control form-control_gray @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="phonenumber">

                                @error('phonenumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end d-flex justify-content-end">{{ __('Địa chỉ email') }}<span class="text-danger" style="color: red;"> *</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-control_gray @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end d-flex justify-content-end">{{ __('Mật khẩu') }}<span class="text-danger" style="color: red;"> *</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control form-control_gray @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end d-flex justify-content-end">{{ __('Xác nhận mật khẩu') }}<span class="text-danger" style="color: red;"> *</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control form-control_gray" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng ký') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
