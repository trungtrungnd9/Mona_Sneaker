@extends('fe.index')

@section('main')

    <body>
        <div class="container">
            <!-- Breadcrumb -->
            <nav class="breadcrumb">
                <a href="#">Trang chủ</a>{{ $products }}
            </nav>


            <!-- Danh sách sản phẩm -->
            <div class="product-list">
                @foreach ($products as $product)
                    <a href="{{ route('show', $product->id) }}" style="text-decoration: none">
                        <div class="product-item">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Chuck 70 Archive Prints Hi">
                            <h3>{{ $product->name }}</h3>
                            <p class="price">{{ $product->price }} đ</p>
                            <button class="add-to-cart">Thêm vào giỏ</button>
                        </div>
                    </a>
                @endforeach

            </div>


        </div>
    </body>
    {{ $products->links('pagination::bootstrap-5') }}
@endsection
