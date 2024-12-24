@extends('fe.index')

@section('main')
    <div class="container">
        <div class="contact-info">
            <h2>Thông Tin Liên Hệ</h2>
            <p><i>📍</i>Cổ Nhuế, Quận Bắc Từ Liêm, Tp.HN</p>
            <p><i>📞</i>076 922 0162</p>
            <p><i>✉️</i>demomona@gmail.com</p>
            <p><i>🌐</i>mon@mona.media</p>
            <p><i>🔗</i>@demomona</p>
        </div>
        <form class="contact-form">
            <input type="text" placeholder="Họ và Tên" required>
            <input type="email" placeholder="Email" required>
            <input type="text" placeholder="Số Điện Thoại" required>
            <input type="text" placeholder="Địa Chỉ">
            <textarea placeholder="Lời Nhắn" required></textarea>
            <button type="submit">Gửi</button>
        </form>
    </div>
@endsection
