@extends('fe.index')

@section('main')
    <div class="slideshow-container">
        <div class="slides">
            <img src="{{ asset('fe-asset') }}/images/slide1.jpg" alt="Slide 1">
        </div>
        <div class="slides">
            <img src="{{ asset('fe-asset') }}/images/slide2.jpg" alt="Slide 2">
        </div>
        <div class="slides">
            <img src="{{ asset('fe-asset') }}/images/slide3.jpg" alt="Slide 3">
        </div>
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>
    <!-- Product Sections -->
    <section class="products">
        <div class="container">
            <h2>Sản Phẩm Nổi bật</h2>
            <a href=""></a>
            <div class="product-list">
                @foreach ($spnoibats as $spnoibat)
                    <a href="{{ route('show', $spnoibat->id) }}" style="text-decoration: none">
                        <div class="product-item">
                            <img src="{{ asset('storage/' . $spnoibat->image) }}" alt="Product">
                            <h3>{{ $spnoibat->name }}</h3>
                            <p>{{ $spnoibat->price }} ₫</p>
                            <button>Thêm vào giỏ</button>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>
    <section class="products">
        <div class="container">
            <h2>Phụ kiện khác</h2>
            <a href=""></a>
            <div class="product-list">
                @foreach ($products as $product)
                    <a href="{{ route('show', $product->id) }}" style="text-decoration: none">
                        <div class="product-item">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->price }} ₫</p>
                            <button>Thêm vào giỏ</button>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Banner Section -->
    <section class="discount-banner">
        <h2>Khuyến Mãi Giảm Giá 50%</h2>
        <button>Xem Sản Phẩm</button>
    </section>

    <!-- Discount Products Section -->
    <section class="discount-products">
        <div class="container">
            <h2>Sản Phẩm Giảm Giá</h2>
            <div class="product-list">

                @foreach ($products_sale as $item)
                    <div class="product-item">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Product">
                        <h3>{{ $item->name }}</h3>
                        <p><del>{{ $item->price }} ₫</del> {{ $item->price_sale }} ₫</p>
                        <button>Thêm vào giỏ</button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container mt-7">
        <div class="row text-center">
            <!-- Mục 1 -->
            <div class="col-md-3">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-check-circle-fill text-danger fs-3 me-2"></i>
                    <span>Sản phẩm chất lượng</span>
                </div>
            </div>

            <!-- Mục 2 -->
            <div class="col-md-3">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-truck text-danger fs-3 me-2"></i>
                    <span>Miễn phí vận chuyển</span>
                </div>
            </div>

            <!-- Mục 3 -->
            <div class="col-md-3">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-arrow-left-right text-danger fs-3 me-2"></i>
                    <span>Hoàn tiền nếu không giống mô tả</span>
                </div>
            </div>

            <!-- Mục 4 -->
            <div class="col-md-3">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-telephone-fill text-danger fs-3 me-2"></i>
                    <span>Hỗ trợ 24/7</span>
                </div>
            </div>
        </div>
    </div>
@endsection
