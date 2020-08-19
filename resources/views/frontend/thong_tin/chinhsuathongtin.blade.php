@extends('layouts.app_master_frontend')
@section('content')
<!-- Page Content -->
<div class="invoice-box">
    <div class="billing-details" id="billing-details">
 
    <form role="form" action="{{ url("frontend/thong_tin/updateProcess/{$customer_info -> Customername}")}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

        <div class="card-body">
                <H1 style="color:blue;">Chỉnh sửa thông tin</H1>
                <div class="form-group">
                    <label>Tên đăng nhập</label>
                    <input type="text" name="username" id="username" class="form-control" style="margin-bottom:1vw;" value="{{ $customer_info -> Customername }}" reaonly>
                </div>


                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" style="margin-bottom:1vw;" value="{{ $customer_info -> Customerpass }}">
                </div> 

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" style="margin-bottom:1vw;" value="{{ $customer_info -> Customeremail }}">
                </div>

                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control" style="margin-bottom:1vw;" value="{{ $customer_info -> Customerphone }}">
                </div> 
                
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" id="address" class="form-control" style="margin-bottom:1vw;" value="{{ $customer_info -> Customeraddress }}">
                </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                Cập nhật thông tin
            </button>
        </div>

    </form>

    </div>
</div>
@stop

