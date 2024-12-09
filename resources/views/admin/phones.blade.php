@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>All Products</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{ route('admin.index') }}">
                                                <div class="text-tiny">DashBoard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">All Phones</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="d-flex gap-3 align-items-center">
                                        <!-- Nút Add New -->
                                        <a 
                                            href="{{ route('admin.phone.add') }}" 
                                            class="btn btn-primary btn-lg d-flex align-items-center gap-2"
                                        >
                                            <i class="icon-plus" style="font-size: 1.2rem;"></i>
                                            Add new
                                        </a>

                                        <!-- Form Import -->
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
                                            
                                            <!-- Nút Import -->
                                            <label 
                                                for="excel_file_input" 
                                                class="btn btn-success btn-lg mb-0 d-flex align-items-center gap-2"
                                            >
                                                <i class="icon-upload"></i>
                                                Import CSV
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
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Brand</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($phones as $phone)
                                                <tr>
                                                    <td>{{ $phone->id }}</td>
                                                    <td>{{ $phone->phone_name }}</td>
                                                    <td>{{ $phone->brand->brand_name}}</td>
                                                    <td>
                                                        <div class="list-icon-function">
                                                            {{-- <a href="#" target="_blank">
                                                                <div class="item eye">
                                                                    <i class="icon-eye"></i>
                                                                </div>
                                                            </a> --}}
                                                            <button class="btn btn-sm btn-primary toggle-variants" data-phone-id="{{ $phone->id }}">
                                                                <i class="bicon-eye"></i> Variants
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
                                                    <td colspan="4">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                <th>Variant Name</th>
                                                                <th>Color</th>
                                                                <th>Storage</th>
                                                                <th>Price</th>
                                                                <th>Sale Price</th>
                                                                <th>Quantity</th>
                                                                <th>Image</th>
                                                                <th>Stock</th>
                                                                <th>Featured</th>
                                                                <th>Action</th>
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
                                                                <td>{{ $variant->featured == 1 ? "Yes" : "No" }}</td>
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
                title: 'Are you sure?',
                text: 'You want to delete this record?',
                icon: 'warning', // Thay 'type' bằng 'icon'
                buttons: ['No', 'Yes'], // Thay 'button' bằng 'buttons'
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