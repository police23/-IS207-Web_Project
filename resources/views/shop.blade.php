@extends('layouts.app')
@section('content')

<main class="pt-90">
  <section class="shop-main container d-flex pt-4 pt-xl-5">
    <div class="shop-sidebar side-sticky bg-body" id="shopFilter">
      <div class="aside-header d-flex d-lg-none align-items-center">
        <h3 class="text-uppercase fs-6 mb-0">Bộ lọc</h3>
        <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
      </div>

      <div class="pt-4 pt-lg-0"></div>

      <form method="GET" action="{{ route('shop.index') }}" id="filterForm">
        <div class="accordion" id="categories-list">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-1">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-1" aria-expanded="true" aria-controls="accordion-filter-1">
                Hãng sản xuất
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-1" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-1" data-bs-parent="#categories-list">
              <div class="search-field multi-select accordion-body px-0 pb-0">
                <select class="d-none" multiple name="brand[]">
                  @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                  @endforeach
                </select>
                <ul class="multi-select__list list-unstyled">
                  @foreach($brands as $brand)
                    <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                      <input type="checkbox" name="brand[]" value="{{ $brand->id }}" id="brand-{{ $brand->id }}" style="display: none;" {{ in_array($brand->id, request('brand', [])) ? 'checked' : '' }}>
                      <label for="brand-{{ $brand->id }}">{{ $brand->brand_name }}</label>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion" id="size-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-size">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-size" aria-expanded="true" aria-controls="accordion-filter-size">
                Dung lượng
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-size" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-size" data-bs-parent="#size-filters">
              <div class="search-field multi-select accordion-body px-0 pb-0">
                <select class="d-none" multiple name="storage[]">
                  <option value="1">128GB</option>
                  <option value="2">256GB</option>
                  <option value="3">512GB</option>
                  <option value="4">1 TB</option>
                </select>
                <ul class="multi-select__list list-unstyled">
                  @foreach(['1' => '128GB', '2' => '256GB', '3' => '512GB', '4' => '1 TB'] as $value => $label)
                    <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                      <input type="checkbox" name="storage[]" value="{{ $value }}" id="storage-{{ $label }}" style="display: none;" {{ in_array($value, request('storage', [])) ? 'checked' : '' }}>
                      <label for="storage-{{ $label }}">{{ $label }}</label>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion" id="brand-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-battery">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-battery" aria-expanded="true" aria-controls="accordion-filter-battery">
                Hiệu năng và Pin
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-battery" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-battery" data-bs-parent="#brand-filters">
              <div class="search-field multi-select accordion-body px-0 pb-0">
                <select class="d-none" multiple name="battery[]">
                  <option value="1">Dưới 3000 mah</option>
                  <option value="2">Pin từ 3000 - 4000 mah</option>
                  <option value="3">Pin từ 4000 - 5000 mah</option>
                  <option value="4">Siêu trâu: trên 5000 mah</option>
                </select>
                <ul class="multi-select__list list-unstyled">
                  @foreach(['1' => 'Dưới 3000 mah', '2' => 'Pin từ 3000 - 4000 mah', '3' => 'Pin từ 4000 - 5000 mah', '4' => 'Siêu trâu: trên 5000 mah'] as $value => $label)
                    <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                      <input type="checkbox" name="battery[]" value="{{ $value }}" id="battery-{{ $value }}" style="display: none;" {{ in_array($value, request('battery', [])) ? 'checked' : '' }}>
                      <label for="battery-{{ $value }}">{{ $label }}</label>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion" id="brand-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-os">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-os" aria-expanded="true" aria-controls="accordion-filter-os">
                Hệ điều hành
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-os" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-os" data-bs-parent="#brand-filters">
              <div class="search-field multi-select accordion-body px-0 pb-0">
                <select class="d-none" multiple name="operating_system[]">
                  <option value="iOS">iOS</option>
                  <option value="Android">Android</option>
                </select>
                <ul class="multi-select__list list-unstyled">
                  @foreach(['iOS', 'Android'] as $os)
                    <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                      <input type="checkbox" name="operating_system[]" value="{{ $os }}" id="os-{{ strtolower($os) }}" style="display: none;" {{ in_array($os, request('operating_system', [])) ? 'checked' : '' }}>
                      <label for="os-{{ strtolower($os) }}">{{ $os }}</label>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion" id="brand-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-ram">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-ram" aria-expanded="true" aria-controls="accordion-filter-ram">
                RAM
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-ram" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-ram" data-bs-parent="#brand-filters">
              <div class="search-field multi-select accordion-body px-0 pb-0">
                <select class="d-none" multiple name="ram[]">
                  <option value="3GB">3GB</option>
                  <option value="4GB">4GB</option>
                  <option value="6GB">6GB</option>
                  <option value="8GB">8GB</option>
                  <option value="12GB">12GB</option>
                </select>
                <ul class="multi-select__list list-unstyled">
                  @foreach(['3GB', '4GB', '6GB', '8GB', '12GB'] as $ram)
                    <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                      <input type="checkbox" name="ram[]" value="{{ $ram }}" id="ram-{{ $ram }}" style="display: none;" {{ in_array($ram, request('ram', [])) ? 'checked' : '' }}>
                      <label for="ram-{{ $ram }}">{{ $ram }}</label>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion" id="price-filters">
          <div class="accordion-item mb-4">
            <h5 class="accordion-header mb-2" id="accordion-heading-price">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-price" aria-expanded="true" aria-controls="accordion-filter-price">
                Mức giá
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-price" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-price" data-bs-parent="#price-filters">
              <input class="price-range-slider" type="text" name="price_range" value="{{ request('price_range', '200000,50000000') }}" data-slider-min="200000"
                data-slider-max="50000000" data-slider-step="5" data-slider-value="[200000,50000000]" data-currency="đ" />
              <div class="price-range__info d-flex align-items-center mt-2">
                <div class="me-auto">
                  <span class="text-secondary">Mức thấp nhất: </span>
                  <span class="price-range__min">{{ number_format(200000, 0, ',', '.') }}đ</span>
                </div>
                <div>
                  <span class="text-secondary">Mức cao nhất: </span>
                  <span class="price-range__max">{{ number_format(50000000, 0, ',', '.') }}đ</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Áp dụng bộ lọc</button>
      </form>
    </div>

    <div class="shop-list flex-grow-1">
      <div class="swiper-container js-swiper-slider slideshow slideshow_small slideshow_split" data-settings='{
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": 1,
          "effect": "fade",
          "loop": true,
          "pagination": {
            "el": ".slideshow-pagination",
            "type": "bullets",
            "clickable": true
          }
        }'>
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
              <div class="slide-split_text position-relative d-flex align-items-center"
                style="background-color: #ffffff;">
                <div class="slideshow-text container p-3 p-xl-5">
                  <h2
                    class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                    Apple<br /><strong>iPhone 16 Pro Max</strong></h2>
                  <p class="mb-0 animate animate_fade animate_btt animate_delay-5"></h6>
                </div>
              </div>
              <div class="slide-split_media position-relative">
                <div class="slideshow-bg" style="background-color: #ffffff;">
                  <img loading="lazy" src="assets/images/shop/shop_banner1.jpg" width="630" height="450"
                    alt="Women's accessories" class="slideshow-bg__img object-fit-cover" />
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
              <div class="slide-split_text position-relative d-flex align-items-center"
                style="background-color: #ffffff;">
                <div class="slideshow-text container p-3 p-xl-5">
                  <h2
                    class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                    Samsung<br /><strong>Galaxy Z Fold6</strong></h2>
                  <p class="mb-0 animate animate_fade animate_btt animate_delay-5"></h6>
                </div>
              </div>
              <div class="slide-split_media position-relative">
                <div class="slideshow-bg" style="background-color: #ffffff;">
                  <img loading="lazy" src="assets/images/shop/shop_banner2.jpg" width="630" height="450"
                    alt="Women's accessories" class="slideshow-bg__img object-fit-cover" />
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
              <div class="slide-split_text position-relative d-flex align-items-center"
                style="background-color: #ffffff;">
                <div class="slideshow-text container p-3 p-xl-5">
                  <h2
                    class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                    OPPO<br /><strong>Reno12 Series</strong></h2>
                  <p class="mb-0 animate animate_fade animate_btt animate_delay-5"></h6>
                </div>
              </div>
              <div class="slide-split_media position-relative">
                <div class="slideshow-bg" style="background-color: #ffffff;">
                  <img loading="lazy" src="assets/images/shop/shop_banner3.jpg" width="630" height="450"
                    alt="Women's accessories" class="slideshow-bg__img object-fit-cover" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container p-3 p-xl-5">
          <div class="slideshow-pagination d-flex align-items-center position-absolute bottom-0 mb-4 pb-xl-2"></div>

        </div>
      </div>

      <div class="mb-3 pb-2 pb-xl-3"></div>

      <div class="d-flex justify-content-between mb-4 pb-md-2">
        <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
          <a href="index.html" class="menu-link menu-link_us-s text-uppercase fw-medium">Trang chủ</a>
          <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
          <a href="shop.html" class="menu-link menu-link_us-s text-uppercase fw-medium">Sản phẩm</a>
        </div>

        <div class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
          <style>
            .shop-acs__select {
              background-color: #f8f9fa;
              border: 1px solid #ced4da;
              border-radius: 0.25rem;
              padding: 0.375rem 1.75rem 0.375rem 0.75rem;
              font-size: 1rem;
              line-height: 1.5;
              color: #495057;
              transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
            .shop-acs__select:focus {
              border-color: #80bdff;
              outline: 0;
              box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            }
          </style>
          <select class="shop-acs__select form-select w-auto border-0 py-0 order-1 order-md-0" aria-label="Sort Items" name="sort" id="sortSelect">
            <option value="az">A - Z</option>
            <option value="za">Z - A</option>
            <option value="price_asc">Giá thấp - cao</option>
            <option value="price_desc">Giá cao - thấp</option>
          </select>
          <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>
          <div class="shop-filter d-flex align-items-center order-0 order-md-3 d-lg-none">
            <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside" data-aside="shopFilter">
              <svg class="d-inline-block align-middle me-2" width="14" height="10" viewBox="0 0 14 10" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_filter" />
              </svg>
              <span class="text-uppercase fw-medium d-inline-block align-middle">Bộ lọc</span>
            </button>
          </div>
        </div>
      </div>

      <div class="products-grid row row-cols-2 row-cols-md-3" id="products-grid">
        @foreach($phoneVariants as $phone)
        <div class="product-card-wrapper">
          <div class="product-card mb-3 mb-md-4 mb-xxl-5">
            <div class="pc__img-wrapper">
              <a href="{{ route('phone.show', ['id' => $phone->id]) }}"><img loading="lazy" src="{{ url('uploads/phones/thumbnails/' . $phone->image) }}" width="330" height="400" alt="{{ $phone->phone_variants_name }}" class="pc__img"></a>
          
            </div>
            <div class="pc__info position-relative">
      
              <h6 class="pc__title"><a href="{{ route('phone.show', ['id' => $phone->id]) }}">{{ $phone->phone_variants_name }}</a></h6>
              <div class="product-card__price d-flex">
                <span class="money price text-secondary">{{ number_format($phone->regular_price, 0, ',', '.') }} đ</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</main>

<style>
  .pc__img-wrapper {
    overflow: hidden;
  }
  .pc__img {
    transition: transform 0.3s ease;
  }
  .pc__img-wrapper:hover .pc__img {
    transform: scale(1.1);
  }
</style>

<script>
  document.getElementById('sortSelect').addEventListener('change', function() {
    const sortValue = this.value;
    const productsGrid = document.getElementById('products-grid');
    let products = Array.from(productsGrid.getElementsByClassName('product-card-wrapper'));

    if (sortValue === 'za') {
      products.sort((a, b) => {
        const nameA = a.querySelector('.pc__title a').textContent.toUpperCase();
        const nameB = b.querySelector('.pc__title a').textContent.toUpperCase();
        return nameB.localeCompare(nameA);
      });
    } else if (sortValue === 'az') {
      products.sort((a, b) => {
        const nameA = a.querySelector('.pc__title a').textContent.toUpperCase();
        const nameB = b.querySelector('.pc__title a').textContent.toUpperCase();
        return nameA.localeCompare(nameB);
      });
    } else if (sortValue === 'price_asc') {
      products.sort((a, b) => {
        const priceA = parseFloat(a.querySelector('.price').textContent.replace('đ', '').replace(/\./g, ''));
        const priceB = parseFloat(b.querySelector('.price').textContent.replace('đ', '').replace(/\./g, ''));
        return priceA - priceB;
      });
    } else if (sortValue === 'price_desc') {
      products.sort((a, b) => {
        const priceA = parseFloat(a.querySelector('.price').textContent.replace('đ', '').replace(/\./g, ''));
        const priceB = parseFloat(b.querySelector('.price').textContent.replace('đ', '').replace(/\./g, ''));
        return priceB - priceA;
      });
    }

    productsGrid.innerHTML = '';
    products.forEach(product => productsGrid.appendChild(product));
  });

  document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filterForm');
    const productsGrid = document.getElementById('products-grid');

    const fetchFilteredProducts = () => {
      const formData = new FormData(filterForm);
      const queryString = new URLSearchParams(formData).toString();

      fetch(`{{ route('shop.index') }}?${queryString}`, {
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(response => response.json())
      .then(data => {
        productsGrid.innerHTML = '';
        data.forEach(phone => {
          const productCard = `
            <div class="product-card-wrapper">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="{{ url('phone') }}/${phone.id}"><img loading="lazy" src="{{ url('uploads/phones/thumbnails') }}/${phone.image}" width="330" height="400" alt="${phone.phone_variants_name}" class="pc__img"></a>
                </div>
                <div class="pc__info position-relative">
                  <h6 class="pc__title"><a href="{{ url('phone') }}/${phone.id}">${phone.phone_variants_name}</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price text-secondary">${new Intl.NumberFormat('vi-VN').format(phone.regular_price)} đ</span>
                  </div>
                </div>
              </div>
            </div>
          `;
          productsGrid.insertAdjacentHTML('beforeend', productCard);
        });
      });
    };

    filterForm.addEventListener('change', fetchFilteredProducts);

    filterForm.addEventListener('submit', function(event) {
      event.preventDefault();
      fetchFilteredProducts();
    });
  });
</script>

@endsection