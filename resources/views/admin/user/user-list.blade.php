@extends('admin/layouts-admin/index')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách
                            <small>Người Dùng</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 --> 
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã Khách Hàng</th>
                                <th>Tên Khách Hàng</th>
                                <th>Password</th>
                                <th>Email Khách Hàng</th>
                                <th>Điên Thoại</th> 
                                <th>Địa Chỉ</th> 
                                <th>Xóa</th>
                            </tr>
                        </thead> 
                        <tbody> 
                            @foreach($customer as $customer_info)
                            <tr>
                                <td>{{$customer_info -> Customerid}}</td>
                                <td>{{$customer_info -> Customername}}</td>
                                <td>{{$customer_info -> Customerpass}}</td>
                                <td>{{$customer_info -> Customeremail}}</td>
                                <td>{{$customer_info -> Customerphone}}</td>
                                <td>{{$customer_info -> Customeraddress}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                    <a onclick="return confirm('Are you sure to delete?')" href="{{url("admin/user/delete_customer/{$customer_info -> Customername}")}}"> Xóa</a>
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
@endsection