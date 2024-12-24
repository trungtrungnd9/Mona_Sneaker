@extends('fe.index')

@section('main')
    <div class="container">
        <header class="header">
            <h1>Tin Tức</h1>

        </header>
        <div class="main-content">
            <aside class="sidebar">
                <h3>Bài Viết Mới</h3>
                <ul>
                    <li><a href="#">Converse sẽ mang Golf le Fleur* Chuck 70 về Việt Nam?</a></li>
                    <li><a href="#">Xinh xắn nhất những ngày này là những mẫu giày của...</a></li>
                    <li><a href="#">Fashionista Việt đua nhau sống "ngược" theo trào lưu...</a></li>
                    <li><a href="#">Comme des Garçons Play x Converse nhà hàng mẫu giày...</a></li>
                    <li><a href="#">Hội Thần Kinh Giày xôn xao với hình ảnh 18 ngàn...</a></li>
                </ul>
            </aside>
            <section class="content">
                <h2>Tin Tức</h2>
                <div class="news-item">
                    <img src="https://via.placeholder.com/120" alt="Converse">
                    <div class="info">
                        <h3>Converse sẽ mang Golf le Fleur* Chuck 70 về Việt Nam?</h3>
                        <p>Nhờ cự leak vừa rồi từ nơi sản sinh ra các thành phẩm của Converse...</p>
                        <span class="date">08 Th3</span>
                    </div>
                </div>
                <div class="news-item">
                    <img src="https://via.placeholder.com/120" alt="Giày">
                    <div class="info">
                        <h3>Xinh xắn nhất những ngày này là những mẫu giày của...</h3>
                        <p>Phải tới ngày 27 tới, BST này mới chính thức ra mắt nhưng giờ nó...</p>
                        <span class="date">08 Th3</span>
                    </div>
                </div>
                <div class="news-item">
                    <img src="https://via.placeholder.com/120" alt="Fashionista">
                    <div class="info">
                        <h3>Fashionista Việt đua nhau sống "ngược" theo trào lưu...</h3>
                        <p>Trước lời thách thức của Kaylee và Brian, giới trẻ Việt Nam nói chung...</p>
                        <span class="date">08 Th3</span>
                    </div>
                </div>
                <div class="news-item">
                    <img src="https://via.placeholder.com/120" alt="Comme des Garçons">
                    <div class="info">
                        <h3>Comme des Garçons Play x Converse nhà hàng mẫu giày...</h3>
                        <p>Không phụ lòng mong đợi của các fan, Comme des Garçons Play x...</p>
                        <span class="date">08 Th3</span>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
