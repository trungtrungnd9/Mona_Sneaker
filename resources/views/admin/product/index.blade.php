@extends('admin.app')
@section('title')
    Quản lí sản phẩm
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh sách sản phẩm

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
            <div class="col-xs-19">
                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('product.create') }}" class="btn btn-success">+Thêm mới sản phẩm</a>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                    placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mô tả</th>
                                    <th>Giá</th>
                                    <th>Giá sale</th>
                                    <th>Số lượng</th>
                                    <th>Phân loại</th>
                                    <th>Hình ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Stock</th>

                                    <th></th>
                                </tr>

                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->price_sale }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->pl == 0 ? 'Nam' : ($product->pl == 1 ? 'Nữ' : 'Trẻ em') }}
                                        </td>
                                        <td>
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt=""
                                                    width="100px">
                                            @endif
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->stock }}</td>

                                        <td class="align-items" style="display:flex">
                                            <a class="btn btn-warning" href="{{ route('product.edit', $product->id) }}"
                                                style="margin-right:10px">Sửa</a>

                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger"
                                                    onclick="return(confirm('Bạn có chắc muốn xóa không'))">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
