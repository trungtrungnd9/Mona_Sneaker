@extends('fe.index')

@section('main')
    <div class="container my-5">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="Product Image">
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p class="text-danger h4">{{ $product->price }} đ</p>

                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng:</label>
                        <input type="number" id="quantity" name="quantity" class="form-control w-25" min="1"
                            value="1">
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg mb-3">Thêm Vào Giỏ</button>

                </form>

            </div>
        </div>

        <div class="mt-5">
            <ul class="nav nav-tabs" id="productTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                        type="button" role="tab" aria-controls="details" aria-selected="true">Thông Tin Bổ
                        Sung</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button"
                        role="tab" aria-controls="reviews" aria-selected="false">Đánh Giá</button>
                </li>
            </ul>
            <div class="tab-content" id="productTabContent">
                <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th>Giới Tính</th>
                            <td>{{ $product->pl == 0 ? 'Nam' : ($product->pl == 1 ? 'Nữ' : 'Trẻ em') }}</td>
                        </tr>
                        <tr>
                            <th>Mô tả</th>
                            <td>{{ $product->description }}</td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <p class="mt-3">Chưa có đánh giá nào cho sản phẩm này.</p>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h3>Sản Phẩm Tương Tự</h3>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-4">
                        <a href="{{ route('show', $product->id) }}" style="text-decoration: none">
                            <div class="card h-100">
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Product">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="text-danger">{{ $product->price }} ₫</p>
                                    <button class="btn btn-primary">Thêm vào giỏ</button>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
