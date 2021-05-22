@extends('layouts.layout_detail')
@section('title')
Login
@endsection
@section('content')
<div class="container">
   <ul class="breadcrumb">
      <li><a href="/home"><i class="fa fa-home"></i></a></li>
      <li><a href="/account">Tài Khoản của tôi</a></li>
      <li><a href="/login">Đăng nhập</a></li>
   </ul>
   <div class="row">
      <div id="content" class="col-md-9 col-sm-12 fluid-sidebar">
         <div class="row">
            <div class="col-sm-6">
               <div class="well ">
                  <h2>Tài khoản mới</h2>
                  <p><strong>Đăng ký</strong></p>
                  <p>Bằng cách tạo tài khoản, bạn sẽ có thể mua sắm nhanh hơn, cập nhật trạng thái đơn hàng và theo dõi các đơn hàng bạn đã thực hiện trước đó.</p>
                  <a href="/register" class="btn btn-primary">Continue</a>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="well col-sm-12">
                  <h2>Đăng nhập tài khoản</h2>
                  <p><strong></strong></p>
                  <form action="/login/auth" method="post">
                      <ul class="" >
                        @if ($err != '')
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $err }}</li>
                            </ul>
                        </div>
                        @endif
                        </ul>
                        {{ csrf_field() }}
                     <div class="form-group">
                        <label class="control-label" for="input-email"> Địa chỉ E-Mail hoặc Số điện thoại</label>
                        <input type="username " name="EMAIL" value="{{$nguoidung ->EMAIL}}" placeholder="E-Mail hoặc số điện thoại" id="input-email" class="form-control">
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="input-password">Mật khẩu</label>
                        <input type="password" name="MATKHAU" value="{{$nguoidung ->MATKHAU}}" placeholder="Password" id="input-password" class="form-control">
                        <a href="/register/rest">Quên mật khẩu</a>
                     </div>
                     <input type="submit" value="Login" class="btn btn-primary pull-left">  
                  </form>
                  <column id="column-login" class="col-sm-8 pull-right">
                     <div class="row">
                        <div class="social_login pull-right" id="so_sociallogin">
                           <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-social-icon btn-sm btn-facebook"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></a>
                           <a href="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=extension/module/so_sociallogin/TwitterLogin" class="btn btn-social-icon btn-sm btn-twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></a>
                           <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;redirect_uri=https%3A%2F%2Fopencart.opencartworks.com%2Fthemes%2Fso_supermarket%2Findex.php%3Froute%3Dextension%2Fmodule%2Fso_sociallogin%2FGoogleLogin&amp;client_id=21690390667-tco9t3ca2o89d3sshkb2fmppoioq5mfq.apps.googleusercontent.com&amp;scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&amp;access_type=offline&amp;approval_prompt=force" class="btn btn-social-icon btn-sm btn-google-plus"><i class="fa fa-google fa-fw" aria-hidden="true"></i></a>
                           <a href="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=extension/module/so_sociallogin/LinkedinLogin" class="btn btn-social-icon btn-sm btn-linkdin"><i class="fa fa-linkedin fa-fw" aria-hidden="true"></i></a>
                        </div>
                     </div>
                  </column>
               </div>
            </div>
         </div>
      </div>
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

<script type="text/javascript">
	$(document).ready(function() {
		var itemver =  10;
		if(itemver <= $( ".vertical ul.megamenu >li" ).length)
			$('.vertical ul.megamenu').append('<li class="loadmore"><i class="fa fa-plus-square"></i><span class="more-view"> More Categories</span></li>');
		$('.horizontal ul.megamenu li.loadmore').remove();

		var show_itemver = itemver-1 ;
		$('ul.megamenu > li.item-vertical').each(function(i){
			if(i>show_itemver){
					$(this).css('display', 'none');
			}
		});
		$(".megamenu .loadmore").click(function(){
			if($(this).hasClass('open')){
				$('ul.megamenu li.item-vertical').each(function(i){
					if(i>show_itemver){
						$(this).slideUp(200);
						$(this).css('display', 'none');
					}
				});
				$(this).removeClass('open');
				$('.loadmore').html('<i class="fa fa-plus-square"></i><span class="more-view">More Categories</span>');
			}else{
				$('ul.megamenu li.item-vertical').each(function(i){
					if(i>show_itemver){
						$(this).slideDown(200);
					}
				});
				$(this).addClass('open');
				$('.loadmore').html('<i class="fa fa-minus-square"></i><span class="more-view">Close Categories</span>');
			}
		});
	});
	
	$("#show-megamenu").click(function () {
		if($('.megamenu-wrapper').hasClass('so-megamenu-active'))
			$('.megamenu-wrapper').removeClass('so-megamenu-active');
		else
			$('.megamenu-wrapper').addClass('so-megamenu-active');
	}); 
	$('#remove-megamenu').click(function() {
        $('.megamenu-wrapper').removeClass('so-megamenu-active');
        return false;
    });		
	
	$("#show-verticalmenu").click(function () {
		if($('.vertical-wrapper').hasClass('so-vertical-active'))
			$('.vertical-wrapper').removeClass('so-vertical-active');
		else
			$('.vertical-wrapper').addClass('so-vertical-active');
	}); 
	$('#remove-verticalmenu').click(function() {
        $('.vertical-wrapper').removeClass('so-vertical-active');
        return false;
    });	
</script>
@endsection	