<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SuperMarket &DoubleVerticalBar;  E-Commerce</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="SuperMarket is an advanced OpenCart 3 theme fully customizable and suitable for e-commerce websites of any purpose. The template is also the typical modern OpenCart theme by universality, attractiveness and easy customization." />
        <meta name="keywords" content="OpenCart 3 theme, OpenCart theme, marketplace support, OpenCart Theme, OpenCart 3, Mobile layout theme, Multivendor Plugin, Multilayout, responsive design, HTML5, CSS3" />


        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/lib.css">
        <link rel="stylesheet" href="/css/ie9-and-up.css">
        <link rel="stylesheet" href="/css/custom.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/animate.css">
        <link rel="stylesheet" href="/css/owl.carousel.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/css3.css">
        <link rel="stylesheet" href="/css/shortcodes.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/css3.css">
        <link rel="stylesheet" href="/css/jquery.fancybox.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/slider.css">
        <link rel="stylesheet" href="/css/so-listing-tabs.css">
        <link rel="stylesheet" href="/css/style_render_33.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/style_render_35.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/so_megamenu.css">
        <link rel="stylesheet" href="/css/wide-grid.css">
        <link rel="stylesheet" href="/css/so_searchpro.css">
        <link rel="stylesheet" href="/css/orange.css">
        <link rel="stylesheet" href="/css/header1.css">
        <link rel="stylesheet" href="/css/footer1.css">
        <link rel="stylesheet" href="/css/responsive.css">
        <link rel="stylesheet" href="/css/styles_21833f8f.4dca6f449469c62fd7ab.css">
        <script src="/js/jquery-2.1.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/libs.js"></script>
        <script src="/js/so.system.js"></script>
        <script src="/js/jquery.sticky-kit.min.js"></script>
        <script src="/js/lazysizes.min.js"></script>
        <script src="/js/so.custom.js"></script>
        <script src="/js/common.js"></script>
        <script src="/js/owl.carousel.js"></script>
        <script src="/js/shortcodes.js"></script>
        <script src="/js/jquery.fancybox.js"></script>
        <script src="/js/script.js"></script>
        <script src="/js/section.js"></script>
        <script src="/js/modernizr.video.js"></script>
        <script src="/js/swfobject.js"></script>
        <script src="/js/video_background.js"></script>
        <script src="/js/script.js"></script>
        <script src="/js/jquery.elevateZoom-3.0.8.min.js"></script>
        <script src="/js/jquery.cookie.js"></script>
        <script src="/js/so_megamenu.js"></script>

        <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>
        <style type="text/css">
            body, #wrapper{font-family:'Poppins', sans-serif}
        </style>
        <link href="#" rel="canonical" />
        <link href="/images/favicon2.png" rel="icon" />
    </head>
    
    <body class="common-home ltr layout-1">
        
        <div id="wrapper" class="wrapper-fluid banners-effect-3">  
            <div class="so-pre-loader no-pre-loader"><div class="so-loader-line" id="line-load"></div></div>
            <header id="header" class=" variant typeheader-1">
                <div class="header-top hidden-compact">
                    <div class="container">
                        <div class="row">
                            <div class="header-top-left col-lg-7 col-md-8 col-sm-6 col-xs-4">
                                <div class="hidden-md hidden-sm hidden-xs welcome-msg">
                                    Welcome to SuperMarket! &nbsp;<span>Happy2021</span>

                                </div>
                                <ul class="top-link list-inline hidden-lg ">
                                    <li class="account" id="my_account">
                                        <a href="/account" title="My Account " class="btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs">Tài khoản của tôi </span> <span class="fa fa-caret-down"></span></a>
                                        <ul class="dropdown-menu ">
                                            <li><a href="/register">Register</a></li>
                                            <li><a href="/login">Login</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-middle ">
                    <div class="container">
                        <div class="row">
                            <div class="navbar-logo col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                <div class="logo">
                                    <a href="/home"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://opencart.opencartworks.com/themes/so_supermarket/image/catalog/logo.png" title="Your Store" alt="Your Store" /></a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-sm-5">
                                <div class="search-header-w">
                                    <div class="icon-search hidden-lg hidden-md hidden-sm"><i class="fa fa-search"></i></div>
                                    <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                                        <form method="GET" action="/search">
                                            <div id="search0" class="search input-group form-group">
                                                <div class="select_category filter_type  icon-select hidden-sm hidden-xs">
                                                    <select class="no-border" name="ma_danhmuc">
                                                        @if(is_array($danhmuc))
                                                        <option value="">Tất cả danh mục</option>
                                                        @foreach ($danhmuc as $dmsp)
                                                        @if(!$dmsp->DAN_MA_DANHMUC)
                                                        <option value="{{ $dmsp->MA_DANHMUC }}">{{ $dmsp->TEN_DANHMUC }}</option>
                                                        @foreach ($danhmuc as $row)
                                                        @if ($row->DAN_MA_DANHMUC && $row->DAN_MA_DANHMUC == $dmsp -> MA_DANHMUC)
                                                        <option value="{{ $row->MA_DANHMUC }}">-- {{ $row->TEN_DANHMUC }}</option>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <input class="autosearch-input form-control" type="search" value="" size="50" autocomplete="off" placeholder="nhập vào đây để tìm kiếm..." name="search">
                                                <button type="submit" class="button-search btn btn-default btn-lg"><i class="fa fa-search"></i><span>Tìm</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="shopping_cart">
                                    <div id="cart" class="btn-shopping-cart">
                                        <a href="/cart" class="btn-group top_cart dropdown-toggle" data-toggle="dropdown">
                                            <div class="shopcart">
                                                <span class="icon-c">
                                                    <i class="fa fa-shopping-bag"></i>
                                                </span>
                                                <div class="shopcart-inner">
                                                    <p class="text-shopping-cart">
                                                        Giỏ hàng
                                                    </p>
                                                    <span class="total-shopping-cart cart-total-full">
                                                        <span id="cartquantity" class="items_cart">{{$soluong}}</span><span class="items_cart2"> sản phẩm</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @if($user)
                                    <ul class="shopping_cart hidden-md hidden-sm hidden-xs" style="margin: 10px 20px">
                                        <li class="compare hidden-xs">
                                        <a href="/account/index"  id="account-total" title="Account">
                                            <h4 style="color:#FBEFF2">{{$user->TEN_NGUOIDUNG}}</h4>
                                        </a>
                                        </li>
                                    </ul>
                                @else
                                <ul class="wishlist-comp hidden-md hidden-sm hidden-xs">
                                    <li class="compare hidden-xs">
                                        <a href="/register"  title="Account">
                                            <i class="fa fa-user"></i>
                                        </a>
                                    </li>
                                </ul>
                                @endif
                                    &nbsp;&nbsp;
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom ">
                    <div class="container">

                        <div class="row">
                            <div class="bottom1 menu-vertical col-lg-2 col-md-3 col-sm-3">
                                <div class="responsive megamenu-style-dev">
                                    <div class="so-vertical-menu no-gutter">
                                        <nav class="navbar-default">
                                            <div class=" container-megamenu  container   vertical  ">
                                                <div id="menuHeading">
                                                    <div class="megamenuToogle-wrapper">
                                                        <div class="megamenuToogle-pattern">
                                                            <div class="container">
                                                                <div><span></span><span></span><span></span></div>
                                                                Tất cả danh mục     
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-header">
                                                    <button type="button" id="show-verticalmenu" data-toggle="collapse"  class="navbar-toggle">
                                                           <!-- <span class="icon-bar"></span>
                                                                  <span class="icon-bar"></span>
                                                                  <span class="icon-bar"></span> -->
                                                        <i class="fa fa-bars"></i>
                                                        <span>    Tất cả danh mục      </span>
                                                    </button>
                                                </div>
                                                <div class="vertical-wrapper">
                                                    <span id="remove-verticalmenu" class="fa fa-times"></span>
                                                    <div class="megamenu-pattern">
                                                        <div class="container">
                                                            <ul class="megamenu"
                                                                data-transition="slide" data-animationtime="300">
                                                                @foreach ($danhmuc as $item)
                                                                @if(!$item->DAN_MA_DANHMUC)
                                                                <li class="item-vertical css-menu with-sub-menu hover" >
                                                                    <p class='close-menu'></p>
                                                                    <a href="/search?ma_danhmuc={{$item->MA_DANHMUC}}" class="clearfix" >
                                                                        <span>
                                                                            <strong><img class="lazyload" data-sizes="auto" data-src="{{$item->HINHANH}}" style="width: 26px; height: 26px;" alt="">{{$item->TEN_DANHMUC}}</strong>
                                                                        </span>

                                                                        @if (array_search($item->MA_DANHMUC, array_column($danhmuc, "DAN_MA_DANHMUC")))
                                                                        <b class="fa fa-angle-right"></b>
                                                                        @endif
                                                                    </a>

                                                                    @if (array_search($item->MA_DANHMUC, array_column($danhmuc, "DAN_MA_DANHMUC")))
                                                                    <div class="sub-menu" style="width: 250px; display: none; right: 0px;">
                                                                        <div class="content" style="display: none; height: 144px;">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="categories ">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-12 hover-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        @foreach ($danhmuc as $row)
                                                                                                        @if($row->DAN_MA_DANHMUC && $row->DAN_MA_DANHMUC == $item->MA_DANHMUC)
                                                                                                        <li><a href="/search?ma_danhmuc={{$row->MA_DANHMUC}}" onclick=" class ="main-menu">{{$row->TEN_DANHMUC }}</a></li>

                                                                                                        @endif
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>				
                                                                    </div>
                                                                    @endif
                                                                </li>
                                                                @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="main-menu-w col-lg-8 col-md-9">
                                <div class="responsive megamenu-style-dev">
                                    <nav class="navbar-default">
                                        <div class=" container-megamenu   horizontal ">
                                            <div class="navbar-header">
                                                <button type="button" id="show-megamenu" data-toggle="collapse"  class="navbar-toggle">
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                                            </div>
                                            <div class="megamenu-wrapper">
                                                <span id="remove-megamenu" class="fa fa-times"></span>
                                                <div class="megamenu-pattern">
                                                    <div class="container">
                                                        <ul class="megamenu" data-transition="slide" data-animationtime="500">
                                                            <li class="">
                                                                <a href="/home">
                                                                    <span><strong>   Home   </strong></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="bottom3">
                                @if($user)
                                <div class="telephone hidden-xs hidden-sm hidden-md" >
                                    <ul>
                                        <li><a href="/admin/register_shop"><i class="fa fa-user"></i>Kênh bán hàng</a></li>
                                    </ul>
                                </div>
                                <div class="signin-w font-title hidden-md hidden-sm hidden-xs">
                                    <ul class="signin-link">
                                        <li class="log login"><a href="/logout"><i class="fa fa-arrow-left"></i> Đăng xuất</a></li>
                                    </ul>
                                </div>
                                
                                @else
                                <div class="telephone hidden-xs hidden-sm hidden-md" >
                                    <ul>
                                        <li><a href="/register"><i class="fa fa-lock"></i>Đăng ký</a></li>
                                    </ul>
                                </div>
                                <div class="signin-w font-title hidden-md hidden-sm hidden-xs">
                                    <ul class="signin-link">
                                        <li class="log login"><a href="/login"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div id="content" class=""> 
                @yield('content')
            </div>	



            <footer class="footer-container typefooter-1">
                <div class="footer-main collapse description-has-toggle" id="collapse-footer">
                    <div class="so-page-builder">
                        <div class="container page-builder-ltr">
                            <div class="row row_3vy7  footer-top ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col_3put  col-style">
                                    <div class="socials-w">
                                        <h2>Theo dõi mạng xã hội</h2>
                                        <ul class="socials">
                                            <li class="facebook"><a href="https://www.facebook.com/MagenTech" target="_blank"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
                                            <li class="twitter"><a href="https://twitter.com/smartaddons" target="_blank"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>
                                            <li class="google_plus"><a href="https://plus.google.com/u/0/+Smartaddons/posts" target="_blank"><i class="fa fa-google-plus"></i><span>Google Plus</span></a></li>
                                            <li class="pinterest"><a href="https://www.pinterest.com/smartaddons/" target="_blank"><i class="fa fa-pinterest"></i><span>Pinterest</span></a></li>
                                            <li class="youtube"><a href="#" target="_blank"><i class="fa fa-youtube-play"></i><span>Youtube</span></a></li>
                                            <li class="linkedin"><a href="#" target="_blank"><i class="fa fa-linkedin"></i><span>linkedin</span></a></li>
                                            <li class="skype"><a href="#" target="_blank"><i class="fa fa-skype"></i><span>skype</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col_ikvg  col-style">
                                    <div class="module newsletter-footer1">
                                        <div class="newsletter" style="width:100%      ;  ; ">
                                            <div class="title-block">
                                                <div class="page-heading font-title">
                                                    Đăng ký để xem thông tin
                                                </div>
                                                <div class="promotext">Chúng tôi sẽ không bao giờ chia sẻ địa chỉ email của bạn với người khác. </div>
                                            </div>
                                            <div class="block_content">
                                                <form action="/register" method="post" id="signup" name="signup" class="form-group form-inline signup send-mail">
                                                    <div class="form-group">
                                                        <div class="input-box">
                                                            <input type="email" placeholder="Địa chỉ Email..." value="" class="form-control" id="txtemail" name="txtemail" size="55">
                                                        </div>
                                                        <div class="subcribe">
                                                            <button class="btn btn-primary btn-default font-title" type="submit" onclick="return subscribe_newsletter();" name="submit">
                                                                Đăng ký
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--/.modcontent-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container page-builder-ltr">
                            <div class="row row_560y  footer-middle ">
                                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 col_i76p  col-infos">
                                    <div class="infos-footer">
                                        <a href="#"><img src="/images/logo-footer.png" alt="image"></a>
                                        <ul>
                                            <li class="adres">
                                                Ninh Kiều, Cần Thơ, Việt Nam
                                            </li>
                                            <li class="phone">
                                                (+0214)0 315 215 - (+0214)0 315 215
                                            </li>
                                            <li class="mail">
                                                <a href="mailto:contact@opencartworks.com">contact@supermarkets.com</a>
                                            </li>
                                            <li class="time">
                                                Mở cửa: 6:00AM - 11:00PM
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 col_njm1  col-style">
                                    <div class="box-information box-footer">
                                        <div class="module clearfix">
                                            <h3 class="modtitle">Thông tin</h3>
                                            <div class="modcontent">
                                                <ul class="menu">
                                                    <li><a href="index.php?route=information/information&information_id=4">Thông tin về chúng tôi</a></li>
                                                    <li><a href="index.php?route=information/information&information_id=6">Câu hỏi</a></li>
                                                    <li><a href="index.php?route=information/information&information_id=3">Dịch vụ và bảo hành</a></li>
                                                    <li><a href="index.php?route=information/information&information_id=7">Trang hỗ trợ</a></li>
                                                    <li><a href="#">Đăng ký sản phẩm</a></li>
                                                    <li><a href="#">Hỗ trợ sản phẩm</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 col_py4d  col-style">
                                    <div class="box-account box-footer">
                                        <div class="module clearfix">
                                            <h3 class="modtitle">Tài khoàn của tôi</h3>
                                            <div class="modcontent">
                                                <ul class="menu">
                                                    <li><a href="index.php?route=product/manufacturer">Nhãn hiệu</a></li>
                                                    <li><a href="index.php?route=account/voucher">Phiếu quà tặng</a></li>
                                                    <li><a href="index.php?route=affiliate/login">Chi nhánh</a></li>
                                                    <li><a href="index.php?route=product/special">Đặt biệt</a></li>
                                                    <li><a href="#">Câu hỏi thường gặp</a></li>
                                                    <li><a href="#">Liên kết</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 col_slxc  col-clear">
                                    <div class="box-service box-footer">
                                        <div class="module clearfix">
                                            <h3 class="modtitle">Dịch vụ</h3>
                                            <div class="modcontent">
                                                <ul class="menu">
                                                    <li><a href="index.php?route=information/contact">Liên hệ</a></li>
                                                    <li><a href="index.php?route=account/return/add">Lợi nhuận</a></li>
                                                    <li><a href="#">Ủng hộ</a></li>
                                                    <li><a href="index.php?route=information/sitemap">Bảng đồ</a></li>
                                                    <li><a href="#">Dịch vụ khách hàng</a></li>
                                                    <li><a href="#">Liên kết dịch vụ</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 col_5rbh  col-style">
                                    <div class="box-service box-footer">
                                        <div class="module clearfix">
                                            @if(is_array($danhmuc))
                                            <h3 class="modtitle">Danh mục</h3>
                                            @foreach($danhmuc as $item)
                                            @if(!$item->DAN_MA_DANHMUC)
                                            <div class="modcontent">
                                                <ul class="menu">
                                                    <li><a href="#">{{$item->TEN_DANHMUC}}</a></li>
                                                </ul>
                                            </div>
                                            @endif
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 col_ye2q  col-style">
                                    <div class="box-service box-footer">
                                        <div class="module clearfix">
                                            <h3 class="modtitle">Hướng dẫn</h3>
                                            <div class="modcontent">
                                                <ul class="menu">
                                                    <li><a href="#">Hướng dẫn mua hàng</a></li>
                                                    <li><a href="#">Cách thức thanh toán</a></li>
                                                    <li><a href="#">Chính sách khuyến mãi</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container page-builder-ltr">
                            <div class="row row_nfrt  footer-b ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_apdj  col-style">
                                    <div class="bottom-cont">
                                        <a href="#"><img src="/images/pay1.jpg" alt="image"></a>
                                        <ul class="footer-links">
                                            <li><a href="#">Thông tin về chúng tôi</a></li>
                                            <li><a href="#">Dịch vụ khách hàng</a></li>
                                            <li><a href="#">Chính sách bảo mặt</a></li>
                                            <li><a href="#">Bản đồ</a></li>
                                            <li><a href="#">Đơn hàng và trả hàng</a></li>
                                            <li><a href="#">Liên hệ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description-toggle hidden-lg hidden-md">
                    <a class="showmore" data-toggle="collapse" href="#collapse-footer" aria-expanded="false" aria-controls="collapse-footer">
                        <span class="toggle-more">Show More <i class="fa fa-angle-down"></i></span> 
                        <span class="toggle-less">Show Less <i class="fa fa-angle-up"></i></span>           
                    </a>        
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="col-lg-12 col-xs-12 payment-w">
                            <img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/payment.png"  alt="imgpayment">
                        </div>
                    </div>
                    <div class="copyright-w">
                        <div class="container">
                            <div class="copyright">
                                <script>document.write(new Date().getFullYear())</script> © Supermarket - Shop.com
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <div class="back-to-top"><i class="fa fa-angle-up"></i></div>    
            <script src="/js/js.js" ></script>
            <script>
                $("#cart").click(function () {
                    window.location.href = "/cart"
                });
            </script>
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
            <script>
                var closed;
                var ma_cuahang;
                
                $("#cart").click(function(){
                   window.location.href = "/cart" 
                });
                
                window.onload = function(){
                // short timeout
                    setTimeout(function() {
                        $.ajax({
                            method: "get",
                            url: "/chat",
                            success: (function(data){
                                data.list_nguoidung.forEach(function(value, key){
                                    var template = $("#template").clone();
                                    template.css("top", (key*48)+"px");
                                    template.css("display", "flex");
                                    template.find("img").attr("src", value.HINHANH);
                                    template.find(".src-components-ConversationListsLayout-ConversationCells-index__username--SOXgT").html(value.TEN_CUAHANG);
                                    template.find(".src-components-ConversationListsLayout-ConversationCells-index__message--2aCpi").html(value.NOIDUNG);
//                                    var now = dateFormat(new Date(), "yyyy-mm-dd");
                                    template.find(".src-components-ConversationListsLayout-ConversationCells-index__timestamp--wvvBM").html(value.THOIGIAN);
                                    template.attr("onclick", "loadIndex("+ value.MA_CUAHANG + ")");
                                    if (value.TRANGTHAI != 0){
                                        template.find(".thong_bao").html(value.TRANGTHAI);
                                    }
                                    template.attr("id", "#user_id_" + value.MA_CUAHANG);
                                    $("#template").after(template);
                                });
                                
                                $(".src-components-ConversationDetailLayout-BuyerProfile-index__name--1UP54").html(data.TEN_CUAHANG);
                                ma_cuahang = data.MA_CUAHANG;
                                $("input[name='MA_CUAHANG']").val(data.MA_CUAHANG);
                                data.list_noidung.forEach(function(value, key){
                                    var template = "";
                                    if(value.TRA_MA_TRAODOI == null){
                                        template = $("#template-reply").clone();
                                        template.find("pre").html(value.NOIDUNG);
                                        
                                    }else{
                                        template = $("#template_sent").clone();
                                        template.find("pre").html(value.NOIDUNG);
                                    }
                                    template.css("display","block");
                                    template.attr("onclick", "loadIndex("+value.MA_CUAHANG+")");
                                    $("#content_noidung").append(template);
//                                    
//                                    template.css("top", (key*48)+"px");
//                                    template.css("display", "flex");
//                                    template.find("img").attr("src", value.HINHANH);
//                                    template.find(".src-components-ConversationListsLayout-ConversationCells-index__username--SOXgT").html(value.TEN_CUAHANG);
//                                    template.find(".src-components-ConversationListsLayout-ConversationCells-index__message--2aCpi").html(value.NOIDUNG);
////                                    var now = dateFormat(new Date(), "yyyy-mm-dd");
//                                    template.find(".src-components-ConversationListsLayout-ConversationCells-index__timestamp--wvvBM").html(value.THOIGIAN);
//                                    
        
//                                    $(".ReactVirtualized__Grid__innerScrollContainer").append(template);
                                });
                                
                                var d = $('#content_noidung');
                                $("#content_noidung").scrollTop(d.prop("scrollHeight"));
                                   
//                                $("#content_noidung").css("height", height);
//                                $("#content_noidung .ReactVirtualized__Grid__innerScrollContainer").css("height", height);
                            })
                        });
                    }, 15);
                };
                
                function loadIndex(ma_ch){
                    $.ajax({
                            method: "get",
                            url: "/chat?id="+ma_ch,
                            success: (function(data){
                                $("#content_noidung").html("");
                                $(".src-components-ConversationDetailLayout-BuyerProfile-index__name--1UP54").html(data.TEN_CUAHANG);
                                ma_cuahang = data.MA_CUAHANG;
                                $("input[name='MA_CUAHANG']").val(data.MA_CUAHANG);
                                data.list_noidung.forEach(function(value, key){
                                    var template = "";
                                    if(value.TRA_MA_TRAODOI == null){
                                        template = $("#template-reply").clone();
                                        template.find("pre").html(value.NOIDUNG);
                                        
                                    }else{
                                        template = $("#template_sent").clone();
                                        template.find("pre").html(value.NOIDUNG);
                                    }
                                    template.css("display","block");
                                    template.attr("onclick", "loadIndex("+value.MA_CUAHANG+")");
                                    $("#content_noidung").append(template);
                                });
                                
                                var d = $('#content_noidung');
                                $("#content_noidung").scrollTop(d.prop("scrollHeight"));
                            })
                        });
                }
                
                
                
                var pusher = new Pusher('24d4b050dc48945113d1', {
                    encrypted: true,
                    cluster: "ap1"
                });

                // Subscribe to the channel we specified in our Laravel Event
                var channel = pusher.subscribe('chat');

                // Bind a function to a Event (the full Laravel class)
                channel.bind('App\\Events\\MessageSent', function(data) {
                    if(ma_cuahang == data.data.MA_CUAHANG && data.data.MA_NGUOIDUNG == {{$user ? $user->MA_NGUOIDUNG : "0" }}){
                        var template = $("#template_sent").clone();
                        template.find("pre").html(data.data.NOIDUNG);
                        template.css("display","block");
                        $("#content_noidung").append(template);
                        var d = $('#content_noidung');
                        d.append(template);
                        $("#content_noidung").scrollTop(d.prop("scrollHeight"));
                    }else if(data.data.MA_NGUOIDUNG == {{$user ? $user->MA_NGUOIDUNG : "0" }}){
                        var item = $("#user_id_" + data.data.MA_CUAHANG);
                        item.find("pre").html(data.data.NOIDUNG);
                        var i = Number(item.find(".thong_bao")) + 1;
                        item.find(".thong_bao").html(i);
                    }
                });
                
                
                // Subscribe to the channel we specified in our Laravel Event
                var replay_channel = pusher.subscribe('reply-chat');

                // Bind a function to a Event (the full Laravel class)
                replay_channel.bind('App\\Events\\MessageReply', function(data) {
                    var template = $("#template-reply").clone();
                    template.find("pre").html(data.data.NOIDUNG);
                    template.css("display","block");
                    $("#content_noidung").append(template);
                    var d = $('#content_noidung');
                    d.append(template);
                    $("#content_noidung").scrollTop(d.prop("scrollHeight"));
                    $("textarea#send-message").val("");
                });

                $("textarea#send-message").keyup(function(event) {
                    if (event.keyCode == 13) {
                        $.ajax({
                            method: "post",
                            data: $("#form_message").serialize(),
                            url: "/admin/chat/reply",
                            success: (function(data){
                            })
                        });
                        
                    }
                });
                
                function send(){
                    $.ajax({
                            method: "post",
                            data: $("#form_message").serialize(),
                            url: "/admin/chat/reply",
                            success: (function(data){
                            })
                        });
                }
                
               
                
                function Closed(){
                    if($("#show_box").attr("data-close") == 1){
                        $("#show_box").removeAttr("class");
                        $("#show_box").addClass("src-components-MainLayout-index__wrapper--27ZAv");
                        $("#show_box").attr("data-close", 0)
                    }else {
                        $("#show_box").attr("data-close", 1)
                        $("#show_box").addClass("src-components-MainLayout-index__container--pU83Q");
                    }
                }
            </script>
    </div>
    <div id="shopee-mini-chat-embedded" style="position: fixed; right: 8px; bottom: 0px; z-index: 99999;">
        <div id="show_box" data-close="1" class="src-components-MainLayout-index__wrapper--27ZAv">
            <div class="src-components-MainLayout-index__root--1hhpV">
                <div onclick="Closed();" class="src-components-MainLayout-index__logo-wrapper--aKCJc">
                    <i class="_3kEAcT1Mk5 src-components-MainLayout-index__chat--3J2KN">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="chat-icon">
                             <path d="M18 6.07a1 1 0 01.993.883L19 7.07v10.365a1 1 0 01-1.64.768l-1.6-1.333H6.42a1 1 0 01-.98-.8l-.016-.117-.149-1.783h9.292a1.8 1.8 0 001.776-1.508l.018-.154.494-6.438H18zm-2.78-4.5a1 1 0 011 1l-.003.077-.746 9.7a1 1 0 01-.997.923H4.24l-1.6 1.333a1 1 0 01-.5.222l-.14.01a1 1 0 01-.993-.883L1 13.835V2.57a1 1 0 011-1h13.22zm-4.638 5.082c-.223.222-.53.397-.903.526A4.61 4.61 0 018.2 7.42a4.61 4.61 0 01-1.48-.242c-.372-.129-.68-.304-.902-.526a.45.45 0 00-.636.636c.329.33.753.571 1.246.74A5.448 5.448 0 008.2 8.32c.51 0 1.126-.068 1.772-.291.493-.17.917-.412 1.246-.74a.45.45 0 00-.636-.637z"></path>
                        </svg>
                    </i>
                    <i class="_3kEAcT1Mk5 src-components-MainLayout-index__logo--1byC8">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 22" class="chat-icon">
                            <path d="M9.286 6.001c1.161 0 2.276.365 3.164 1.033.092.064.137.107.252.194.09.085.158.064.203 0 .046-.043.182-.194.251-.26.182-.17.433-.43.752-.752a.445.445 0 00.159-.323c0-.172-.092-.3-.227-.365A7.517 7.517 0 009.286 4C5.278 4 2 7.077 2 10.885s3.256 6.885 7.286 6.885a7.49 7.49 0 004.508-1.484l.022-.043a.411.411 0 00.046-.71v-.022a25.083 25.083 0 00-.957-.946.156.156 0 00-.227 0c-.933.796-2.117 1.205-3.392 1.205-2.846 0-5.169-2.196-5.169-4.885C4.117 8.195 6.417 6 9.286 6zm32.27 9.998h-.736c-.69 0-1.247-.54-1.247-1.209v-3.715h1.96a.44.44 0 00.445-.433V9.347h-2.45V7.035c-.021-.043-.066-.065-.111-.043l-1.603.583a.423.423 0 00-.29.41v1.362h-1.781v1.295c0 .238.2.433.445.433h1.337v4.19c0 1.382 1.158 2.505 2.583 2.505H42v-1.339a.44.44 0 00-.445-.432zm-21.901-6.62c-.739 0-1.41.172-2.013.496V4.43a.44.44 0 00-.446-.43h-1.788v13.77h2.234v-4.303c0-1.076.895-1.936 2.013-1.936 1.117 0 2.01.86 2.01 1.936v4.239h2.234v-4.561l-.021-.043c-.202-2.088-2.012-3.723-4.223-3.723zm10.054 6.785c-1.475 0-2.681-1.12-2.681-2.525 0-1.383 1.206-2.524 2.681-2.524 1.476 0 2.682 1.12 2.682 2.524 0 1.405-1.206 2.525-2.682 2.525zm2.884-6.224v.603a4.786 4.786 0 00-2.985-1.035c-2.533 0-4.591 1.897-4.591 4.246 0 2.35 2.058 4.246 4.59 4.246 1.131 0 2.194-.388 2.986-1.035v.604c0 .237.203.431.453.431h1.356V9.508h-1.356c-.25 0-.453.173-.453.432z"></path>
                        </svg>
                    </i>
                </div>
                <div class="src-components-MainLayout-index__operator-wrapper--151w3">
                    
                    <div style="width: 20px" onclick="Closed();" class="src-components-MainLayout-index__operator-item-wrapper--1Zyy4">
                        <div class="">
                            <i class="_3kEAcT1Mk5 src-components-MainLayout-index__minimize--30m1T src-components-MainLayout-index__operator-item--3BQSc"> 
                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="chat-icon">
                                    <path d="M14 1a1 1 0 011 1v12a1 1 0 01-1 1H2a1 1 0 01-1-1V2a1 1 0 011-1h12zm0 1H2v12h12V2zm-2.904 5.268l-2.828 2.828a.5.5 0 01-.707 0L4.732 7.268a.5.5 0 11.707-.707l2.475 2.475L10.39 6.56a.5.5 0 11.707.707z"></path>
                                </svg>
                            </i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="src-components-MainLayout-index__windows--1hePz">
                <div class="src-components-MainLayout-index__details--2Ww8a">
                    <div class="src-components-MainLayout-index__details--2Ww8a">
                        <div class="src-components-ConversationDetailLayout-index__header--3JK16">
                           <div class="src-components-ConversationDetailLayout-BuyerProfile-index__root--jfvei">
                              <div class="src-components-Common-Menus-index__root--2dnxA">
                                 <div class="src-components-Common-Menus-index__popover--kPHFo">
                                    <div class="src-components-Common-Menus-index__button--2et6C" style="display: flex; align-items: center; overflow: hidden; justify-content: flex-start;">
                                       <div class="src-components-ConversationDetailLayout-BuyerProfile-index__name--1UP54"></div>
                                       <i class="_3kEAcT1Mk5 src-components-ConversationDetailLayout-BuyerProfile-index__arrow--3PolG">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" class="chat-icon">
                                             <path d="M6.243 6.182L9.425 3l1.06 1.06-4.242 4.243L2 4.061 3.06 3z"></path>
                                          </svg>
                                       </i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="src-components-ConversationDetailLayout-index__zone--n6a0J">
                           <div id="messagesContainer" class="src-components-ConversationDetailLayout-index__message--2EHHy">
                              <div class="_3B-_5RU5ihxWqvPFT2BAZa null">
                                 <div class="_7-BLd7BF4xzVLsB696_-8 null">
                                    <div class="src-components-MessageSectionLayout-index__message-section--ohVwx" style="position: relative;">
                                       
                                          <div id="content_noidung" aria-label="grid" aria-readonly="true" class="ReactVirtualized__Grid ReactVirtualized__List src-components-MessageSectionLayout-index__grid--3lPyW" role="grid" tabindex="0" style="height: 243px; width: 283px; overflow: scroll">
                                             
                                                
                                          </div>
                                       <div id="template-reply" class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__root--2sDHO  undefined" style="display: none;">
