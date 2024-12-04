@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Add Product</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{ route('admin.index') }}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.phones')}}">
                                                <div class="text-tiny">Phones</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Edit Phone</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- form-add-product -->
                                <form class="form-add-product" method="POST" enctype="multipart/form-data"
                                    action="{{ route('admin.phone.update' )}}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="phone_id" value={{ $phone->id }}>
                                    <div class="wg-box">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Phone name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter phone name"
                                                name="phone_name" tabindex="0" value="{{ $phone->phone_name }}" aria-required="true">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                        </fieldset>
                                        @error('phone_name')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>
                                        @enderror

                                        <fieldset class="screen-size">
                                            <div class="body-title mb-10">Screen Size<span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="number" placeholder="Enter Screen Size" 
                                                name="screen_size" tabindex="0" value="{{ $phone->screen_size }}" 
                                                aria-required="true" step="any" min="0">
                                        </fieldset>
                                        @error('screen_size')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>
                                        @enderror

                                        <fieldset class="ram">
                                            <div class="body-title mb-10">RAM<span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter RAM"
                                                name="ram" tabindex="0" value="{{ $phone->ram }}" aria-required="true">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                        </fieldset>
                                        @error('ram')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>
                                        @enderror

                                        <fieldset class="operating-system">
                                            
                                            <div class="body-title mb-10">Operating System <span class="tf-color-1">*</span></div>
                                            <select class="mb-10" name="operating_system" tabindex="0">
                                                <option value="ios" {{ $phone->operating_system == 'ios' ? 'selected' : '' }}>iOS</option>
                                                <option value="android" {{ $phone->operating_system == 'android' ? 'selected' : '' }}>Android</option>
                                            </select>
                                            <div class="text-tiny">Select the operating system for the phone.</div>
                                        </fieldset>
                                        @error('operating_system')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>
                                        @enderror

                                        <fieldset class="processor">
                                            <div class="body-title mb-10">Processor <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter processor"
                                                name="processor" tabindex="0" value="{{ $phone->processor }}" aria-required="true">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                processor.</div>
                                        </fieldset>
                                        @error('processor')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>
                                        @enderror

                                        <fieldset class="battery">
                                            <div class="body-title mb-10">Battery<span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter battery"
                                                name="battery" tabindex="0" value="{{ $phone->battery }}" aria-required="true">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                battery.</div>
                                        </fieldset>
                                        @error('battery')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>
                                        @enderror

                                        <fieldset class="release-date">
                                            <div class="body-title mb-10">Release Date <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" 
                                                type="date" 
                                                name="release_date" 
                                                tabindex="0" 
                                                value="{{ $phone->release_date }}" 
                                                aria-required="true" 
                                                >
                                            <div class="text-tiny">Please select the release date.</div>
                                        </fieldset>
                                        @error('release_date')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>
                                        @enderror

                                        <div class="gap22 cols">

                                            <fieldset class="brand">
                                                <div class="body-title mb-10">Brand <span class="tf-color-1">*</span>
                                                </div>
                                                <div class="select">
                                                    <select class="" name="brand_id">
                                                        <option>Choose Brand</option>
                                                        @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ $phone->brand_id == $brand->id ? 'selected' : ''}}>{{ $brand->brand_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </fieldset>
                                            @error('brand_id')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <fieldset class="description">
                                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                                            </div>
                                            <textarea class="mb-10" name="description" placeholder="Description"
                                                tabindex="0" aria-required="true"> {{ $phone->description }}</textarea>
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                        </fieldset>
                                        @error('description')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>
                                        @enderror

                                        <!-- Phần thêm biến thể -->
                                        <fieldset class="color">
                                            <!-- Chọn màu sắc -->
                                            <div class="body-title mb-10">Color <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" 
                                                type="text" 
                                                id="colorInput" 
                                                placeholder="Enter color"
                                                name="color" 
                                                value="{{ old('color') }}"
                                                tabindex="0" 
                                                aria-required="true" >
                                            <div class="text-tiny">Do not exceed 100 characters when entering the color.</div>
                                        </fieldset>
                                        @error('color')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>
                                        @enderror

                                        <fieldset class="storage">
                                            <div class="body-title mb-10">Storage <span class="tf-color-1">*</span></div>
                                            <div style="display: flex; gap: 50px; align-items: center; flex-wrap: wrap" class="mb-10">
                                                @foreach ($storages as $storage)
                                                    <div class="checkbox-container" style="display: flex; gap: 1rem; align-items: center">
                                                        <input type="checkbox" class="storageCheckbox" id="storage{{ $storage->id }}" name="storage[]" value="{{ $storage->id }}">
                                                        <label class="fs-5 fw-bold" for="storage{{ $storage->id }}">{{ $storage->storage_size }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="text-tiny">Choose one or more storage options for the product.</div>
                                        </fieldset>
                                        @error('storage')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>
                                        @enderror

                                        <!-- Nút tạo biến thể -->
                                        <div class="mb-4">
                                            <button type="button" id="generateVariants" class="btn btn-primary">Generate Variants</button>
                                        </div>

                                        <!-- Bảng biến thể -->
                                        <div class="table-responsive">
                                            <table id="variantsTable" class="table table-bordered table-secondary">
                                            <thead class="table-light">
                                                <tr>
                                                <th>Name</th>
                                                <th>Color</th>
                                                <th>Storage</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Sale Price</th>
                                                <th>Image</th>
                                                <th>Stock</th>
                                                <th>Feature</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($phone->phoneVariants as $variant)
                                                    <tr>
                                                        <td>
                                                            <input 
                                                                type="hidden" 
                                                                name="phone_variants_id[]"
                                                                value="{{ $variant->id }}"
                                                                >
                                                            <input type="text" name="phone_variants_name[]" 
                                                        value="{{ $variant->phone_variants_name}}" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="colors[]" 
                                                            value="{{ $variant->color }}" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="storages[]" 
                                                            value="{{ $variant->storage->id }}">
                                                            <span>{{ $variant->storage->storage_size }}</span>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="quantity[]" 
                                                            class="form-control" 
                                                            placeholder="Enter quantity" 
                                                            min="0" 
                                                            value="{{ $variant->quantity }}"
                                                            >
                                                        </td>
                                                        <td>
                                                            <input 
                                                                type="number" 
                                                                name="regular_price[]" 
                                                                class="form-control" 
                                                                placeholder="Enter price" 
                                                                step="0.01" 
                                                                min="0" 
                                                                value="{{ $variant->regular_price }}"
                                                                >
                                                        </td>
                                                        <td>
                                                            <input 
                                                                type="number" 
                                                                name="sale_price[]" 
                                                                class="form-control" 
                                                                placeholder="Enter sale price" 
                                                                step="0.01" 
                                                                min="0" 
                                                                value="{{ $variant->sale_price }}"
                                                                >
                                                        </td>
                                                        <td>
                                                            <div class="item up-load text-center p-2 border rounded">
                    <label class="uploadfile d-flex flex-column align-items-center justify-content-center" style="cursor: pointer;">
                        <span class="icon mb-2">
                            <i class="bi bi-cloud-upload" style="font-size: 1.5rem; color: #6c757d;"></i>
                        </span>
                        <span class="text-tiny text-muted">Drop your image or <span class="tf-color text-primary">click to browse</span></span>
                        <input 
                            type="file" 
                            name="image[]" 
                            accept="image/*" 
                            class="form-control image-input" 
                            style="display: none;" 
                            >
                        <img src="{{ asset('uploads/phones/thumbnails/' . $variant->image) }}" alt="Preview" class="img-preview mt-2" style="max-width: 100%; max-height: 150px">
                    </label>
                </div>
                                                        </td>
                                                        <td>
                                                            <select name="stock_status[]" class="form-select">
                                                                <option value="instock" {{ $variant->stock_status == 'instock' ? 'selected' : '' }}>In Stock</option>
                                                                <option value="outofstock" {{ $variant->stock_status == 'outofstock' ? 'selected' : '' }}>Out of Stock</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="featured[]" class="form-select">
                                                                <option value="0" {{ $variant->featured == '0' ? 'selected' : '' }}>No</option>
                                                                <option value="1" {{ $variant->featured == '1' ? 'selected' : '' }}>Yes</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <!-- Rows will be dynamically added -->
                                            </tbody>
                                            </table>
                                        </div>

                                        </div>
                                        <div class="cols gap10">
                                            <button class="tf-button w-full" type="submit">Save</button>
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
        alert('Please enter a phone name, a color, and select at least one storage option.');
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



            // Cột Name
            const nameCell = document.createElement('td');
            nameCell.innerHTML = `
                <input 
                    type="hidden" 
                    name="phone_variants_id[]"
                    value="new-${Date.now()}-${Math.floor(Math.random() * 10000)}"
                    >
                <input 
                    type="text" 
                    name="phone_variants_name[]"
                    value="${phoneName} - ${checkbox.nextElementSibling.textContent.trim()}"
                    readonly>
            `;
            
            // Cột màu sắc
            const colorCell = document.createElement('td');
            colorCell.innerHTML = `
                <input 
                    type="text" 
                    name="colors[]"
                    value="${newVariant.color}"
                    readonly>
            `;

            // Cột dung lượng
            const storageCell = document.createElement('td');
            storageCell.innerHTML = `
                <input 
                    type="hidden" 
                    name="storages[]"
                    value="${newVariant.storage}"
                    readonly> 
                <span>${checkbox.nextElementSibling.textContent.trim()}</span>
            `;

            // Cột số lượng
            const quantityCell = document.createElement('td');
            quantityCell.innerHTML = `
                <input 
                    type="number" 
                    name="quantity[]" 
                    class="form-control" 
                    placeholder="Enter quantity" 
                    min="0" 
                    >
            `;

            // Cột giá
            const priceCell = document.createElement('td');
            priceCell.innerHTML = `
                <input 
                    type="number" 
                    name="regular_price[]" 
                    class="form-control" 
                    placeholder="Enter price" 
                    step="0.01" 
                    min="0" 
                    >
            `;

            // Cột sale
            const priceSaleCell = document.createElement('td');
            priceSaleCell.innerHTML = `
                <input 
                    type="number" 
                    name="sale_price[]" 
                    class="form-control" 
                    placeholder="Enter sale price" 
                    step="0.01" 
                    min="0" 
                    >
            `;

            // Cột tải ảnh
            const imageCell = document.createElement('td');
            imageCell.innerHTML = `
                <div class="item up-load text-center p-2 border rounded">
                    <label class="uploadfile d-flex flex-column align-items-center justify-content-center" style="cursor: pointer;">
                        <span class="icon mb-2">
                            <i class="bi bi-cloud-upload" style="font-size: 1.5rem; color: #6c757d;"></i>
                        </span>
                        <span class="text-tiny text-muted">Drop your image or <span class="tf-color text-primary">click to browse</span></span>
                        <input 
                            type="file" 
                            name="image[]" 
                            accept="image/*" 
                            class="form-control image-input" 
                            >
                        <img src="#" alt="Preview" class="img-preview mt-2" style="max-width: 100%; max-height: 150px; display: none;">
                    </label>
                </div>
            `;

            // Xử lý sự kiện thay đổi file
            const imageInput = imageCell.querySelector('.image-input');
            imageInput.addEventListener('change', function (event) {
    const imgPreview = this.closest('.item').querySelector('.img-preview'); // Lấy đúng img-preview của hàng hiện tại
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

            // Cột Stock
            const stockCell = document.createElement('td');
            stockCell.innerHTML = `
                <select name="stock_status[]" class="form-select">
                    <option value="instock">In Stock</option>
                    <option value="outofstock">Out of Stock</option>
                </select>
            `;

            // Cột Feature
            const featureCell = document.createElement('td');
            featureCell.innerHTML = `
                <select name="featured[]" class="form-select">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            `;

            // Thêm các cột vào hàng
            row.appendChild(nameCell);
            row.appendChild(colorCell);
            row.appendChild(storageCell);
            row.appendChild(quantityCell);
            row.appendChild(priceCell);
            row.appendChild(priceSaleCell);
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
 document.getElementById('variantsTable').addEventListener('change', function (event) {
    // Kiểm tra xem sự kiện xảy ra trên input có class .image-input
    if (event.target.classList.contains('image-input')) {
        const imgPreview = event.target.closest('.item').querySelector('.img-preview'); // Lấy preview container trong hàng hiện tại
        const file = event.target.files[0]; // Lấy file từ input
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imgPreview.src = e.target.result; // Gán src cho preview
                imgPreview.style.display = 'block'; // Hiển thị ảnh preview
            };
            reader.readAsDataURL(file); // Đọc dữ liệu file
        }
    }
});
    </script>
@endpush
