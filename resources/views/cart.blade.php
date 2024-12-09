@extends('layouts.app')
@section('content')

<form id="update-cart-form" action="{{ route('cart.update') }}" method="POST">
  @csrf
  <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container cart-expanded product-list-expanded">
      <h2 class="page-title">Giỏ hàng</h2>
      <div class="checkout-steps">
        <a href="{{ route('cart.index') }}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Giỏ hàng</span>
            <em>Danh sách sản phẩm bạn đã chọn</em>
          </span>
        </a>
        <a href="{{ route('checkout.index') }}" class="checkout-steps__item">
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
      <div class="shopping-cart">
        <div class="cart-table__wrapper">
          @if($cart && $cart->cartDetails->isNotEmpty())
          
          <table class="cart-table">
            <thead>
              <tr>
                <th>SẢN PHẨM</th>
                <th></th>
                <th>GIÁ</th>
                <th>SỐ LƯỢNG</th>
                <th>TỔNG TIỀN</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              @foreach($cart->cartDetails as $item)

              <tr>
                <td>
                  <div class="shopping-cart__product-item">
                    @if($item->phoneVariants && $item->phoneVariants->phone)
                      <img loading="lazy" src="{{ url('uploads/phones/thumbnails/'.$item->phoneVariants->image)}}" width="120" height="120" alt="{{ $item->phoneVariants->phone_variants_name }}" />
                    @else
                      <img loading="lazy" src="{{ url('uploads/phones/thumbnails/default.png')}}" width="120" height="120" alt="No image available" />
                    @endif
                  </div>
                </td>
                <td>
                  <div class="shopping-cart__product-item__detail">
                    @if($item->phoneVariants)
                      <h4>{{ $item->phoneVariants->phone_variants_name }}</h4>
                      <ul class="shopping-cart__product-item__options">
                        <li>Màu sắc: {{ $item->phoneVariants->color }}</li>
                        <li>Dung lượng: {{ $item->phoneVariants->storage->storage_size }}</li>
                      </ul>
                    @else
                      <h4>Product details not available</h4>
                    @endif
                  </div>
                </td>
                <td>
                  @if($item->phoneVariants)
                    <span class="shopping-cart__product-price">{{ number_format($item->phoneVariants->regular_price, 0, ',', '.') }}đ</span>
                  @else
                    <span class="shopping-cart__product-price">N/A</span>
                  @endif
                </td>
                <td>
                  <div class="qty-control position-relative">
                    <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}"  class="qty-control__number text-center qty-control__number--small" data-price="{{ $item->phoneVariants->regular_price }}" data-id="{{ $item->id }}" data-max="{{ $item->phoneVariants->quantity }}">
                  </div>
                </td>
                <td>
                  @if($item->phoneVariants)
                    <span class="shopping-cart__subtotal" id="subtotal-{{ $item->id }}">{{ number_format($item->phoneVariants->regular_price, 0, ',', '.') }}đ</span>
                  @else
                    <span class="shopping-cart__subtotal">N/A</span>
                  @endif
                </td>
                <td>
                  <button class="btn btn-danger btn-sm delete-button" data-id="{{ $item->id }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
              <td colspan="6">
                <div class="quantity-error text-danger" id="error-{{ $item->id }}" style="display: none; font-size: 0.75rem; padding: 0.05rem; border: none;">Sản phẩm không đủ số lượng</div>
              </td>
              <tr>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <div class="empty-cart text-center d-flex flex-column align-items-center justify-content-center" style="height: 300px;">
            <i class="fas fa-shopping-cart fa-5x"></i>
            <p style="font-size: 1.5rem;"><strong>Giỏ hàng trống</strong><br>Không có sản phẩm nào trong giỏ hàng</p>
            <a href="{{ url('/') }}" class="btn btn-primary mt-3" style="margin-top: 2cm; border-radius: 25px;">Về trang chủ</a>
          </div>
          @endif
        </div>
        @if($cart && $cart->cartDetails->isNotEmpty())
       
        <div class="shopping-cart__totals-wrapper">
          <div class="sticky-content">
            <div class="shopping-cart__totals">
              <h3>Tổng tiền giỏ hàng</h3>
              <table class="cart-totals">
                <tbody>
                  <tr>
                    <th>Tổng tiền</th>
                    <td id="total-price">280.410.000đ</td>
                  </tr>
                  <tr>
                    <th>Phí vận chuyển</th>
                    <td>
                      <div class="form-check">
                      Miễn phí
                      </div>
                      </td>
                  </tr>

                  <tr>
                    <th>Thanh toán</th>
                    <td id="total-payment">280.410.000đ</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mobile_fixed-btn_wrapper">
              <div class="button-wrapper container">
                <button type="submit" class="btn btn-primary btn-checkout" style="display: flex; align-items: center; justify-content: center;">XÁC NHẬN MUA HÀNG</button>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </section>
  </main>
