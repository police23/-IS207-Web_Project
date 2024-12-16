@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <!-- Biểu đồ đường và cột -->
        <div class="charts-container">
            <!-- Biểu đồ đường -->
            <div class="chart-box">
                <div class="wg-box">
                    <h5 class="text-center">Số lượng bán được mỗi ngày trong tháng</h5>
                    <!-- Combobox tháng và năm cho biểu đồ đường -->
                    <div class="filters-container">
                        <select id="month-select-line" class="form-select" style="margin-bottom: 10px;">
                            <option value="1">Tháng 1</option>
                            <option value="2">Tháng 2</option>
                            <option value="3">Tháng 3</option>
                            <option value="4">Tháng 4</option>
                            <option value="5">Tháng 5</option>
                            <option value="6">Tháng 6</option>
                            <option value="7">Tháng 7</option>
                            <option value="8">Tháng 8</option>
                            <option value="9">Tháng 9</option>
                            <option value="10">Tháng 10</option>
                            <option value="11">Tháng 11</option>
                            <option value="12">Tháng 12</option>
                        </select>
                        <select id="year-select-line" class="form-select" style="margin-bottom: 10px;">
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="line-chart-sales"></canvas>
                    </div>
                </div>
            </div>
            <!-- Biểu đồ cột -->
            <div class="chart-box">
                <div class="wg-box">
                    <h5 class="text-center">Doanh thu các ngày trong tháng</h5>
                    <!-- Combobox tháng và năm cho biểu đồ cột -->
                    <div class="filters-container">
                        <select id="month-select-bar" class="form-select" style="margin-bottom: 10px;">
                            <option value="1">Tháng 1</option>
                            <option value="2">Tháng 2</option>
                            <option value="3">Tháng 3</option>
                            <option value="4">Tháng 4</option>
                            <option value="5">Tháng 5</option>
                            <option value="6">Tháng 6</option>
                            <option value="7">Tháng 7</option>
                            <option value="8">Tháng 8</option>
                            <option value="9">Tháng 9</option>
                            <option value="10">Tháng 10</option>
                            <option value="11">Tháng 11</option>
                            <option value="12">Tháng 12</option>
                        </select>
                        <select id="year-select-bar" class="form-select" style="margin-bottom: 10px;">
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="bar-chart-revenue"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top 10 sản phẩm bán chạy -->
        <div class="tf-section mb-30">
            <div class="wg-box">
                <h5 class="text-center">Top 10 sản phẩm bán chạy nhất</h5>
                <!-- Combobox tháng và năm cho Top 10 sản phẩm -->
                <div class="filters-container">
                    <select id="month-select-products" class="form-select" style="margin-bottom: 10px;">
                        <option value="1">Tháng 1</option>
                        <option value="2">Tháng 2</option>
                        <option value="3">Tháng 3</option>
                        <option value="4">Tháng 4</option>
                        <option value="5">Tháng 5</option>
                        <option value="6">Tháng 6</option>
                        <option value="7">Tháng 7</option>
                        <option value="8">Tháng 8</option>
                        <option value="9">Tháng 9</option>
                        <option value="10">Tháng 10</option>
                        <option value="11">Tháng 11</option>
                        <option value="12">Tháng 12</option>
                    </select>
                    <select id="year-select-products" class="form-select" style="margin-bottom: 10px;">
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
                <div class="top-products-grid">
                    @php
                        // Mảng chứa các URL hình ảnh khác nhau cho từng sản phẩm
                        $images = [
                            'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-16-1.png',
                            'https://minhtuanmobile.com/uploads/products/240910084742-iphone-16-pro-max-black-titanium-pdp-image-position-1a-black-titanium-color-vn-vi.jpg',
                            'https://example.com/product3.jpg',
                            'https://example.com/product4.jpg',
                            'https://example.com/product5.jpg',
                            'https://example.com/product6.jpg',
                            'https://example.com/product7.jpg',
                            'https://example.com/product8.jpg',
                            'https://example.com/product9.jpg',
                            'https://example.com/product10.jpg',
                        ];
                    @endphp

                    @for ($i = 1; $i <= 10; $i++)
                        <div class="product-card {{ $i <= 5 ? 'left-card' : 'right-card' }}" onclick="toggleProductInfo({{ $i }})">
                            <!-- Hình ảnh sản phẩm -->
                            <img src="{{ $images[$i-1] }}" alt="Sản phẩm {{ $i }}" class="product-image" id="image-{{ $i }}">
                            <!-- Thông tin sản phẩm -->
                            <div class="product-info" id="info-{{ $i }}">
                                <h6>Top {{ $i }} - Sản phẩm {{ $i }}</h6>
                                <p>Số lượng bán: <strong>{{ rand(100, 500) }}</strong></p>
                                <p>Doanh thu: <strong>${{ rand(1000, 5000) }}</strong></p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles -->
