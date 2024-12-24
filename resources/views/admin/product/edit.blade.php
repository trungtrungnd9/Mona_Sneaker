@extends('admin.app')
@section('title')
    Quản lí sản phẩm
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sửa sản phẩm

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">

                    <!-- /.box-header -->
                    <!-- form start -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Mô tả</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm</label>
                                <input type="number" class="form-control" name="price" id="price"
                                    value="{{ $product->price }}">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Số lượng</label>
                                <input type="number" class="form-control" name="quantity" id="quantity"
                                    value="{{ $product->quantity }}">
                            </div>
                            <div class="form-group">
                                <label for="pl">Phân loại</label>
                                <select name="pl" id="pl" class="form-control">
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                    <option value="2">Trẻ em</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Hình ảnh</label>
                                <img src="{{ asset('storage/' . $product->image) }}" alt="" width="100px">
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Danh mục</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categoris as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a class="btn btn-danger" href="{{ route('product.index') }}">Quay lại</a>
                        </div>
                    </form>
                </div>

                <!-- /.box -->

            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
