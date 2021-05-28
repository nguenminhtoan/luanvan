@extends('layouts.layout_detail')
@section('title')
Giỏ Hàng
@endsection
@section('content')
<div id="checkout-cart" class="container" method="post" action="/cart/add_order">
    <ul class="breadcrumb">
        <li><a href="/home"><i class="fa fa-home"></i></a></li>
        <li><a href="/cart">Shopping Cart</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-12">
            <h1>Sản phẩm trong giỏ của bạn</h1>
            <form action="/cart/checkout" method="post" enctype="multipart/form-data" id="order_cart">
            <?php $thanhtien=0; ?>
            @foreach($cuahang as $item)
            {{ csrf_field() }}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td colspan="5" class="text-left">{{$item->TEN_CUAHANG}} <a href="javascript:void(0);" style="float: right" onclick="show(this)" data-show="false" >xem thêm <b class="fa fa-caret-right"></b></a> </td>
                        </tr>
                    </thead>
                    <tbody>
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
                        @if (is_array($sanpham))
                        <?php $tong = 0; ?>
                        @foreach ($sanpham as $sp)
                        @if($item->MA_CUAHANG == $sp->MA_CUAHANG)

                        <tr>
                            <td class="text-center"><img src="{{$sp->URL}}" style="width: 47px; height: 47px; " alt="Sausage cowbee" title="Sausage cowbee" class="img-thumbnail"></td>
                            <td class="text-left">{{$sp->TEN_SP}}<br>              
                            </td>
                            <td class="text-left">
                                <div class="input-group btn-block" style="max-width: 200px;">
                                    <input type="text" name="SOLUONG[]" value="{{$sp->SOLUONG}}" size="1" class="form-control">
                                    <span class="input-group-btn">
                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-detele" onclick="remove_sp({{$sp -> MA_SP}}, this);" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
                                    </span>&nbsp;&nbsp;&nbsp;
                                    <span class="input-group-btn">
                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-update" onclick="update_sl({{$sp -> MA_SP}}, this);" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                                    </span>
                                </div>
                            </td>
                            <td class="text-right">{{number_format($sp->DONGIA)}}VNĐ</td>
                            <td class="text-right">{{number_format($sp->THANHTIEN)}}VNĐ</td>
                            <?php $tong += $sp->THANHTIEN ?>
                            
                        </tr>
                        @endif
                        @endforeach 
                        @endif
                        <tr class="vanchuyen">
                            <td colspan="3" class="text-right">Vận chuyển</td>
                            <td class="text-left">
                                <select class="form-control address" name="MA_VANCHUYEN[]" onchange="thanhtoan(this);" >
                                    @foreach ($vanchuyen as $item)
                                    <option {{ $item->MA_VANCHUYEN == $giohang->MA_VANCHUYEN ? "selected" : "" }} value="{{$item->MA_VANCHUYEN}}" data-gia="{{$item->DONGIA}}">{{$item->PHUONGTHUC_VANCHUYEN}}</option>
                                    @endforeach
                                </select>              
                            </td>
                            <?php $tong += (int) ($giohang->MA_VANCHUYEN ? $vanchuyen[array_search($giohang->MA_VANCHUYEN, array_column($vanchuyen, "MA_VANCHUYEN"))]->DONGIA : $vanchuyen[0]->DONGIA) ?>
                            <?php $thanhtien += $tong ?>
                            <td class="text-right">{{ number_format($giohang->MA_VANCHUYEN ? $vanchuyen[array_search($giohang->MA_VANCHUYEN, array_column($vanchuyen, "MA_VANCHUYEN"))]->DONGIA : $vanchuyen[0]->DONGIA) }}VNĐ</td>
                        </tr>
                        
                        <tr>
                            <td colspan="4" class="text-right">Thành tiền</td>
                            <td class="text-right">{{ number_format($tong) }}VNĐ</td>
                        </tr>
                        
                    </tbody>
                </table> 
            
            
            
            @endforeach
            
            <ul class="message-error" >
                @if (is_array($errors))
                @foreach ($errors as $er)
                <li>{{ $er }}</li>
                @endforeach
                @endif
            </ul>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-shipping" class="accordion-toggle" data-toggle="collapse" >Thiết lập địa chỉ Thanh toán <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div id="collapse-shipping" class="panel-collapse collapse in">
                        <input type="hidden" name="MA_NOI" value="{{$noithanhtoan->MA_NOI}}" />
                        <div class="panel-body">
                            <p>Thiết lập và xác nhận địa chỉ để giao hàng.</p>
                            <div class="form-horizontal">
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-country">Tỉnh / Thành phố</label>
                                    <div class="col-sm-10">
                                        <select class="form-control address" name="MA_TINH" id="customer_id_province">
                                            <option value="" >--</option>
                                            @foreach ($tinh as $item)
                                            <option value="{{$item->MA_TINH}}" {{ $item->MA_TINH ==  $noithanhtoan->MA_TINH ? "selected=''" : ""}} >{{$item->TEN_TINH}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-zone">Quận / Huyện</label>
                                    <div class="col-sm-10">
                                        <select class="form-control address" name="MA_HUYEN" id="customer_id_district">
                                            <option value="" >--</option>
                                            @foreach ($huyen as $item)
                                            <option {{ $item->MA_TINH ==  $noithanhtoan->MA_TINH ? "" : 'hidden'}}  value="{{$item->MA_HUYEN}}" {{ $item->MA_HUYEN ==  $noithanhtoan->MA_HUYEN ? "selected=''" : ""}} data-tinh="{{$item->MA_TINH}}">{{$item->TEN_HUYEN}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-zone">Xã / Thị trấn</label>
                                    <div class="col-sm-10">
                                        <select class="form-control address" name="MA_XA" id="customer_id_ward">
                                            <option value="" >--</option>
                                            @foreach ($xa as $item)
                                            @if ($item->MA_HUYEN ==  $noithanhtoan->MA_HUYEN)
                                            <option {{ $item->MA_HUYEN ==  $noithanhtoan->MA_HUYEN ? "" : 'hidden'}}  value="{{$item->MA_XA}}"  {{ $item->MA_XA ==  $noithanhtoan->MA_XA ? "selected=''" : ""}} data-huyen="{{$item->MA_HUYEN}}">{{$item->TEN_XA}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-postcode">Đường / Số nhà</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="CHITIET" value="{{$noithanhtoan->CHITIET}}" placeholder="Đường / Số nhà" id="input-postcode" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-postcode">Số điện thoại</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="SDT" value="{{$noithanhtoan->DT}}" placeholder="số điện thoại người nhận hàng" class="form-control">
                                    </div>
                                </div>
                                <button type="button" onclick="update_address()" id="button-quote" data-loading-text="Loading..." class="btn btn-primary">Cập nhật thành mặc định</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group">
                <div class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#collapse-voucher" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true">Sử dụng phiếu khuyến mãi của bạn <i class="fa fa-caret-down"></i></a>
                            </h4>
                        </div>
                        <div id="collapse-voucher" class="panel-collapse collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <label class="col-sm-2 control-label" for="input-postcode">Phương thức thanh toán</label>
                                <div class="input-group col-sm-10">
                                    <select class="form-control address" name="MA_THANHTOAN">
                                        @foreach ($thanhtoan as $item)
                                        <option  {{ $item->MA_THANHTOAN == $giohang->MA_THANHTOAN ? "selected" : "" }}  value="{{$item->MA_THANHTOAN}}" >{{$item->PHUONGTHUC_THANHTOAN}}</option>
                                        @endforeach
                                        <option value="2" >Thanh toán online</option>
                                    </select>    
                                    
                                    </div>
                            </div>
                            <div class="panel-body">
                                <label class="col-sm-2 control-label" for="input-voucher">Phiếu khuyến mãi của bạn</label>
                                <div class="input-group">
                                    <input type="text" name="MA_KHUYENMAI" value="{{$giohang->MA_KHUYENMAI}}" placeholder="Voucher của bạn" id="input-voucher" class="form-control">
                                    <span class="input-group-btn">
                                        <input type="button" onclick="check_voucher()" value="Kiểm tra mã" id="button-voucher" data-loading-text="Loading..." class="btn btn-primary">
                                        
                                    </span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-right"><strong>Thành tiền:</strong></td>
                                <td class="text-right" id="toanbo">{{ number_format($thanhtien + $giohang->DONGIA - $giohang->GIAMGIA) }}VNĐ</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">
                                    @php
                                        $tien = ($thanhtien + $giohang->DONGIA - $giohang->GIAMGIA)/2308;
                                    @endphp
                                    <div id="paypal-button" style="display: none"></div>
                                    <input type ="hidden" name="DATHANHTOAN" value="0">
                                    <input type ="hidden" id="tien" value="{{round($tien,2)}}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="buttons clearfix">
                <div class="pull-left"><a href="/home" class="btn btn-default">Tiếp tục mua</a></div>
                <div class="pull-right">
                    <input id="btn-1" type="submit" class="btn btn-primary" value="Đặt hàng" >
                    <input id="btn-2" style="display: none" type="button" onclick="submit_all();" class="btn btn-primary" value="Thanh toán online" />
                </div> 
            </div>
            </form>
            <form action="/vnpay_create" id="create_form" method="post">   
                @csrf
                <input hidden id="amount" name="amount" type="number" value="{{ $thanhtien + $giohang->DONGIA - $giohang->GIAMGIA }}"/>
            </form>
        </div>
    </div>
</div>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    var usd = document.getElementById("tien").value;
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'Aapr7wgjfRQYXqCGidgVb-HfM8iU7LdaqLEHYt0e_e0auYndrqmdoJZlQWDCYudFrDU9T24IcaefrNvi',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        $("input[name='DATHANHTOAN']").val(1);
        window.alert('Cảm ơn bạn đã đặt hàng!');
        $("#check_out").submit();
      });
    }
  }, '#paypal-button');


    $("select[name='MA_THANHTOAN']").change(function(){
       if($(this).val() == 1 ){
           $("#btn-1").css("display","block");
           $("#btn-2").css("display","none");
           $("#btn-3").css("display","none");
       }else if ($(this).val() == 2 ){
           $("#btn-1").css("display","none");
           $("#btn-2").css("display","none");
           $("#paypal-button").css("display","block");
       }else{
           $("#btn-1").css("display","none");
           $("#btn-2").css("display","block");
           $("#paypal-button").css("display","none");
       }
    });