<!--                                                   <div class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__message-time--3jGGy">6 Th12 2020, 19:45</div>-->
                                                   <div class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__message-send--3sIFE src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__message--49iPR" style="margin-top: 8px;">
                                                      <div class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__bubble--1lWyZ">
                                                         <pre class="_2Zb8khbVxMFlHDDD2kMhKl "></pre>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div id="template_sent" class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__root--2sDHO  undefined" style="display: none;">
                                                    <div class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__message-receive--13_8K src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__message--49iPR" style="margin-top: 4px;">
                                                       <div class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__bubble--1lWyZ">
                                                          <pre class="_2Zb8khbVxMFlHDDD2kMhKl"></pre>
                                                       </div>
                                                    </div>
                                                 </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="src-components-ConversationDetailLayout-index__input--2w54V">
                              <div class="src-components-ConversationDetailLayout-InputFieldLayout-index__root--2-LH7">
                                 <form method="post" enctype="multipart/form-data" id="form_message" >
                                     {{ csrf_field() }}
                                     <input name="MA_CUAHANG" type="hidden" value=""/>
                                    <div>
                                       <div class="src-components-ConversationDetailLayout-InputFieldLayout-ChatEditor-index__root--bvWJK">
                                          <textarea id="send-message" name="NOIDUNG" class="src-components-ConversationDetailLayout-InputFieldLayout-ChatEditor-index__editor--3D_Zq" placeholder="Gửi tin nhắn" style="overflow: hidden; height: 30px;"></textarea>
                                          <div class="src-components-ConversationDetailLayout-InputFieldLayout-ChatEditor-index__send-button--1uW8l">
                                              <i onclick="send()" class="_3kEAcT1Mk5 src-components-ConversationDetailLayout-InputFieldLayout-ChatEditor-index__button--3btwx">
                                                  <svg style="display: block" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="chat-icon">
                                                   <path d="M4 14.497v3.724L18.409 12 4 5.779v3.718l10 2.5-10 2.5zM2.698 3.038l18.63 8.044a1 1 0 010 1.836l-18.63 8.044a.5.5 0 01-.698-.46V3.498a.5.5 0 01.698-.459z"></path>
                                                </svg>
                                             </i>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="src-components-ConversationDetailLayout-InputFieldLayout-index__toolbar--1D95T">
                                       <div class="src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__root--UeP3I">
                                          <div class="src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__left--28Ouu">
                                             
                                             <div class="src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__drawer--1hRAt">
                                                <div>
                                                   <input accept="image/png,image/jpeg,image/jpg" multiple="" type="file" style="display: none;">
                                                   <div class="">
                                                      <i class="_3kEAcT1Mk5 src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__image--R4hl2 src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__label--2cJlV src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__inactive-label--3LxJq">
                                                         <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="chat-icon">
                                                            <path d="M19 18.974V5H5v14h.005l4.775-5.594a.5.5 0 01.656-.093L19 18.974zM4 3h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1zm11.5 8a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"></path>
                                                         </svg>
                                                      </i>
                                                   </div>
                                                </div>
                                             </div>
                                             
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>

                </div>
                <div class="src-components-ConversationListsLayout-index__root--mbMGC">
                    <div class="src-components-ConversationListsLayout-Headerbar-index__root--28G_E">
                        <div class="src-components-ConversationListsLayout-Headerbar-index__search--1yyji">
                            <input class="src-components-ConversationListsLayout-Headerbar-index__input--10eES" placeholder="Search name" value="">
                                <div class="src-components-ConversationListsLayout-Headerbar-index__wrapper--WeH6A ">
                                    <i class="_3kEAcT1Mk5 src-components-ConversationListsLayout-Headerbar-index__icon--2Qaml">
                                        <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="chat-icon">
                                            <g transform="translate(3 3)">
                                                <path d="M393.846 708.923c174.012 0 315.077-141.065 315.077-315.077S567.858 78.77 393.846 78.77 78.77 219.834 78.77 393.846s141.065 315.077 315.077 315.077zm0 78.77C176.331 787.692 0 611.36 0 393.845S176.33 0 393.846 0c217.515 0 393.846 176.33 393.846 393.846 0 217.515-176.33 393.846-393.846 393.846z"></path>
                                                <rect transform="rotate(135 825.098 825.098)" x="785.713" y="588.79" width="78.769" height="472.615" rx="1"></rect>
                                            </g>
                                        </svg>
                                    </i>
                                </div>
                        </div>
                        <div class="src-components-ConversationListsLayout-Headerbar-index__filter--2SqAf src-components-ConversationListsLayout-Headerbar-index__reddot-filter--1UXvG">
                            <div class="src-components-Common-Menus-index__root--2dnxA">
                                <div class="src-components-Common-Menus-index__popover--kPHFo">
                                    <div class="src-components-Common-Menus-index__button--2et6C">
                                        <div class="src-components-ConversationListsLayout-Headerbar-index__selected--3FjOw">All
                                            <i class="_3kEAcT1Mk5 src-components-ConversationListsLayout-Headerbar-index__arrow-down--3Bxlh">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" class="chat-icon">
                                                    <path d="M6.243 6.182L9.425 3l1.06 1.06-4.242 4.243L2 4.061 3.06 3z"></path>
                                                </svg>
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="src-components-ConversationListsLayout-index__conversation-lists--1cNKp">
                        
                        <div class="_3B-_5RU5ihxWqvPFT2BAZa null">
                            <div class="_7-BLd7BF4xzVLsB696_-8 null">
                               <div class="src-components-Common-InfiniteList-index__root--3StQn" style="position: relative;">
                                  <div style="overflow: visible; height: 0px; width: 0px;">
                                     <div aria-label="grid" aria-readonly="true" class="ReactVirtualized__Grid ReactVirtualized__List src-components-Common-InfiniteList-index__list--3kTYP " role="grid" tabindex="0" style="box-sizing: border-box; direction: ltr; height: 304px; position: relative; width: 220px; will-change: transform; overflow: auto;">
                                        <div class="ReactVirtualized__Grid__innerScrollContainer" role="rowgroup" style="width: auto; height: 1986px; max-width: 220px; max-height: 1986px; overflow: hidden; position: relative;">
                                            <div id="template" class="src-components-ConversationListsLayout-ConversationCells-index__root--3IRzV " style="height: 48px; left: 0px; position: absolute; width: 100%; display: none;" >
                                              <div class="src-components-ConversationListsLayout-ConversationCells-index__avatar--3-I9g">
                                                 <div class="src-components-Common-Avatar-index__root--2xGjv undefined">
                                                    <div class="src-components-Common-Avatar-index__avatar-wrapper--29uog">
                                                       <img src="">
                                                       <div class="src-components-Common-Avatar-index__avatar-border--2Wkz3"></div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="src-components-ConversationListsLayout-ConversationCells-index__container--OwwoK">
                                                 <div class="src-components-ConversationListsLayout-ConversationCells-index__upper--31gYr">
                                                    <div class="src-components-ConversationListsLayout-ConversationCells-index__username--SOXgT" title="locknlockvn"></div>
                                                       <div class="thong_bao" style="color: red;"></div>
                                                 </div>
                                                 <div class="src-components-ConversationListsLayout-ConversationCells-index__lower--2JERn">
                                                    <div class="src-components-ConversationListsLayout-ConversationCells-index__message--2aCpi"><span ></span></div>
                                                    <div class="src-components-ConversationListsLayout-ConversationCells-index__timestamp--wvvBM"></div>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="resize-triggers">
                                     <div class="expand-trigger">
                                        <div style="width: 221px; height: 305px;"></div>
                                     </div>
                                     <div class="contract-trigger"></div>
                                  </div>
                               </div>
                            </div>
                        </div>
                        
                        
                        <div class="src-components-Common-Empty-index__root--1Gl0b src-components-ConversationListsLayout-ConversationCells-index__empty--3kq9U">
                            <img src="https://deo.shopeemobile.com/shopee/shopee-seller-live-vn/chateasy/143e062750363ec2d5f8d5601a9b595a.png" class="src-components-Common-Empty-index__img--36TCh">
                                <div class="src-components-Common-Empty-index__text--1OZJD">No conversation found</div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <div class="ReactModalPortal"></div>

    </div>

    </body>
</html>