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
                        {{-- <canvas id="line-chart-sales"></canvas> --}}
                        <canvas id="phoneSalesChart"></canvas>
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
                <div id="top-products-grid"></div>
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

{{-- <!-- Chart.js Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     // Biểu đồ đường - Số lượng bán được
    //     const lineCtx = document.getElementById('line-chart-sales');
    //     new Chart(lineCtx, {
    //         type: 'line',
    //         data: {
    //             labels: Array.from({ length: 30 }, (_, i) => `Ngày ${i + 1}`),
    //             datasets: [{
    //                 label: 'Số lượng bán',
    //                 data: Array.from({ length: 30 }, () => Math.floor(Math.random() * 50 + 100)),
    //                 borderColor: '#4CAF50',
    //                 backgroundColor: 'rgba(76, 175, 80, 0.2)',
    //                 tension: 0.4,
    //                 fill: true
    //             }]
    //         },
    //         options: {
    //             responsive: true,
    //             maintainAspectRatio: false
    //         }
    //     });

    //     // Biểu đồ cột - Doanh thu
    //     const barCtx = document.getElementById('bar-chart-revenue');
    //     new Chart(barCtx, {
    //         type: 'bar',
    //         data: {
    //             labels: Array.from({ length: 30 }, (_, i) => `Ngày ${i + 1}`),
    //             datasets: [{
    //                 label: 'Doanh thu',
    //                 data: Array.from({ length: 30 }, () => Math.floor(Math.random() * 4000 + 2000)),
    //                 backgroundColor: 'rgba(255, 152, 0, 0.8)',
    //                 borderColor: '#FF9800',
    //                 borderWidth: 1
    //             }]
    //         },
    //         options: {
    //             responsive: true,
    //             maintainAspectRatio: false
    //         }
    //     });
    // });

    // // Hàm để đổi hình ảnh và thông tin khi nhấn vào thẻ sản phẩm
    // function toggleProductInfo(productIndex) {
    //     const image = document.getElementById('image-' + productIndex);
    //     const info = document.getElementById('info-' + productIndex);

    //     // Đổi giữa ẩn và hiện
    //     if (info.classList.contains('hidden')) {
    //         info.classList.remove('hidden');
    //         image.style.opacity = 0; // Ẩn hình ảnh
    //     } else {
    //         info.classList.add('hidden');
    //         image.style.opacity = 1; // Hiện hình ảnh
    //     }
    // }
    $(document).ready(function () {
    $.ajax({
        url: '/phone-sales-data', // Route đến controller
        method: 'GET',
        success: function (response) {
            console.log('success')
            // Lấy dữ liệu ngày và số lượng bán
            const labels = response.map(item => item.sale_date);
            const data = response.map(item => item.total_sold);

            // Hiển thị biểu đồ đường với Chart.js
            const ctx = document.getElementById('phoneSalesChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Số lượng điện thoại bán được',
                        data: data,
                        borderColor: 'blue',
                        backgroundColor: 'rgba(0, 123, 255, 0.2)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Số lượng điện thoại bán theo ngày'
                        }
                    },
                    scales: {
                        x: {
                            title: { display: true, text: 'Ngày' }
                        },
                        y: {
                            title: { display: true, text: 'Số lượng' },
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function (error) {
            console.error("Error fetching data:", error);
        }
    });
});
</script> --}}
<!-- Chart.js -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function () {
    let phoneSalesChart; // Lưu đối tượng biểu đồ để cập nhật lại sau mỗi request AJAX

    // Hàm để gọi AJAX và cập nhật biểu đồ
    function fetchDataAndUpdateChart() {
        const selectedMonth = $('#month-select-line').val();
        const selectedYear = $('#year-select-line').val();

        $.ajax({
            url: '/admin/phone-quantity-data', // Route đến controller
            method: 'GET',
            data: { month: selectedMonth, year: selectedYear }, // Gửi tháng và năm
            success: function (response) {
                console.log('Dữ liệu nhận về:', response);

                // Chuẩn bị dữ liệu cho biểu đồ
                const labels = response.map(item => {
                    const day = item.sale_date.split('-')[2]; // Lấy phần thứ 3 của chuỗi (ngày)
                    return `Ngày ${day}`; // Ghi chữ "Ngày" trước số ngày
                }); // Ngày bán hàng
                const data = response.map(item => item.total_sold); // Số lượng bán được

                // Kiểm tra nếu đã có biểu đồ thì hủy biểu đồ cũ
                if (phoneSalesChart) {
                    phoneSalesChart.destroy();
                }

                // Vẽ biểu đồ mới
                const ctx = document.getElementById('phoneSalesChart').getContext('2d');
                phoneSalesChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Số lượng điện thoại bán được',
                            data: data,
                            borderColor: '#4CAF50',
                            backgroundColor: 'rgba(76, 175, 80, 0.2)',
                            fill: true,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: `Số lượng bán trong tháng ${selectedMonth}/${selectedYear}`
                            }
                        },
                        scales: {
                            x: {
                                title: { display: true, text: 'Ngày' }
                            },
                            y: {
                                title: { display: true, text: 'Số lượng' },
                                beginAtZero: true
                            }
                        }
                    }
                });
            },
            error: function (error) {
                console.error("Lỗi khi lấy dữ liệu:", error);
            }
        });
    }

    // Gọi hàm khi combobox tháng hoặc năm thay đổi
    $('#month-select-line, #year-select-line').on('change', fetchDataAndUpdateChart);

    // Gọi hàm lần đầu để biểu đồ hiển thị dữ liệu mặc định
    fetchDataAndUpdateChart();

    let phoneRevenueChart; // Lưu đối tượng biểu đồ để cập nhật lại sau mỗi request AJAX

    // Hàm để gọi AJAX và cập nhật biểu đồ
    function fetchDataAndUpdateChartBar() {
        const selectedMonth = $('#month-select-bar').val();
        const selectedYear = $('#year-select-bar').val();

        $.ajax({
            url: '/admin/phone-revenue-data', // Route đến controller
            method: 'GET',
            data: { month: selectedMonth, year: selectedYear }, // Gửi tháng và năm
            success: function (response) {
                console.log('Dữ liệu nhận về:', response);

                // Chuẩn bị dữ liệu cho biểu đồ
                const labels = response.data.map(item => {
                    const day = item.sales_date.split('-')[2]; // Lấy phần thứ 3 của chuỗi (ngày)
                    return `Ngày ${day}`; // Ghi chữ "Ngày" trước số ngày
                }); // Ngày bán hàng
                const data = response.data.map(item => item.total_revenue); // Doanh thu

                // Kiểm tra nếu đã có biểu đồ thì hủy biểu đồ cũ
                if (phoneRevenueChart) {
                    phoneRevenueChart.destroy();
                }

                // Vẽ biểu đồ cột mới
                const ctx = document.getElementById('bar-chart-revenue').getContext('2d');
                phoneRevenueChart = new Chart(ctx, {
                    type: 'bar', // Loại biểu đồ là cột
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Doanh thu',
                            data: data,
                            backgroundColor: '#4CAF50', // Màu sắc của cột
                            borderColor: '#388E3C', // Màu viền của cột
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: `Doanh thu trong tháng ${selectedMonth}/${selectedYear}`
                            }
                        },
                        scales: {
                            x: {
                                title: { display: true, text: 'Ngày' }
                            },
                            y: {
                                title: { display: true, text: 'Doanh thu' },
                                beginAtZero: true
                            }
                        }
                    }
                });
            },
            error: function (error) {
                console.error("Lỗi khi lấy dữ liệu:", error);
            }
        });
    }

    // Gọi hàm khi combobox tháng hoặc năm thay đổi
    $('#month-select-bar, #year-select-bar').on('change', fetchDataAndUpdateChartBar);

    // Gọi hàm lần đầu để biểu đồ hiển thị dữ liệu mặc định
    fetchDataAndUpdateChartBar();

    // Gọi API để lấy top 10 sản phẩm bán chạy
    function fetchTopSellingProducts() {
        const month = $('#month-select-products').val();  // Lấy tháng từ combobox
        const year = $('#year-select-products').val();   // Lấy năm từ combobox

        $.ajax({
            url: '/admin/top-selling-products',
            method: 'GET',
            data: { month: month, year: year },
            success: function(response) {
                console.log('Top selling products:', response.top_products);
                
                // Xóa sản phẩm cũ trước khi thêm mới
                $('#top-products-grid').empty();
                console.log($('#top-products-grid').length);
                // Thêm sản phẩm mới vào grid
                response.top_products.forEach((product, index) => {
                    const productCard = `
                        <div class="product-card ${index < 5 ? 'left-card' : 'right-card'}" onclick="toggleProductInfo(${index + 1})">
                            <img src="${product.image}" alt="Sản phẩm ${index + 1}" class="product-image" id="image-${index + 1}">
                            <div class="product-info" id="info-${index + 1}">
                                <h6>Top ${index + 1} - ${product.phone_variants_name}</h6>
                                <p>Số lượng bán: <strong>${product.total_quantity_sold}</strong></p>
                            </div>
                        </div>
                    `;
                    $('#top-products-grid').append(productCard);
                });
            },
            error: function(error) {
                console.error('Error fetching top selling products:', error);
            }
        });
    }

    // Gọi hàm khi combobox tháng hoặc năm thay đổi
    $('#month-select-products, #year-select-products').on('change', fetchTopSellingProducts);

    // Gọi hàm lần đầu để hiển thị sản phẩm mặc định
    fetchTopSellingProducts();
});

