@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Đơn hàng</h3>
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
                    <div class="text-tiny">Đơn hàng</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <form method="GET" action="{{ route('admin.orders') }}" class="form-search d-flex flex-wrap align-items-end gap-3">
                <!-- Phần tìm kiếm từ khóa -->
                <div class="form-group">
                    <label for="search_keyword" class="form-label fs-5 fw-bold">Tìm kiếm:</label>
                    <input type="text" id="search_keyword" name="search_keyword" placeholder="Tìm kiếm" class="form-control" value="{{ request('search_keyword') }}">
                </div>

                <!-- Phần lọc theo khoảng thời gian -->
                <div class="form-group">
                    <label for="start_date" class="form-label fs-5 fw-bold">Ngày bắt đầu:</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="form-group">
                    <label for="end_date" class="form-label fs-5 fw-bold">Ngày kết thúc:</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>

                <!-- Phần lọc theo thành tiền -->
                <div class="form-group" style="max-width: 150px;">
                    <label for="min_price" class="form-label fs-5 fw-bold">Tổng tối thiểu:</label>
                    <input type="number" id="min_price" name="min_price" class="form-control" value="{{ request('min_price') }}" step="0.01" placeholder="e.g. 100.00">
                </div>
                <div class="form-group" style="max-width: 150px;">
                    <label for="max_price" class="form-label fs-5 fw-bold">Tổng tối đa:</label>
                    <input type="number" id="max_price" name="max_price" class="form-control" value="{{ request('max_price') }}" step="0.01" placeholder="e.g. 1000.00">
                </div>

                <!-- Nút hành động -->
                <div class="form-group w-100 d-flex justify-content-end">
                    <a href="{{ route('admin.orders') }}" class="tf-button style-1 me-4" style="margin-right: 1cm;"><i class="icon-refresh"></i>Làm mới</a>
                    <button type="submit" class="tf-button style-1"><i class="icon-search"></i>Tìm kiếm</button>
                </div>
            </form>

            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:70px">Mã đơn</th>
                                <th class="text-center" style="width:200px">Họ tên</th>
                                <th class="text-center">Số điện thoại</th>
                        
                                <th class="text-center">Ngày đặt hàng</th>
                                <th class="text-center" style="width:80px">Tổng số lượng</th>
                                <th class="text-center">Tổng tiền</th>
                                <th class="text-center">Ngày giao hàng</th>
                                <th class="text-center">Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td class="text-center">{{$order->order_id}}</td>
                                <td class="text-center" style="width:200px">{{ $order->user->fullname}}</td> <!-- Shrink Name column -->
                                <td class="text-center">{{ $order->user->phonenumber }}</td>
                               
                                <td class="text-center">{{ $order->created_at->format('Y-m-d') }}</td>
                                <td class="text-center">{{ $order->orderDetails->sum('quantity') }}</td>
                                <td class="text-center">{{ $order->total_price}}</td>
                                <td class="text-center">{{ $order->delivery_date }}</td>
                                <td class="text-center">
                                    @if($order->status == 'Canceled')
                                    <span class="badge bg-danger">Đã hủy</span>
                                    @elseif($order->status == 'Ordered')
                                    <span class="badge bg-warning">Đã đặt</span>
                                    @else
                                    <span class="badge bg-success">Đã giao</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('admin.order.details', ['order_id'=>$order->order_id])}}">
                                        <div class="list-icon-function view-icon">
                                            <div class="item eye">
                                                <i class="icon-eye"></i>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $orders->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>
</div>
@endsection