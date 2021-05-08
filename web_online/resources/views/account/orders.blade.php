@extends('layouts.layout_detail')
@section('title')
Đơn mua
@endsection
@section('content')
<div id="account-history" class="container">
    <ul class="breadcrumb">
        <li><a href="/home"><i class="fa fa-home"></i></a></li>
        <li><a href="/account/index">Tài khoản</a></li>
        <li><a href="/account/orders">Đơn mua</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">
            <fieldset id="account">
            
            <div class="content-product-mainbody clearfix row">
                <div class="content-product-content col-sm-12">
                    <div class="content-product-midde clearfix">
                        <div class="producttab ">
                            <div class="tabsslider   horizontal-tabs  col-xs-12">
                                <ul class="nav nav-tabs font-sn">
                                    <li class="active"><a href="#tab-orders" data-toggle="tab">Đặt hàng </a></li>
                                    <li><a href="#tab-shipping" data-toggle="tab">Đang giao </a></li>
                                    <li><a href="#tab-giao" data-toggle="tab">Đã giao </a></li>
                                    <li><a href="#tab-huy" data-toggle="tab">Đã hủy </a></li>
                                    <li><a href="#tab-tra" data-toggle="tab">Trả hàng </a></li>
                                </ul>
                                
                                <div class="tab-content  col-xs-12">
                                    
                                    <div class="tab-pane active" id="tab-orders">
                                        <div id="review">
                                            @foreach($donhang as $item)
                                            @if($item->MA_TRANGTHAI == 2)
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="5" class="text-left">{{$item->TEN_CUAHANG}} <a href="javascript:void(0);" style="float: right" onclick="show(this)" data-show="false" >xem thêm <b class="fa fa-caret-right"></b></a> </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">Ảnh</td>
                                                            <td class="text-left">Tên sản phẩm<br>              
                                                            </td>
                                                            <td class="text-left">
                                                                Số lượng
                                                            </td>
                                                            <td class="text-right">Đơn giá</td>
                                                            <td class="text-right">Thành tiền</td>
                                                        </tr>
                                                        @if (is_array($item->SANPHAM))
                                                        @foreach ($item->SANPHAM as $sp)

                                                        <tr>
                                                            <td class="text-center"><img src="{{$sp->URL}}" style="width: 47px; height: 47px; " alt="Sausage cowbee" title="Sausage cowbee" class="img-thumbnail"></td>
                                                            <td class="text-left">{{$sp->TEN_SP}}<br>              
                                                            </td>
                                                            <td class="text-left">
                                                                {{$sp->SOLUONG}}
                                                            </td>
                                                            <td class="text-right">{{number_format($sp->DONGIA)}}VNĐ</td>
                                                            <td class="text-right">{{number_format($sp->THANHTIEN)}}VNĐ</td>
                                                        </tr>
                                                        @endforeach 
                                                        @endif
                                                        <tr class="vanchuyen" hidden="">
                                                            <td colspan="3" class="text-right">Vận chuyển</td>
                                                            <td class="text-left">{{$item->PHUONGTHUC_VANCHUYEN}}<br>              
                                                            </td>
                                                            <td class="text-right">{{number_format($item->DONGIA)}}VNĐ</td>
                                                        </tr>
                                                        <tr class="thanhtoan" hidden="">
                                                            <td colspan="3" class="text-right">
                                                                Phương thức thanh toán
                                                            </td>
                                                            <td class="text-left">{{$item->PHUONGTHUC_THANHTOAN}}<br>              
                                                            </td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                        @if ($item->MA_KHUYENMAI)
                                                        <tr class="khuyenmai" hidden="">
                                                            <td colspan="3" class="text-right">Khuyến mãi</td>
                                                            <td class="text-left">{{$item->TEN_KM}}<br>              
                                                            </td>
                                                            <td class="text-right">{{number_format($item->GIAMGIA)}}VNĐ</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td colspan="4">
                                                                <div class="col-sm-9">
                                                                    <a class="btn btn-success" href="/account/orders/{{$item->MA_DONBAN}}" >Chi tiết đơn hàng <i class="fa fa-angle-double-right"></i></a>
                                                                    <a href="/account/cancel/{{$item->MA_DONBAN}}" onclick="return confirm('Bạn có chắc chắn hủy đơn hàng này không ?')" class="btn btn-default" >Hủy đơn</a>
                                                                </div>
                                                                <div class="col-md-3 text-right">
                                                                    
                                                                    <label>Thành tiền</label>
                                                                </div>
                                                            </td>
                                                            <td class="text-right">{{number_format($item->TONGTIEN)}}VNĐ</td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="tab-shipping">
                                        <div id="review">
                                            @foreach($donhang as $item)
                                            @if($item->MA_TRANGTHAI == 5 || $item->MA_TRANGTHAI == 4 || $item->MA_TRANGTHAI == 3)
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="5" class="text-left">{{$item->TEN_CUAHANG}} <a href="javascript:void(0);" style="float: right" onclick="show(this)" data-show="false" >xem thêm <b class="fa fa-caret-right"></b></a> </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">Ảnh</td>
                                                            <td class="text-left">Tên sản phẩm<br>              
                                                            </td>
                                                            <td class="text-left">
                                                                Số lượng
                                                            </td>
                                                            <td class="text-right">Đơn giá</td>
                                                            <td class="text-right">Thành tiền</td>
                                                        </tr>
                                                        @if (is_array($item->SANPHAM))
                                                        @foreach ($item->SANPHAM as $sp)

                                                        <tr>
                                                            <td class="text-center"><img src="{{$sp->URL}}" style="width: 47px; height: 47px; " alt="Sausage cowbee" title="Sausage cowbee" class="img-thumbnail"></td>
                                                            <td class="text-left">{{$sp->TEN_SP}}<br>              
                                                            </td>
                                                            <td class="text-left">
                                                                {{$sp->SOLUONG}}
                                                            </td>
                                                            <td class="text-right">{{number_format($sp->DONGIA)}}VNĐ</td>
                                                            <td class="text-right">{{number_format($sp->THANHTIEN)}}VNĐ</td>
                                                        </tr>
                                                        @endforeach 
                                                        @endif
                                                        <tr class="vanchuyen" hidden="">
                                                            <td colspan="3" class="text-right">Vận chuyển</td>
                                                            <td class="text-left">{{$item->PHUONGTHUC_VANCHUYEN}}<br>              
                                                            </td>
                                                            <td class="text-right">{{number_format($item->DONGIA)}}VNĐ</td>
                                                        </tr>
                                                        <tr class="thanhtoan" hidden="">
                                                            <td colspan="3" class="text-right">Thanh toán</td>
                                                            <td class="text-left">{{$item->PHUONGTHUC_THANHTOAN}}<br>              
                                                            </td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                        @if ($item->MA_KHUYENMAI)
                                                        <tr class="khuyenmai" hidden="">
                                                            <td colspan="3" class="text-right">Khuyến mãi</td>
                                                            <td class="text-left">{{$item->TEN_KM}}<br>              
                                                            </td>
                                                            <td class="text-right">{{number_format($item->GIAMGIA)}}VNĐ</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td colspan="4">
                                                                <div class="col-sm-9">
                                                                    <a class="btn btn-success" href="/account/orders/{{$item->MA_DONBAN}}" >Chi tiết đơn hàng <i class="fa fa-angle-double-right"></i></a>
                                                                    <a href="/account/cancel/{{$item->MA_DONBAN}}" onclick="return confirm('Bạn có chắc chắn hủy đơn hàng này không ?')" class="btn btn-default" >Hủy đơn</a>
                                                                </div>
                                                                <div class="col-md-3 text-right">
                                                                    
                                                                    <label>Thành tiền</label>
                                                                </div>
                                                            </td>
                                                            <td class="text-right">{{number_format($item->TONGTIEN)}}VNĐ</td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-giao">
                                        <div id="review">
                                    @foreach($donhang as $item)
                                            @if($item->MA_TRANGTHAI == 6    )
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="5" class="text-left">{{$item->TEN_CUAHANG}} <a href="javascript:void(0);" style="float: right" onclick="show(this)" data-show="false" >xem thêm <b class="fa fa-caret-right"></b></a> </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">Ảnh</td>
                                                            <td class="text-left">Tên sản phẩm<br>              
                                                            </td>
                                                            <td class="text-left">
                                                                Số lượng
                                                            </td>
                                                            <td class="text-right">Đơn giá</td>
                                                            <td class="text-right">Thành tiền</td>
                                                        </tr>
                                                        @if (is_array($item->SANPHAM))
                                                        @foreach ($item->SANPHAM as $sp)

                                                        <tr>
                                                            <td class="text-center"><img src="{{$sp->URL}}" style="width: 47px; height: 47px; " alt="Sausage cowbee" title="Sausage cowbee" class="img-thumbnail"></td>
                                                            <td class="text-left">{{$sp->TEN_SP}}<br>              
                                                            </td>
                                                            <td class="text-left">
                                                                {{$sp->SOLUONG}}
                                                            </td>
                                                            <td class="text-right">{{number_format($sp->DONGIA)}}VNĐ</td>
                                                            <td class="text-right">{{number_format($sp->THANHTIEN)}}VNĐ</td>
                                                        </tr>
                                                        @endforeach 
                                                        @endif
                                                        <tr class="vanchuyen" hidden="">
                                                            <td colspan="3" class="text-right">Vận chuyển</td>
                                                            <td class="text-left">{{$item->PHUONGTHUC_VANCHUYEN}}<br>              
                                                            </td>
                                                            <td class="text-right">{{number_format($item->DONGIA)}}VNĐ</td>
                                                        </tr>
                                                        <tr class="thanhtoan" hidden="">
                                                            <td colspan="3" class="text-right">Thanh toán</td>
                                                            <td class="text-left">{{$item->PHUONGTHUC_THANHTOAN}}<br>              
                                                            </td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                        @if ($item->MA_KHUYENMAI)
                                                        <tr class="khuyenmai" hidden="">
                                                            <td colspan="3" class="text-right">Khuyến mãi</td>
                                                            <td class="text-left">{{$item->TEN_KM}}<br>              
                                                            </td>
                                                            <td class="text-right">{{number_format($item->GIAMGIA)}}VNĐ</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td colspan="4">
                                                                <div class="col-sm-9">
                                                                    <a class="btn btn-success" href="/account/orders/{{$item->MA_DONBAN}}" >Chi tiết đơn hàng <i class="fa fa-angle-double-right"></i></a>
                                                                
                                                                    @if($item->DANHGIA == 0)
                                                                    <a href="/account/comment/{{$item->MA_DONBAN}}" class="btn btn-dark">Đánh giá</a>
                                                                    @else
                                                                    <a disabled="" style="background-color: #ff5e00 !important" class="btn btn-default">Đã đánh giá</a>
                                                                    @endif
                                                                    @if(date("Y/m/d",strtotime($item->NGAYGIAO)) >= date("Y/m/d", strtotime("-14 days")))
                                                                    <a href="/account/return/{{$item->MA_DONBAN}}" class="btn btn-danger">Hoàn tiền trả hàng</a>
                                                                    @endif
                                                                    </div>
                                                                <div class="col-md-3 text-right">
                                                                    
                                                                    <label>Thành tiền</label>
                                                                </div>
                                                                
                                                            </td>
                                                            <td class="text-right">{{number_format($item->TONGTIEN)}}VNĐ</td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-huy">
                                        <div id="review">
