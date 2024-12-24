@extends('fe.index')

@section('main')
    <div class="container my-5">
        <h3 class="text-center mb-4">Chi tiết đơn hàng #{{ $order->id }}</h3>

        <!-- Thông tin đơn hàng -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Thông tin đơn hàng</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li><strong>Họ và tên:</strong> {{ $order->name }}</li>
                    <li><strong>Email:</strong> {{ $order->email }}</li>
                    <li><strong>Số điện thoại:</strong> {{ $order->phone }}</li>
                    <li><strong>Địa chỉ giao hàng:</strong> {{ $order->address }}</li>
                    <li><strong>Ngày đặt hàng:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</li>
                    <li><strong>Tổng tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }}₫</li>
                    <li><strong>Trạng thái:</strong>
                        @if ($order->status == 'pending')
                            <span class="badge bg-warning text-dark">Đang xử lý</span>
                        @elseif ($order->status == 'completed')
                            <span class="badge bg-success">Hoàn thành</span>
                        @elseif($order->status == 'danger')
                            <span class="badge bg-danger">Đã hủy</span>
                        @endif
                    </li>

                </ul>
                @if ($order->status == 'pending')
                    <form action="{{ route('orders.delete', $order->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="danger">
                        <button class="btn btn-danger mt-3">Hủy đơn hàng</button>
                    </form>
                @endif
            </div>

        </div>

        <!-- Danh sách sản phẩm trong đơn hàng -->
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
                                    <td>{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}₫</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Nút quay lại -->
        <div class="mt-4 text-center">
            <a href="{{ route('orders.show') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Quay lại danh sách đơn hàng
            </a>
        </div>
    </div>
@endsection
