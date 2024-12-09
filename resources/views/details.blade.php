@extends('layouts.app')
@section('content')

<main class="pt-90">
  <div class="mb-md-1 pb-md-3"></div>
  @if(session('success'))
    <div id="success-message" class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  <section class="product-single container">
    <div class="row">
      <div class="col-lg-7">
        <div class="product-single__media" data-media-type="vertical-thumbnail">
          <div class="product-single__image">
            <div class="product-single__image-item">
              <img loading="lazy" class="h-auto" src="{{ url('uploads/phones/thumbnails/'. $phoneVariant->image) }}" width="674" height="674" alt="{{ $phoneVariant->phone_variants_name }}" />
              <a data-fancybox="gallery" href="{{ url('uploads/phones/thumbnails/'. $phoneVariant->image) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_zoom" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="d-flex justify-content-between mb-4 pb-md-2">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <a href="index.html" class="menu-link menu-link_us-s text-uppercase fw-medium">Trang chủ</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="shop.html" class="menu-link menu-link_us-s text-uppercase fw-medium">Sản phẩm</a>
          </div><!-- /.breadcrumb -->

          <div
            class="product-single__prev-next d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
          </div><!-- /.shop-acs -->
        </div>
        <h1 class="product-single__name">{{ $phoneVariant->phone_variants_name }}</h1>
        <div class="product-single__rating">
          <div class="reviews-group d-flex">
            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star" />
            </svg>
            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star" />
            </svg>
            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star" />
            </svg>
            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star" />
            </svg>
            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star" />
            </svg>
          </div>
          <span class="reviews-note text-lowercase text-secondary ms-1">8k+ đánh giá</span>
        </div>
        <div class="product-single__price">
          <span class="current-price" style="color: red;">{{$phoneVariant->regular_price}} đ</span>
        </div>
        <div style="margin: 10px 0;">
          <label for="color-options" style="font-weight: bold; display: block; margin-bottom: 5px; font-size: 18px;">Chọn màu sắc:</label>
          <div id="color-options" style="display: flex; gap: 10px;">
            @foreach($phoneVariants->unique('color') as $variant)
              @php
                $colorVariant = $phoneVariants->where('color', $variant->color)->where('storage_id', $phoneVariant->storage_id)->first();
              @endphp
              @if($colorVariant)
                <a href="{{ url('phone/' . $colorVariant->id) }}" style="width: auto; height: 40px; border: 2px solid {{ $phoneVariant->color == $variant->color ? '#007bff' : '#ccc' }}; border-radius: 5px; padding: 0 15px; background-color: #f8f9fa; font-size: 16px;">{{ $variant->color }}</a>
              @endif
            @endforeach
          </div>
        </div>
        <div style="margin: 10px 0;">
          <label for="storage-options" style="font-weight: bold; display: block; margin-bottom: 5px; font-size: 18px;">Chọn dung lượng:</label>
          <div id="storage-options" style="display: flex; gap: 10px;">
            @foreach($storages as $storage)
              @php
                $storageVariant = $phoneVariants->where('color', $phoneVariant->color)->where('storage.storage_size', $storage)->first();
              @endphp
              @if($storageVariant)
                <a href="{{ url('phone/' . $storageVariant->id) }}" style="width: auto; height: 40px; border: 2px solid {{ $phoneVariant->storage->storage_size == $storage ? '#007bff' : '#ccc' }}; border-radius: 5px; padding: 0 15px; background-color: #f8f9fa; font-size: 16px;">{{ $storage }}</a>
              @endif
            @endforeach
          </div>
        </div>               
        <div class="product-single__short-desc">
        </div>
        <form name="addtocart-form" method="post" action="{{ route('phone.add_to_cart', ['id' => $phoneVariant->id]) }}">
          @csrf
          <input type="hidden" name="phone_variant_id" value="{{ $phoneVariant->id }}">
          <div class="product-single__addtocart">
            <!-- Removed quantity input section -->
            <button type="submit" class="btn btn-primary btn-addtocart">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 5px;">
                <use href="#icon_cart" />
              </svg>
              Thêm vào giỏ hàng
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="product-single__details-tab" style="margin-top: -5px;">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore active" id="tab-description-tab" data-bs-toggle="tab"
            href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Mô tả sản phẩm</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore" id="tab-additional-info-tab" data-bs-toggle="tab"
            href="#tab-additional-info" role="tab" aria-controls="tab-additional-info"
            aria-selected="false">Thông số</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore" id="tab-reviews-tab" data-bs-toggle="tab" href="#tab-reviews"
            role="tab" aria-controls="tab-reviews" aria-selected="false">Đánh giá (2)</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-description" role="tabpanel" aria-labelledby="tab-description-tab">
          <div class="product-single__description">
            <h3 class="block-title mb-4">{{ $phone->description }}</h3>
          </div>
        </div>
        <div class="tab-pane fade" id="tab-additional-info" role="tabpanel" aria-labelledby="tab-additional-info-tab">
          <div class="product-single__addtional-info d-flex justify-content-center" style="margin-left: 1.5cm;">
            <table class="table table-bordered text-center" style="max-width: 600px;">
              <tbody>
                <tr style="border-top: 1px solid lightgray;">
                  <th scope="row" style="background-color: white; color: black; width: 200px; text-align: left;">Màn hình</th>
                  <td>{{ $phone->screen_size }}</td>
                </tr>
                <tr style="border-top: 1px solid lightgray;">
                  <th scope="row" style="background-color: white; color: black; width: 200px; text-align: left;">Hệ điều hành</th>
                  <td>{{ $phone->operating_system }}</td>
                </tr>
                <tr style="border-top: 1px solid lightgray;">
                  <th scope="row" style="background-color: white; color: black; width: 200px; text-align: left;">Chip xử lý</th>
                  <td>{{ $phone->processor }}</td>
                </tr>
                <tr style="border-top: 1px solid lightgray;">
                  <th scope="row" style="background-color: white; color: black; width: 200px; text-align: left;">RAM</th>
                  <td>{{ $phone->ram }}</td>
                </tr>
                <tr style="border-top: 1px solid lightgray;">
                  <th scope="row" style="background-color: white; color: black; width: 200px; text-align: left;">Dung lượng</th>
                  <td>{{ $phoneVariant->storage->storage_size }}</td>
                </tr>
                <tr style="border-top: 1px solid lightgray;">
                  <th scope="row" style="background-color: white; color: black; width: 200px; text-align: left;">Pin</th>
                  <td>{{ $phone->battery }}</td>
                </tr>
                <tr style="border-top: 1px solid lightgray;">
                  <th scope="row" style="background-color: white; color: black; width: 200px; text-align: left;">Ngày ra mắt</th>
                  <td>{{ $phone->release_date }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-tab">
          <h2 class="product-single__reviews-title">Đánh giá</h2>
          <div class="product-single__reviews-list">
            <div class="product-single__reviews-item">
              <div class="customer-avatar">
                <img loading="lazy" src="assets/images/avatar.jpg" alt="" />
              </div>
              <div class="customer-review">
                <div class="customer-name">
                  <h6>Janice Miller</h6>
                  <div class="reviews-group d-flex">
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                  </div>
                </div>
                <div class="review-date">April 06, 2023</div>
                <div class="review-text">
                  <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                    maxime placeat facere possimus, omnis voluptas assumenda est…</p>
                </div>
              </div>
            </div>
            <div class="product-single__reviews-item">
              <div class="customer-avatar">
                <img loading="lazy" src="assets/images/avatar.jpg" alt="" />
              </div>
              <div class="customer-review">
                <div class="customer-name">
                  <h6>Benjam Porter</h6>
                  <div class="reviews-group d-flex">
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                  </div>
                </div>
                <div class="review-date">April 06, 2023</div>
                <div class="review-text">
                  <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                    maxime placeat facere possimus, omnis voluptas assumenda est…</p>
                </div>
              </div>
            </div>
          </div>
          <div class="product-single__review-form">
            <form name="customer-review-form">
              <div class="select-star-rating">
                <label>Đánh giá của bạn *</label>
                <span class="star-rating">
                  <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                  </svg>
                  <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                  </svg>
                  <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                  </svg>
                  <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                  </svg>
                </span>
                <input type="hidden" id="form-input-rating" value="" />
              </div>
              <div class="mb-4">
                <textarea id="form-input-review" class="form-control form-control_gray" placeholder="Đánh giá của bạn"
                  cols="30" rows="8"></textarea>
              </div>
              <div class="form-action">
                <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
      setTimeout(() => {
        successMessage.style.transition = 'opacity 3s';
        successMessage.style.opacity = '0';
        setTimeout(() => {
          successMessage.style.display = 'none';
        }, 3000);
      }, 3000);
    }
  });
</script>

@endsection