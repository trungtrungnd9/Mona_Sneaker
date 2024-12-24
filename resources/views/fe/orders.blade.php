@extends('fe.index')

@section('main')
    <div class="container my-5">
        <h3 class="text-center mb-4">Đơn hàng của bạn</h3>

        <!-- Kiểm tra nếu không có đơn hàng -->
        @if ($orders->isEmpty())
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle"></i> Bạn chưa có đơn hàng nào.
                <br>
                <a href="/" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
            </div>
        @else
            <!-- Danh sách đơn hàng -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Lịch sử đơn hàng</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $order->id }}</strong></td>
                                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ number_format($order->total_price, 0, ',', '.') }}₫</td>
                                        <td>
                                            @if ($order->status == 'pending')
                                                <span class="badge bg-warning text-dark">Đang xử lý</span>
                                            @elseif ($order->status == 'completed')
                                                <span class="badge bg-success">Hoàn thành</span>
                                            @elseif($order->status == 'danger')
                                                <span class="badge bg-danger">Đã hủy</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('orders.showDetails', $order->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="bi bi-eye"></i> Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