document.addEventListener("DOMContentLoaded", function () {
    // Lấy tháng và năm hiện tại
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth() + 1; // getMonth() trả về từ 0-11 nên cần +1
    const currentYear = currentDate.getFullYear();

    // Lấy các phần tử select
    const monthSelect = document.getElementById("month-select-line");
    const yearSelect = document.getElementById("year-select-line");

    const monthSelectBar = document.getElementById("month-select-bar");
    const yearSelectBar = document.getElementById("year-select-bar");

    const monthSelectProduct = document.getElementById("month-select-products");
    const yearSelectProduct = document.getElementById("year-select-products");

    // Tự động chọn giá trị tương ứng với tháng hiện tại
    for (let i = 0; i < monthSelect.options.length; i++) {
        if (parseInt(monthSelect.options[i].value) === currentMonth) {
            monthSelect.selectedIndex = i;
            monthSelectBar.selectedIndex = i
            monthSelectProduct.selectedIndex = i
            break;
        }
    }

    // Tự động chọn giá trị tương ứng với năm hiện tại
    for (let i = 0; i < yearSelect.options.length; i++) {
        if (parseInt(yearSelect.options[i].value) === currentYear) {
            yearSelect.selectedIndex = i;
            yearSelectBar.selectedIndex = i;
            yearSelectProduct.selectedIndex = i;
            break;
        }
    }
});

</script>
@endsection
