@extends('layouts.app')
@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Xác nhận đơn hàng</h2>
      <div class="checkout-steps">
        <a href="{{ route('cart.index') }}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Giỏ hàng</span>
            <em>Danh sách sản phẩm bạn đã chọn</em>
          </span>
        </a>
        <a href="{{ route('checkout.index') }}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Vận chuyển và thanh toán</span>
            <em>Thanh toán đơn hàng của bạn</em>
          </span>
        </a>
        <a href="{{ route('order.confirmation') }}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Xác nhận đơn hàng</span>
            <em>Xem lại và xác nhận đơn hàng của bạn</em>
          </span>
        </a>
      </div>
      <div class="order-complete">
        <div class="order-complete__message">
          <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="40" cy="40" r="40" fill="#7E3AF2" />
            <path
              d="M52.9743 35.7612C52.9743 35.3426 52.8069 34.9241 52.5056 34.6228L50.2288 32.346C49.9275 32.0446 49.5089 31.8772 49.0904 31.8772C48.6719 31.8772 48.2533 32.0446 47.952 32.346L36.9699 43.3449L32.048 38.4062C31.7467 38.1049 31.3281 37.9375 30.9096 37.9375C30.4911 37.9375 30.0725 38.1049 29.7712 38.4062L27.4944 40.683C27.1931 40.9844 27.0257 41.4029 27.0257 41.8214C27.0257 42.24 27.1931 42.6585 27.4944 42.9598L33.5547 49.0201L35.8315 51.2969C36.1328 51.5982 36.5513 51.7656 36.9699 51.7656C37.3884 51.7656 37.8069 51.5982 38.1083 51.2969L40.385 49.0201L52.5056 36.8996C52.8069 36.5982 52.9743 36.1797 52.9743 35.7612Z"
              fill="white" />
          </svg>
          <h3>Đơn hàng của bạn đã được xác nhận!</h3>
          <p>Cảm ơn. Đơn hàng của bạn đã được xác nhận!</p>
        </div>
        <div class="order-info">
          <table class="table" style="background-color: white; color: black; font-size: 1.1em;">
            <tbody>
              <tr>
                <th style="background-color: white; color: black; text-align: left; width: 50%;">Mã đơn hàng</th>
                <td style="text-align: left; padding-left: 10px;">{{ $order->order_id }}</td>
              </tr>
              <tr>
                <th style="background-color: white; color: black; text-align: left; width: 50%;">Ngày đặt hàng</th>
                <td style="text-align: left; padding-left: 10px;">{{ $order->created_at->format('d/m/Y') }}</td>
              </tr>
              <tr>
                <th style="background-color: white; color: black; text-align: left; width: 45%;">Tổng thanh toán</th>
                <td style="text-align: left; padding-left: 10px;">{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
              </tr>
              <tr>
                <th style="background-color: white; color: black; text-align: left; width: 45%;">Phương thức thanh toán</th>
                <td style="text-align: left; padding-left: 10px;">{{ $order->payment_method }}</td>
              </tr>
              <tr>
                <th style="background-color: white; color: black; text-align: left; width: 45%;">Địa chỉ giao hàng</th>
                <td style="text-align: left; padding-left: 10px;">{{ $order->delivery_address }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="checkout__totals-wrapper">
          <div class="checkout__totals">
            <h3>Chi tiết đơn hàng</h3>
            <table class="checkout-cart-items">
              <thead>
                <tr>
                  <th>SẢN PHẨM</th>
                  <th align="right">TỔNG TIỀN</th>
                </tr>
              </thead>
              <tbody>
                @foreach($order->orderDetails as $item)
                <tr>
                  <td>
                    {{ $item->phoneVariant->phone_variants_name }} x {{ $item->quantity }}
                  </td>
                  <td align="right">
                    {{ number_format($item->price * $item->quantity, 0, ',', '.') }}đ
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <table class="checkout-totals">
              <tbody>
                <tr>
                  <th>TỔNG TIỀN</th>
                  <td align="right">{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
                </tr>
                <tr>
                  <th>PHÍ VẬN CHUYỂN</th>
                  <td align="right">Miễn phí vận chuyển</td>
                </tr>
                <tr>
                  <th>SỐ TIỀN PHẢI THANH TOÁN</th>
                  <td align="right">{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="d-flex justify-content-center mt-4" style="margin-top: 5px;">
          <a href="{{ route('home.index') }}" class="btn btn-primary rounded-pill">Quay về trang chủ</a>
        </div>
      </div>
    </section>
  </main>
@endsection