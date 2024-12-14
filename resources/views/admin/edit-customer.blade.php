@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Chỉnh sửa khách hàng</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">Bảng điều khiển</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{ route('admin.customers') }}">
                        <div class="text-tiny">Tất cả khách hàng</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Chỉnh sửa khách hàng</div>
                </li>
            </ul>
        </div>

        <form class="form-add-product" method="POST" action="{{ route('admin.customer.update', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')
            <div class="wg-box">
                <fieldset class="username">
                    <div class="body-title mb-10">Tên đăng nhập <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Nhập tên đăng nhập" name="username" value="{{ $user->username }}" required>
                </fieldset>
                @error('username')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="fullname">
                    <div class="body-title mb-10">Họ và tên</div>
                    <input class="mb-10" type="text" placeholder="Nhập họ và tên" name="fullname" value="{{ $user->fullname }}">
                </fieldset>
                @error('fullname')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="email">
                    <div class="body-title mb-10">Email <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="email" placeholder="Nhập email" name="email" value="{{ $user->email }}" required>
                </fieldset>
                @error('email')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="phonenumber">
                    <div class="body-title mb-10">Số điện thoại</div>
                    <input class="mb-10" type="text" placeholder="Nhập số điện thoại" name="phonenumber" value="{{ $user->phonenumber }}">
                </fieldset>
                @error('phonenumber')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="address">
                    <div class="body-title mb-10">Địa chỉ</div>
                    <input class="mb-10" type="text" placeholder="Nhập địa chỉ" name="address" value="{{ $user->address }}">
                </fieldset>
                @error('address')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="gender">
                    <div class="body-title mb-10">Giới tính <span class="tf-color-1">*</span></div>
                    <select class="mb-10" name="gender">
                        <option value="0" {{ $user->gender == 0 ? 'selected' : '' }}>Nam</option>
                        <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Nữ</option>
                    </select>
                </fieldset>
                @error('gender')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
