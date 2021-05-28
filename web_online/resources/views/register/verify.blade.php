@extends('layouts.layout_home')
@section('title')
Đặt hàng thành công
@endsection
@section('content')
<div class="container">
  <ul class="breadcrumb">
        <li><a href="/home"><i class="fa fa-home"></i></a></li>
        <li><a href="/"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">xác nhận tài khoản</font></font></a></li>
  </ul>
  <div class="row">
                <div id="content" class="col-sm-12">
      <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đã xác minh tài khoản thành công</font></font></h1>
      <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bạn có thể nhận được email hóa đơn mua hàng tiện cho việc bảo thành sản phảm</font></font></p><p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bạn có thể xem lịch sử đặt hàng của mình bằng cách truy cập </font><font style="vertical-align: inherit;">trang </font></font><a href="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=account/account"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tài khoản của tôi</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> và nhấp vào </font></font><a href="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=account/order"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lịch sử</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> .</font></font></p><p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nếu giao dịch mua của bạn có nội dung tải xuống được liên kết, bạn có thể truy cập </font><font style="vertical-align: inherit;">trang </font></font><a href="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=account/download"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tải xuống của</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> tài khoản </font><font style="vertical-align: inherit;">để xem chúng.</font></font></p><p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vui lòng chuyển bất kỳ câu hỏi nào bạn có cho </font></font><a href="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=information/contact"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">chủ cửa hàng</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> .</font></font></p><p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cảm ơn vì đã mua sắm trực tuyến với chúng tôi!</font></font></p>
      <div class="buttons">
        <div class="pull-right"><a href="/home" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bắt đầu mua hàng</font></font></a></div>
      </div>
      </div>
    </div>
</div>
<script type="text/javascript">
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
    });
    $(document).ready(function() {
    $(".megamenu").css({"display": "none"});
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

    function remove_sp(ma_sp, event){
    $.ajax({
    url: '/cart/delete',
            type: 'get',
            data: 'MA_SP=' + ma_sp,
            dataType: 'json',
            success: function(json) {
            $(event).closest("tr").remove();
            },
            error: function(xhr, ajaxOptions, thrownError) {
            alert("Xóa không thành công");
            }
    });
    };
</script>
@endsection
