@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Tất cả khách hàng</h3>
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
                    <div class="text-tiny">Tất cả khách hàng</div>
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
            </div>
            <div class="table-responsive">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 10%">Tên đăng nhập</th>
                            <th style="width: 15%">Họ và tên</th>
                            <th style="width: 15%">Email</th>
                            <th style="width: 15%">Số điện thoại</th>
                            <th style="width: 15%">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id-1 }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phonenumber }}</td>
                            <td>
                                <div class="list-icon-function">
                                    <a href="{{ route('admin.customer.edit', ['id'=>$user->id] )}}">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="{{ route('admin.customer.delete', ['id'=>$user->id])}}" method="POST">
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
                {{ $users->links('pagination::bootstrap-5') }}
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
