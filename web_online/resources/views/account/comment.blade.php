@extends('layouts.layout_detail')
@section('title')
Đơn mua
@endsection
@section('content')
<div id="account-history" class="container">
    <ul class="breadcrumb">
        <li><a href="/home"><i class="fa fa-home"></i></a></li>
        <li><a href="/account/index">Tài khoản</a></li>
        <li><a href="#">Đánh giá</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">
            <fieldset id="account">
            
            <div class="content-product-mainbody clearfix row">
                <div class="content-product-content col-sm-12">
                    <div class="content-product-midde clearfix">
                        <div class="panel-group">
                            <form action="/account/comment/{{$donhang[0]->MA_DONBAN}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#collapse-voucher" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true">Đánh giá chất lượng sản phẩm <i class="fa fa-caret-down"></i></a>
                                        </h4>
                                    </div>
                                    <div id="collapse-voucher" class="panel-collapse collapse in" aria-expanded="true">
                                        @foreach($donhang as $key=>$item)
                                        <div class="panel-body">
                                            <div class="form-group col-sm-12">
                                                <div class="col-sm-2"><img src="{{$item->URL}}" height="90px" ></div>
                                                <div class="col-sm-4">
                                                    <div class="form-group required">
                                                    
                                                    <label class="control-label" for="input-postcode">{{$item->TEN_SP}}</label>
                                                    <br/>
                                                    <i class="control-label" for="input-postcode">Giá bán: {{number_format($item->GIA)}} VNĐ</i>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="col-sm-12">
                                                        <div class="rang rang-hover rang-5">
                                                            <div class="step step5">
                                                                <div class="icon"></div>
                                                            </div>
                                                            <div class="step step4">
                                                                <div class="icon"></div>
                                                            </div>
                                                            <div class="step step3">
                                                                <div class="icon"></div>
                                                            </div>
                                                            <div class="step step2">
                                                                <div class="icon"></div>
                                                            </div>
                                                            <div class="step step1 ">
                                                                <div class="icon"></div>
                                                            </div>

                                                            <input type="hidden" name="DANHGIA[]" value="5">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12" >
                                                        <div class="rang rang-hover" style="margin-right: 5px ">
                                                            <input id="img_1" accept="image/x-png,image/gif,image/jpeg" class="btn btn-primary btn-sm" name="input_img[{{$key}}][]" onchange="change_img(this)" type="file" style="display: none;">
                                                            <label for="img_1" class="img-fluid rounded mb-2 text-center _2b-JH-" ><i class="fa fa-plus" ></i></label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <input type="hidden" name="MA_SP[]" value="{{$item->MA_SP}}">
                                                <div class="input-group col-sm-12">
                                                    <textarea class="form-control" rows="5" name="NOIDUNG[]" maxlength="1000" required="" minlength="10" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="panel-body">
                                            <button type="submit" class="btn btn-checkout">Hoàn thành đánh giá</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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