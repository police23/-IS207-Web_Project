@extends('layouts.app')
@section('content')
<main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Đơn hàng</h2>
        @if(session('success'))
            <div class="alert alert-success" style="padding: 10px; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-2">
                @include('user.account-nav')
            </div>

            <div class="col-lg-10" style="margin-left: auto; text-align: right;">
                <div class="wg-table table-all-user" style="width: calc(95% - 1cm); margin-left: auto;">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead style="background-color: #7e3af2; color: white;">
                                <tr>
                                    <th style="width: 80px">Mã đơn</th>
                                    <th class="text-center" style="width: 60px;">Số sản phẩm</th>
                                    <th class="text-center">Tổng tiền</th>
                                    <th class="text-center">Ngày đặt</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="text-center">{{ $order->order_id }}</td>  
                                    <td class="text-center" style="width: 100px;">{{ $order->orderDetails->sum('quantity') }}</td>
                                    <td class="text-center">{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
                                    <td class="text-center">{{ $order->created_at }}</td>
                                    <td class="text-center">
                                        @if($order->status == 'Canceled')
                                        <span class="badge" style="background-color: #dc3545; color: white;">Đã hủy</span>
                                        @elseif($order->status == 'Ordered')
                                        <span class="badge" style="background-color: #ffc107; color: black;">Đã đặt</span>
                                        @else
                                        <span class="badge" style="background-color: #28a745; color: white;">Đã giao</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('account.order_details', $order->order_id) }}">
                                            <div class="list-icon-function view-icon">
                                                <div class="item eye">
                                                    <i class="fa fa-eye"></i>
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
                
                </div>
            </div>
            
        </div>
    </section>
</main>
@endsection