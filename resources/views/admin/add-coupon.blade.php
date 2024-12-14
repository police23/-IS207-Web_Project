@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Thêm mã giảm giá</h3>
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
                    <a href="{{ route('admin.discount') }}">
                        <div class="text-tiny">Tất cả mã giảm giá</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Thêm mã giảm giá</div>
                </li>
            </ul>
        </div>
        <form class="form-add-coupon" method="POST" action="{{ route('admin.coupon.store') }}">
            @csrf
            <div class="wg-box">
                <fieldset class="code">
                    <div class="body-title mb-10">Mã giảm giá <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Nhập mã giảm giá" name="code" tabindex="0" value="{{ old('code') }}" aria-required="true" required="">
                    <div class="text-tiny">Không vượt quá 100 ký tự khi nhập mã giảm giá.</div>
                </fieldset>
                @error('code')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="discount-type">
                    <div class="body-title mb-10">Loại giảm giá</div>
                    <select class="mb-10" name="discount_type" id="discount_type" tabindex="0" required>
                        <option value="amount" {{ old('discount_type') == 'amount' ? 'selected' : '' }}>Số tiền giảm giá</option>
                        <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Phần trăm giảm giá</option>
                    </select>
                </fieldset>
                @error('discount_type')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="discount-amount" id="discount_amount_field" style="display: none;">
                    <div class="body-title mb-10">Số tiền giảm giá</div>
                    <input class="mb-10" type="number" placeholder="Nhập số tiền giảm giá" name="discount_amount" tabindex="0" value="{{ old('discount_amount') }}" step="0.01" min="0">
                </fieldset>
                @error('discount_amount')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="discount-percentage" id="discount_percentage_field" style="display: none;">
                    <div class="body-title mb-10">Phần trăm giảm giá</div>
                    <input class="mb-10" type="number" placeholder="Nhập phần trăm giảm giá" name="discount_percentage" tabindex="0" value="{{ old('discount_percentage') }}" min="0" max="100">
                </fieldset>
                @error('discount_percentage')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="expiry-date">
                    <div class="body-title mb-10">Ngày hết hạn</div>
                    <input class="mb-10" type="date" name="expiry_date" tabindex="0" value="{{ old('expiry_date') }}">
                </fieldset>
                @error('expiry_date')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit" style="background-color: #9b59b6; border-color: #9b59b6;">Thêm mã giảm giá</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const discountType = document.getElementById('discount_type');
        const discountAmountField = document.getElementById('discount_amount_field');
        const discountPercentageField = document.getElementById('discount_percentage_field');

        function toggleDiscountFields() {
            if (discountType.value === 'amount') {
                discountAmountField.style.display = 'block';
                discountPercentageField.style.display = 'none';
            } else {
                discountAmountField.style.display = 'none';
                discountPercentageField.style.display = 'block';
            }
        }

        discountType.addEventListener('change', toggleDiscountFields);
        toggleDiscountFields(); // Initial call to set the correct fields on page load
    });
</script>
