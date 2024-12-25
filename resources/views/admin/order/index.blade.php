@extends('admin.app')
@section('title')
    Quản lí đơn hàng
@endsection



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh sách đơn hàng

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

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $order->id }}</strong></td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ number_format($order->total_price, 0, ',', '.') }}₫</td>
                                        <td>
                                            @if ($order->status == 'pending')
                                                <span class="badge bg-warning text-dark">Đang xử lý</span>
                                            @elseif ($order->status == 'completed')
                                                <span class="badge bg-success">Hoàn thành</span>
                                            @else
                                                <span class="badge bg-danger">Đã hủy</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="bi bi-eye"></i> Xem
                                            </a>
                                            {{-- <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="status" value="completed"
                                                    class="btn btn-sm btn-success">
                                                    <i class="bi bi-check-circle"></i> Hoàn thành
                                                </button>
                                                <button type="submit" name="status" value="canceled"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="bi bi-x-circle"></i> Hủy
                                                </button> --}}
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
