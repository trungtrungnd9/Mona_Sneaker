@extends('fe.index')

@section('main')
    <div class="login-container">
        <div class="login-card">
            <h2>Đăng Nhập</h2>
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
                </div>
                <button type="submit" class="login-button">Đăng Nhập</button>
                <p class="signup-text">Chưa có tài khoản? <a href="{{ route('singup') }}">Đăng ký ngay</a></p>
            </form>
        </div>
    </div>
@endsection
