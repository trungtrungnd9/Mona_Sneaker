@extends('fe.index')

@section('main')
    <div class="signup-container">
        <div class="signup-card">
            <h2>Đăng Ký</h2>
            <form action="{{ route('singup') }}" method="POST" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Họ và Tên</label>
                    <input type="text" id="name" name="name" placeholder="Nhập họ và tên của bạn" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Nhập Lại Mật Khẩu</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Nhập lại mật khẩu"
                        required>
                </div>
                <button type="submit" class="signup-button">Đăng Ký</button>
                <p class="login-text">Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập ngay</a></p>
            </form>
        </div>
    </div>
@endsection
