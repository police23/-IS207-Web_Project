@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Hãng</h3>
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
                    <div class="text-tiny">Hãng</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Tìm kiếm tại đây..." class="" name="name"
                                tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('admin.brand.add') }}"><i
                        class="icon-plus"></i>Thêm mới</a>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 7%;">ID</th>
                                <th >Tên</th>
                                <th style="width: 10%;">Số sản phẩm</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td class="pname">
                                    <div class="name">
                                        <a href="#" class="body-title-2">{{ $brand->brand_name }}</a>
                                    </div>
                                </td>
                                <td>{{ $brand->phones->sum(function($phone) { return $phone->phoneVariants->count(); }) }}</td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('admin.brand.edit', ['id'=>$brand->id])}}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{ route('admin.brand.delete', ['id'=>$brand->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="item text-danger delete">
                                                <i class="icon-trash-2"></i>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $brands->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
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
</script>
@endpush
