@extends('admin/layouts-admin/index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh Sách
                    <small>Đơn Hàng</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã Hóa Đơn</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Ngày</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái Đơn Hàng</th>
                        <th>Phương Thức Thanh Toán</th>
                        <th>Chi Tiết</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_order as $key => $ord_pro )
                    <tr class="odd gradeX" align="center">
                        <td>{{ $ord_pro -> Orderid }}</td>
                        <td>{{ $ord_pro -> Customername }}</td>
                        <td>{{ $ord_pro -> Customerphone }}</td>
                        <td>{{ $ord_pro -> OrderDate}}</td>
                        <td>{{ $ord_pro -> TotalMoney }}$</td>
                        @if( $ord_pro -> OrderStatus == 0)
                        <td class="center"><a href="{{ URL::to('admin/order/management_order/Status/' .$ord_pro->Orderid) }}">Chưa Xác Nhận</a></td>
                        @else
                        <td class="center"><a href="{{ URL::to('admin/order/management_order/UnStatus/' .$ord_pro->Orderid) }}">Đã Xác Nhận</a></td>
                        @endif
                        <td>{{ $ord_pro -> Payment }}</td>
                        <td class="center"><a href="{{ URL::to('admin/order/order_details/' .$ord_pro->Orderid) }}"><i class="fas fa-sign-out-alt"></i></a></td>
                        
                        <td class="center">
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" 
                            href="{{URL::to('admin/order/order-delete/'.$ord_pro->Orderid)}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@stop