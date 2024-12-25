@extends('admin.app')
@section('title')
    Quản lí đơn hàng
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Chi tiết đơn hàng

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="col-xs-19">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="container my-5">
                            <h3 class="text-center mb-4">Chi tiết đơn hàng #{{ $order->id }}</h3>

                            <!-- Thông tin đơn hàng -->
                            <div class="card mb-4">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Thông tin đơn hàng</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li><strong>Khách hàng:</strong> {{ $order->name }}</li>
                                        <li><strong>Email:</strong> {{ $order->email }}</li>
                                        <li><strong>Số điện thoại:</strong> {{ $order->phone }}</li>
                                        <li><strong>Địa chỉ:</strong> {{ $order->address }}</li>
                                        <li><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</li>
                                        <li><strong>Tổng tiền:</strong>
                                            {{ number_format($order->total_price, 0, ',', '.') }}₫</li>
                                        <li><strong>Trạng thái:</strong>
                                            @if ($order->status == 'pending')
                                                <span class="  text-dark">Đang xử lý</span>
                                            @elseif ($order->status == 'completed')
                                                <span class=" ">Hoàn thành</span>
                                            @else
                                                <span class=" ">Đã hủy</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Danh sách sản phẩm -->
                            <div class="card">
                                <div class="card-header bg-secondary text-white">
                                    <h5 class="mb-0">Sản phẩm trong đơn hàng</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Đơn giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->details as $detail)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $detail->product_name }}</td>
                                                        <td>{{ number_format($detail->price, 0, ',', '.') }}₫</td>
                                                        <td>{{ $detail->quantity }}</td>
                                                        <td>{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}₫
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Cập nhật trạng thái -->
                            <div class="mt-4 text-center">
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PUT')

                                    @if ($order->status == 'pending')
                                        <button type="submit" name="status" value="completed" class="btn btn-success">
                                            <i class="bi bi-check-circle"></i> Hoàn thành
                                        </button>
                                        <button type="submit" name="status" value="canceled" class="btn btn-danger">
                                            <i class="bi bi-x-circle"></i> Hủy đơn hàng
                                        </button>
                                    @endif
                                </form>
                                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Quay lại danh sách đơn hàng
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