<style>
    .charts-container {
        display: flex;
        gap: 20px;
    }

    .chart-box {
        flex: 1;
        padding: 10px;
    }

    .chart-container {
        width: 100%;
        height: 400px;
    }

    .wg-box {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 30px;
    }

    .filters-container {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-bottom: 20px;
    }

    .form-select {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .top-products-grid {
        display: grid;
        grid-template-columns: 1fr 1fr; /* Chia làm 2 cột */
        gap: 20px;
    }

    .product-card {
        position: relative;
        background-color: #f8f9fa;
        height: 240px; /* Tăng chiều cao thẻ */
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .product-card img.product-image {
        width: 100%;
        height: 100%;
        object-fit: contain; /* Giữ nguyên tỷ lệ hình ảnh mà không bị cắt */
        opacity: 1; /* Đảm bảo hình ảnh luôn hiện ra */
    }

    .product-info {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 2; /* Để thông tin phía trên hình ảnh */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        transition: transform 0.5s ease;
    }

    /* Ẩn thông tin mặc định */
    .product-info.hidden {
        display: none;
    }

    h6 {
        font-size: 1.5rem; /* Tăng kích thước chữ */
        margin-bottom: 10px;
    }

    p {
        font-size: 1.2rem; /* Tăng kích thước chữ */
        margin: 5px 0;
    }
</style>

<!-- Chart.js Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Biểu đồ đường - Số lượng bán được
        const lineCtx = document.getElementById('line-chart-sales');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: Array.from({ length: 30 }, (_, i) => `Ngày ${i + 1}`),
                datasets: [{
                    label: 'Số lượng bán',
                    data: Array.from({ length: 30 }, () => Math.floor(Math.random() * 50 + 100)),
                    borderColor: '#4CAF50',
                    backgroundColor: 'rgba(76, 175, 80, 0.2)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Biểu đồ cột - Doanh thu
        const barCtx = document.getElementById('bar-chart-revenue');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: Array.from({ length: 30 }, (_, i) => `Ngày ${i + 1}`),
                datasets: [{
                    label: 'Doanh thu',
                    data: Array.from({ length: 30 }, () => Math.floor(Math.random() * 4000 + 2000)),
                    backgroundColor: 'rgba(255, 152, 0, 0.8)',
                    borderColor: '#FF9800',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    });

    // Hàm để đổi hình ảnh và thông tin khi nhấn vào thẻ sản phẩm
    function toggleProductInfo(productIndex) {
        const image = document.getElementById('image-' + productIndex);
        const info = document.getElementById('info-' + productIndex);

        // Đổi giữa ẩn và hiện
        if (info.classList.contains('hidden')) {
            info.classList.remove('hidden');
            image.style.opacity = 0; // Ẩn hình ảnh
        } else {
            info.classList.add('hidden');
            image.style.opacity = 1; // Hiện hình ảnh
        }
    }
</script>
@endsection
