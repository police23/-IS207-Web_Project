@extends('layouts.admin')
@section('content')
    <style>
                            .table-transaction>tbody>tr:nth-of-type(odd) {
                                --bs-table-accent-bg: #fff !important;
                            }
                        </style>
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Chi tiết đơn hàng</h3>
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
                                            <div class="text-tiny">Order Items</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <h5>Thông tin đơn hàng</h5>
                                        </div>
                                        <a class="tf-button style-1 w208" href="{{ route('admin.orders') }}">Back</a>
                                    </div>
                                    <div class="table-responsive">
                                        @if (Session::has('success'))
                                            <p class="alert alert-success">{{ Session::get('success')}}</p>
                                        @endif
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Mã đơn</th>
                                                    <th class="text-center">Số điện thoại</th>
                                                    <th class="text-center">Ngày đặt hàng</th>
                                                    <th class="text-center">Địa chỉ giao hàng</th>
                                                    <th class="text-center">Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">{{$order->order_id}}</td>
                                                <td class="text-center">{{$order->user->phonenumber}}</td>
                                                <td class="text-center">{{$order->created_at->format('Y-m-d');}}</td>
                                                <td class="text-center">{{$order->delivery_address}}</td>
                                                <td class="text-center">
                                                    @if($order->status == 'Canceled')
                                                    <span class="badge bg-danger">Đã huỷ</span>
                                                    @elseif($order->status == 'Ordered')
                                                    <span class="badge bg-warning">Đã đặt</span>
                                                    @else
                                                    <span class="badge bg-success">Đã giao</span>
                                                    @endif
                                                </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="divider"></div>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <h5>Sản phẩm</h5>
                                        </div>
                                        <a class="tf-button style-1 w208" href="orders.html">Back</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Tên sản phẩm</th>
                                                    <th class="text-center">Màu sắc</th>
                                                    <th class="text-center">Giá</th>
                                                    <th class="text-center">Số lượng</th>
                                                    <th class="text-center">Thành tiền</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderDetails as $detail)
                                                <tr>

                                                    <td class="pname">
                                                        <div class="image">
                                                            <img src="{{ asset('uploads/products/thumbnails')}}/{{$detail->phoneVariant->image}}" alt="{{$detail->phoneVariant->phone_variants_name}}" class="image">
                                                        </div>
                                                        <div class="name">
                                                            <a href="#" target="_blank"
                                                                class="body-title-2">{{$detail->phoneVariant->phone_variants_name}}</a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{$detail->phoneVariant->color}}</td>
                                                    <td class="text-center">{{number_format($detail->price, 0, ',', '.')}}</td>
                                                    <td class="text-center">{{$detail->quantity}}</td>
                                                    <td class="text-center">{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}</td>
                                                    <td class="text-center">
                                                        <div class="list-icon-function view-icon">
                                                            <div class="item eye">
                                                                <i class="icon-eye"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                        {{ $orderDetails->links('pagination::bootstrap-5')}}
                                    </div>
                                </div>

                                {{-- <div class="wg-box mt-5">
                                    <h5>Shipping Address</h5>
                                    <div class="my-account__address-item col-md-6">
                                        <div class="my-account__address-item__detail">
                                            <p>Divyansh Kumar</p>
                                            <p>Flat No - 13, R. K. Wing - B</p>
                                            <p>ABC, DEF</p>
                                            <p>GHT, </p>
                                            <p>AAA</p>
                                            <p>000000</p>
                                            <br>
                                            <p>Mobile : 1234567891</p>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="wg-box mt-5">
                                    <h5>Transactions</h5>
                                    <table class="table table-striped table-bordered table-transaction">
                                        <thead>
                                            <tr>
                                                <td class="text-center">Tổng tiền</td>
                                                <td class="text-center">Phí ship</td>
                                                <td class="text-center">Phương thức thanh toán</td>
                                                <td class="text-center">Tổng thanh toán</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
                                                <td class="text-center">{{ number_format($order->shipping_fee, 0, ',', '.') }}đ</td>
                                                <td class="text-center">{{ $order->payment_method}}</td>
                                                <td class="text-center">{{ number_format($order->total_price + $order->shipping_fee, 0, ',', '.') }}đ</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <div class="wg-box mt-5">
                                    <h5>Update Order Status</h5>
                                    <form action="{{ route('admin.order.status.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="order_id" value="{{ $order->order_id}}">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select name="order_status" id="order_status">
                                                    <option value="Ordered" {{$order->status == 'Ordered' ? "selected" : ""}}>Đã đặt</option>
                                                    <option value="Delivered" {{$order->status == 'Delivered' ? "selected" : ""}}>Đã giao</option>
                                                    <option value="Canceled" {{$order->status == 'Canceled' ? "selected" : ""}}>Đã hủy</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-primary tf-button w200">Update Status</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
@endsection