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
              <div class="accordion-body px-0 pb-0 pt-3">
                <ul class="list list-inline mb-0">
                  <li class="list-item">
                    <a href="#" class="menu-link py-1">Apple</a>
                  </li>
                  <li class="list-item">
                    <a href="#" class="menu-link py-1">Samsung</a>
                  </li>
                  <li class="list-item">
                    <a href="#" class="menu-link py-1">OPPO</a>
                  </li>
                  <li class="list-item">
                    <a href="#" class="menu-link py-1">Xiaomi</a>
                  </li>
                  <li class="list-item">
                    <a href="#" class="menu-link py-1">Nokia</a>
                  </li>
                  <li class="list-item">
                    <a href="#" class="menu-link py-1">Realme</a>
                  </li>
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
              <div class="accordion-body px-0 pb-0">
                <div class="d-flex flex-wrap">
                  <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">256</a>
                  <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">512</a>
                  <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">1 TB</a>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="accordion" id="brand-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-brand">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-brand" aria-expanded="true" aria-controls="accordion-filter-brand">
                Hiệu năng và Pin
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-brand" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-brand" data-bs-parent="#brand-filters">
              <div class="search-field multi-select accordion-body px-0 pb-0">
                <select class="d-none" multiple name="total-numbers-list">
                  <option value="1">Dưới 3000 mah</option>
                  <option value="2">Pin từ 3000 - 4000 mah</option>
                  <option value="3">Pin từ 4000 - 5000 mah</option>
                  <option value="4">Siêu trâu: trên 5000 mah</option>
                  </select>
                <ul class="multi-select__list list-unstyled">
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Dưới 3000 mah</span>
                    </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Pin từ 3000 - 4000 mah</span>
                    </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Pin từ 4000 - 5000 mah</span>
                    </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Siêu trâu: trên 5000 mah</span>
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion" id="brand-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-brand">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-brand" aria-expanded="true" aria-controls="accordion-filter-brand">
                Hệ điều hành
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-brand" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-brand" data-bs-parent="#brand-filters">
              <div class="search-field multi-select accordion-body px-0 pb-0">
                <select class="d-none" multiple name="total-numbers-list">
                  <option value="1">iOS</option>
                  <option value="2">Android</option>
                  </select>
                <ul class="multi-select__list list-unstyled">
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">iOS</span>
                    </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Android</span>
                    </li>
                  </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion" id="brand-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-brand">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-brand" aria-expanded="true" aria-controls="accordion-filter-brand">
                Màn hình
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-brand" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-brand" data-bs-parent="#brand-filters">
              <div class="search-field multi-select accordion-body px-0 pb-0">
                <select class="d-none" multiple name="total-numbers-list">
                  <option value="1">Màn hình nhỏ</option>
                  <option value="2">Dưới 5.0 inch</option>
                  <option value="3">Dưới 6.0 inch</option>
                  </select>
                <ul class="multi-select__list list-unstyled">
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Màn hình nhỏ</span>
                    </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Dưới 5.0 inch</span>
                    </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Dưới 6.0 inch</span>
                    </li>
                  </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion" id="brand-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-brand">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-brand" aria-expanded="true" aria-controls="accordion-filter-brand">
                Hỗ trợ mạng
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path
                      d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-brand" class="accordion-collapse collapse show border-0"
              aria-labelledby="accordion-heading-brand" data-bs-parent="#brand-filters">
              <div class="search-field multi-select accordion-body px-0 pb-0">
                <select class="d-none" multiple name="total-numbers-list">
                  <option value="1">3G</option>
                  <option value="2">4G</option>
                  <option value="3">5G</option>
                  </select>
                <ul class="multi-select__list list-unstyled">
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">3G</span>
                    </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">4G</span>
                    </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">5G</span>
                    </li>
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
              <input class="price-range-slider" type="text" name="price_range" value="" data-slider-min="200000"
                data-slider-max="50000000" data-slider-step="5" data-slider-value="[200000,50000000]" data-currency="đ" />
              <div class="price-range__info d-flex align-items-center mt-2">
                <div class="me-auto">
                  <span class="text-secondary">Mức thấp nhất: </span>
                  <span class="price-range__min">200000</span>
                </div>
                <div>
                  <span class="text-secondary">Mức cao nhất: </span>
                  <span class="price-range__max">50000000</span>
                </div>
              </div>
            </div>
          </div>
        </div>
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
            <select class="shop-acs__select form-select w-auto border-0 py-0 order-1 order-md-0" aria-label="Sort Items"
              name="total-number">
              <option selected>Mặc định</option>
              <option value="1">Nổi bật</option>
              <option value="2">Bán chạy</option>
              <option value="3">A-Z</option>
              <option value="3">Z-A</option>
              <option value="3">Thấp nhất</option>
              <option value="3">Cao nhất</option>
              <option value="3">Cũ nhất</option>
              <option value="3">Mới nhất</option>
            </select>

            <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>

            <div class="col-size align-items-center order-1 d-none d-lg-flex">
              <span class="text-uppercase fw-medium me-2">Xem</span>
              <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="2">2</button>
              <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="3">3</button>
              <button class="btn-link fw-medium js-cols-size" data-target="products-grid" data-cols="4">4</button>
            </div>

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
          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_1.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_1-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Thêm vào giỏ">Thêm vào giỏ</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Xiaomi</p>
                <h6 class="pc__title"><a href="details.html">OPPO Reno12 F 5G 8GB</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price-old">9.490.000đ</span>
                  <span class="money price text-secondary">8.690.000đ</span>
                </div>
                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Yêu thích">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_2.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_2-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Thêm vào giỏ">Thêm vào giỏ</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Samsung</p>
                <h6 class="pc__title"><a href="details.html">Samsung Galaxy A35 5G</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price-old">8.290.000đ</span>
                  <span class="money price text-secondary">7.690.000đ</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Yêu thích">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_3.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_3-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Thêm vào giỏ">Thêm vào giỏ</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Xiaomi</p>
                <h6 class="pc__title"><a href="details.html">Xiaomi Redmi Note 13 6GB</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price-old">4.890.000đ</span>
                  <span class="money price text-secondary">3.990.000đ</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Yêu thích">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_4.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_4-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Thêm vào giỏ">Thêm vào giỏ</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Apple</p>
                <h6 class="pc__title"><a href="details.html">iPhone 15 Pro Max</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price-old">34.990.000đ</span>
                  <span class="money price text-secondary">29.590.000đ</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Yêu thích">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_5.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_5-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Thêm vào giỏ">Thêm vào giỏ</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Apple</p>
                <h6 class="pc__title"><a href="details.html">iPhone 16 Pro Max</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price-old">34.990.000đ</span>
                  <span class="money price text-secondary">33.790.000đ</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Yêu thích">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
              <div class="pc-labels position-absolute top-0 start-0 w-100 d-flex justify-content-between">
                <div class="pc-labels__left">
                  <span class="pc-label pc-label_new d-block bg-white">Mới</span>
                </div>
              </div>
            </div>
          </div>

          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_6.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_6-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Thêm vào giỏ">Thêm vào giỏ</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Samsung</p>
                <h6 class="pc__title"><a href="details.html">Samsung Galaxy Z Fold6 5G</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price-old">43.990.000đ</span>
                  <span class="money price text-secondary">41.990.000đ</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Yêu thích">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_7.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_7-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Thêm vào giỏ">Thêm vào giỏ</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">OPPO</p>
                <h6 class="pc__title"><a href="details.html">OPPO Find X8 5G 16GB</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">22.990.000đ</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Yêu thích">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_8.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_8-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Thêm vào giỏ">Thêm vào giỏ</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Xiaomi</p>
                <h6 class="pc__title"><a href="details.html">Xiaomi 14 Ultra 16GB</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price price-old">32.990.000đ</span>
                  <span class="money price price-sale">29.990.000đ</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Yêu thích">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_9.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_9-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Thêm vào giỏ">Thêm vào giỏ</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Nokia</p>
                <h6 class="pc__title"><a href="details.html">Nokia 3210 4G</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">1.590.000đ</span>
                </div>
                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Yêu thích">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <nav class="shop-pages d-flex justify-content-between mt-3" aria-label="Page navigation">
          <a href="#" class="btn-link d-inline-flex align-items-center">
            <svg class="me-1" width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_prev_sm" />
            </svg>
            <span class="fw-medium">TRƯỚC</span>
          </a>
          <ul class="pagination mb-0">
            <li class="page-item"><a class="btn-link px-1 mx-2 btn-link_active" href="#">1</a></li>
            <li class="page-item"><a class="btn-link px-1 mx-2" href="#">2</a></li>
            <li class="page-item"><a class="btn-link px-1 mx-2" href="#">3</a></li>
            <li class="page-item"><a class="btn-link px-1 mx-2" href="#">4</a></li>
          </ul>
          <a href="#" class="btn-link d-inline-flex align-items-center">
            <span class="fw-medium me-1">SAU</span>
            <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_next_sm" />
            </svg>
          </a>
        </nav>
      </div>
    </section>
  </main>
@endsection