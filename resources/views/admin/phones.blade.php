@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Tất cả sản phẩm</h3>
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
                    <div class="text-tiny">Tất cả điện thoại</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Tìm kiếm tại đây..." class="form-control" name="name"
                                tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit" style="margin-top: -15px;">
                            <button class="tf-button style-1" type="submit" style="background: none; border: none;"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>

                <div class="d-flex gap-3 align-items-center">
                    <!-- Nút Thêm mới -->
                    <a 
                        href="{{ route('admin.phone.add') }}" 
                        class="tf-button style-1 d-flex align-items-center gap-2"
                    >
                        <i class="icon-plus" style="font-size: 1.2rem;"></i>
                        Thêm mới
                    </a>

                    <!-- Form Nhập -->
                    <form 
                        action="{{ route('admin.phones.import') }}" 
                        method="POST" 
                        enctype="multipart/form-data" 
                        class="d-flex align-items-center gap-2"
                    >
                        @csrf
                        
                        <!-- Input file ẩn -->
                        <input 
                            id="excel_file_input" 
                            type="file" 
                            name="excel_file" 
                            class="d-none"
                            onchange="this.form.submit()"  
                        >
                        
                        <!-- Nút Nhập -->
                        <label 
                            for="excel_file_input" 
                            class="tf-button style-1 mb-0 d-flex align-items-center gap-2"
                        >
                            <i class="icon-upload"></i>
                            Nhập CSV
                        </label>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 10%">Tên</th>
                            <th style="width: 15%">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phones as $phone)
                        <tr>
                            <td>{{ $phone->id }}</td>
                            <td>{{ $phone->phone_name }}</td>
                            <td>
                                <div class="list-icon-function">
                                    {{-- <a href="#" target="_blank">
                                        <div class="item eye">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </a> --}}
                                    <button class="btn btn-md btn-primary toggle-variants" data-phone-id="{{ $phone->id }}">
                                        <i class="bicon-eye"></i> Biến thể
                                    </button>
                                    <a href="{{ route( 'admin.phone.edit', ['id'=>$phone->id] )}}">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="{{ route('admin.phone.delete', ['id'=>$phone->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="item text-danger delete">
                                            <i class="icon-trash-2"></i>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr
                            class="variants-row"
                            id="variants-{{ $phone->id }}"
                            style="display: none"
                            >
                            <td colspan="3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Tên biến thể</th>
                                        <th>Màu sắc</th>
                                        <th>Bộ nhớ</th>
                                        <th>Giá</th>
                                        <th>Giá khuyến mãi</th>
                                        <th>Số lượng</th>
                                        <th>Hình ảnh</th>
                                        <th>Tình trạng kho</th>
                                        <th>Nổi bật</th>
                                        <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($phone->phoneVariants as $variant)
                                        <tr>
                                        <td>{{ $variant->phone_variants_name }}</td>
                                        <td>{{ $variant->color }}</td>
                                        <td>{{ $variant->storage->storage_size }}</td>
                                        <td>
                                            {{ $variant->regular_price }} VND
                                        </td>
                                        <td>
                                            {{ $variant->sale_price }} VND
                                        </td>

                                        <td>{{ $variant->quantity }}</td>
                                        <td>
                                            <img
                                            src="{{ asset('uploads/phones/thumbnails/' . $variant->image) }}"
                                            alt="{{ $variant->image }}"
                                            width="50"
                                            />
                                        </td>

                                        <td>{{ $variant->stock_status }}</td>
                                        <td>{{ $variant->featured == 1 ? "Có" : "Không" }}</td>
                                        <td>
                                            <form action="{{ route('admin.phoneVariant.delete', ['id'=>$variant->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="item text-danger delete" style="cursor: pointer;">
                                                    <i class="icon-trash-2"></i>
                                                </div>
                                            </form>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $phones->links('pagination::bootstrap-5') }}

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
  const toggleButtons = document.querySelectorAll(".toggle-variants");

  toggleButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const phoneId = button.dataset.phoneId;
      const variantsRow = document.getElementById(`variants-${phoneId}`);
      const icon = button.querySelector("i");

      if (variantsRow.style.display === "none") {
        variantsRow.style.display = "table-row";
        icon.classList.remove("bi-plus");
        icon.classList.add("bi-dash");
      } else {
        variantsRow.style.display = "none";
        icon.classList.remove("bi-dash");
        icon.classList.add("bi-plus");
      }
    });
  });

  $(function() {
        $('.delete').on('click', function(e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định của nút hoặc liên kết
            var form = $(this).closest('form'); // Lấy form gần nhất với nút delete
            swal({
                title: 'Bạn có chắc chắn?',
                text: 'Bạn muốn xóa bản ghi này?',
                icon: 'warning', // Thay 'type' bằng 'icon'
                buttons: ['Không', 'Có'], // Thay 'button' bằng 'buttons'
                dangerMode: true, // Đặt chế độ nguy hiểm (màu đỏ cho nút Yes)
            }).then(function(result) {
                if (result) {
                    form.submit(); // Gửi form nếu người dùng xác nhận
                }
            });
        });
    });

    document.getElementById("excel_file_input").addEventListener("change", function() {
        document.getElementById("importForm").submit();
    });
</script>
@endpush