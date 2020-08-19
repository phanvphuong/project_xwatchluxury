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
                        </div> 
                        <div class="payment-options">
                            <span>
                                <label><input name="payment_option" value = "Trả bằng thẻ." type = "checkbox"> Trả bằng thẻ.</label>
                            </span>
                            <br>
                            <span>
                                <label><input name="payment_option" value = "Trả bằng tiền mặt" type = "checkbox"> Trả bằng tiền mặt.</label>
                            </span>
                        </div>
                        <div class="card-body p-5 payment-options">
                            
                            <div class='payments'>
                                <div class='button active'>Credit Card
                                    <svg class="svg-visa" viewBox="0 0 512 512">
                                        <path class="svg-visa-border" d="M482.722,103.198c13.854,0,25.126,11.271,25.126,25.126v257.9c0,13.854-11.271,25.126-25.126,25.126H30.99 c-13.854,0-25.126-11.271-25.126-25.126v-257.9c0-13.854,11.271-25.126,25.126-25.126H482.722 M482.722,98.198H30.99 c-16.638,0-30.126,13.488-30.126,30.126v257.9c0,16.639,13.488,30.126,30.126,30.126h451.732 c16.639,0,30.126-13.487,30.126-30.126v-257.9C512.848,111.686,499.36,98.198,482.722,98.198L482.722,98.198z" />
                                        <polygon class="svg-visa-letter" points="190.88,321.104 212.529,194.022 247.182,194.022 225.494,321.104 190.88,321.104" />
                                        <path class="svg-visa-letter" d="M351.141,197.152c-6.86-2.577-17.617-5.339-31.049-5.339c-34.226,0-58.336,17.234-58.549,41.94 c-0.193,18.256,17.21,28.451,30.351,34.527c13.489,6.231,18.023,10.204,17.966,15.767c-0.097,8.518-10.775,12.403-20.737,12.403 c-13.857,0-21.222-1.918-32.599-6.667l-4.458-2.016l-4.864,28.452c8.082,3.546,23.043,6.618,38.587,6.772 c36.417,0,60.042-17.035,60.313-43.423c0.136-14.447-9.089-25.446-29.071-34.522c-12.113-5.882-19.535-9.802-19.458-15.757 c0-5.281,6.279-10.93,19.846-10.93c11.318-0.179,19.536,2.292,25.912,4.869l3.121,1.468L351.141,197.152L351.141,197.152z" />
                                        <path class="svg-visa-letter" d="M439.964,194.144h-26.766c-8.295,0-14.496,2.262-18.14,10.538l-51.438,116.47h36.378 c0,0,5.931-15.66,7.287-19.1c3.974,0,39.305,0.059,44.363,0.059c1.027,4.447,4.206,19.041,4.206,19.041h32.152L439.964,194.144 L439.964,194.144z M397.248,276.062c2.868-7.326,13.8-35.53,13.8-35.53c-0.194,0.339,2.849-7.36,4.593-12.132l2.346,10.959 c0,0,6.628,30.336,8.022,36.703H397.248L397.248,276.062z" />
                                        <path class="svg-visa-letter" d="M161.828,194.114l-33.917,86.667l-3.624-17.607c-6.299-20.312-25.971-42.309-47.968-53.317l31.009,111.149 l36.649-0.048l54.538-126.844H161.828L161.828,194.114z" />
                                        <path class="svg-visa-corner" d="M96.456,194.037H40.581l-0.426,2.641c43.452,10.523,72.213,35.946,84.133,66.496l-12.133-58.41 C110.062,196.716,103.976,194.318,96.456,194.037L96.456,194.037z" />
                                    </svg>
                                </div>
                                <div class='button'>Debit
                                    <svg class="svg-debit" viewBox="0 0 32 23">
                                        <path class="svg-debit-card" d="M1.993 0h28c1.104 0 2 .895 2 2v18.999c0 1.104-.896 2.001-2 2.001h-28c-1.104 0-2-.896-2-2.001v-18.999c0-1.105.895-2 2-2z" />
                                        <path class="svg-debit-data" d="M12.993 15v2h16v-2h-16zm0 5h10v-2h-10v2zm-4-5h-4c-1.104 0-2 .896-2 2v1c0 1.104.896 2 2 2h4c1.104 0 2-.896 2-2v-1c0-1.104-.896-2-2-2z" />
                                        <path class="svg-debit-sign" d="M2.993 9h26v3h-26v-3z" />
                                        <path class="svg-debit-read" d="M-.007 3h32v3h-32v-3z" />
                                    </svg>
                                </div>
                                <div class='button'>PayPal
                                    <svg class="svg-paypal" viewBox="0 0 512 512">
                                        <path class="svg-paypal-border" d="M481.874,102.698c13.854,0,25.126,11.271,25.126,25.126v257.899c0,13.854-11.271,25.126-25.126,25.126 H30.143c-13.854,0-25.126-11.271-25.126-25.126V127.824c0-13.854,11.271-25.126,25.126-25.126H481.874 M481.874,97.698H30.143 c-16.638,0-30.126,13.488-30.126,30.126v257.899c0,16.64,13.488,30.126,30.126,30.126h451.731 c16.64,0,30.126-13.486,30.126-30.126V127.824C512,111.186,498.513,97.698,481.874,97.698L481.874,97.698z" />
                                        <path class="svg-paypal-letter1to3" d="M104.955,202.144H62.86l-18.652,85.61h24.705l6.048-28.363h17.642c16.888,0,31.006-10.408,34.785-28.104 C131.671,211.252,117.305,202.144,104.955,202.144z M104.198,231.287c-1.512,6.506-7.813,11.71-14.115,11.71H78.488l5.294-23.418 H95.88C101.932,219.579,105.963,224.783,104.198,231.287z" />
                                        <path class="svg-paypal-letter1to3" d="M161.04,219.579c-10.655,0-19.083,2.862-25.277,4.165l-1.981,16.392 c2.973-1.562,13.136-4.422,21.557-4.684c8.427-0.261,13.384,1.559,11.895,8.847c-25.026,0-41.876,5.202-45.346,21.598 c-4.958,28.104,25.521,27.322,37.414,15.092l-1.484,6.767h22.55l9.663-44.757C193.996,224,176.648,219.32,161.04,219.579z M162.772,265.375c-1.238,5.982-6.195,8.589-11.894,8.852c-4.957,0.256-9.168-4.17-5.947-9.371 c2.477-4.422,9.415-5.465,13.381-5.465c1.983,0,3.715,0,5.699,0C163.517,261.473,163.021,263.297,162.772,265.375z" />
                                        <polygon class="svg-paypal-letter1to3" points="199.855,220.809 222.402,220.809 226.04,260.68 248.103,220.809 271.371,220.809 217.796,316.229 192.582,316.229 209.064,288.175 199.855,220.809" />
                                        <path class="svg-paypal-letter4to6" d="M323.965,202.144h-41.985l-18.605,85.61h24.387l6.287-28.363h17.35c17.093,0,31.174-10.408,34.947-28.104 C350.614,211.252,336.033,202.144,323.965,202.144z M323.215,231.287c-1.513,6.506-8.05,11.71-14.338,11.71h-11.311l5.03-23.418 h12.066C320.952,219.579,324.722,224.783,323.215,231.287z" />
                                        <path class="svg-paypal-letter4to6" d="M380.913,219.579c-10.783,0-19.312,2.862-25.833,4.165l-2.01,16.392 c3.263-1.562,13.545-4.422,22.076-4.684c8.528-0.261,13.544,1.559,11.791,8.847c-25.336,0-42.396,5.202-45.907,21.598 c-5.021,28.104,25.841,27.322,38.13,15.092l-1.507,6.767h22.576l9.787-44.757C414.025,224,396.716,219.32,380.913,219.579z M382.418,265.375c-1.254,5.982-6.017,8.589-11.786,8.852c-5.016,0.256-9.535-4.17-6.272-9.371 c2.513-4.422,9.535-5.465,13.799-5.465c1.753,0,3.769,0,5.519,0C383.171,261.473,382.915,263.297,382.418,265.375z" />
                                        <polygon class="svg-paypal-letter4to6" points="429.327,201.88 410.649,287.754 433.583,287.754 452.491,201.88 429.327,201.88" />
                                    </svg>
                                </div>
                            </div>
                            <div class="tab-content">
                            <div  id="nav-tab-card">
                                <br>
                                
                                <div class="form-group">
                                    <label for="username">Full name (on the card)</label>
                                    <input type="text" class="form-control" name="username" placeholder="" required="">
                                </div> <!-- form-group.// -->

                                <div class="form-group">
                                    <label for="cardNumber">Card number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="cardNumber" placeholder="">
                                        <div class="input-group-append">
                                            <span class="input-group-text text-muted">
                                                <i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>   
                                                <i class="fab fa-cc-mastercard"></i> 
                                            </span>
                                        </div>
                                    </div>
                                </div> <!-- form-group.// -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">Expiration</span> </label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="MM" name="">
                                                <input type="number" class="form-control" placeholder="YY" name="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                                            <input type="number" class="form-control" required="">
                                        </div> <!-- form-group.// -->
                                    </div>
                                </div> <!-- row.// -->
                                
                            </div> <!-- tab-pane.// -->
                            </div> <!-- tab-content .// -->
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