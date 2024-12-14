@extends('layouts.app')

@section('content')

<main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Thông tin đơn hàng</h2>
      <div class="row">
        <div class="col-lg-2">
        @include('user.account-nav')
        </div>

        <div class="col-lg-10">
          <div class="wg-box mt-5 mb-5">
            <div class="row">
              <div class="col-6">
                <h5>Thông tin đơn hàng</h5>
              </div>
              <div class="col-6 text-right">
                <!-- Removed the "Quay lại" button from here -->
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-transaction">
                <thead style="background-color: #7e3af2; color: white !important;">
                  <tr>
                    <th>Mã đơn</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt hàng</th>
                    <th>Địa chỉ giao hàng</th>
                    <th>Ngày nhận hàng</th>
                    <th>Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->user->phonenumber }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->delivery_address }}</td>
                    <td>{{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('d/m/Y') : 'Chưa nhận' }}</td>
                    <td>
                        @if($order->status == 'Canceled')
                        <span class="badge" style="background-color: #dc3545; color: white;">Đã huỷ</span>
                        @elseif($order->status == 'Ordered')
                        <span class="badge" style="background-color: #ffc107; color: black;">Đã đặt</span>
                        @elseif($order->status == 'Delivered')
                        <span class="badge" style="background-color: #28a745; color: white;">Đã giao</span>
                        @else
                        <span class="badge" style="background-color: #28a745; color: white;">{{ $order->status }}</span>
                        @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="wg-box wg-table table-all-user">
            <div class="row">
              <div class="col-6">
                <h5>Sản phẩm</h5>
              </div>
              <div class="col-6 text-right">

              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead style="background-color: #7e3af2; color: white !important;">
                  <tr>
                    <th class="text-center">Tên sản phẩm</th>
                    <th class="text-center">Giá</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Thành tiền</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($order->orderDetails as $detail)
                    <tr>
                        <td class="pname">
                            <div class="name">
                                <a href="{{ route('phone.show', $detail->phoneVariant->phone->id) }}" target="_blank" class="body-title-2">{{ $detail->phoneVariant->phone_variants_name }}</a>
                                <ul class="shopping-cart__product-item__options">
                                    <li>Màu sắc: {{ $detail->phoneVariant->color }}</li>
                                </ul>
                            </div>
                        </td>
                        <td class="text-center">{{ number_format($detail->price, 0, ',', '.') }}đ</td>
                        <td class="text-center">{{ $detail->quantity }}</td>
                        <td class="text-center">{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}đ</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="divider"></div>
          <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

          </div>

          <div class="wg-box mt-5">
            <h5>Giao dịch</h5>
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-transaction">
                <thead style="background-color: #7e3af2; color: white !important;">
                  <tr>
                    <th>Tổng tiền</th>
                    <th>Phí ship</th>
                    <th>Tổng thanh toán</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
                    <td>{{ number_format($order->shipping_fee, 0, ',', '.') }}đ</td>
                    <td>{{ number_format($order->total_price + $order->shipping_fee, 0, ',', '.') }}đ</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="wg-box mt-5 text-right">
            @if($order->status != 'Canceled' && $order->status != 'Delivered')
            <form id="cancel-order-form" action="{{ route('account.cancel_order', $order->order_id) }}" method="POST" onsubmit="return confirmCancelOrder()" style="display: inline;">
              @csrf
              @method('PUT')
              <button type="submit" class="btn btn-danger" style="height: 38px; margin-right: 1cm;">Huỷ đơn hàng</button>
            </form>
            @endif
            <a class="btn btn-sm btn-secondary" href="{{ route('account.orders') }}" style="height: 38px; line-height: 28px;">Quay lại</a>
          </div>
        </div>

      </div>
    </section>
  </main>
@endsection

<script>
function confirmCancelOrder() {
  return confirm('Bạn có chắc chắn muốn hủy đơn hàng?');
}
</script>