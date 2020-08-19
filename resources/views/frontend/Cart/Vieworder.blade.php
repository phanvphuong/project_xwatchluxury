@extends('layouts.app_master_frontend')
@section('content')
<?php
?>
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h4 class="breadcrumb-header">Danh Sách Đơn Hang Của Bạn</h4>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<div class="container">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>Mã Hóa Đơn</th>
                <th>Tên Người Nhận</th>
                <th>Điện Thoại</th>
                <th>Ngày Đặt</th>
                <th>Địa Chỉ</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th>Thanh Toán</th>
                <th>Chi Tiết</th>
                
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order_by_customer as $key =>$info)
            <tr class="odd gradeX" align="center">
                <td>{{$info ->Orderid }}</td>
                <td>{{$info ->RecipientName }}</td>
                <td>{{$info ->RecipientPhone }}</td>
                <td>{{$info ->OrderDate}}</td>
                <td>{{$info ->RecipientAddress}}</td>
                <td>{{$info ->TotalMoney }}$</td>
                @if($info ->OrderStatus == 1)
                <td>Đã Xác Nhân.</td>
                @else
                <td>    Chưa Xác Nhân.</td>
                @endif
                <td>{{$info ->Payment }}</td>
                
                <td class="center"><a href="{{URL::to('details_order/'.$info->Orderid)}}"><i class="fas fa-sign-out-alt"></i></a></td>
                @if($info ->OrderStatus == 0)
                <td class="center">
                    <a onclick="return confirm('Are you sure to delete?')" 
                    href="{{URL::to('delete_order/'.$info->Orderid)}}"><i class="fas fa-trash-alt"></i></a>
                </td>
                @else
                <td><i class="fas fa-exclamation-triangle"></i></td>
                @endif
            </tr>
            @endforeach
            
        </tbody>
    </table>
    <div class="invoice-box" align="center">
        <a href="{{ route('frontend.home.index_frontend') }}" class="btn btn-primary"><i class="fa fa-backward"></i> Quay Lại Mua Hàng</a>
    </div>
</div>
@stop