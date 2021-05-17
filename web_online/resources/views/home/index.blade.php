@extends('layouts.layout_home')
@section('title')
Trang chủ
@endsection
@section('content')
<div class="so-page-builder">
    <div class="container page-builder-ltr">
        <div class="row row_5xp3  content-top-w ">
            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 col_kew6  main-left">
                <div class="row row_q9d8  row-style ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_0g55 col1 hidden-sm hidden-xs">
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col_fg8f  main-right">
                <div class="row row_nmlb  row-style ">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 col_58lu col2">
                        <div class="module sohomepage-slider ">
                            <div class="form-group">
                            </div>
                            <div class="modcontent">
                                <div id="sohomepage-slider1">
                                    <div class="so-homeslider sohomeslider-inner-1">
                                        <div class="item">
                                            <a href=" #     " title="slide 1" target="_self">
                                               
                                               <img class="lazyload"   data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/home1/slider-1-1090x450.jpg"  alt="slide 1" />
                                               
                                            </a>
                                            <div class="sohomeslider-description">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <a href="#   " title="slide 2" target="_self">
                                                
                                                <img class="lazyload"   data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/home1/slider-2-1090x450.jpg"  alt="slide 2" />
                                               
                                            </a>
                                            <div class="sohomeslider-description">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <a href=" #" title="slide 3" target="_self">
                                                
                                                <img class="lazyload"   data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/home1/slider-3-1090x450.jpg"  alt="slide 3" />
                                                
                                            </a>
                                            <div class="sohomeslider-description">
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        var total_item = 3;
                                        $(".sohomeslider-inner-1").owlCarousel2({
                                            animateOut: 'fadeOut',
                                            animateIn: 'fadeIn',
                                            autoplay: true,
                                            autoplayTimeout: 5000,
                                            autoplaySpeed: 1000,
                                            smartSpeed: 500,
                                            autoplayHoverPause: true,
                                            startPosition: 0,
                                            mouseDrag: true,
                                            touchDrag: true,
                                            dots: true,
                                            autoWidth: false,
                                            dotClass: "owl2-dot",
                                            dotsClass: "owl2-dots",
                                            loop: true,
                                            navText: ["Next", "Prev"],
                                            navClass: ["owl2-prev", "owl2-next"],
                                            responsive: {
                                                0: {items: 1,
                                                    nav: total_item <= 1 ? false : ((false) ? true : false),
                                                },
                                                480: {items: 1,
                                                    nav: total_item <= 1 ? false : ((false) ? true : false),
                                                },
                                                768: {items: 1,
                                                    nav: total_item <= 1 ? false : ((false) ? true : false),
                                                },
                                                992: {items: 1,
                                                    nav: total_item <= 1 ? false : ((false) ? true : false),
                                                },
                                                1200: {items: 1,
                                                    nav: total_item <= 1 ? false : ((false) ? true : false),
                                                }
                                            },
                                        });
                                    </script>
                                </div>
                            </div>
                            <!--/.modcontent-->
                            <div class="form-group">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col_jznr col3">
                        <div class="module so-extraslider-ltr product-simple extra-layout1">
                            <h3 class="modtitle"><span>Bán Chạy</span></h3>
                            <div class="modcontent">
                                <div id="so_extra_slider_5984325531615815443" class="so-extraslider buttom-type1 preset00-1 preset01-1 preset02-1 preset03-1 preset04-1 button-type1">
                                    <!-- Begin extraslider-inner -->
                                    <div class="extraslider-inner products-list" data-effect="none">
                                        @foreach(array_chunk($banchay,3) as $row)
                                        <div class="item ">
                                            
                                            @foreach($row as $item)
                                            <div class="product-layout item-inner style1 ">
                                                <div class="item-image">
                                                    <div class="item-img-info">
                                                        <a href="{{$item->URL}}" target="_self" title="{{$item->TEN_SP}} "  >
                                                            <img data-sizes="auto" src="{{$item->URL}}" data-src="{{$item->URL}}" alt="{{$item->TEN_SP}}" class="lazyload">
                                                        </a>
                                                    </div>
                                                    <div class="so-quickview">
                                                        <a class="hidden" data-product='{{$item->MA_SP}}' href="/search?id_sp={{ $item->MA_SP }}" target="_self" ></a>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="rating">
                                                        
                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 0 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 1 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 2 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 3 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 4 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>
                                                    </div>
                                                    <div class="item-title">
                                                        <a href="/search?id_sp={{ $item->MA_SP }}" target="_self" title="{{$item->TEN_SP}}"  >
                                                            {{$item->TEN_SP}}
                                                        </a>
                                                    </div>
                                                    <div  class="content_price price">
                                                        <span class="price-new product-price">{{number_format($item->GIAMOI)}}đ</span>&nbsp;&nbsp;
                                                        <span class="price-old">{{ $item->GIA != $item->GIAMOI ? number_format($item->GIA).'đ' : ' ' }}</span>&nbsp;
                                                    </div>
                                                </div>
                                                <!-- End item-info -->
                                                <!-- End item-wrap-inner -->
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--End extraslider-inner -->
                                    <script type="text/javascript">
                                        //<![CDATA[
                                        jQuery(document).ready(function ($) {
                                            (function (element) {
                                                var $element = $(element),
                                                        $extraslider = $(".extraslider-inner", $element),
                                                        _delay = 500,
                                                        _duration = 800,
                                                        _effect = 'none ';

                                                $extraslider.on("initialized.owl.carousel2", function () {
                                                    var $item_active = $(".owl2-item.active", $element);
                                                    if ($item_active.length > 1 && _effect != "none") {
                                                        _getAnimate($item_active);
                                                    } else {
                                                        var $item = $(".owl2-item", $element);
                                                        $item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});
                                                    }

                                                    if ($(".owl2-dot", $element).length < 2) {
                                                        $(".owl2-prev", $element).css("display", "none");
                                                        $(".owl2-next", $element).css("display", "none");
                                                        $(".owl2-dot", $element).css("display", "none");
                                                    }


                                                    $(".owl2-controls", $element).insertBefore($extraslider);
                                                    $(".owl2-dots", $element).insertAfter($(".owl2-prev", $element));

                                                });

                                                $extraslider.owlCarousel2({
                                                    rtl: false,
                                                    margin: 0,
                                                    slideBy: 1,
                                                    autoplay: 0,
                                                    autoplayHoverPause: 0,
                                                    autoplayTimeout: 0,
                                                    autoplaySpeed: 1000,
                                                    startPosition: 0,
                                                    mouseDrag: 1,
                                                    touchDrag: 1,
                                                    autoWidth: false,
                                                    responsive: {
                                                        0: {items: 1},
                                                        480: {items: 1},
                                                        768: {items: 1},
                                                        992: {items: 1},
                                                        1200: {items: 1}
                                                    },
                                                    dotClass: "owl2-dot",
                                                    dotsClass: "owl2-dots",
                                                    dots: true,
                                                    dotsSpeed: 500,
                                                    nav: false,
                                                    loop: true,
                                                    navSpeed: 500,
                                                    navText: ["&#171 ", "&#187 "],
                                                    navClass: ["owl2-prev", "owl2-next"]

                                                });

                                                $extraslider.on("translate.owl.carousel2", function (e) {

                                                    if ($(".owl2-dot", $element).length < 2) {
                                                        $(".owl2-prev", $element).css("display", "none");
                                                        $(".owl2-next", $element).css("display", "none");
                                                        $(".owl2-dot", $element).css("display", "none");
                                                    }


                                                    var $item_active = $(".owl2-item.active", $element);
                                                    _UngetAnimate($item_active);
                                                    _getAnimate($item_active);
                                                });

                                                $extraslider.on("translated.owl.carousel2", function (e) {


                                                    if ($(".owl2-dot", $element).length < 2) {
                                                        $(".owl2-prev", $element).css("display", "none");
                                                        $(".owl2-next", $element).css("display", "none");
                                                        $(".owl2-dot", $element).css("display", "none");
                                                    }


                                                    var $item_active = $(".owl2-item.active", $element);
                                                    var $item = $(".owl2-item", $element);

                                                    _UngetAnimate($item);

                                                    if ($item_active.length > 1 && _effect != "none") {
                                                        _getAnimate($item_active);
                                                    } else {

                                                        $item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});

                                                    }
                                                });

                                                function _getAnimate($el) {
                                                    if (_effect == "none")
                                                        return;
                                                    //if ($.browser.msie && parseInt($.browser.version, 10) <= 9) return;
                                                    $extraslider.removeClass("extra-animate");
                                                    $el.each(function (i) {
                                                        var $_el = $(this);
                                                        $(this).css({
                                                            "-webkit-animation": _effect + " " + _duration + "ms ease both",
                                                            "-moz-animation": _effect + " " + _duration + "ms ease both",
                                                            "-o-animation": _effect + " " + _duration + "ms ease both",
                                                            "animation": _effect + " " + _duration + "ms ease both",
                                                            "-webkit-animation-delay": +i * _delay + "ms",
                                                            "-moz-animation-delay": +i * _delay + "ms",
                                                            "-o-animation-delay": +i * _delay + "ms",
                                                            "animation-delay": +i * _delay + "ms",
                                                            "opacity": 1
                                                        }).animate({
                                                            opacity: 1
                                                        });

                                                        if (i == $el.size() - 1) {
                                                            $extraslider.addClass("extra-animate");
                                                        }
                                                    });
                                                }

                                                function _UngetAnimate($el) {
                                                    $el.each(function (i) {
                                                        $(this).css({
                                                            "animation": "",
                                                            "-webkit-animation": "",
                                                            "-moz-animation": "",
                                                            "-o-animation": "",
                                                            "opacity": 1
                                                        });
                                                    });
                                                }

                                            })("#so_extra_slider_5984325531615815443 ");
                                        });
                                        //]]>
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container page-builder-ltr">
        <div class="row row_i4fp  content-main-w ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_9fi9  box-content1">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 col_bxl4  main-left">
                <div class="row row_ybhn  row-style ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_bi8f col-style">
                        <div class="banners banners2">
                            <div class="banner">
                                <a href="#"><img src="images/banners/banner1.jpg" alt="image"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_y181 col-style">
                        <div class="module so-extraslider-ltr product-simple extra-layout1">
                            <h3 class="modtitle"><span>Sản Phẩm Mới</span></h3>
                            <div class="modcontent">
                                <div id="so_extra_slider_8766822941615815444" class="so-extraslider button-type2 preset00-1 preset01-1 preset02-1 preset03-1 preset04-1 button-type2">
                                    <!-- Begin extraslider-inner -->
                                    <div class="extraslider-inner products-list" data-effect="none">
                                        @foreach(array_chunk($spmoi,5) as $row)
                                        <div class="item ">
                                            
                                            @foreach($row as $item)
                                            <div class="product-layout item-inner style1 ">
                                                <div class="item-image">
                                                    <div class="item-img-info">
                                                        <a href="{{$item->URL}}" target="_self" title="{{$item->TEN_SP}}"  >
                                                            <img data-sizes="auto" src="{{$item->URL}}" data-src="{{$item->URL}}" alt="{{$item->TEN_SP}}" class="lazyload">
                                                        </a>
                                                    </div>
                                                    <div class="so-quickview">
                                                        <a class="hidden" data-product='{{$item->MA_SP}}' href="/detail/{{$item->MA_SP }}" target="_self" ></a>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="rating">
                                                        
                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 0 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 1 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 2 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 3 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 4 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>
                                                    </div>
                                                    <div class="item-title">
                                                        <a href="/detail/{{$item->MA_SP }}" target="_self" title="{{$item->TEN_SP}}"  >
                                                            {{$item->TEN_SP}}
                                                        </a>
                                                    </div>
                                                    <div  class="content_price price">
                                                        <span class="price-new product-price">{{number_format($item->GIAMOI)}} VNĐ</span>&nbsp;&nbsp;
                                                        <span class="price-old">{{ $item->GIA != $item->GIAMOI ? number_format($item->GIA).'VNĐ' : ' ' }}</span>&nbsp;
                                                    </div>
                                                </div>
                                                <!-- End item-info -->
                                                <!-- End item-wrap-inner -->
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--End extraslider-inner -->
                                    <script type="text/javascript">
                                        //<![CDATA[
                                        jQuery(document).ready(function ($) {
                                            (function (element) {
                                                var $element = $(element),
                                                        $extraslider = $(".extraslider-inner", $element),
                                                        _delay = 500,
                                                        _duration = 800,
                                                        _effect = 'none ';

                                                $extraslider.on("initialized.owl.carousel2", function () {
                                                    var $item_active = $(".owl2-item.active", $element);
                                                    if ($item_active.length > 1 && _effect != "none") {
                                                        _getAnimate($item_active);
                                                    } else {
                                                        var $item = $(".owl2-item", $element);
                                                        $item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});
                                                    }

                                                    if ($(".owl2-dot", $element).length < 2) {
                                                        $(".owl2-prev", $element).css("display", "none");
                                                        $(".owl2-next", $element).css("display", "none");
                                                        $(".owl2-dot", $element).css("display", "none");
                                                    }


                                                    $(".owl2-nav", $element).insertBefore($extraslider);
                                                    $(".owl2-controls", $element).insertAfter($extraslider);

                                                });

                                                $extraslider.owlCarousel2({
                                                    rtl: false,
                                                    margin: 0,
                                                    slideBy: 1,
                                                    autoplay: 0,
                                                    autoplayHoverPause: 0,
                                                    autoplayTimeout: 0,
                                                    autoplaySpeed: 1000,
                                                    startPosition: 0,
                                                    mouseDrag: 1,
                                                    touchDrag: 1,
                                                    autoWidth: false,
                                                    responsive: {
                                                        0: {items: 1},
                                                        480: {items: 1},
                                                        768: {items: 1},
                                                        992: {items: 1},
                                                        1200: {items: 1}
                                                    },
                                                    dotClass: "owl2-dot",
                                                    dotsClass: "owl2-dots",
                                                    dots: true,
                                                    dotsSpeed: 500,
                                                    nav: false,
                                                    loop: false,
                                                    navSpeed: 500,
                                                    navText: ["&#139 ", "&#155 "],
                                                    navClass: ["owl2-prev", "owl2-next"]

                                                });

                                                $extraslider.on("translate.owl.carousel2", function (e) {

                                                    if ($(".owl2-dot", $element).length < 2) {
                                                        $(".owl2-prev", $element).css("display", "none");
                                                        $(".owl2-next", $element).css("display", "none");
                                                        $(".owl2-dot", $element).css("display", "none");
                                                    }


                                                    var $item_active = $(".owl2-item.active", $element);
                                                    _UngetAnimate($item_active);
                                                    _getAnimate($item_active);
                                                });

                                                $extraslider.on("translated.owl.carousel2", function (e) {


                                                    if ($(".owl2-dot", $element).length < 2) {
                                                        $(".owl2-prev", $element).css("display", "none");
                                                        $(".owl2-next", $element).css("display", "none");
                                                        $(".owl2-dot", $element).css("display", "none");
                                                    }


                                                    var $item_active = $(".owl2-item.active", $element);
                                                    var $item = $(".owl2-item", $element);

                                                    _UngetAnimate($item);

                                                    if ($item_active.length > 1 && _effect != "none") {
                                                        _getAnimate($item_active);
                                                    } else {

                                                        $item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});

                                                    }
                                                });

                                                function _getAnimate($el) {
                                                    if (_effect == "none")
                                                        return;
                                                    //if ($.browser.msie && parseInt($.browser.version, 10) <= 9) return;
                                                    $extraslider.removeClass("extra-animate");
                                                    $el.each(function (i) {
                                                        var $_el = $(this);
                                                        $(this).css({
                                                            "-webkit-animation": _effect + " " + _duration + "ms ease both",
                                                            "-moz-animation": _effect + " " + _duration + "ms ease both",
                                                            "-o-animation": _effect + " " + _duration + "ms ease both",
                                                            "animation": _effect + " " + _duration + "ms ease both",
                                                            "-webkit-animation-delay": +i * _delay + "ms",
                                                            "-moz-animation-delay": +i * _delay + "ms",
                                                            "-o-animation-delay": +i * _delay + "ms",
                                                            "animation-delay": +i * _delay + "ms",
                                                            "opacity": 1
                                                        }).animate({
                                                            opacity: 1
                                                        });

                                                        if (i == $el.size() - 1) {
                                                            $extraslider.addClass("extra-animate");
                                                        }
                                                    });
                                                }

                                                function _UngetAnimate($el) {
                                                    $el.each(function (i) {
                                                        $(this).css({
                                                            "animation": "",
                                                            "-webkit-animation": "",
                                                            "-moz-animation": "",
                                                            "-o-animation": "",
                                                            "opacity": 1
                                                        });
                                                    });
                                                }

                                            })("#so_extra_slider_8766822941615815444 ");
                                        });
                                        //]]>
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_aaas col-style">
                        <div class="policy-w">
                            <a href="#"><img src="images/banners/call-us.jpg" alt="image"></a>
                            <ul class="block-infos">
                                <li class="info1">
                                    <div class="inner">
                                        <i class="fa fa-file-text-o"></i>
                                        <div class="info-cont">
                                            <a href="#">free delivery</a>
                                            <p>On order over $49.86</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="info2">
                                    <div class="inner">
                                        <i class="fa fa-shield"></i>
                                        <div class="info-cont">
                                            <a href="#">order protection</a>
                                            <p>secured information</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="info3">
                                    <div class="inner">
                                        <i class="fa fa-gift"></i>
                                        <div class="info-cont">
                                            <a href="#">promotion gift</a>
                                            <p>special offers!</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="info4">
                                    <div class="inner">
                                        <i class="fa fa-money"></i>
                                        <div class="info-cont">
                                            <a href="#">money back</a>
                                            <p>return over 30 days</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_32zq col-style">
                        <!-- default Grid  -->
                        <div class="module so-extraslider-ltr ">
                            <h3 class="modtitle"><span>Sản phẩm được đánh giá</span></h3>
                            <div class="modcontent">
                                <div id="so_extra_slider_1621587411615815444" class="so-extraslider button-type2 preset00-1 preset01-1 preset02-1 preset03-1 preset04-1 button-type2">
                                    <!-- Begin extraslider-inner -->
                                    <div class="extraslider-inner products-list " data-effect="none">
                                        @foreach($comment as $item)
                                        <div class="item ">
                                            <div class="product-layout product-grid style1 ">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">
                                                        <div class="product-image-container 	">
                                                            <a href="/detail/{{$item->MA_SP}}" target="_self" title="{{$item->TEN_SP}} "  >
                                                                <img data-sizes="auto" src="{{$item->URL}}" data-src="{{$item->URL}}" alt="{{$item->TEN_SP}}" class="lazyload">
                                                            </a>						
                                                        </div>
                                                        <div class="box-label">
                                                        </div>
                                                        <div class="so-quickview">
                                                            <a class="hidden" data-product='{{$item->MA_SP}}' href="/detai/{{$item->MA_SP}}"></a>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group cartinfo--static">
                                                            <button type="button" class="addToCart" {{ $item->KHO < 1 ? 'disabled' : '' }} onclick="add_cart({{$item->MA_SP}}, '1');"><span>{{ $item->KHO < 1 ? 'Bán hết' : 'Thêm vào giỏ hàng' }}</span>
                                                            </button>
                                                        </div>
                                                        <div class="caption hide-cont">
                                                            <div class="rating">
                                                                <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 0 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 1 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 2 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 3 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 4 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                            </div>
                                                            <h4>
                                                                <a href="/detail/{{$item->MA_SP}}" target="_self" title="{{$item->TEN_SP}}"  >
                                                                    {{$item->TEN_SP}} 
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div  class="price">
                                                            <span class="price-new">{{number_format($item->GIAMOI)}}VNĐ </span>&nbsp;&nbsp;
                                                            <span class="price-old">{{ $item->GIA != $item->GIAMOI ? number_format($item->GIA).'VNĐ' : ' ' }}</span>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End item-wrap-inner -->
                                            </div>
                                            <!-- End item-wrap -->
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--End extraslider-inner -->
                                    <script type="text/javascript">
                                        //<![CDATA[
                                        jQuery(document).ready(function ($) {
                                            (function (element) {
                                                var $element = $(element),
                                                        $extraslider = $(".extraslider-inner", $element),
                                                        _delay = 500,
                                                        _duration = 800,
                                                        _effect = 'none ';

                                                $extraslider.on("initialized.owl.carousel2", function () {
                                                    var $item_active = $(".owl2-item.active", $element);
                                                    if ($item_active.length > 1 && _effect != "none") {
                                                        _getAnimate($item_active);
                                                    } else {
                                                        var $item = $(".owl2-item", $element);
                                                        $item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});
                                                    }

                                                    if ($(".owl2-dot", $element).length < 2) {
                                                        $(".owl2-prev", $element).css("display", "none");
                                                        $(".owl2-next", $element).css("display", "none");
                                                        $(".owl2-dot", $element).css("display", "none");
                                                    }


                                                    $(".owl2-nav", $element).insertBefore($extraslider);
                                                    $(".owl2-controls", $element).insertAfter($extraslider);

                                                });

                                                $extraslider.owlCarousel2({
                                                    rtl: false,
                                                    margin: 0,
                                                    slideBy: 1,
                                                    autoplay: 0,
                                                    autoplayHoverPause: 0,
                                                    autoplayTimeout: 0,
                                                    autoplaySpeed: 1000,
                                                    startPosition: 0,
                                                    mouseDrag: 1,
                                                    touchDrag: 1,
                                                    autoWidth: false,
                                                    responsive: {
                                                        0: {items: 1},
                                                        480: {items: 1},
                                                        768: {items: 1},
                                                        992: {items: 1},
                                                        1200: {items: 1}
                                                    },
                                                    dotClass: "owl2-dot",
                                                    dotsClass: "owl2-dots",
                                                    dots: true,
                                                    dotsSpeed: 500,
                                                    nav: false,
                                                    loop: true,
                                                    navSpeed: 500,
                                                    navText: ["&#139 ", "&#155 "],
                                                    navClass: ["owl2-prev", "owl2-next"]

                                                });

                                                $extraslider.on("translate.owl.carousel2", function (e) {

                                                    if ($(".owl2-dot", $element).length < 2) {
                                                        $(".owl2-prev", $element).css("display", "none");
                                                        $(".owl2-next", $element).css("display", "none");
                                                        $(".owl2-dot", $element).css("display", "none");
                                                    }

                                                    var $item_active = $(".owl2-item.active", $element);
                                                    _UngetAnimate($item_active);
                                                    _getAnimate($item_active);
                                                });
                                                $extraslider.on("translated.owl.carousel2", function (e) {

                                                    if ($(".owl2-dot", $element).length < 2) {
                                                        $(".owl2-prev", $element).css("display", "none");
                                                        $(".owl2-next", $element).css("display", "none");
                                                        $(".owl2-dot", $element).css("display", "none");
                                                    }

                                                    var $item_active = $(".owl2-item.active", $element);
                                                    var $item = $(".owl2-item", $element);
                                                    _UngetAnimate($item);
                                                    if ($item_active.length > 1 && _effect != "none") {
                                                        _getAnimate($item_active);
                                                    } else {
                                                        $item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});
                                                    }
                                                });
                                                function _getAnimate($el) {
                                                    if (_effect == "none")
                                                        return;
                                                    //if ($.browser.msie && parseInt($.browser.version, 10) <= 9) return;
                                                    $extraslider.removeClass("extra-animate");
                                                    $el.each(function (i) {
                                                        var $_el = $(this);
                                                        var i = i + 1;
                                                        $(this).css({
                                                            "-webkit-animation": _effect + " " + _duration + "ms ease both",
                                                            "-moz-animation": _effect + " " + _duration + "ms ease both",
                                                            "-o-animation": _effect + " " + _duration + "ms ease both",
                                                            "animation": _effect + " " + _duration + "ms ease both",
                                                            "-webkit-animation-delay": +i * _delay + "ms",
                                                            "-moz-animation-delay": +i * _delay + "ms",
                                                            "-o-animation-delay": +i * _delay + "ms",
                                                            "animation-delay": +i * _delay + "ms",

                                                        }).animate({

                                                        });
                                                        if (i == $el.size() - 1) {
                                                            $extraslider.addClass("extra-animate");
                                                        }
                                                    });
                                                }
                                                function _UngetAnimate($el) {
                                                    $el.each(function (i) {
                                                        $(this).css({
                                                            "animation": "",
                                                            "-webkit-animation": "",
                                                            "-moz-animation": "",
                                                            "-o-animation": "",
                                                        });
                                                    });
                                                }
                                            })("#so_extra_slider_1621587411615815444 ");
                                        });
                                        //]]>
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_0g1a col-style">
                        <div class="module so-latest-blog blog-sidebar preset01-1 preset02-1 preset03-1 preset04-1 preset05-1">
                            <h3 class="modtitle"><span>Bình luận mới nhất</span></h3>
                            @foreach(array_chunk($binhluan,1) as $row)
                            <div class="modcontent clearfix">
                                <div id="so_latest_blog_103_11637773541615815444" class="so-blog-external buttom-type1 button-type1">
                                    <div class="blog-external-simple">
                                        <div class="cat-wrap">
                                            @foreach($row as $item)
                                            <div class="media">
                                                <div class="item item-1">
                                                    <div class="media-body">
                                                        
                                                        <h4 class="media-heading">
                                                            <a href="/detail/{{$item->MA_SP}}" title="{{$item->TEN_SP}}" target="_self">{{$item->TEN_SP}}</a>
                                                            
                                                        </h4>
                                                        <div class="media-content">
                                                            <p>{{$item->TEN_NGUOIDUNG}}</p>
                                                            <div class="rating">
                                                                <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 0 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 1 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 2 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 3 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 4 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                            </div>
                                                            <div class="media-date-added"><i class="fa fa-calendar"></i>{{date($item->NGAY)}}</div>
                                                            <div class="media-subcontent">
                                                                <span class="media-comment"><i class="fa fa-comments"></i>{{$item->SL}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                        
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    //<![CDATA[
                                    jQuery(document).ready(function ($) {
                                        ;
                                        (function (element) {
                                            var $element = $(element),
                                                    $extraslider = $(".blog-external", $element),
                                                    _delay = 500,
                                                    _duration = 800,
                                                    _effect = 'none';

                                            this_item = $extraslider.find('div.media');
                                            this_item.find('div.item:eq(0)').addClass('head-button');
                                            this_item.find('div.item:eq(0) .media-heading').addClass('head-item');
                                            this_item.find('div.item:eq(0) .media-left').addClass('so-block');
                                            this_item.find('div.item:eq(0) .media-content').addClass('so-block');
                                            $extraslider.on("initialized.owl.carousel2", function () {
                                                var $item_active = $(".owl2-item.active", $element);
                                                if ($item_active.length > 1 && _effect != "none") {
                                                    _getAnimate($item_active);
                                                } else {
                                                    var $item = $(".owl2-item", $element);
                                                    $item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});
                                                }
                                                if ($(".owl2-dot", $element).length < 2) {
                                                    $(".owl2-prev", $element).css("display", "none");
                                                    $(".owl2-next", $element).css("display", "none");
                                                    $(".owl2-dot", $element).css("display", "none");
                                                }

                                                $(".owl2-controls", $element).insertBefore($extraslider);
                                                $(".owl2-dots", $element).insertAfter($(".owl2-prev", $element));
                                            });

                                            $extraslider.owlCarousel2({
                                                margin: 1,
                                                slideBy: 1,
                                                autoplay: false,
                                                autoplayHoverPause: false,
                                                autoplayTimeout: 0,
                                                autoplaySpeed: 1000,
                                                startPosition: 0,
                                                mouseDrag: true,
                                                touchDrag: true,
                                                autoWidth: false,
                                                rtl: false,
                                                responsive: {
                                                    0: {items: 1},
                                                    480: {items: 1},
                                                    768: {items: 1},
                                                    992: {items: 1},
                                                    1200: {items: 1},
                                                },
                                                dotClass: "owl2-dot",
                                                dotsClass: "owl2-dots",
                                                dots: true,
                                                dotsSpeed: 500,
                                                nav: false,
                                                loop: true,
                                                navSpeed: 500,
                                                navText: ["&#171;", "&#187;"],
                                                navClass: ["owl2-prev", "owl2-next"]
                                            });

                                            $extraslider.on("translate.owl.carousel2", function (e) {
                                                if ($(".owl2-dot", $element).length < 2) {
                                                    $(".owl2-prev", $element).css("display", "none");
                                                    $(".owl2-next", $element).css("display", "none");
                                                    $(".owl2-dot", $element).css("display", "none");
                                                }

                                                //var $item_active = $(".owl2-item.active", $element);
                                                //_UngetAnimate($item_active);
                                                //_getAnimate($item_active);
                                            });

                                            $extraslider.on("translated.owl.carousel2", function (e) {
                                                if ($(".owl2-dot", $element).length < 2) {
                                                    $(".owl2-prev", $element).css("display", "none");
                                                    $(".owl2-next", $element).css("display", "none");
                                                    $(".owl2-dot", $element).css("display", "none");
                                                }

                                                var $item_active = $(".owl2-item.active", $element);
                                                var $item = $(".owl2-item", $element);

                                                _UngetAnimate($item);

                                                if ($item_active.length > 1 && _effect != "none") {
                                                    _getAnimate($item_active);
                                                } else {
                                                    $item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});
                                                }
                                            });

                                            function _getAnimate($el) {
                                                if (_effect == "none")
                                                    return;
                                                //if ($.browser.msie && parseInt($.browser.version, 10) <= 9) return;
                                                $extraslider.removeClass("extra-animate");
                                                $el.each(function (i) {
                                                    var $_el = $(this);
                                                    $(this).css({
                                                        "-webkit-animation": _effect + " " + _duration + "ms ease both",
                                                        "-moz-animation": _effect + " " + _duration + "ms ease both",
                                                        "-o-animation": _effect + " " + _duration + "ms ease both",
                                                        "animation": _effect + " " + _duration + "ms ease both",
                                                        "-webkit-animation-delay": +i * _delay + "ms",
                                                        "-moz-animation-delay": +i * _delay + "ms",
                                                        "-o-animation-delay": +i * _delay + "ms",
                                                        "animation-delay": +i * _delay + "ms",
                                                        "opacity": 1
                                                    }).animate({
                                                        opacity: 1
                                                    });

                                                    if (i == $el.size() - 1) {
                                                        $extraslider.addClass("extra-animate");
                                                    }
                                                });
                                            }

                                            function _UngetAnimate($el) {
                                                $el.each(function (i) {
                                                    $(this).css({
                                                        "animation": "",
                                                        "-webkit-animation": "",
                                                        "-moz-animation": "",
                                                        "-o-animation": "",
                                                        "opacity": 1
                                                    });
                                                });
                                            }
                                        })("#so_latest_blog_103_11637773541615815444");
                                    });
                                    //]]>
                                </script>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_x1cl col-style">
                        <div class="module testimonials">
                            <h3 class="modtitle"><span>Cửa hàng</span></h3>
                            <div class="slider-testimonials">
                                <div class="contentslider" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-hoverpause="yes">
                                    @foreach(array_chunk($cuahang,3) as $row)
                                    @foreach($row as $item)
                                    <div class="item">
                                        <div class="img"><img src="{{$item->HINHANH}}" alt="Image"></div>
                                        <div class="name">{{$item->TEN_CUAHANG}}</div>
                                        <p>“{{$item->MOTA}}”</p>
                                    </div>
                                    @endforeach
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_uy9d col-style">
                        <div class="banners banners5">
                            <div class="banner">
                                <a href="#"><img src="images/banners/banner2.jpg" alt="image"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 col_tojp  main-right">
                <div class="row row_3kdz  row-style ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_r9lb col-style">
                        <div class="static-cates">
                            <ul>
                                <li>
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/banners/cat1.jpg" alt="image"></a>
                                </li>
                                <li>
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/banners/cat2.jpg" alt="image"></a>
                                </li>
                                <li>
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/banners/cat3.jpg" alt="image"></a>
                                </li>
                                <li>
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/banners/cat4.jpg" alt="image"></a>
                                </li>
                                <li>
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/banners/cat5.jpg" alt="image"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_xqfl col-style">
                        <script>
                            //<![CDATA[
                            var listdeal1 = [];
                            //]]>
                        </script>
                        <div class="module so-deals-ltr deals-layout1">
                            <div class="head-title">
                                <div class="modtitle">
                                    <span>Giá shock</span>
                                    <div class="cslider-item-timer">
                                        <div class="product_time_maxprice"></div>
                                    </div>
                                    <a class="viewall" href="/search?sell=1">View All</a>
                                </div>
                            </div>
                            <div class="modcontent">
                                <div id="so_deals_13717025803152021133724" class="so-deal modcontent products-list grid clearfix preset00-5 preset01-3 preset02-2 preset03-2 preset04-1  button-type2  style2">
                                    <div class="extraslider-inner products-list" data-effect="none">
                                        @foreach($udai as $item)
                                        @if($item->GIAMOI/$item->GIA <= 0.5)
                                        <div class="item">
                                            <div class="transition product-layout product-grid">
                                                <div class="product-item-container ">
                                                    <div class="left-block left-b">
                                                        <div class="product-image-container ">
                                                            <a href="/detail/{{$item->MA_SP}}" target="_self">
                                                                <img data-sizes="auto" src="{{$item->URL}}" data-src="{{$item->URL}}" alt="{{ $item->TEN_SP }}" class="lazyload" height="205px">
                                                            </a>
                                                        </div>
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">
                                                                -{{ round((1-($item->GIAMOI/$item->GIA))*100) }}%
                                                            </span>
                                                        </div>
                                                        <div class="so-quickview">
                                                            <a class="hidden" data-product='{{$item->MA_SP}}' href="/detail/{{$item->MA_SP}}"></a>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group">
                                                            <button class="addToCart" title="Thêm vào giỏi hàng" type="button" {{ $item->KHO < 1 ? 'disabled' : '' }} onclick="add_cart({{$item->MA_SP}}, '1');"><span>{{ $item->KHO < 1 ? 'Bán hết' : 'Thêm vào giỏ hàng' }}</span></button>
                                                        </div>
                                                        <!-- <div class="caption"> -->
                                                        <div class="hide-cont">
                                                            <div class="rate-history">
                                                                <div class="rating">
                                                                    <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 0 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 1 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 2 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 3 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 4 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                </div>
                                                                <a class="rating-num" href="/detail/{{$item->MA_SP}}" rel="nofollow" target="_blank" ></a>
                                                            </div>
                                                            <h4><a href="detail/{{$item->MA_SP}}" target="_self" title="{{ $item->TEN_SP }}">{{ $item->TEN_SP }}</a></h4>
                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">{{number_format($item->GIAMOI)}}VNĐ</span>
                                                            <span class="price-old">{{ $item->GIA != $item->GIAMOI ? number_format($item->GIA).'VNĐ' : ' ' }}</span>
                                                        </p>
                                                        <!-- </div> -->
                                                    </div>
                                                    <div class="item-available">
                                                        <div class="available">
                                                            <span class="color_width" data-title="{{round(($item->SOLUONG/$item->TONGSL)*100)}}%" data-toggle='tooltip' style="width: {{round(($item->SOLUONG/$item->TONGSL)*100)}}%"></span>
                                                        </div>
                                                        <!-- <p class="col-xs-6 a1">Available: <b>10</b> </p> -->
                                                        <p class="a2">Đã bán: <b>{{$item->SOLUONG}}</b> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                        
                                    </div>
                                </div>
                                <script type="text/javascript">
                                            //<![CDATA[
                                            jQuery(document).ready(function ($) {
                                                ;
                                                (function (element) {
                                                    var $element = $(element),
                                                            $extraslider = $('.extraslider-inner', $element),
                                                            $featureslider = $('.product-feature', $element),
                                                            _delay = 500,
                                                            _duration = 800,
                                                            _effect = 'none';

                                                    $extraslider.on('initialized.owl.carousel2', function () {
                                                        var $item_active = $('.extraslider-inner .owl2-item.active', $element);
                                                        if ($item_active.length > 1 && _effect != 'none') {
                                                            _getAnimate($item_active);
                                                        } else {
                                                            var $item = $('.extraslider-inner .owl2-item', $element);
                                                            $item.css({'opacity': 1, 'filter': 'alpha(opacity = 100)'});
                                                        }
                                                        $('.extraslider-inner .owl2-nav', $element).insertBefore($extraslider);
                                                        $('.extraslider-inner .owl2-controls', $element).insertAfter($extraslider).addClass('extraslider');
                                                    });

                                                    $extraslider.owlCarousel2({
                                                        rtl: false,
                                                        margin: 30,
                                                        slideBy: 1,
                                                        autoplay: false,
                                                        autoplayHoverPause: 0,
                                                        autoplayTimeout: 5000,
                                                        autoplaySpeed: 1000,
                                                        startPosition: 0,
                                                        mouseDrag: true,
                                                        touchDrag: true,
                                                        autoWidth: false,
                                                        responsive: {
                                                            0: {items: 1},
                                                            480: {items: 2},
                                                            768: {items: 2},
                                                            992: {items: 3},
                                                            1200: {items: 5},
                                                            1649: {items: 6}
                                                        },
                                                        dotClass: 'owl2-dot',
                                                        dotsClass: 'owl2-dots',
                                                        dots: false,
                                                        dotsSpeed: 500,
                                                        nav: true,
                                                        loop: true,
                                                        navSpeed: 500,
                                                        navText: ['&#171;', '&#187;'],
                                                        navClass: ['owl2-prev', 'owl2-next']
                                                    });

                                                    $extraslider.on('translated.owl.carousel2', function (e) {
                                                        var $item_active = $('.extraslider-inner .owl2-item.active', $element);
                                                        var $item = $('.extraslider-inner .owl2-item', $element);

                                                        _UngetAnimate($item);

                                                        if ($item_active.length > 1 && _effect != 'none') {
                                                            _getAnimate($item_active);
                                                        } else {
                                                            $item.css({'opacity': 1, 'filter': 'alpha(opacity = 100)'});
                                                        }
                                                    });
                                                    /*feature product*/
                                                    $featureslider.on('initialized.owl.carousel2', function () {
                                                        var $item_active = $('.product-feature .owl2-item.active', $element);
                                                        if ($item_active.length > 1 && _effect != 'none') {
                                                            _getAnimate($item_active);
                                                        } else {
                                                            var $item = $('.owl2-item', $element);
                                                            $item.css({'opacity': 1, 'filter': 'alpha(opacity = 100)'});
                                                        }
                                                        $('.product-feature .owl2-nav', $element).insertBefore($featureslider);
                                                        $('.product-feature .owl2-controls', $element).insertAfter($featureslider).addClass('featureslider');
                                                        ;
                                                    });

                                                    $featureslider.owlCarousel2({
                                                        rtl: false,
                                                        margin: 30,
                                                        slideBy: 1,
                                                        autoplay: false,
                                                        autoplayHoverPause: 0,
                                                        autoplayTimeout: 5000,
                                                        autoplaySpeed: 1000,
                                                        startPosition: 0,
                                                        mouseDrag: true,
                                                        touchDrag: true,
                                                        autoWidth: false,
                                                        responsive: {
                                                            0: {items: 1},
                                                            480: {items: 1},
                                                            768: {items: 1},
                                                            992: {items: 1},
                                                            1200: {items: 1}
                                                        },
                                                        dotClass: 'owl2-dot',
                                                        dotsClass: 'owl2-dots',
                                                        dots: false,
                                                        dotsSpeed: 500,
                                                        nav: true,
                                                        loop: true,
                                                        navSpeed: 500,
                                                        navText: ['&#171;', '&#187;'],
                                                        navClass: ['owl2-prev', 'owl2-next']
                                                    });

                                                    $featureslider.on('translated.owl.carousel2', function (e) {
                                                        var $item_active = $('.product-feature .owl2-item.active', $element);
                                                        var $item = $('.product-feature .owl2-item', $element);

                                                        _UngetAnimate($item);

                                                        if ($item_active.length > 1 && _effect != 'none') {
                                                            _getAnimate($item_active);
                                                        } else {
                                                            $item.css({'opacity': 1, 'filter': 'alpha(opacity = 100)'});
                                                        }
                                                    });

                                                    function _getAnimate($el) {
                                                        if (_effect == 'none')
                                                            return;
                                                        $extraslider.removeClass('extra-animate');
                                                        $el.each(function (i) {
                                                            var $_el = $(this);
                                                            $(this).css({
                                                                '-webkit-animation': _effect + ' ' + _duration + "ms ease both",
                                                                '-moz-animation': _effect + ' ' + _duration + "ms ease both",
                                                                '-o-animation': _effect + ' ' + _duration + "ms ease both",
                                                                'animation': _effect + ' ' + _duration + "ms ease both",
                                                                '-webkit-animation-delay': +i * _delay + 'ms',
                                                                '-moz-animation-delay': +i * _delay + 'ms',
                                                                '-o-animation-delay': +i * _delay + 'ms',
                                                                'animation-delay': +i * _delay + 'ms',
                                                                'opacity': 1
                                                            }).animate({
                                                                opacity: 1
                                                            });

                                                            if (i == $el.size() - 1) {
                                                                $extraslider.addClass("extra-animate");
                                                            }
                                                        });
                                                    }

                                                    function _UngetAnimate($el) {
                                                        $el.each(function (i) {
                                                            $(this).css({
                                                                'animation': '',
                                                                '-webkit-animation': '',
                                                                '-moz-animation': '',
                                                                '-o-animation': '',
                                                                'opacity': 1
                                                            });
                                                        });
                                                    }
                                                    data = new Date(2013, 10, 26, 12, 00, 00);
                                                    function CountDown(date, id) {
                                                        dateNow = new Date();
                                                        amount = date.getTime() - dateNow.getTime();
                                                        if (amount < 0 && $('#' + id).length) {
                                                            $('.' + id).html("Now!");
                                                        } else {
                                                            days = 0;
                                                            hours = 0;
                                                            mins = 0;
                                                            secs = 0;
                                                            out = "";
                                                            amount = Math.floor(amount / 1000);
                                                            days = Math.floor(amount / 86400);
                                                            amount = amount % 86400;
                                                            hours = Math.floor(amount / 3600);
                                                            amount = amount % 3600;
                                                            mins = Math.floor(amount / 60);
                                                            amount = amount % 60;
                                                            secs = Math.floor(amount);

                                                            if (days != 0) {
                                                                out += "<div class='time-item time-day'>" + "<div class='num-time'>" + days + "</div>" + " <div class='name-time'>" + ((days == 1) ? "Day" : "Days") + "</div>" + "</div> ";
                                                            }
                                                            if (days == 0 && hours != 0)
                                                            {
                                                                out += "<div class='time-item time-hour' style='width:33.33%'>" + "<div class='num-time'>" + hours + "</div>" + " <div class='name-time'>" + ((hours == 1) ? "Hour" : "Hours") + "</div>" + "</div> ";
                                                            } else if (hours != 0) {
                                                                out += "<div class='time-item time-hour'>" + "<div class='num-time'>" + hours + "</div>" + " <div class='name-time'>" + ((hours == 1) ? "Hour" : "Hours") + "</div>" + "</div> ";
                                                            }
                                                            if (days == 0 && hours != 0)
                                                            {
                                                                out += "<div class='time-item time-min' style='width:33.33%'>" + "<div class='num-time'>" + mins + "</div>" + " <div class='name-time'>" + ((mins == 1) ? "Min" : "Mins") + "</div>" + "</div> ";
                                                                out += "<div class='time-item time-sec' style='width:33.33%'>" + "<div class='num-time'>" + secs + "</div>" + " <div class='name-time'>" + ((secs == 1) ? "Sec" : "Secs") + "</div>" + "</div> ";
                                                                out = out.substr(0, out.length - 2);
                                                            } else if (days == 0 && hours == 0)
                                                            {
                                                                out += "<div class='time-item time-min' style='width:50%'>" + "<div class='num-time'>" + mins + "</div>" + " <div class='name-time'>" + ((mins == 1) ? "Min" : "Mins") + "</div>" + "</div> ";
                                                                out += "<div class='time-item time-sec' style='width:50%'>" + "<div class='num-time'>" + secs + "</div>" + " <div class='name-time'>" + ((secs == 1) ? "Sec" : "Secs") + "</div>" + "</div> ";
                                                                out = out.substr(0, out.length - 2);
                                                            } else {
                                                                out += "<div class='time-item time-min'>" + "<div class='num-time'>" + mins + "</div>" + " <div class='name-time'>" + ((mins == 1) ? "Min" : "Mins") + "</div>" + "</div> ";
                                                                out += "<div class='time-item time-sec'>" + "<div class='num-time'>" + secs + "</div>" + " <div class='name-time'>" + ((secs == 1) ? "Sec" : "Secs") + "</div>" + "</div> ";
                                                                out = out.substr(0, out.length - 2);
                                                            }

                                                            $('.' + id).html(out);

                                                            setTimeout(function () {
                                                                CountDown(date, id);
                                                            }, 1000);
                                                        }
                                                    }
                                                    if (listdeal1.length > 0) {
                                                        for (var i = 0; i < listdeal1.length; i++) {
                                                            var arr = listdeal1[i].split("|");
                                                            if (arr[1].length) {
                                                                var data = new Date(arr[1]);
                                                                CountDown(data, arr[0]);
                                                            }
                                                        }
                                                    }
                                                })('#so_deals_13717025803152021133724');
                                            });
                                            //]]>
                                </script>						
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_w52p col-style">
                        <div class="banners3 banners">
                            <div class="item1">
                                <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/banners/banner3.jpg" alt="image"></a>
                            </div>
                            <div class="item2">
                                <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/banners/banner4.jpg" alt="image"></a>
                            </div>
                            <div class="item3">
                                <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/banners/banner5.jpg" alt="image"></a>
                            </div>
                        </div>
                    </div>
                    @foreach($danhmuc as $row)
                    @if(!$row->DAN_MA_DANHMUC)
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_0g2s col-style">
                        <script>
                                    //<![CDATA[
                                    var listcategoryslider1 = [];
                                    //]]>
                        </script>
                        <div id="so_category_slider_{{ $row->MA_DANHMUC}}" class="so-category-slider container-slider module so-category-slider-ltr cateslider1">
                            <div class="modcontent">
                                <div class="page-top">
                                    <div class="page-title-categoryslider">
                                        {{ $row->TEN_DANHMUC }}
                                    </div>
                                    <div class="item-sub-cat">
                                        <ul>
                                            @foreach($danhmuc as $i)
                                            @if($i->DAN_MA_DANHMUC != "" AND $row->MA_DANHMUC == $i->DAN_MA_DANHMUC)
                                            <li>
                                                <a href="/search?ma_danhmuc={{$i->MA_DANHMUC}}" title="{{$i->TEN_DANHMUC}}" target="_self">
                                                    {{$i->TEN_DANHMUC}}
                                                </a>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="categoryslider-content hide-featured preset01-4 preset02-2 preset03-1 preset04-2 preset05-1">
                                    <div class="item-cat-image">
                                        <a href="/search?ma_danhmuc={{ $row->MA_DANHMUC }}" title="{{ $row->TEN_DANHMUC }}" target="_self">
                                            <img class="categories-loadimage lazyload" alt="{{ $row->TEN_DANHMUC }}" data-sizes="auto" src="{{ $row->HINHANH }}" data-src="{{ $row->HINHANH }}" />
                                        </a>
                                    </div>
                                    <div class="loading-placeholder"></div>
                                    <div class="slider category-slider-inner not-js cols-6 products-list" data-effect="fadeIn">
                                        <?php $filter = array_filter($danhmuc, function($e) use($row){ return $e->DAN_MA_DANHMUC==$row->MA_DANHMUC;}); ?>
                                        @foreach($sanpham as $item)
                                        @if($row->MA_DANHMUC == $item->MA_DANHMUC || array_search($item->MA_DANHMUC, array_column($filter, "MA_DANHMUC")))
                                        <div class="item">
                                            <div class="item-inner product-thumb transition product-layout product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">
                                                        <div class="product-image-container ">									
                                                            <a class="lt-image" href="/detail/{{$item->MA_SP}}" target="_self" title="Proident leerkas">
                                                                <img data-sizes="205px" src="{{$item->URL}}" data-src="{{$item->URL}}" alt="{{$item->TEN_SP}}" class="lazyload" height="205px">
                                                            </a>
                                                        </div>
                                                        @if ($item->GIAMOI < $item->GIA)
                                                            @if((round((1-($item->GIAMOI/$item->GIA))*100))>0)
                                                            <span class="label label-sale">-{{(round((1-($item->GIAMOI/$item->GIA))*100))}}%</span>
                                                            @endif
                                                        @endif
                                                        <div class="so-quickview">
                                                            <a class="hidden" data-product='{{$item->MA_SP}}' href="/detail/{{$item->MA_SP}}"></a>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group cartinfo--static">
                                                            <button class="addToCart" type="button" {{ $item->KHO < 1 ? 'disabled' : '' }} onclick="add_cart({{$item->MA_SP}}, '1');"><span>{{ $item->KHO < 1 ? 'Bán hết' : 'Thêm vào giỏ hàng' }}</span></button>
                                                            </div>
                                                        <div class="caption hide-cont">
                                                            <div class="rate-history">
                                                                <div class="ratings">
                                                                    <div class="rating-box">
                                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 0 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 1 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 2 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 3 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 4 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                    </div>
                                                                    <span class="rating-num">( {{$item->SL}} )</span>
                                                                </div>
                                                            </div>
                                                            <h4>
                                                                <a href="/detail/{{$item->MA_SP}}" title="{{$item->TEN_SP}}" target="_self">
                                                                    {{$item->TEN_SP}}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">{{number_format($item->GIAMOI)}}VNĐ</span>
                                                            <span class="price-old">{{ $item->GIA != $item->GIAMOI ? number_format($item->GIA).'VNĐ' : ' ' }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <script type="text/javascript">
                                            //<![CDATA[
                                            jQuery(document).ready(function ($) {
                                                ;
                                                (function (element) {
                                                    var id = $("#so_category_slider_{{ $row->MA_DANHMUC}}");
                                                    var $element = $(element),
                                                            $extraslider = $(".slider", $element),
                                                            $featureslider = $('.product-feature', $element),
                                                            _delay = 500,
                                                            _duration = 800,
                                                            _effect = 'fadeIn',
                                                            total_item = 6;

                                                    var width_window = $(window).width();

                                                    $(window).on('load', function () {
                                                        $extraslider.on("initialized.owl.carousel2", function () {
                                                            var $item_active = $(".slider .owl2-item.active", $element);
                                                            if ($item_active.length > 1 && _effect != "none") {
                                                                _getAnimate($item_active);
                                                            } else {
                                                                var $item = $(".owl2-item", $element);
                                                                $item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});
                                                            }
                                                            $extraslider.show();
                                                            $('.loading-placeholder', id).hide();
                                                            // var $navpage = $(".page-top .page-title-categoryslider span", id);
                                                            // $(".slider .owl2-controls", id).insertAfter($navpage);
                                                            // $(".slider .owl2-dot", id).css("display", "none");

                                                        }).owlCarousel2({
                                                            rtl: false,
                                                            margin: 30,
                                                            slideBy: 1,
                                                            autoplay: 0,
                                                            autoplayHoverPause: 0,
                                                            autoplayTimeout: 0,
                                                            autoplaySpeed: 1000,
                                                            startPosition: 0,
                                                            mouseDrag: 1,
                                                            touchDrag: 1,
                                                            autoWidth: false,
                                                            responsive: {
                                                                0: {items: 1,
                                                                    nav: total_item <= 1 ? false : ((true) ? true : false),
                                                                },
                                                                480: {items: 2,
                                                                    nav: total_item <= 2 ? false : ((true) ? true : false),
                                                                },
                                                                768: {items: 1,
                                                                    nav: total_item <= 1 ? false : ((true) ? true : false),
                                                                },
                                                                992: {items: 2,
                                                                    nav: total_item <= 2 ? false : ((true) ? true : false),
                                                                },
                                                                1200: {items: 4,
                                                                    nav: total_item <= 4 ? false : ((true) ? true : false),
                                                                }
                                                            },
                                                            nav: true,
                                                            loop: true,
                                                            navSpeed: 500,
                                                            navText: ["&#139;", "&#155;"],
                                                            navClass: ["owl2-prev", "owl2-next"]
                                                        });

                                                        var height_slider = $('.slider', id).outerHeight();
                                                        if (width_window > 1200) {
                                                            $('.item-cat-image', id).css('min-height', height_slider - 20);
                                                        } else {
                                                            $('.item-cat-image', id).removeAttr('style');
                                                        }

                                                        $(window).resize(function () {
                                                            var width_window = $(window).width();
                                                            if (width_window > 1200) {
                                                                $('.item-cat-image', id).css('min-height', height_slider - 20);
                                                            } else {
                                                                $('.item-cat-image', id).removeAttr('style');
                                                            }
                                                        })
                                                    });

                                                    $extraslider.on("translated.owl.carousel2", function (e) {
                                                        var $item_active = $(".slider .owl2-item.active", $element);
                                                        var $item = $(".slider .owl2-item", $element);
                                                        _UngetAnimate($item);
                                                        if ($item_active.length > 1 && _effect != "none") {
                                                            _getAnimate($item_active);
                                                        } else {
                                                            $item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});

                                                        }
                                                    });

                                                    function _getAnimate($el) {
                                                        if (_effect == "none")
                                                            return;
                                                        $extraslider.removeClass("extra-animate");
                                                        $el.each(function (i) {
                                                            var $_el = $(this);
                                                            $(this).css({
                                                                "-webkit-animation": _effect + " " + _duration + "ms ease both",
                                                                "-moz-animation": _effect + " " + _duration + "ms ease both",
                                                                "-o-animation": _effect + " " + _duration + "ms ease both",
                                                                "animation": _effect + " " + _duration + "ms ease both",
                                                                "-webkit-animation-delay": +i * _delay + "ms",
                                                                "-moz-animation-delay": +i * _delay + "ms",
                                                                "-o-animation-delay": +i * _delay + "ms",
                                                                "animation-delay": +i * _delay + "ms",
                                                                "opacity": 1
                                                            }).animate({
                                                                opacity: 1
                                                            });

                                                            if (i == $el.size() - 1) {
                                                                $extraslider.addClass("extra-animate");
                                                            }
                                                        });
                                                    }

                                                    function _UngetAnimate($el) {
                                                        $el.each(function (i) {
                                                            $(this).css({
                                                                "animation": "",
                                                                "-webkit-animation": "",
                                                                "-moz-animation": "",
                                                                "-o-animation": "",
                                                                "opacity": 1
                                                            });
                                                        });
                                                    }
                                                    data = new Date(2013, 10, 26, 12, 00, 00);
                                                    function CountDownCategorySlider(date, id) {
                                                        dateNow = new Date();
                                                        amountCategorySlider = date.getTime() - dateNow.getTime();
                                                        if (amountCategorySlider < 0 && $('#' + id).length) {
                                                            $('.' + id).html("Now!");
                                                        } else {
                                                            daysCategorySlider = 0;
                                                            hoursCategorySlider = 0;
                                                            minsCategorySlider = 0;
                                                            secsCategorySlider = 0;
                                                            outCategorySlider = "";
                                                            amountCategorySlider = Math.floor(amountCategorySlider / 1000);
                                                            daysCategorySlider = Math.floor(amountCategorySlider / 86400);
                                                            amountCategorySlider = amountCategorySlider % 86400;
                                                            hoursCategorySlider = Math.floor(amountCategorySlider / 3600);
                                                            amountCategorySlider = amountCategorySlider % 3600;
                                                            minsCategorySlider = Math.floor(amountCategorySlider / 60);
                                                            amountCategorySlider = amountCategorySlider % 60;
                                                            secsCategorySlider = Math.floor(amountCategorySlider);
                                                            if (daysCategorySlider != 0) {
                                                                /*outCategorySlider += "<div class='time-item time-day'>" + "<div class='num-time'>" + daysCategorySlider + "</div>" + " <div class='name-time'>" + ((daysCategorySlider == 1) ? "Day" : "Days") + "</div>" + "</div> ";*/
                                                                outCategorySlider += "<div class='time-item time-day'>" + "<div class='num-time'>" + daysCategorySlider + "</div> </div> ";
                                                            }
                                                            if (daysCategorySlider == 0 && hoursCategorySlider != 0)
                                                            {
                                                                /*outCategorySlider += "<div class='time-item time-hour' style='width:33.33%'>" + "<div class='num-time'>" + hoursCategorySlider + "</div>" + " <div class='name-time'>" + ((hoursCategorySlider == 1) ? "Hour" : "Hours") + "</div>" + "</div> ";*/
                                                                outCategorySlider += "<div class='time-item time-hour' style='width:33.33%'><div class='num-time'>" + (hoursCategorySlider < 10 ? '0' + hoursCategorySlider : hoursCategorySlider) + "</div> : </div> ";
                                                            } else if (hoursCategorySlider != 0) {
                                                                /*outCategorySlider += "<div class='time-item time-hour'>" + "<div class='num-time'>" + hoursCategorySlider + "</div>" + " <div class='name-time'>" + ((hoursCategorySlider == 1) ? "Hour" : "Hours") + "</div>" + "</div> ";*/
                                                                outCategorySlider += "<div class='time-item time-hour'><div class='num-time'>" + (hoursCategorySlider < 10 ? '0' + hoursCategorySlider : hoursCategorySlider) + "</div> </div> ";
                                                            }
                                                            if (daysCategorySlider == 0 && hoursCategorySlider != 0)
                                                            {
                                                                /*outCategorySlider += "<div class='time-item time-min' style='width:33.33%'>" + "<div class='num-time'>" + minsCategorySlider + "</div>" + " <div class='name-time'>" + ((minsCategorySlider == 1) ? "Min" : "Mins") + "</div>" + "</div> ";*/
                                                                outCategorySlider += "<div class='time-item time-min' style='width:33.33%'><div class='num-time'>" + (minsCategorySlider < 10 ? '0' + minsCategorySlider : minsCategorySlider) + "</div> </div>";

                                                                /*outCategorySlider += "<div class='time-item time-sec' style='width:33.33%'>" + "<div class='num-time'>" + secsCategorySlider + "</div>" + " <div class='name-time'>" + ((secsCategorySlider == 1) ? "Sec" : "Secs") + "</div>" + "</div> ";*/
                                                                outCategorySlider += "<div class='time-item time-sec' style='width:33.33%'><div class='num-time'>" + (secsCategorySlider < 10 ? '0' + secsCategorySlider : secsCategorySlider) + "</div> </div>";
                                                                outCategorySlider = outCategorySlider.substr(0, outCategorySlider.length - 2);
                                                            } else if (daysCategorySlider == 0 && hoursCategorySlider == 0)
                                                            {
                                                                /*outCategorySlider += "<div class='time-item time-min' style='width:50%'>" + "<div class='num-time'>" + minsCategorySlider + "</div>" + " <div class='name-time'>" + ((minsCategorySlider == 1) ? "Min" : "Mins") + "</div>" + "</div> ";*/
                                                                outCategorySlider += "<div class='time-item time-min' style='width:50%'><div class='num-time'>" + (minsCategorySlider < 10 ? '0' + minsCategorySlider : minsCategorySlider) + "</div> </div> ";

                                                                /*outCategorySlider += "<div class='time-item time-sec' style='width:50%'>" + "<div class='num-time'>" + secsCategorySlider + "</div>" + " <div class='name-time'>" + ((secsCategorySlider == 1) ? "Sec" : "Secs") + "</div>" + "</div> ";*/
                                                                outCategorySlider += "<div class='time-item time-sec' style='width:50%'><div class='num-time'>" + (secsCategorySlider < 10 ? '0' + secsCategorySlider : secsCategorySlider) + "</div> </div> ";
                                                                outCategorySlider = outCategorySlider.substr(0, outCategorySlider.length - 2);
                                                            } else {
                                                                /*outCategorySlider += "<div class='time-item time-min'>" + "<div class='num-time'>" + minsCategorySlider + "</div>" + " <div class='name-time'>" + ((minsCategorySlider == 1) ? "Min" : "Mins") + "</div>" + "</div> ";*/
                                                                outCategorySlider += "<div class='time-item time-min'><div class='num-time'>" + (minsCategorySlider < 10 ? '0' + minsCategorySlider : minsCategorySlider) + "</div> </div> ";
                                                                /*outCategorySlider += "<div class='time-item time-sec'>" + "<div class='num-time'>" + secsCategorySlider + "</div>" + " <div class='name-time'>" + ((secsCategorySlider == 1) ? "Sec" : "Secs") + "</div>" + "</div> ";*/
                                                                outCategorySlider += "<div class='time-item time-sec'><div class='num-time'>" + (secsCategorySlider < 10 ? '0' + secsCategorySlider : secsCategorySlider) + "</div></div> ";
                                                                outCategorySlider = outCategorySlider.substr(0, outCategorySlider.length - 2);
                                                            }
                                                            $('.' + id).html(outCategorySlider);

                                                            setTimeout(function () {
                                                                CountDownCategorySlider(date, id);
                                                            }, 1000);
                                                        }
                                                    }
                                                    if (listcategoryslider1.length > 0) {
                                                        for (var i = 0; i < listcategoryslider1.length; i++) {
                                                            var arr = listcategoryslider1[i].split("|");
                                                            if (arr[1].length) {
                                                                var data = new Date(arr[1]);
                                                                CountDownCategorySlider(data, arr[0]);
                                                            }
                                                        }
                                                    }
                                                })("#so_category_slider_{{$row->MA_DANHMUC}}");
                                            });
                                            //]]>
                                </script>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_onit col-style">
                        <div class="banners4 banners">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <a href="#"><img src="images/banners/bn1.jpg" alt="image"></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <a href="#"><img src="images/banners/bn2.jpg" alt="image"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_hbs4 col-style">
                        <div class="module so-listing-tabs-ltr listingtab-layout1">
                            <div class="modcontent">
                                
                                <div id="so_listing_tabs_69" class="so-listing-tabs first-load module">
                                    <!--<![endif]-->
                                    <div class="ltabs-wrap ">
                                        <div class="ltabs-tabs-container" data-delay="500"
                                             data-duration="800"
                                             data-effect="none"
                                             data-ajaxurl="" data-type_source="1"
                                             data-type_show="slider" >
                                            <div class="ltabs-tabs-wrap">
                                                <span class='ltabs-tab-selected'></span>
                                                <span class="ltabs-tab-arrow">▼</span>
                                                <ul class="ltabs-tabs cf list-sub-cat font-title">
                                                    <li class="ltabs-tab   tab-sel tab-loaded "
                                                        data-category-id="sell"
                                                        data-active-content-l=".items-category-sell">
                                                        <span class="ltabs-tab-label">
                                                            Đánh giá tốt
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="wap-listing-tabs products-list grid">
                                            <div class="ltabs-items-container">
                                                <div class="products-list ltabs-items  ltabs-items-selected ltabs-items-loaded items-category-sell " data-total="38" >
                                                    <a class="items-category-seeall viewall" href="/search?rank=4" title="View all"> View all <i class="fa fa-caret-right" ></i></a>
                                                    <div class="ltabs-items-inner owl2-carousel  ltabs-slider ">
                                                        @foreach($rank as $item)
                                                        <div class="ltabs-item ">
                                                            <div class="item-inner product-layout transition product-grid">
                                                                <div class="product-item-container">
                                                                    <div class="left-block left-b">
                                                                        <div class="product-image-container  second_img 	">
                                                                            <a href="/detail/{{$item->MA_SP}}" target="_self" title=" "  >
                                                                                <img data-sizes="auto" src="{{$item->URL}}" data-src="{{$item->URL}}" class="img-1 lazyload" alt="{{ $item->TEN_SP }}"  height="228px">
                                                                                <img data-sizes="auto" src="{{$item->URL}}" data-src="{{$item->URL}}" class="img-2 lazyload" alt="{{ $item->TEN_SP }}"  height="228px">
                                                                            </a>						
                                                                        </div>
                                                                        <div class="box-label">
                                                                            @if ($item->GIAMOI < $item->GIA)
                                                                            <span class="label label-sale">-{{ round((1-($item->GIAMOI/$item->GIA))*100) }}%</span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="so-quickview">
                                                                            <a class="hidden" data-product='{{$item->MA_SP}}' href="/detail/{{$item->MA_SP}}"></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="right-block">
                                                                        <div class="button-group cartinfo--static">
                                                                            <button class="addToCart" type="button" {{ $item->KHO < 1 ? 'disabled' : '' }} onclick="add_cart({{$item->MA_SP}}, '1');"><span>{{ $item->KHO < 1 ? 'Bán hết' : 'Thêm vào giỏ hàng' }}</span></button>
                                                                            </div>
                                                                        <div class="caption hide-cont">
                                                                            <div class="rating">
                                                                                <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 0 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 1 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 2 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 3 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 4 ? 'fa-star': 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                            </div>
                                                                            <h4>
                                                                                <a href="/detail/{{$item->MA_SP}}" target="_self" title="{{$item->TEN_SP}} "  >
                                                                                    {{$item->TEN_SP}} 
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div  class="price">
                                                                            <span class="price-new">
                                                                                <span class="price-new">{{number_format($item->GIAMOI)}}  </span>&nbsp;&nbsp;
                                                                                <span class="price-old">{{number_format($item->GIA)}}  </span>&nbsp;
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <script type="text/javascript">
                                                                jQuery(document).ready(function ($) {
                                                                    var $tag_id = $('#so_listing_tabs_69'),
                                                                            parent_active = $('.items-category-sell', $tag_id),
                                                                            total_product = parent_active.data('total'),
                                                                            tab_active = $('.ltabs-items-inner', parent_active),
                                                                            nb_column0 = 5,
                                                                            nb_column1 = 3,
                                                                            nb_column2 = 2,
                                                                            nb_column3 = 2,
                                                                            nb_column4 = 1;
                                                                    tab_active.owlCarousel2({
                                                                        rtl: false,
                                                                        nav: true,
                                                                        dots: false,
                                                                        margin: 0,
                                                                        loop: true,
                                                                        autoplay: false,
                                                                        autoplayHoverPause: false,
                                                                        autoplayTimeout: 5000,
                                                                        autoplaySpeed: 1000,
                                                                        mouseDrag: true,
                                                                        touchDrag: true,
                                                                        navRewind: true,
                                                                        navText: ['', ''],
                                                                        responsive: {
                                                                            0: {
                                                                                items: nb_column4,
                                                                                nav: total_product <= nb_column0 ? false : ((true) ? true : false),
                                                                            },
                                                                            480: {
                                                                                items: nb_column3,
                                                                                nav: total_product <= nb_column0 ? false : ((true) ? true : false),
                                                                            },
                                                                            768: {
                                                                                items: nb_column2,
                                                                                nav: total_product <= nb_column0 ? false : ((true) ? true : false),
                                                                            },
                                                                            992: {
                                                                                items: nb_column1,
                                                                                nav: total_product <= nb_column0 ? false : ((true) ? true : false),
                                                                            },
                                                                            1200: {
                                                                                items: nb_column0,

                                                                                nav: total_product <= nb_column0 ? false : ((true) ? true : false),
                                                                            },
                                                                            1649: {
                                                                                items: 6,
                                                                                nav: total_product <= nb_column0 ? false : ((true) ? true : false),
                                                                            }
                                                                        }
                                                                    });
                                                                });
                                                    </script>
                                                </div>
                                                <div class="products-list ltabs-items  items-category-p_date_added " data-total="38" >
                                                    <a class="items-category-seeall viewall" href="index.php?route=custom/newarrivals" title="View all"> View all <i class="fa fa-caret-right" ></i></a>
                                                    <div class="ltabs-loading"></div>
                                                </div>
                                                <div class="products-list ltabs-items  items-category-rating " data-total="38" >
                                                    <a class="items-category-seeall viewall" href="index.php?route=custom/mostrate" title="View all"> View all <i class="fa fa-caret-right" ></i></a>
                                                    <div class="ltabs-loading"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modcontent-->
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_pft8 col-style">
                        <div class="slider-brands">
                            <div class="contentslider" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="7" data-items_column1="5" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
                                <div class="item">
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/brands/b1.png" alt="brand"></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/brands/b2.png" alt="brand"></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/brands/b3.png" alt="brand"></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/brands/b4.png" alt="brand"></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/brands/b5.png" alt="brand"></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/brands/b6.png" alt="brand"></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="images/brands/b4.png" alt="brand"></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="image/catalog/brands/b5.png" alt="brand"></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img data-sizes="auto" class="lazyload" src="image/loading.svg" data-src="image/catalog/brands/b6.png" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection