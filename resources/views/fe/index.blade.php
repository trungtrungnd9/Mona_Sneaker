<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mona Sneaker </title>
    <link rel="stylesheet" href="{{ asset('fe-asset') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('fe-asset') }}/css/login.css">
    <link rel="stylesheet" href="{{ asset('fe-asset') }}/css/singup.css">
    <link rel="stylesheet" href="{{ asset('fe-asset') }}/css/about.css">
    <link rel="stylesheet" href="{{ asset('fe-asset') }}/css/phanloai.css">
    <link rel="stylesheet" href="{{ asset('fe-asset') }}/css/tintuc.css">
    <link rel="stylesheet" href="{{ asset('fe-asset') }}/css/lienhe.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <!-- Header Section -->
    <header class="header">
        <div class="top-bar py-2 bg-light border-bottom">
            <div class="container d-flex justify-content-between align-items-center">
                <!-- Phần chào mừng -->
                <div class="d-flex align-items-center">
                    @if (Auth::check())
                        <h6 class="mb-0 me-3 text-secondary">Xin chào: <strong>{{ Auth::user()->name }}</strong></h6>
                    @else
                        <a href="{{ route('login') }}" class="text-decoration-none text-secondary fw-semibold">Đăng
                            nhập</a>
                    @endif
                </div>

                <!-- Phần liên kết -->
                <div class="d-flex align-items-center gap-3">


                    @if (Auth::check())
                        <a href="{{ route('cart.index') }}" class="text-decoration-none text-secondary fw-semibold">
                            <i class="bi bi-cart me-1"></i>Giỏ hàng
                        </a>
                        <a href="{{ route('orders.show') }}" class="text-decoration-none text-secondary fw-semibold">
                            <i class="bi bi-bag-check me-1"></i>Đơn hàng của bạn
                        </a>
                    @endif

                    @if (Auth::check() && Auth::user()->role == 1)
                        <a href="{{ route('logon') }}" class="text-decoration-none text-secondary fw-semibold">
                            <i class="bi bi-shield-lock me-1"></i>Admin
                        </a>
                    @endif

                    @if (Auth::check())
                        <a href="{{ route('logout') }}" class="text-decoration-none text-danger fw-semibold">
                            <i class="bi bi-box-arrow-right me-1"></i>Đăng xuất
                        </a>
                    @endif
                </div>
            </div>
        </div>


        <div class="main-header">
            <div class="container">
                <h1 class="logo">MONA <span>SNEAKER</span></h1>
                <nav class="navigation">
                    <ul>
                        <li><a href="/">Trang Chủ</a></li>
                        <li><a href="{{ route('about') }}">Giới Thiệu</a></li>
                        <li><a href="{{ route('nu') }}">Nữ</a></li>
                        <li><a href="{{ route('nam') }}">Nam</a></li>
                        <li><a href="{{ route('treem') }}">Trẻ Em</a></li>
                        <li><a href="{{ route('dmphukien') }}">Phụ Kiện</a></li>
                        <li><a href="{{ route('tintuc') }}">Tin Tức</a></li>
                        <li><a href="{{ route('lienhe') }}">Liên Hệ</a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </header>

    <div>
        @yield('main')
    </div>

    <!-- Footer Section -->
    <footer class="footer" style="margin-top: 90px">
        <div class="container">
            <div class="footer-about">
                <h3>Giới Thiệu</h3>
                <p style="max-width:370px">Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng chữ, mỗi chi
                    tiết và hình ảnh đều là
                    những bằng chứng mang dấu ấn lịch sử Converse 100 năm, và đang không ngừng phát triển lớn mạnh.</p>
            </div>
            <div class="footer-contact">
                <h3>Địa Chỉ</h3>
                <p>Cổ Nhuế, Quận Bắc Từ Liêm, Tp.HN</p>
                <p>076 922 0162</p>
                <p>demomona@gmail.com</p>
                <p>mon@mona.media</p>
                <p>demomona</p>
            </div>
            <div class="footer-newsletter">
                <h3>Đăng ký nhận thông tin</h3>
                <input type="email" placeholder="Email của bạn">
                <button>Đăng ký</button>
            </div>
        </div>
    </footer>

    <script src="{{ asset('fe-asset') }}/js/slideshow.js"></script>
</body>

</html>