</form>

  <style>
    
    .cart-expanded {
      max-width: 90%;
    }
    .cart-section {
    margin-top: 90px; /* Or adjust as needed */
}
    .product-list-expanded .cart-table__wrapper {
      max-width: 75%;
    }
    .qty-control__number--small {
      width: 60px;
    }
    .btn-danger.btn-sm {
      padding: 0.25rem 0.5rem; /* Adjust padding to make the button smaller */
      font-size: 0.75rem; /* Adjust font size to make the button smaller */
    }
    
    .cart-table {
      border-collapse: collapse;
    }

    .cart-table tbody tr {
      border-bottom: none !important;
    }
    .empty-cart {
      margin-top: 50px;
    }
    .empty-cart i {
      color: #ccc;
    }
  </style>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const qtyControls = document.querySelectorAll('.qty-control__number');
      qtyControls.forEach(control => {
        control.addEventListener('change', updateSubtotal);
        control.addEventListener('wheel', function(event) {
          event.preventDefault();
          const delta = Math.sign(event.deltaY);
          let newValue = parseInt(this.value) - delta;
          if (newValue < 1) newValue = 1;
          this.value = newValue;
          updateSubtotal.call(this);
        });
        updateSubtotal.call(control);
      });

      // Calculate and display the initial total price and total payment
      updateTotalPrice();

      function updateSubtotal() {
        const price = parseFloat(this.dataset.price);
        const id = this.dataset.id;
        const quantity = parseInt(this.value);
        const subtotalElement = document.getElementById(`subtotal-${id}`);
        const errorElement = document.getElementById(`error-${id}`);
        const maxQuantity = parseInt(this.dataset.max);
        if (quantity > maxQuantity) {
          errorElement.style.display = 'block';
        } else {
          errorElement.style.display = 'none';
        }
        const newSubtotal = price * quantity;
        subtotalElement.textContent = newSubtotal.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        updateTotalPrice();
      }

      function updateTotalPrice() {
        let totalPrice = 0;
        document.querySelectorAll('.shopping-cart__subtotal').forEach(subtotal => {
          totalPrice += parseFloat(subtotal.textContent.replace(/\D/g, ''));
        });
        document.getElementById('total-price').textContent = totalPrice.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        document.getElementById('total-payment').textContent = totalPrice.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
      }

      document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function(event) {
          event.preventDefault();
          const confirmed = confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng?');
          if (confirmed) {
            const productId = this.dataset.id;
            fetch(`/cart/${productId}`, {
              method: 'DELETE',
              headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
              }
            })
            .then(response => {
              if (!response.ok) {
                throw new Error('Network response was not ok');
              }
              return response.json();
            })
            .then(data => {
              if (data.success) {
                // Remove the product row from the table
                this.closest('tr').remove();
                // Update the total price
                updateTotalPrice();
                // Check if the cart is empty
                if (document.querySelectorAll('.shopping-cart__subtotal').length === 0) {
                  location.reload(); // Reload the page if the cart is empty
                }
              } else {
                alert('Failed to delete the product. Please try again.');
              }
            })
            .catch(error => {
              console.error('Error:', error);
              alert('Failed to delete the product.');
            });
          }
        });
      });
    });
  </script>
@endsection