</script>
<script type="text/javascript">
    var giamgia = 0;
    $("#customer_id_province").change(function () {
        var ma_tinh = $(this).val();
        $("#customer_id_district").find("option").hide();
        $("#customer_id_ward").find("option").hide();
        $("#customer_id_ward").find("option[value='']").show();
        $("#customer_id_ward").find("option[value='']").prop("selected", true);
        $("#customer_id_district").find("option[value='']").show();
        $("#customer_id_district").find("option[value='']").prop("selected", true);
        $("#customer_id_district").find("option[data-tinh='" + ma_tinh + "']").show();
    });

    $("#customer_id_district").change(function () {
        var ma_huyen = $(this).val();
        $("#customer_id_ward").find("option").hide();
        $("#customer_id_ward").find("option[value='']").show();
        $("#customer_id_ward").find("option[value='']").prop("selected", true);
        $("#customer_id_ward").find("option[data-huyen='" + ma_huyen + "']").show();
        //var ma_huyen = $("select[name='TEN_HUYEN'").find("option:selected").val();
        $.ajax({
            url: '/load_xa',
                type: 'get',
                data:{
                MA_HUYEN : ma_huyen
                },
                success: function(data) {
                $("select[name='MA_XA'").html();
                $.each(data, function(index, value){
                var html = "<option value=" + value.MA_XA + " data-huyen=" + value.MA_HUYEN + ">" + value.TEN_XA + "</option>";
                $("#customer_id_ward").append(html);
                });
            }
        });
    });
    
    $("select[name='MA_THANHTOAN']").change(function(){
       if($(this).val() == 1 ){
           $("#btn-1").css("display","block");
           $("#btn-2").css("display","none");
       }else{
           $("#btn-1").css("display","none");
           $("#btn-2").css("display","block");
       }
    });

    $(document).ready(function() {
    var itemver = 10;
    if (itemver <= $(".vertical ul.megamenu >li").length)
            $('.vertical ul.megamenu').append('<li class="loadmore"><i class="fa fa-plus-square"></i><span class="more-view"> More Categories</span></li>');
    $('.horizontal ul.megamenu li.loadmore').remove();
    var show_itemver = itemver - 1;
    $('ul.megamenu > li.item-vertical').each(function(i){
    if (i > show_itemver){
    $(this).css('display', 'none');
    }
    });
    $(".megamenu .loadmore").click(function(){
    if ($(this).hasClass('open')){
    $('ul.megamenu li.item-vertical').each(function(i){
    if (i > show_itemver){
    $(this).slideUp(200);
    $(this).css('display', 'none');
    }
    });
    $(this).removeClass('open');
    $('.loadmore').html('<i class="fa fa-plus-square"></i><span class="more-view">More Categories</span>');
    } else{
    $('ul.megamenu li.item-vertical').each(function(i){
    if (i > show_itemver){
    $(this).slideDown(200);
    }
    });
    $(this).addClass('open');
    $('.loadmore').html('<i class="fa fa-minus-square"></i><span class="more-view">Close Categories</span>');
    }
    });
    });
    $("#show-megamenu").click(function () {
    if ($('.megamenu-wrapper').hasClass('so-megamenu-active'))
            $('.megamenu-wrapper').removeClass('so-megamenu-active');
    else
            $('.megamenu-wrapper').addClass('so-megamenu-active');
    });
    $('#remove-megamenu').click(function() {
    $('.megamenu-wrapper').removeClass('so-megamenu-active');
    return false;
    });
    $("#show-verticalmenu").click(function () {
    if ($('.vertical-wrapper').hasClass('so-vertical-active'))
            $('.vertical-wrapper').removeClass('so-vertical-active');
    else
            $('.vertical-wrapper').addClass('so-vertical-active');
    });
