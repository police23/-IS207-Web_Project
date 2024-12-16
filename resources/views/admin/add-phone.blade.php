@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Thêm sản phẩm</h3>
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
                    <a href="{{ route('admin.phones')}}">
                        <div class="text-tiny">Sản phẩm</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Thêm sản phẩm</div>
                </li>
            </ul>
        </div>
        <!-- form-add-product -->
        <form class="form-add-product" method="POST" enctype="multipart/form-data" action="{{ route('admin.phone.store' )}}">
            @csrf
            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">Tên điện thoại <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Nhập tên điện thoại" name="phone_name" tabindex="0" value="{{ old('phone_name')}}" aria-required="true" required="">
                    <div class="text-tiny">Không vượt quá 100 ký tự khi nhập tên sản phẩm.</div>
                </fieldset>
                @error('phone_name')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="screen-size">
                    <div class="body-title mb-10">Kích thước màn hình <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="number" placeholder="Nhập kích thước màn hình" name="screen_size" tabindex="0" value="{{ old('screen_size')}}" aria-required="true" required="" step="any" min="0">
                </fieldset>
                @error('screen_size')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="ram">
                    <div class="body-title mb-10">RAM <span class="tf-color-1">*</span></div>
                    <select class="mb-10" name="ram" tabindex="0" required>
                        <option value="" disabled selected>Chọn RAM</option>
                        <option value="3GB">3GB</option>
                        <option value="4GB">4GB</option>
                        <option value="6GB">6GB</option>
                        <option value="8GB">8GB</option>
                        <option value="12GB">12GB</option>
                    </select>
                    <div class="text-tiny">Chọn kích thước RAM cho điện thoại.</div>
                </fieldset>
                @error('ram')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="operating-system">
                    <div class="body-title mb-10">Hệ điều hành <span class="tf-color-1">*</span></div>
                    <select class="mb-10" name="operating_system" tabindex="0" required>
                        <option value="" disabled selected>Chọn hệ điều hành</option>
                        <option value="ios">iOS</option>
                        <option value="android">Android</option>
                    </select>
                    <div class="text-tiny">Chọn hệ điều hành cho điện thoại.</div>
                </fieldset>
                @error('operating_system')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="processor">
                    <div class="body-title mb-10">Bộ xử lý <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Nhập bộ xử lý" name="processor" tabindex="0" value="{{ old('processor')}}" aria-required="true" required="">
                    <div class="text-tiny">Không vượt quá 100 ký tự khi nhập bộ xử lý.</div>
                </fieldset>
                @error('processor')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="battery">
                    <div class="body-title mb-10">Pin <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Nhập pin" name="battery" tabindex="0" value="{{ old('battery')}}" aria-required="true" required="">
                    <div class="text-tiny">Không vượt quá 100 ký tự khi nhập pin.</div>
                </fieldset>
                @error('battery')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="release-date">
                    <div class="body-title mb-10">Ngày sản xuất <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="date" name="release_date" tabindex="0" value="{{ old('release_date')}}" aria-required="true" required>
                    <div class="text-tiny">Vui lòng chọn ngày phát hành.</div>
                </fieldset>
                @error('release_date')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <div class="gap22 cols">
                    <fieldset class="brand">
                        <div class="body-title mb-10">Thương hiệu <span class="tf-color-1">*</span></div>
                        <div class="select">
                            <select class="" name="brand_id">
                                <option>Chọn thương hiệu</option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>
                    @error('brand_id')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror
                </div>

                <fieldset class="description">
                    <div class="body-title mb-10">Mô tả <span class="tf-color-1">*</span></div>
                    <textarea class="mb-10" name="description" placeholder="Mô tả" tabindex="0" aria-required="true" required=""> {{ old('description') }}</textarea>
                    <div class="text-tiny">Không vượt quá 100 ký tự khi nhập mô tả sản phẩm.</div>
                </fieldset>
                @error('description')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <!-- Phần thêm biến thể -->
                <fieldset class="color">
                    <!-- Chọn màu sắc -->
                    <div class="body-title mb-10">Màu sắc <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" id="colorInput" placeholder="Nhập màu sắc" name="color" value="{{ old('color') }}" tabindex="0" aria-required="true" required>
                    <div class="text-tiny">Không vượt quá 100 ký tự khi nhập màu sắc.</div>
                </fieldset>
                @error('color')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset class="storage">
                    <div class="body-title mb-10">Dung lượng <span class="tf-color-1">*</span></div>
                    <div style="display: flex; gap: 50px; align-items: center; flex-wrap: wrap" class="mb-10">
                        @foreach ($storages as $storage)
                            <div class="checkbox-container" style="display: flex; gap: 1rem; align-items: center">
                                <input type="checkbox" class="storageCheckbox" id="storage{{ $storage->id }}" name="storage[]" value="{{ $storage->id }}">
                                <label class="fs-5 fw-bold" for="storage{{ $storage->id }}">{{ $storage->storage_size }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-tiny">Chọn một hoặc nhiều tùy chọn dung lượng cho sản phẩm.</div>
                </fieldset>
                @error('storage')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <!-- Nút tạo biến thể -->
                <div class="mb-4">
                    <button type="button" id="generateVariants" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff;" onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='#007bff';" onmouseout="this.style.backgroundColor='#007bff'; this.style.color='#ffffff';">Tạo biến thể</button>
                </div>

                <!-- Bảng biến thể -->
                <div class="table-responsive">
                    <table id="variantsTable" class="table table-bordered table-secondary">
                        <thead class="table-light">
                            <tr>
                                <th>Tên</th>
                                <th>Màu sắc</th>
                                <th>Dung lượng</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Hình ảnh</th>
                                <th>Tình trạng</th>
                                <th>Nổi bật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows will be dynamically added -->
                        </tbody>
                    </table>
                </div>

                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit" style="background-color: #007bff; border-color: #007bff;" onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='#007bff';" onmouseout="this.style.backgroundColor='#007bff'; this.style.color='#ffffff';">Thêm sản phẩm</button>
                </div>
            </div>
        </form>
        <!-- /form-add-product -->
    </div>
    <!-- /main-content-wrap -->
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

@push('scripts')
<script>
    document.getElementById('generateVariants').addEventListener('click', function () {
        const phoneName = document.querySelector('input[name="phone_name"]').value.trim(); // Lấy giá trị Phone Name
        const color = document.getElementById('colorInput').value.trim();
        const storageCheckboxes = document.querySelectorAll('.storageCheckbox:checked');
        const variantsTable = document.getElementById('variantsTable');
        const tbody = variantsTable.querySelector('tbody');

        // Kiểm tra nếu không có dữ liệu
        if (!phoneName || !color || storageCheckboxes.length === 0) {
            alert('Vui lòng nhập tên điện thoại, màu sắc và chọn ít nhất một tùy chọn dung lượng.');
            return;
        }

        // Lấy danh sách các biến thể đã tồn tại
        const existingVariants = Array.from(tbody.querySelectorAll('tr')).map(row => {
            const cells = row.querySelectorAll('td');
            return {
                color: cells[1].textContent.trim(),
                storage: cells[2].textContent.trim()
            };
        });

        // Tạo biến thể mới
        storageCheckboxes.forEach((checkbox) => {
            const newVariant = {
                color: color,
                storage: checkbox.value
            };

            // Kiểm tra nếu biến thể đã tồn tại
            const isDuplicate = existingVariants.some(variant =>
                variant.color === newVariant.color && variant.storage === newVariant.storage
            );

            if (!isDuplicate) {
                const row = document.createElement('tr');

                // Cột Tên
                const nameCell = document.createElement('td');
                nameCell.textContent = `${phoneName} - ${checkbox.nextElementSibling.textContent.trim()}`; // Kết hợp Phone Name và Storage
                // Tạo một phần tử input ẩn để gửi giá trị khi form submit
                const nameInput = document.createElement('input');
                nameInput.type = 'hidden'; // Giữ cho input này không hiển thị
                nameInput.name = 'phone_variants_name[]'; // Sử dụng mảng để gửi nhiều giá trị nếu cần
                nameInput.value = `${phoneName} - ${checkbox.nextElementSibling.textContent.trim()}`; // Kết hợp Phone Name và Storage
                // Thêm phần tử input vào trong td (có thể giữ td trống)
                nameCell.appendChild(nameInput);

                // Cột màu sắc
                const colorCell = document.createElement('td');
                colorCell.textContent = newVariant.color;
                // Tạo input ẩn để gửi dữ liệu màu sắc qua form
                const colorInput = document.createElement('input');
                colorInput.type = 'hidden';
                colorInput.name = 'colors[]'; // Tên input được gửi qua request
                colorInput.value = newVariant.color;
                // Thêm input ẩn vào cột
                colorCell.appendChild(colorInput);

                // Cột dung lượng
                const storageCell = document.createElement('td');
                storageCell.textContent = checkbox.nextElementSibling.textContent.trim();
                // Tạo input ẩn để gửi dữ liệu dung lượng qua form
                const storageInput = document.createElement('input');
                storageInput.type = 'hidden';
                storageInput.name = 'storages[]'; // Tên input được gửi qua request
                storageInput.value = newVariant.storage;
                // Thêm input ẩn vào cột
                storageCell.appendChild(storageInput);

                // Cột số lượng
                const quantityCell = document.createElement('td');
                quantityCell.innerHTML = `
                    <input 
                        type="number" 
                        name="quantity[]" 
                        class="form-control" 
                        placeholder="Nhập số lượng" 
                        min="0" 
                        required>
                `;

                // Cột giá
                const priceCell = document.createElement('td');
                priceCell.innerHTML = `
                    <input 
                        type="number" 
                        name="regular_price[]" 
                        class="form-control" 
                        placeholder="Nhập giá" 
                        step="0.01" 
                        min="0" 
                        required>
                `;

                // Cột tải ảnh
                const imageCell = document.createElement('td');
                imageCell.innerHTML = `
                    <div class="item up-load text-center p-2 border rounded">
                        <label class="uploadfile d-flex flex-column align-items-center justify-content-center" style="cursor: pointer;">
                            <span class="icon mb-2">
                                <i class="bi bi-cloud-upload" style="font-size: 1.5rem; color: #6c757d;"></i>
                            </span>
                            <span class="text-tiny text-muted">Thả hình ảnh của bạn hoặc <span class="tf-color text-primary">nhấp để duyệt</span></span>
                            <input 
                                type="file" 
                                name="image[]" 
                                accept="image/*" 
                                class="form-control image-input" 
                                style="display: none;" 
                                required>
                            <img src="#" alt="Preview" class="img-preview mt-2" style="max-width: 100%; max-height: 150px; display: none;">
                        </label>
                    </div>
                `;

                // Xử lý sự kiện thay đổi file
                const imageInput = imageCell.querySelector('.image-input');
                const imgPreview = imageCell.querySelector('.img-preview');

                imageInput.addEventListener('change', function (event) {
                    console.log(imgPreview)
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            imgPreview.src = e.target.result; // Hiển thị ảnh đã chọn
                            imgPreview.style.display = 'block'; // Hiển thị phần preview
                        };
                        reader.readAsDataURL(file); // Đọc file ảnh
                    }
                });

                // Cột Tình trạng
                const stockCell = document.createElement('td');
                stockCell.innerHTML = `
                    <select name="stock_status[]" class="form-select">
                        <option value="instock">Còn hàng</option>
                        <option value="outofstock">Hết hàng</option>
                    </select>
                `;

                // Cột Nổi bật
                const featureCell = document.createElement('td');
                featureCell.innerHTML = `
                    <select name="featured[]" class="form-select">
                        <option value="0">Không</option>
                        <option value="1">Có</option>
                    </select>
                `;

                // Thêm các cột vào hàng
                row.appendChild(nameCell);
                row.appendChild(colorCell);
                row.appendChild(storageCell);
                row.appendChild(quantityCell);
                row.appendChild(priceCell);
                row.appendChild(imageCell);
                row.appendChild(stockCell);
                row.appendChild(featureCell);

                // Thêm hàng vào bảng
                tbody.appendChild(row);

                // Thêm biến thể mới vào danh sách đã tồn tại
                existingVariants.push(newVariant);
            }
        });
    });
</script>
@endpush
