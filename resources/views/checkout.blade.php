@extends('layouts.app')

@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Vận chuyển và thanh toán</h2>
      <div class="checkout-steps">
        <a href="cart.html" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Giỏ hàng</span>
            <em>Danh sách sản phẩm bạn đã chọn</em>
          </span>
        </a>
        <a href="checkout.html" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Vận chuyển và thanh toán</span>
            <em>Thanh toán đơn hàng của bạn</em>
          </span>
        </a>
        <a href="order-confirmation.html" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Xác nhận đơn hàng</span>
            <em>Xem lại và xác nhận đơn hàng của bạn</em>
          </span>
        </a>
      </div>
      <form name="checkout-form" action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <input type="hidden" name="total_price" value="{{ $cart->cartDetails->sum(function($item) { return $item->phoneVariants->regular_price * $item->quantity; }) }}">
        <input type="hidden" name="cart_items" value="{{ json_encode($cart->cartDetails->map(function($item) { return ['phone_variant_id' => $item->phoneVariants->id, 'quantity' => $item->quantity, 'price' => $item->phoneVariants->regular_price]; })) }}">
        <input type="hidden" name="payment_method" id="payment_method" value="bank_transfer">
        <div class="row">
          <div class="col-md-6 mt-4">
            <div class="billing-info__wrapper">
              <div class="row">
                <div class="col-6">
                  <h4>THÔNG TIN GIAO HÀNG</h4>
                </div>
                <div class="col-6">
                </div>
              </div>
              <div class="col-md-12">
                <div class="my-3">
                  <label for="fullname">Họ và tên</label>
                  <input type="text" class="form-control" id="fullname" name="fullname" value="{{ Auth::user()->fullname }}" required="" readonly>
                </div>
              </div>
              <div class="col-md-12">
                <div class="my-3">
                  <label for="phonenumber">Số điện thoại</label>
                  <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{ Auth::user()->phonenumber }}" required="" readonly>
                </div>
              </div>
              <div class="col-md-12">
                <div class="my-3">
                  <label for="address">Địa chỉ nhận hàng</label>
                  <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}" required="">
                </div>
              </div>
              <div class="checkout__payment-methods">
                <div class="row">
                  <div class="col-6">
                    <h4>HÌNH THỨC THANH TOÁN</h4>
                  </div>
                  <div class="col-6">
                  </div>
                </div>
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method"
                    id="checkout_payment_method_1" value="bank_transfer" checked>
                  <label class="form-check-label" for="checkout_payment_method_1">
                    Thanh toán qua ngân hàng
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method"
                    id="checkout_payment_method_2" value="momo">
                  <label class="form-check-label" for="checkout_payment_method_2">
                    Thanh toán qua MOMO
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method"
                    id="checkout_payment_method_3" value="cash_on_delivery">
                  <label class="form-check-label" for="checkout_payment_method_3">
                    Thanh toán khi nhận hàng
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="checkout__totals-wrapper">
              <div class="sticky-content">
                <div class="checkout__totals">
                  <h3>Đơn hàng của bạn</h3>
                  <table class="checkout-cart-items">
                    <thead>
                      <tr>
                        <th>SẢN PHẨM</th>
                        <th align="right">TỔNG TIỀN</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($cart->cartDetails as $item)
                      <tr>
                        <td>
                          {{ $item->phoneVariants->phone_variants_name }} x {{ $item->quantity }}
                        </td>
                        <td align="right">
                          {{ number_format($item->phoneVariants->regular_price * $item->quantity, 0, ',', '.') }}đ
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <table class="checkout-totals">
                    <tbody>
                      <tr>
                        <th>PHÍ VẬN CHUYỂN</th>
                        <td align="right">Miễn phí</td>
                      </tr>
                      <tr>
                        <th>TỔNG TIỀN</th>
                        <td align="right">{{ number_format($cart->cartDetails->sum(function($item) {
                          return $item->phoneVariants->regular_price * $item->quantity;
                        }), 0, ',', '.') }}đ</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-center" style="margin-left: -3cm;">
                  <a href="{{ route('cart.index') }}" class="btn btn-secondary mr-2" style="margin-right: 2cm;">Quay lại</a>
                  <button class="btn btn-primary btn-checkout">ĐẶT ĐƠN</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const paymentMethodInputs = document.querySelectorAll('input[name="checkout_payment_method"]');
      const paymentMethodHiddenInput = document.getElementById('payment_method');

      paymentMethodInputs.forEach(input => {
        input.addEventListener('change', function() {
          if (this.checked) {
            paymentMethodHiddenInput.value = this.value;
          }
        });
      });
    });
  </script>
@endsection