//	$('#remove-verticalmenu').click(function() {
//            $('.vertical-wrapper').removeClass('so-vertical-active');
//                return false;
//            });	
//        });

    function check_voucher(){
        var ma_khuyenmai = $("input[name='MA_KHUYENMAI']").val();
        $.ajax({
        url: '/cart/checkvoucher',
                type: 'get',
                data:{
                MA_KHUYENMAI : ma_khuyenmai
                },
                success: function(data) {
                    if (Number(data) != -1){
                        giamgia = ($("table").length - 1)*data;
                        toanbo = 0;
                        $.each($("table"), function(key, value){
                            if(key != $("table").length - 1 ){
                                toanbo = toanbo + Number($(value).find("tbody tr:last-child").find("td:last-child").html().replace("VNĐ", "").replaceAll(",", ""));
                            }
                        });
                        $("#toanbo").html(Intl.NumberFormat('en-US', { maximumSignificantDigits: 5 }).format(toanbo - giamgia) + "VNĐ");
                    }else{
                        alert("Mã khuyến mãi không tồn tại");
                        toanbo = 0;
                        $.each($("table"), function(key, value){
                            if(key != $("table").length - 1 ){
                                toanbo = toanbo + Number($(value).find("tbody tr:last-child").find("td:last-child").html().replace("VNĐ", "").replaceAll(",", ""));
                            }
                        });
                        giamgia = 0;
                        $("#amount").val(toanbo - giamgia);
                        $("#toanbo").html(Intl.NumberFormat('en-US', { maximumSignificantDigits: 5 }).format(toanbo - giamgia) + "VNĐ");
                    }
                }
        });
    }

    function remove_sp(ma_sp, event){
        $.ajax({
             url: '/cart/delete',
                type: 'get',
                data: {'MA_SP': ma_sp},
                dataType: 'json',
                success: function(data) {
                    if (data == 1){
                        $(event).closest("tr").remove();
                    } else{
                        $(event).closest(".table-bordered").remove();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert("Xóa không thành công");
                }
        });
    };
    function update_sl(ma_sp, event){
    var soluong = $(event).closest("tr").find("input[name='SOLUONG[]']").val();
        $.ajax({
        url: '/cart/update',
            type: 'get',
            data:{
                SOLUONG : soluong,
                MA_SP : ma_sp
            },
            success: function(data) {
                if(data == -1){
                    $(event).closest("tr").remove();
                }
                else if (data == -2){
                    $(event).closest(".table-responsive").remove();
                }
                else
                {
                    //location.reload();
                    soluong = data;
                    $(event).closest("tr").find("input[name='SOLUONG[]']").val(soluong);
                    var gia = $(event).closest("tr").find("td").eq(3).html();
                    gia = gia.replace("VNĐ", "").replaceAll(",", "");
                    $(event).closest("tr").find("td").eq(4).html(Intl.NumberFormat('en-US', { maximumSignificantDigits: 5 }).format(gia * soluong) + "VNĐ");
                    var tong = 0;
                    $.each($(event).closest("tbody").find("tr"), function(key, value){
                        if(key != 0 && key != $(event).closest("tbody").find("tr").length - 1 ){
                            tong = tong + Number($(value).find("td:last-child").html().replace("VNĐ", "").replaceAll(",", ""));
                        }
                    })
                    $(event).closest("tbody").find("tr:last-child").find("td").eq(1).html(Intl.NumberFormat('en-US', { maximumSignificantDigits: 5 }).format(tong) + "VNĐ");
//                    //var vanchuyen = Number($("#vanchuyen").html().replace("VNĐ", "").replaceAll(",", ""));
//                    //var khuyenmai = Number($("#khuyenmai").html().replace("VNĐ", "").replaceAll(",", ""));
                    var toanbo = 0;
//                    $("#toanbo").html(Intl.NumberFormat('en-US', { maximumSignificantDigits: 5 }).format(toanbo) + "VNĐ");
                    $.each($("table"), function(key, value){
                        if(key != $("table").length - 1 ){
                            toanbo = toanbo + Number($(value).find("tbody tr:last-child").find("td:last-child").html().replace("VNĐ", "").replaceAll(",", ""));
                        }
                    });
                    $("#amount").val(toanbo - giamgia);
                    $("#toanbo").html(Intl.NumberFormat('en-US', { maximumSignificantDigits: 5 }).format(toanbo - giamgia) + "VNĐ");

                }
            }
        });
    };
    function update_address(){
        var ma_xa = $("select[name='MA_XA']").find("option:selected").val();
        var chitiet = $("input[name='CHITIET']").val();
        $.ajax({
        url: '/cart/update_address',
                type: 'get',
                data:{
                    MA_XA : ma_xa,
                    CHITIET : chitiet,
                    SDT : $("input[name='SDT']").val()
                },
                success: function(data) {
                    alert("cập nhật thành công!");
                    $("input[name='MA_NOI']").val(data);
                    return true;
                }
        });
    };
    
    function update_voucher(){
    var ma_khuyenmai = $("input[name='MA_KHUYENMAI']").val();
    $.ajax({
    url: '/cart/update_voucher',
            type: 'get',
            data:{
                MA_KHUYENMAI : ma_khuyenmai
            },
            success: function(data) {
            if (data > 0){
                giamgia = $("table").length*data;
                $.each($("table"), function(key, value){
                    if(key != $("table").length - 1 ){
                        toanbo = toanbo + Number($(value).find("tbody tr:last-child").find("td:last-child").html().replace("VNĐ", "").replaceAll(",", ""));
                    }
                });
                $("#amount").val(toanbo - giamgia);
                $("#toanbo").html(Intl.NumberFormat('en-US', { maximumSignificantDigits: 5 }).format(toanbo - giamgia) + "VNĐ");
            }
            else{
            alert("mã khuyến mãi không tồn tại !");
            }
            }
    });
    }

    function thanhtoan(evnt){
        var vanchuyen = $(evnt).find("option:selected");
        $(evnt).closest("tr").find("td:last-child").html(Intl.NumberFormat('en-US', { maximumSignificantDigits: 5 }).format(vanchuyen.attr("data-gia")) + "VNĐ");
        var toanbo = 0;
        var tong = 0;
        $.each($(evnt).closest("tbody").find("tr"), function(key, value){
            if(key != 0 && key != $(evnt).closest("tbody").find("tr").length - 1 ){
                tong = tong + Number($(value).find("td:last-child").html().replace("VNĐ", "").replaceAll(",", ""));
            }
        })
        $(evnt).closest("tbody").find("tr:last-child").find("td").eq(1).html(Intl.NumberFormat('en-US', { maximumSignificantDigits: 5 }).format(tong) + "VNĐ");

//                    $("#toanbo").html(Intl.NumberFormat('en-US', { maximumSignificantDigits: 5 }).format(toanbo) + "VNĐ");
        $.each($("table"), function(key, value){
            if(key != $("table").length - 1 ){
                toanbo = toanbo + Number($(value).find("tbody tr:last-child").find("td:last-child").html().replace("VNĐ", "").replaceAll(",", ""));
            }
        });
        $("#amount").val(toanbo - giamgia);
        $("#toanbo").html(Intl.NumberFormat('en-US', { maximumSignificantDigits: 5 }).format(toanbo - giamgia) + "VNĐ");

        
        function submit_all(){
            var postData = $("#order_cart").serialize();
            var submitUrl = $("#order_cart").attr("action");
            $.ajax({
                type: "POST",
                url: submitUrl,
                data: postData,
                dataType: 'JSON',
                success: function (x) {
                    if (x.code === '00') {
                        if (window.vnpay) {
                            vnpay.open({width: 768, height: 600, url: x.data});
                        } else {
                            location.href = x.data;
                        }
                        return false;
                    } else {
                        alert(x.Message);
                    }
                }
            });
            return false;
            $('#create_form').submit();
        }
        
//        $.ajax({
//        url: '/cart/update_pp',
//                type: 'get',
//                data:{
//                    MA_THANHTOAN : ma_thanhtoan,
//                        MA_VANCHUYEN : ma_vanchuyen
//                },
//                success: function(data) {
//
//                }
//        });
//        var ma_xa = $("select[name='MA_XA']").find("option:selected").val();
//        var chitiet = $("input[name='CHITIET']").val();
//        $.ajax({
//        url: '/cart/update_address',
//                type: 'get',
//                data:{
//                MA_XA : ma_xa,
//                        CHITIET : chitiet
//                },
//                success: function(data) {
//
//                }
//        });
//        var ma_khuyenmai = $("input[name='MA_KHUYENMAI']").val();
//        $.ajax({
//        url: '/cart/update_voucher',
//                type: 'get',
//                data:{
//                MA_KHUYENMAI : ma_khuyenmai
//                },
//                success: function(data) {
//
//
//                }
//        });
//        window.location.href = "/add_order"
    }
</script>
@endsection