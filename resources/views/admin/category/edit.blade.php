@extends('admin.app')
@section('title')
    Quản lí danh mục
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sửa danh mục

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
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $category->name }}">
                            </div>


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a class="btn btn-danger" href="{{ route('category.index') }}">Quay lại</a>
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
