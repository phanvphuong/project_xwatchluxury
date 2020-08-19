@extends('layouts.app_master_frontend')
@section('content')
@foreach($details_product as $key => $dp)
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="{{asset('frontend/dist/img/Nam/'.$dp -> Image)}}" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="{{asset('frontend/dist/img/Nam/'.$dp -> Image)}}" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{$dp -> Productname}} </h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="product-price">{{ $dp -> Price }}$</h3>
                    </div>
                    <!-- <div class="product-options">
                        <label>
                            Size
                            <select class="input-select">
                                <option value="0">X</option>
                            </select>
                        </label>
                        <label>
                            Color
                            <select class="input-select">
                                <option value="0">Red</option>
                            </select>
                        </label>
                    </div> -->
                    
                    <form action="{{ URL::to('/save_cart_details')}}" method="post">
                    {{ csrf_field() }}
                    <div class="add-to-cart">
                        <div class="qty-label">
                            Số lượng
                            <div class="input-number">
                                <input type="number" name="qty" min="1" max = "1" value="1">
                                <!-- <span class="qty-up">+</span>
                                <span class="qty-down">-</span> -->
                                <input name="productid_hidden" type="hidden" value="{{$dp->Productid}}">
                            </div>
                        </div>
                        <?php 
                            $content = Cart::content();
                            $null = 0;
                            foreach($content as $v_content){
                                if($v_content->id == $dp->Productid){
                                    $null = 1;
                                }
                            }
                            // echo '<pre>';
                            // print_r($null);
                            // echo '</pre>';
                        ?>
                        @if($null == 0)
                            <button type="submit" class="add-to-cart-btn" onclick="return confirm('Bạn có chắc muốn cho vào giỏ hàng?')">
                                <i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng
                            </button>
                        @endif
                    </div>
                    </form>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Mô Tả</a></li>
                        <li><a data-toggle="tab" href="#tab3">Phản Hồi</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active" style="text-align:center">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{{ $dp -> ProductDescription }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->
                        
                        <!-- tab3  -->
                        
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Review Form -->
                                <div class="col-md-12" style="text-align:center;">
                                    @if(Session::has('khach_hang_dn'))
                                    <div class="row">     
                                        <div class="panel panel-default widget">
                                            <div class="panel-heading">
                                                <span class="glyphicon glyphicon-comment"></span>
                                                <h3 class="panel-title">
                                                    Recent Comments</h3>
                                                <!-- <span class="label label-info">
                                                    78</span> -->
                                            </div>
                                            <div class="panel-body">
                                            <form action = "{{ URL::to('/Save_Comment') }}" method = "POST">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="comment">Your Comment</label>
                                                    <input class="hidden" type="text" name="Customerid" value="{{Session::get('khach_hang_dn')->Customerid}}">
                                                    <textarea name="Ndcomment" class="form-control" rows="3"></textarea>
                                                    <!-- <textarea class="input" name="cart_note" placeholder="Ghi Chú" required></textarea> -->
                                                </div>
                                                <button type="submit" class="btn btn-default">Send</button>
                                            </form>
                                            </div>
                                            <div class="panel-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-xs-2 col-md-1">
                                                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                                            <div class="col-xs-10 col-md-11">
                                                                <div>
                                                                    <a href="http://www.jquery2dotnet.com/2013/10/google-style-login-page-desing-usign.html">
                                                                        Google Style Login Page Design Using Bootstrap</a>
                                                                    <div class="mic-info">
                                                                        By: <a href="#">Bhaumik Patel</a> on 2 Aug 2013
                                                                    </div>
                                                                </div>
                                                                <div class="comment-text">
                                                                    Awesome design
                                                                </div>
                                                                <div class="action">
                                                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                                                        <span class="glyphicon glyphicon-ok"></span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-xs-2 col-md-1">
                                                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                                            <div class="col-xs-10 col-md-11">
                                                                <div>
                                                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/Obgj">Admin Panel Quick Shortcuts</a>
                                                                    <div class="mic-info">
                                                                        By: <a href="#">Bhaumik Patel</a> on 11 Nov 2013
                                                                    </div>
                                                                </div>
                                                                <div class="comment-text">
                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
                                                                </div>
                                                                <div class="action">
                                                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                                                        <span class="glyphicon glyphicon-ok"></span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-xs-2 col-md-1">
                                                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                                            <div class="col-xs-10 col-md-11">
                                                                <div>
                                                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/4ldn">Cool Sign Up</a>
                                                                    <div class="mic-info">
                                                                        By: <a href="#">Bhaumik Patel</a> on 11 Nov 2013
                                                                    </div>
                                                                </div>
                                                                <div class="comment-text">
                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
                                                                </div>
                                                                <div class="action">
                                                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                                                        <span class="glyphicon glyphicon-ok"></span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div id="review-form" >
                                        <form class="review-form" method="post" action="{{route('feedback')}}">
                                        @csrf
                                            <input class="hidden" type="text" name="Customerid" value="{{Session::get('khach_hang_dn')->Customerid}}">
                                            <input class="input" type="text" name="title" id="title" placeholder="Tiều Đề Đánh Giá"> 
                                            <input class="input" type="text" name="comment" id="comment" placeholder="Review của bạn">
                                            <button class="primary-btn">Xác Nhận</button>
                                        </form>
                                    </div> -->
                                        @else
                                        @if(Session::has('khach_hang_dn') == null)
                                        <div id="review-form" >
                                            <!-- <form class="review-form" method="post" action="{{route('feedback')}}">
                                            @csrf
                                                <input class="input" type="text" name="title" id="title" placeholder="Tiều Đề Đánh Giá"> 
                                                <input class="input" type="text" name="comment" id="comment" placeholder="Review của bạn">
                                                <button class="primary-btn">Xác Nhận</button>
                                            </form> -->
                                            <h2>Bạn muốn phản hồi thì bạn phải đăng nhập</h2>
                                        <br>
                                        <a href="{{route('getlogin')}}" class="cn c_white" style="color: red"><i class="fa fa-user cn c_white"></i> Đăng nhập tại đây</a>
                                        </div>
                                        @endif
                                    @endif
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endforeach
<!-- /SECTION -->
@stop