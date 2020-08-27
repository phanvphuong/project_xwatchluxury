@extends('layouts.app_master_frontend')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h4 class="breadcrumb-header">Thanh Toán</h4>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<div class="section">
    <?php 
        $content = Cart::content();
    ?>
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-7">
                <!-- Customer info -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Thông Tin Khách Hàng</h3>
                    </div>
                    <div class="form-group">
                        <label>Tên Khách Hàng</label>
                        <input class="input" type="text" readonly value="{{$customer_info -> Customername}}">
                    </div>
                    <div class="form-group">
                        <label>Email Khách Hàng</label>
                        <input class="input" type="email" readonly value="{{$customer_info -> Customeremail}}">
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ Khách Hàng</label>
                        <input class="input" type="text" readonly value="{{$customer_info -> Customeraddress}}">
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input class="input" type="tel" readonly value="{{$customer_info -> Customerphone}}">
                    </div>
                </div>
                <!-- /Customer info -->
                <!-- Shiping Details -->
                <div class="shiping-details">
                    <div class="section-title">
                        <h3 class="title">Địa Chỉ Giao Hàng</h3>
                    </div>
                    <form action="{{ URL::to('/save_Delivery_address') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên Người Nhận</label>
                            <input class="input" type="text" name="Recipient_Name" value="{{$customer_info -> Customername}}" title="Nhập tên người Nhận." pattern="[a-zA-Z]+" required>
                        </div>
                        <div class="form-group">
                            <label>Email Người Nhận</label>
                            <input class="input" type="email" name="Recipient_Email" value="{{$customer_info -> Customeremail}}" title="Nhập Email người nhận." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ Người Nhận</label>
                            <input class="input" type="text" name="Recipient_Address" value="{{$customer_info -> Customeraddress}}" title="Nhập Địa chỉ người nhận." pattern="[A-Za-z0-9'\.\-\s\,]" required>
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại Người Nhận</label>
                            <input class="input" type="text" name="Recipient_Phone" value="{{$customer_info -> Customerphone}}" title="Nhập Số ĐT người nhận (gồm 10 hoặc 11 chữ số)" pattern="[0-9]{10,11}" required>
                        </div>
                        <div class="order-notes">
                            <label>Ghi Chú</label>
                            <textarea class="input" name="cart_note" placeholder="Ghi Chú" required></textarea>
                        </div>
                        <div class="form-group">
                            <input class="hidden" type="text" name="Customerid" value="{{Session::get('khach_hang_dn')->Customerid}}"> 
                        </div>
                        <div class="form-group">
                            <input class="hidden" type="number" name="total" value="{{ Cart::priceTotal() }}">
                        </div>

                        <div class="form-group">
                            <input class="hidden" type="text" name="Status" value= 0 > 
                        </div>
                        <div class="form-group">
                            <input class="hidden" type="text" name="payment_option" value= "Trả bằng thẻ." > 
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <h3 class="text-center">Payment Details</h3>
                                    <img class="img-responsive cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>CARD NUMBER</label>
                                            <div class="input-group">
                                                <input type="tel" name="Card_Number" class="form-control" placeholder="Valid Card Number" />
                                                <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-7 col-md-7">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                            <input type="tel" name="Card_EXPIRATION" class="form-control" placeholder="MM / YY" />
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-md-5 pull-right">
                                        <div class="form-group">
                                            <label>CV CODE</label>
                                            <input type="tel" name="Card_Code" class="form-control" placeholder="CVC" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>CARD OWNER</label>
                                            <input type="text" name="Card_Owner" class="form-control" placeholder="Card Owner Names" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <button class="subscribe btn btn-primary btn-block" type="submit"> Confirm  </button>
                    </form>
                </div>
                <!-- /Shiping Details -->
            </div>
            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Đơn Hàng Của Bạn</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>Sản Phẩm</strong></div>
                        <div><strong>Tổng</strong></div>
                    </div>
                    @foreach($content as $v_content)
                    <div class="order-products">
                        <div class="order-col">
                            <div>{{ $v_content->qty }} x {{ $v_content->name }}</div>
                            <div>
                                <?php 
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format( $subtotal).' '.'$';
                                ?>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="order-col">
                        <div>Giao Hàng</div>
                        <div><strong>FREE</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>Tổng Đơn Hàng</strong></div>
                        <div><strong class="order-total">{{ Cart::priceTotal() }} $</strong></div>
                    </div>
                </div>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

@stop