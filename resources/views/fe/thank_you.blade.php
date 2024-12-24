@extends('fe.index')

@section('main')
    <div class="container mt-5 text-center">
        <div class="card shadow-sm mx-auto" style="max-width: 600px; border-radius: 15px;">
            <div class="card-body py-5">
                <h2 class="text-success mb-4">Cảm Ơn Bạn Đã Mua Hàng!</h2>
                <p class="mb-4">
                    Chúng tôi đã nhận được đơn hàng của bạn. Đơn hàng sẽ được xử lý và giao đến bạn trong thời gian sớm
                    nhất.
                </p>
                <div class="my-4">
                    <a href="{{ route('index') }}" class="btn btn-primary btn-lg">
                        Tiếp Tục Mua Sắm
                    </a>
                </div>
                <hr>
                <p class="small text-muted">Nếu có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi qua <strong>Hotline:
                        1900-1234</strong> hoặc email <strong>support@shop.com</strong>.</p>
            </div>
        </div>
    </div>
@endsection
