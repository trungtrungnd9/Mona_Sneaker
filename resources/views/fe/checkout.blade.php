@extends('fe.index')


@section('main')
    <div class="container mt-5">
        <h3 class="mb-4 text-center">Thanh Toán</h3>

        <form action="{{ route('cart.processCheckout') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Form thông tin khách hàng -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Thông Tin Khách Hàng</h5>

                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" required placeholder="Nhập họ và tên">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" required placeholder="Nhập email">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <textarea name="address" id="address" class="form-control" rows="3" required placeholder="Nhập địa chỉ">{{ old('address') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ old('phone') }}" required placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thông tin giỏ hàng -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Thông Tin Giỏ Hàng</h5>

                            <ul class="list-group mb-3">
                                @foreach ($cartItems as $key => $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                                        <span>{{ number_format($item['price'] * $item['quantity']) }} đ</span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="d-flex justify-content-between align-items-center">
                                <strong>Tổng tiền:</strong>
                                <h5 class="text-danger">
                                    {{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cartItems))) }}
                                    đ
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nút thanh toán -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        Thanh Toán
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