@foreach($donhang as $item)
                                            @if($item->MA_TRANGTHAI == 7)
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="5" class="text-left">{{$item->TEN_CUAHANG}} <a href="javascript:void(0);" style="float: right" onclick="show(this)" data-show="false" >xem thêm <b class="fa fa-caret-right"></b></a> </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">Ảnh</td>
                                                            <td class="text-left">Tên sản phẩm<br>              
                                                            </td>
                                                            <td class="text-left">
                                                                Số lượng
                                                            </td>
                                                            <td class="text-right">Đơn giá</td>
                                                            <td class="text-right">Thành tiền</td>
                                                        </tr>
                                                        @if (is_array($item->SANPHAM))
                                                        @foreach ($item->SANPHAM as $sp)

                                                        <tr>
                                                            <td class="text-center"><img src="{{$sp->URL}}" style="width: 47px; height: 47px; " alt="Sausage cowbee" title="Sausage cowbee" class="img-thumbnail"></td>
                                                            <td class="text-left">{{$sp->TEN_SP}}<br>              
                                                            </td>
                                                            <td class="text-left">
                                                                {{$sp->SOLUONG}}
                                                            </td>
                                                            <td class="text-right">{{number_format($sp->DONGIA)}}VNĐ</td>
                                                            <td class="text-right">{{number_format($sp->THANHTIEN)}}VNĐ</td>
                                                        </tr>
                                                        @endforeach 
                                                        @endif
                                                        <tr class="vanchuyen" hidden="">
                                                            <td colspan="3" class="text-right">Vận chuyển</td>
                                                            <td class="text-left">{{$item->PHUONGTHUC_VANCHUYEN}}<br>              
                                                            </td>
                                                            <td class="text-right">{{number_format($item->DONGIA)}}VNĐ</td>
                                                        </tr>
                                                        <tr class="thanhtoan" hidden="">
                                                            <td colspan="3" class="text-right">Thanh toán</td>
                                                            <td class="text-left">{{$item->PHUONGTHUC_THANHTOAN}}<br>              
                                                            </td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                        @if ($item->MA_KHUYENMAI)
                                                        <tr class="khuyenmai" hidden="">
                                                            <td colspan="3" class="text-right">Khuyến mãi</td>
                                                            <td class="text-left">{{$item->TEN_KM}}<br>              
                                                            </td>
                                                            <td class="text-right">{{number_format($item->GIAMGIA)}}VNĐ</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td colspan="4">
                                                                <div class="col-sm-9">
                                                                    <a class="btn btn-danger" href="/account/orders/{{$item->MA_DONBAN}}" >Chi tiết đơn hủy <i class="fa fa-angle-double-right"></i></a>
                                                                </div>
                                                                <div class="col-md-3 text-right">
                                                                    
                                                                    <label>Thành tiền</label>
                                                                </div>
                                                            </td>
                                                            <td class="text-right">{{number_format($item->TONGTIEN)}}VNĐ</td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-tra">
                                        <div id="review">
