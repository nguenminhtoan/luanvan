@extends('layouts.layout_detail')
@section('title')
Đơn mua
@endsection
@section('content')
<div id="account-history" class="container">
    <ul class="breadcrumb">
        <li><a href="/home"><i class="fa fa-home"></i></a></li>
        <li><a href="/account/index">Tài khoản</a></li>
        <li><a href="#">Chi tiết đơn</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">
            <fieldset id="account">
            
            <div class="content-product-mainbody clearfix row">
                <div class="content-product-content col-sm-12">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#" class="accordion-toggle" data-toggle="collapse" >Địa chỉ nhận hàng <i class="fa fa-caret-down"></i></a></h4>
                            </div>
                            <div id="collapse-shipping" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="form-horizontal">
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-country">Tỉnh / Thành phố</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled=""  value="{{$noithanhtoan->TEN_TINH}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-zone">Quận / Huyện</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled=""  value="{{$noithanhtoan->TEN_HUYEN}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-zone">Xã / Thị trấn</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled=""  value="{{$noithanhtoan->TEN_XA}}"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-postcode">Đường / Số nhà</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled=""  value="{{$donhang->DIACHI}}" placeholder="Đường / Số nhà" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center"><b>Ảnh</b></td>
                                <td class="text-left"><b>Tên sản phẩm</b><br>              
                                </td>
                                <td class="text-left">
                                    <b>Số lượng
                                </td>
                                <td class="text-right"><b>Đơn giá</b></td>
                                <td class="text-right"><b>Thành tiền</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($sanpham as $sp)

                            <tr>
                                <td class="text-center"><img src="{{$sp->URL}}" style="width: 47px; height: 47px; " alt="Sausage cowbee" title="Sausage cowbee" class="img-thumbnail"></td>
                                <td class="text-left">{{$sp->TEN_SP}}<br>              
                                </td>
                                <td class="text-left">
                                    <div class="input-group btn-block" style="max-width: 200px;">
                                        {{$sp->SOLUONG}}
                                    </div>
                                </td>
                                <td class="text-right">{{number_format($sp->DONGIA)}}VNĐ</td>
                                <td class="text-right">{{number_format($sp->THANHTIEN)}}VNĐ</td>
                                
                            </tr>
                            @endforeach 
                            <tr class="vanchuyen">
                                <td colspan="3" class="text-right">Vận chuyển</td>
                                <td class="text-left">
                                             {{ $donhang->PHUONGTHUC_VANCHUYEN }} 
                                </td>
                                <td class="text-right">{{ number_format($donhang->DONGIA) }}VNĐ</td>
                            </tr>
                            @if ($donhang->MA_KHUYENMAI)
                            <tr class="khuyenmai">
                                <td colspan="3" class="text-right">Khuyến mãi</td>
                                <td class="text-left">{{$donhang->TEN_KM}}<br>              
                                </td>
                                <td class="text-right">{{number_format($donhang->GIAMGIA)}}VNĐ</td>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="4" class="text-right">Thành tiền</td>
                                <td class="text-right">{{ number_format($donhang->TONGTIEN) }}VNĐ</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Phương thức thanh toán</td>
                                <td class="text-right">{{ $donhang->PHUONGTHUC_THANHTOAN }}</td>
                            </tr>
                        </tbody>
                    </table> 
                    <form action="/account/return/{{$donhang->MA_DONBAN}}" method="post" >
                        {{ csrf_field() }}
                        <div id="collapse-voucher" class="panel-collapse collapse in" aria-expanded="true">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#" class="accordion-toggle" data-toggle="collapse" >Lý do trả hàng <i class="fa fa-caret-down"></i></a></h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-sm-12">
                                        <div class="input-group col-sm-12">
                                            <textarea class="form-control" rows="5" name="NOIDUNG" maxlength="1000" required="" minlength="10" ></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <button type="submit" class="btn btn-checkout">Trả hàng</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
    var count = 0;
    
    $(".step1 .icon").click(function(){
            $(".rang").addClass("rang-1");
            $(".rang").removeClass("rang-2");
            $(".rang").removeClass("rang-3");
            $(".rang").removeClass("rang-4");
            $(".rang").removeClass("rang-5");
            $(this).closest(".rang-hover").find("input[name='DANHGIA[]']").val(1);
    });

    $(".step2 .icon").click(function(){
            $(".rang").addClass("rang-2");
            $(".rang").removeClass("rang-3");
            $(".rang").removeClass("rang-4");
            $(".rang").removeClass("rang-5");
            $(this).closest(".rang-hover").find("input[name='DANHGIA[]']").val(2);
    });

    $(".step3 .icon").click(function(){
            $(".rang").addClass("rang-3");
            $(".rang").removeClass("rang-4");
            $(".rang").removeClass("rang-5");
            $(this).closest(".rang-hover").find("input[name='DANHGIA[]']").val(3);
    });

    $(".step4 .icon").click(function(){
            $(".rang").addClass("rang-4");
            $(".rang").removeClass("rang-5");
            $(this).closest(".rang-hover").find("input[name='DANHGIA[]']").val(4);
    });

    $(".step5 .icon").click(function(){
            $(".rang").addClass("rang-5");
            $(this).closest(".rang-hover").find("input[name='DANHGIA[]']").val(5);
    });
	
    function change_img(event){
        count +=1;
        if (event.files && event.files[0]) {
            var reader = new FileReader();
            var img = $(event).closest(".rang-hover").find("label");
            if (count < 4){
                var coppy = $(event).closest(".rang-hover").clone();
                $(event).closest(".rang-hover").before(coppy);
                $(event).attr("onclick","");
                img.attr("onclick","remove_img(this)");
                img.find("i").removeClass("fa-plus");
                img.find("i").addClass("fa-remove");
            }
            reader.onload = function (e) {
                img.css('background-image', "url('" + e.target.result + "')");
            }
            reader.readAsDataURL(event.files[0]); // convert to base64 string
        }
    }    
    
    function remove_img(event){
        $(event).closest(".rang-hover").remove();
        conut -= 1;
    }
    
    
    
</script>

@endsection