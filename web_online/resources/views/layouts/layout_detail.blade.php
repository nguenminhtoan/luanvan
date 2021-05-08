

<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title') &DoubleVerticalBar;SuperMarket E-Commerce</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->

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
        <link rel="stylesheet" href="/css/nouislider.css">
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
        <script src="/js/nouislider.js"></script>



        <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>  	


        <style type="text/css">
            body, #wrapper{font-family:'Poppins', sans-serif}

        </style>










        <link href="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=product/category&amp;path=25" rel="canonical" /><link href="https://opencart.opencartworks.com/themes/so_supermarket/image/catalog/favicon2.png" rel="icon" />	


    </head>







    <body class="product-category ltr layout-1">
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
                                    <li class="account" id="my_account"><a href="/account" title="My Account " class="btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs">My Account </span> <span class="fa fa-caret-down"></span></a>
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
                                                        <span>    Tất cả danh mục        </span>
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
                                                                                                        <li><a href="/search?ma_danhmuc={{$row->MA_DANHMUC}}" onclick=" class="main-menu">{{$row->TEN_DANHMUC }}</a></li>
                                                                                                        
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
                                        <li><a href="/register"><i class="fa fa-register"></i>Đăng ký</a></li>
                                    </ul>
                                </div>
                                <div class="signin-w font-title hidden-md hidden-sm hidden-xs">
                                    <ul class="signin-link">
                                        <li class="log login"><a href="/login"><i class="fa fa-login"></i> Đăng Nhập</a></li>
                                    </ul>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </header>
        </div>
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
                                            <h3 class="modtitle">Danh mục</h3>
                                            <div class="modcontent">
                                                <ul class="menu">
                                                    @foreach($danhmuc as $item)
                                                    <li><a href="#">{{$item->TEN_DANHMUC}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
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
                $("#cart").click(function(){
                   window.location.href = "/cart" 
                });
            </script>
    </div>
</body>
</html> 