@foreach($donhang as $item)
                                            @if($item->MA_TRANGTHAI == 8)
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="5" class="text-left">{{$item->TEN_CUAHANG}} <a href="javascript:void(0);" style="float: right" onclick="show(this)" data-show="false" >xem thêm <b class="fa fa-caret-right"></b></a> </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">Ảnh</td>
                                                            <td class="text-left">Tên sản phẩm<br>              
                                                            </td>
                                                            <td class="text-left">
                                                                Số lượng
                                                            </td>
                                                            <td class="text-right">Đơn giá</td>
                                                            <td class="text-right">Thành tiền</td>
                                                        </tr>
                                                        @if (is_array($item->SANPHAM))
                                                        @foreach ($item->SANPHAM as $sp)

                                                        <tr>
                                                            <td class="text-center"><img src="{{$sp->URL}}" style="width: 47px; height: 47px; " alt="Sausage cowbee" title="Sausage cowbee" class="img-thumbnail"></td>
                                                            <td class="text-left">{{$sp->TEN_SP}}<br>              
                                                            </td>
                                                            <td class="text-left">
                                                                {{$sp->SOLUONG}}
                                                            </td>
                                                            <td class="text-right">{{number_format($sp->DONGIA)}}VNĐ</td>
                                                            <td class="text-right">{{number_format($sp->THANHTIEN)}}VNĐ</td>
                                                        </tr>
                                                        @endforeach 
                                                        @endif
                                                        <tr class="vanchuyen" hidden="">
                                                            <td colspan="3" class="text-right">Vận chuyển</td>
                                                            <td class="text-left">{{$item->PHUONGTHUC_VANCHUYEN}}<br>              
                                                            </td>
                                                            <td class="text-right">{{number_format($item->DONGIA)}}VNĐ</td>
                                                        </tr>
                                                        <tr class="thanhtoan" hidden="">
                                                            <td colspan="3" class="text-right">Thanh toán</td>
                                                            <td class="text-left">{{$item->PHUONGTHUC_THANHTOAN}}<br>              
                                                            </td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                        @if ($item->MA_KHUYENMAI)
                                                        <tr class="khuyenmai" hidden="">
                                                            <td colspan="3" class="text-right">Khuyến mãi</td>
                                                            <td class="text-left">{{$item->TEN_KM}}<br>              
                                                            </td>
                                                            <td class="text-right">{{number_format($item->GIAMGIA)}}VNĐ</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td colspan="4">
                                                                <div class="col-sm-9">
                                                                    <a class="btn btn-success" href="/account/orders/{{$item->MA_DONBAN}}" >Chi tiết đơn hàng <i class="fa fa-angle-double-right"></i></a>
                                                                </div>
                                                                <div class="col-md-3 text-right">
                                                                    
                                                                    <label>Thành tiền</label>
                                                                </div>
                                                            </td>
                                                            <td class="text-right">{{number_format($item->TONGTIEN)}}VNĐ</td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </fieldset>
        <aside class="col-md-3 col-sm-4 col-xs-12 content-aside right_column sidebar-offcanvas">
            <span id="close-sidebar" class="fa fa-times"></span>
            <div class="list-group">
                <a href="/account/index" class="list-group-item">Tài khoản của tôi</a>
                <a href="/account/address" class="list-group-item">Địa chỉ giao hàng</a> 
                <a href="/search?cookie=1" class="list-group-item">Sản phẩm vừa xem</a>
                <a href="/account/orders" class="list-group-item">Mua hàng</a>
                <a href="/chat" class="list-group-item">Trao đỏi với shop</a>
                <a href="/voucher" class="list-group-item">Lấy mã khuyến mãi</a> 
                <a href="/account/pass" class="list-group-item">cập nhật mật khẩu</a> 
                <a href="/logout" class="list-group-item">Đăng xuất</a> 
            </div>
        </aside>
    </div>
</div>

<script>
    function show(envt){
        if($(envt).attr("data-show") == "true"){
            $(envt).attr("data-show", false);
            $(envt).closest("td").find("b").addClass("fa-caret-right");
            $(envt).closest("td").find("b").removeClass("fa-caret-down");
            $(envt).closest("table").find("tr.thanhtoan").prop("hidden", true);
            $(envt).closest("table").find("tr.vanchuyen").prop("hidden", true);
            $(envt).closest("table").find("tr.khuyenmai").prop("hidden", true);
        }else{
            $(envt).attr("data-show", true);
            $(envt).closest("td").find("b").removeClass("fa-caret-right");
            $(envt).closest("td").find("b").addClass("fa-caret-down");
            $(envt).closest("table").find("tr").removeAttr("hidden");
        }
        
    }
    </script>
@endsection