@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Chỉnh sửa mã giảm giá</h3>
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
                    <a href="{{ route('admin.coupons')}}">
                        <div class="text-tiny">Mã giảm giá</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Chỉnh sửa mã giảm giá</div>
                </li>
            </ul>
        </div>
        <!-- form-edit-coupon -->
        <form class="form-edit-coupon" method="POST" action="{{ route('admin.coupon.update', $coupon->id) }}">
            @csrf
            @method('PUT')
            <div class="wg-box">
                <fieldset class="code">
                    <div class="body-title mb-10">Mã giảm giá <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Nhập mã giảm giá" name="code" tabindex="0" value="{{ old('code', $coupon->code) }}" aria-required="true" required="">
                    <div class="text-tiny">Không vượt quá 50 ký tự khi nhập mã giảm giá.</div>
                </fieldset>
                @error('code')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="type">
                    <div class="body-title mb-10">Loại giảm giá <span class="tf-color-1">*</span></div>
                    <select class="mb-10" name="type" id="couponType" tabindex="0" required>
                        <option value="" disabled>Chọn loại</option>
                        <option value="fixed" {{ old('type', $coupon->type) == 'fixed' ? 'selected' : '' }}>Số tiền</option>
                        <option value="percentage" {{ old('type', $coupon->type) == 'percentage' ? 'selected' : '' }}>Phần trăm</option>
                    </select>
                    <div class="text-tiny">Chọn loại mã giảm giá.</div>
                </fieldset>
                @error('type')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="value">
                    <div class="body-title mb-10">Giá trị giảm giá <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="number" placeholder="Nhập giá trị" name="value" id="couponValue" tabindex="0" value="{{ old('value', $coupon->value) }}" aria-required="true" required="" step="0.01" min="0">
                </fieldset>
                @error('value')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="max-usage">
                    <div class="body-title mb-10">Số lượng <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="number" placeholder="Nhập số lượng" name="max_usage" tabindex="0" value="{{ old('max_usage', $coupon->max_usage) }}" aria-required="true" required="" min="0">
                </fieldset>
                @error('max_usage')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="minimum-order-value">
                    <div class="body-title mb-10">Giá trị đơn hàng tối thiểu <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="number" placeholder="Nhập giá trị đơn hàng tối thiểu" name="minimum_order_value" tabindex="0" value="{{ old('minimum_order_value', $coupon->minimum_order_value) }}" aria-required="true" required="" step="0.01" min="0">
                </fieldset>
                @error('minimum_order_value')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="expiry-date">
                    <div class="body-title mb-10">Ngày hết hạn <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="date" name="expiry_date" tabindex="0" value="{{ old('expiry_date', $coupon->expiry_date) }}" aria-required="true" required>
                </fieldset>
                @error('expiry_date')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit" style="background-color: #007bff; border-color: #007bff;" onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='#007bff';" onmouseout="this.style.backgroundColor='#007bff'; this.style.color='#ffffff';">Cập nhật mã giảm giá</button>
                </div>
            </div>
        </form>
        <!-- /form-edit-coupon -->
    </div>
    <!-- /main-content-wrap -->
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

@push('scripts')
<script>
    document.getElementById('couponType').addEventListener('change', function() {
        const couponValue = document.getElementById('couponValue');
        if (this.value === 'fixed') {
            couponValue.min = 1000;
            couponValue.max = null;
            couponValue.placeholder = 'Nhập giá trị (tối thiểu 1000)';
        } else if (this.value === 'percentage') {
            couponValue.min = 1;
            couponValue.max = 100;
            couponValue.placeholder = 'Nhập giá trị (1-100)';
        }
    });
</script>
@endpush
