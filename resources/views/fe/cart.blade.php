@extends('fe.index')

@section('main')
    <div class="container py-5">
        <h1>Giỏ hàng ({{ number_format($cart->getTotalQuantity()) }})</h1>
        <div class="row">
            <!-- Product List -->
            <div class="col-md-8">
                <h5 class="mb-4">SẢN PHẨM</h5>
                @foreach ($cart->list() as $key => $value)
                    <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                        <img src={{ asset('storage/' . $value['image']) }} alt="Product Image" class="img-fluid rounded"
                            style="width: 100px; height: auto;">
                        <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0">{{ $value['name'] }}</h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="me-3">{{ number_format($value['price']) }} đ</span>
                            <div class="d-flex align-items-center">
                                <input type="number" value="{{ $value['quantity'] }}"
                                    class="form-control form-control-sm mx-2 update-quantity" style="width: 50px;"
                                    data-id="{{ $key }}">
                            </div>
                        </div>
                        <form action="{{ route('cart.remove') }}" method="POST" class="ms-3">
                            @csrf
                            <input type="hidden" name="id" value="{{ $key }}">
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </div>
                @endforeach
                <div class="d-flex justify-content-between">
                    <a href="{{ route('index') }}">
                        <button class="btn btn-outline-danger">&larr; TIẾP TỤC XEM SẢN PHẨM</button>
                    </a>
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Xóa toàn bộ giỏ hàng</button>
                    </form>
                    {{-- <button class="btn btn-danger">CẬP NHẬT GIỎ HÀNG</button> --}}
                </div>
            </div>

            <!-- Summary Section -->
            <div class="col-md-4">
                <h5 class="mb-4">TỔNG SỐ LƯỢNG</h5>
                <ul class="list-unstyled mb-3">
                    <li class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span>Tổng phụ</span>
                        <span>{{ number_format($cart->getTotalPrice()) }} đ</span>
                    </li>
                    <li class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span>Giao hàng</span>
                        <span>Giao hàng miễn phí</span>
                    </li>
                </ul>
                <h6 class="d-flex justify-content-between border-top pt-2">
                    <span>Tổng</span>
                    <span>{{ number_format($cart->getTotalPrice()) }} đ</span>
                </h6>
                <a href="{{ route('cart.checkout') }}">
                    <button class="btn btn-warning w-100 mt-3">TIẾN HÀNH THANH TOÁN</button>
                </a>
                <div class="mt-4">
                    <h6>Phiếu ưu đãi</h6>
                    <input type="text" class="form-control mb-2" placeholder="Mã ưu đãi">
                    <button class="btn btn-outline-secondary w-100">Áp dụng</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.update-quantity').forEach(input => {
            input.addEventListener('change', function() {
                const id = this.dataset.id;
                const quantity = this.value;

                // Gửi yêu cầu AJAX để cập nhật số lượng
                fetch('{{ route('cart.update') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            id,
                            quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            location.reload(); // Reload để cập nhật giỏ hàng
                        }
                    });
            });
        });
    </script>
@endsection
