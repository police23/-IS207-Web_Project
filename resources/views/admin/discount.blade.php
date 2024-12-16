@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Tất cả mã giảm giá</h3>
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
                    <div class="text-tiny">Tất cả mã giảm giá</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Tìm kiếm tại đây..." class="form-control" name="code"
                                tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit" style="margin-top: -15px;">
                            <button class="tf-button style-1" type="submit" style="background: none; border: none;"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="d-flex gap-3 align-items-center">
                    <a href="{{ route('admin.coupon.add') }}" class="tf-button style-1 d-flex align-items-center gap-2">
                        <i class="icon-plus" style="font-size: 1.2rem;"></i>
                        Thêm mới
                    </a>
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
                            <th style="width: 20%">Mã giảm giá</th>
                            <th style="width: 15%">Loại giảm giá</th>
                            <th style="width: 15%">Giá trị giảm giá</th>
                            <th style="width: 10%">Đã sử dụng</th>
                            <th style="width: 10%">Số lượng</th>
                            <th style="width: 15%">Đơn hàng tối thiểu</th>
                            <th style="width: 15%">Ngày hết hạn</th>
                            <th style="width: 15%">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->code }}</td>
                            <td>
                                @if($coupon->type == 'percentage')
                                    Theo phần trăm
                                @elseif($coupon->type == 'fixed')
                                    Theo số tiền
                                @endif
                            </td>
                            <td>
                                @if($coupon->type == 'percentage')
                                    {{ $coupon->value }}%
                                @elseif($coupon->type == 'fixed')
                                    {{ number_format($coupon->value, 0, ',', '.') }} VNĐ
                                @endif
                            </td>
                            <td>{{ $coupon->usage_count }}</td>
                            <td>{{ $coupon->max_usage }}</td>
                            <td>{{ number_format($coupon->minimum_order_value, 0, ',', '.') }} VNĐ</td>
                            <td>{{ \Carbon\Carbon::parse($coupon->expiry_date)->format('d-m-Y') }}</td>
                            <td>
                                <div class="list-icon-function">
                                    <a href="{{ route('admin.coupon.edit', ['id'=>$coupon->id] )}}">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="{{ route('admin.coupon.delete', ['id'=>$coupon->id])}}" method="POST">
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
                {{ $coupons->links('pagination::bootstrap-5') }}
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