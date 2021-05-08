@extends('layouts.layout_detail')
@section('title', $ct_sp->TEN_SP)
@section('content')
<div class="breadcrumbs ">
   <div class="container">
      <div class="current-name">	  
        {{$ct_sp->TEN_SP}}
      </div>
      <ul class="breadcrumb">
         <li><a href="/home"><i class="fa fa-home"></i></a></li>
         <li><a href="/detail/{{$ct_sp->TEN_SP}}">{{$ct_sp->TEN_SP}}</a></li>
      </ul>
   </div>
</div>
<div class="content-main container product-detail  ">
   <div class="row">
      <aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column sidebar-offcanvas ">
         <span id="close-sidebar" class="fa fa-times"></span>
         <div class="module category-style">
            <h3 class="modtitle"><span>Tất cả danh mục </span></h3>
            <div class="mod-content box-category">
               <ul class="accordion" id="accordion-category">
                  @if (is_array($danhmuc))
                    @foreach ($danhmuc as $item)
                    <li>
                        <a href="/search?ma_danhmuc={{$item->MA_DANHMUC}}" class="dropdown-toggle">{{$item->TEN_DANHMUC}}</a>
                    </li>
                    @endforeach
                    @endif
               </ul>
            </div>
         </div>
         <div class="module so-extraslider-ltr product-simple col-extra">
             <h3 class="modtitle"><span>Bán chạy</span></h3>
             <div class="modcontent">
                 <div id="so_extra_slider_177362981619247750" class="so-extraslider buttom-type1 preset00-1 preset01-1 preset02-1 preset03-1 preset04-1 button-type1">
                     <!-- Begin extraslider-inner -->
                     <div class="owl2-controls"><div class="owl2-nav"><div class="owl2-prev" style="display: none;">« </div>
                             <div class="owl2-dots" style=""><div class="owl2-dot active">
                                     <span></span></div><div class="owl2-dot">
                                         <span></span></div></div><div class="owl2-next" style="display: none;">» </div>
                                             
                         </div>          
                     </div>
                     <div class="extraslider-inner products-list owl2-carousel owl2-theme owl2-loaded" data-effect="none">
                         <div class="owl2-stage-outer">
                             <div class="owl2-stage" >
                                 @foreach (array_chunk($udai,5) as $key => $row)
                                    <div class="owl2-item {{$key == 0 ? 'active' : ''}}" >
                                       <div class="item ">
                                           @foreach($row as $item)
                                           <div class="product-layout item-inner style1 " style="with: 250px">
                                             <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="/detail/{{$item ->MA_SP}}" target="_self" title="{{$item ->TEN_SP}}">
                                                        <img data-sizes="auto" src="{{$item->URL}}" data-src="{{$item->URL}}" alt="{{$item ->TEN_SP}}" class="lazyautosizes lazyloaded" sizes="93px" height="93px">
                                                   </a>
                                                </div>
                                                <div class="so-quickview">
                                                   <a class="hidden" data-product="84" href="{{$item ->MA_SP}}" target="_self"></a>
                                                </div>
                                             </div>
                                             <div class="item-info">
                                                <div class="rating">
                                                   <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 0 ? 'fa-star':'fa-star-o'}} fa-stack-2x"></i></span>
                                                   <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 1 ? 'fa-star':'fa-star-o'}} fa-stack-2x fa-stack-2x"></i></span>
                                                   <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 2 ? 'fa-star':'fa-star-o'}} fa-stack-2x fa-stack-2x"></i></span>
                                                   <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 3 ? 'fa-star':'fa-star-o'}} fa-stack-2x fa-stack-2x"></i></span>
                                                   <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 4 ? 'fa-star':'fa-star-o'}} fa-stack-2x fa-stack-2x"></i></span>
                                                </div>
                                                <div class="item-title">
                                                   <a href="/detail/{{$item ->MA_SP}}" target="_self" title="{{$item ->TEN_SP}}">
                                                   {{$item ->TEN_SP}} 
                                                   </a>
                                                </div>
                                                <div class="content_price price">
                                                   <span class="price-new product-price">{{number_format($item ->GIAMOI)}}VNĐ</span><br>
                                                   <span class="price-old">{{number_format($item ->GIA)}}VNĐ</span>&nbsp;
                                                </div>
                                             </div>
                                             <!-- End item-info -->
                                             <!-- End item-wrap-inner -->
                                          </div>
                                           @endforeach
                                       </div>
                                    </div>
                                   @endforeach
                             </div>
                         </div>
                     <!--End extraslider-inner -->
                     </div>
                     <script type="text/javascript">
                     //<![CDATA[
                     jQuery(document).ready(function ($) {
                             (function (element) {
                                     var $element = $(element),
                                                     $extraslider = $(".extraslider-inner", $element),
                                                     _delay = 500 ,
                                                     _duration = 800 ,
                                                     _effect = 'none ';

                                     $extraslider.on("initialized.owl.carousel2", function () {
                                             var $item_active = $(".owl2-item.active", $element);
                                             if ($item_active.length > 1 && _effect != "none") {
                                                     _getAnimate($item_active);
                                             }
                                             else {
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
                                     loop: false,
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

                             })("#so_extra_slider_177362981619247750 ");
                         });
                         //]]>
                     </script>

                 </div>

             </div>
         </div>
         <div class="module banner-left hidden-xs ">
            <h2>   </h2>
            <div class="banner-sidebar banners">
               <div>
                  <a title="Banner Image" href="#"> 
                  <img src="/images/banner-sidebar.jpg" alt="Banner Image"> 
                  </a>
               </div>
            </div>
         </div>
      </aside>
      <div id="content" class="product-view col-md-9 col-sm-12 col-xs-12 fluid-sidebar">
         <a href="javascript:void(0)" class=" open-sidebar hidden-lg hidden-md"><i class="fa fa-bars"></i>Sidebar</a>
         <div class="sidebar-overlay "></div>
         <div class="content-product-mainheader clearfix">
            <div class="row">
               <div class="content-product-left  col-md-5 col-sm-12 col-xs-12">
                  <div class="so-loadeding"></div>
                  <div class="large-image  ">
                      <img itemprop="image" class="zoom0 product-image-zoom lazyautosizes lazyloaded" data-sizes="auto" src="{{$ct_sp->HINHANH[0]->URL}}" data-src="{{$ct_sp->HINHANH[0]->URL}}" data-zoom-image="{{$ct_sp->HINHANH[0]->URL}}" title="{{$ct_sp->TEN_SP}}" alt="{{$ct_sp->TEN_SP}}" sizes="457px">
                  </div>
                  <div id="thumb-slider" class="full_slider  contentslider--default" data-rtl="no" data-autoplay="no" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="4" data-items_column1="3" data-items_column2="5" data-items_column3="3" data-items_column4="2" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                       @foreach($ct_sp->HINHANH as $key => $item)
                      <div class="image-additional">
                        <a data-index="{{$key}}" class="zoom0 img thumbnail" data-image="{{$item->URL}}" title="{{$ct_sp->TEN_SP}}">
                            <img class="lazyautosizes lazyloaded" data-sizes="auto" src="{{$item->URL}}" data-src="{{$item->URL}}" title="{{$ct_sp->TEN_SP}}" alt="{{$ct_sp->TEN_SP}}" style="height:80px; width:82px" size="82px" >
                        </a>
                     </div>
                       @endforeach
                  </div>
                  <script>
                        $('.zoom0').elevateZoom();
                        $('input[name="slide_chosse"]').click(function () {
                            $('.zoomContainer').remove();
                            $('.zoom' + $(this).attr("id")).elevateZoom();
                        });
                  </script>
                  <script type="text/javascript"><!--
                      
                     $(document).ready(function() {
                     	var zoomCollection = '.large-image img';
                     	$( zoomCollection ).elevateZoom({
                     		//value zoomType (window,inner,lens)
                     					zoomType        : "inner",
                     					lensSize    :'250',
                     		easing:false,
                     		scrollZoom : true,
                     		gallery:'thumb-slider',
                     		cursor: 'pointer',
                     		galleryActiveClass: "active",
                     	});
                     	$(zoomCollection).bind('touchstart', function(){
                     	    $(zoomCollection).unbind('touchmove');
                     	});
                     	
                     			$('.large-image img').magnificPopup({
                     		items: [
                                                                {src: 'https://opencart.opencartworks.com/themes/so_supermarket/image/cache/catalog/demo/product/health/8-1000x1000.jpg'},
                     						{src: 'https://opencart.opencartworks.com/themes/so_supermarket/image/cache/catalog/demo/product/health/7-1000x1000.jpg'},
                     						{src: 'https://opencart.opencartworks.com/themes/so_supermarket/image/cache/catalog/demo/product/health/2-1000x1000.jpg'},
                     						{src: 'https://opencart.opencartworks.com/themes/so_supermarket/image/cache/catalog/demo/product/health/9-1000x1000.jpg'},
                     						{src: 'https://opencart.opencartworks.com/themes/so_supermarket/image/cache/catalog/demo/product/health/11-1000x1000.jpg'},
                     					],
                     		gallery: { enabled: true, preload: [0,2] },
                     		type: 'image',
                     		mainClass: 'mfp-fade',
                     		callbacks: {
                     			open: function() {
                     										var activeIndex = parseInt($('#thumb-slider .img.active').attr('data-index'));
                     									var magnificPopup = $.magnificPopup.instance;
                     				magnificPopup.goTo(activeIndex);
                     			}
                     		}
                     
                     	});
                     		});
                     //-->
                  </script>
               </div>
               <div class="content-product-right col-md-7 col-sm-12 col-xs-12">
                  <div class="title-product">
                     <h1>{{$ct_sp->TEN_SP}}</h1>
                  </div>
                  <div id="tab-tags">
                        Cửa hàng:
                        <a class="btn  btn-sm " href="">{{$ct_sp->TEN_CUAHANG}}</a>															 
                  </div>
                  <div class="box-review">
                     <div class="rating">
                        <div class="rating-box">
                           <span class="fa fa-stack"><i class="fa {{ $ct_sp->DANHGIA > 0 ? 'fa-star' : 'fa-star-o' }} fa-stack-1x"></i></span>
                           <span class="fa fa-stack"><i class="fa {{ $ct_sp->DANHGIA > 1 ? 'fa-star' : 'fa-star-o' }} fa-stack-1x"></i></span>
                           <span class="fa fa-stack"><i class="fa {{ $ct_sp->DANHGIA > 2 ? 'fa-star' : 'fa-star-o' }} fa-stack-1x"></i></span>
                           <span class="fa fa-stack"><i class="fa {{ $ct_sp->DANHGIA > 3 ? 'fa-star' : 'fa-star-o' }} fa-stack-1x"></i></span>
                           <span class="fa fa-stack"><i class="fa {{ $ct_sp->DANHGIA > 4 ? 'fa-star' : 'fa-star-o' }} fa-stack-1x"></i></span>
                        </div>
                     </div>
                     <a class="reviews_button" href="" >{{$ct_sp->SL}} bình luận</a>
                     <span class="order-num">Đặt hàng ({{$ct_sp->SOLUONG}})</span>
                  </div>
                  <div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
                     <span class="price-new"><span itemprop="price" id="price-special">{{number_format($ct_sp->GIAMOI)}} VNĐ</span></span>
                     <span class="price-old" id="price-old">{{ $ct_sp->GIA != $ct_sp->GIAMOI ? number_format($ct_sp->GIA).'VNĐ' : ' ' }}</span>
                     @if ($ct_sp->GIAMOI < $ct_sp->GIA)
                        @if((round((1-($ct_sp->GIAMOI/$ct_sp->GIA))*100))>0)
                        <span class="label-product label-sale">
                        -{{(round((1-($ct_sp->GIAMOI/$ct_sp->GIA))*100))}}%</span>
                       @endif
                     @endif
                  </div>
                  <div class="short_description form-group">
                     <h3>Mô tả</h3>
                     <div class="inner-box-desc">
                         @if (is_array($thuoctinh))
                         @foreach ($thuoctinh as $item)
                            <div class="model"><span>{{$item -> THUOCTINH}}:</span> {{$item -> GIATRI}}</div>
                        @endforeach
                        @endif
                     </div> 
                  </div>
                  
                  <div id="product">
                     <div class="box-cart clearfix form-group">
                        <div class="form-group box-info-product">
                           <div class="option quantity">
                              <div class="input-group quantity-control" unselectable="on" style="user-select: none;">
                                 <span class="input-group-addon product_quantity_down fa fa-minus"></span>
                                 <input class="form-control" type="number" name="SOLUONGMUA" value="1" max="{{$ct_sp->KHO}}" min="1">
                                 <input type="hidden" name="{{$ct_sp->MA_SP}}" value="{{$ct_sp->MA_SP}}">								  
                                 <span class="input-group-addon product_quantity_up fa fa-plus"></span>
                              </div>
                           </div>
                           <div class="detail-action">
                              <div class="cart">
                                  <button type="button" class="btn btn-mega btn-lg addToCart " title="Thêm vào giỏ hàng" {{ $ct_sp->KHO < 1 ? 'disabled' : '' }} onclick="add_cart({{$ct_sp->MA_SP}},  $('input[name=\'SOLUONGMUA\']').val());"><span>{{ $ct_sp->KHO < 1 ? 'Bán hết' : 'Thêm vào giỏ hàng' }}</span>					
                                  </button>
                              </div>
                              
                           </div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     
                     <div id="tab-tags">
                        Tags:
                        <a class="btn btn-primary btn-sm 22" href="">{{$ct_sp->MA_DANHMUC}}</a> 															 
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="content-product-mainbody clearfix row">
            <div class="content-product-content col-sm-12">
               <div class="content-product-midde clearfix">
                  <div class="producttab ">
                     <div class="tabsslider   horizontal-tabs  col-xs-12">
                        <ul class="nav nav-tabs font-sn">
                           <li class="active"><a data-toggle="tab" href="#tab-description">Mô tả chi tiết</a></li>
                           <li><a href="#tab-review" data-toggle="tab">Nhận xét ({{$ct_sp ->SL}})</a></li>
                        </ul>
                        <div class="tab-content  col-xs-12">
                           <div class="tab-pane active" id="tab-description">
                              <h3 class="product-property-title">Thông tin sản phẩm</h3>
                              @if (is_array($thuoctinh))
                              @foreach ($thuoctinh as $item)
                              <ul class="product-property-list util-clearfix">
                                 <li class="property-item">
                                    <span class="propery-title">{{$item -> THUOCTINH}}</span>
                                    <span class="propery-des">{{$item -> GIATRI}}</span>
                                 </li>
                              </ul>
                              @endforeach
                              @endif
                              <h3 class="product-property-title">Mô tả sản phẩm</h3>
                              <div id="collapse-description" class="desc-collapse showdown">
                                 {!!$ct_sp->CHI_TIET!!}
                              </div>
                              <div class="button-toggle">
                                 <a class="showmore" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="collapse-footer">
                                 <span class="toggle-more">Xem thêm <i class="fa fa-angle-down"></i></span> 
                                 <span class="toggle-less">Thu nhỏ <i class="fa fa-angle-up"></i></span>           
                                 </a>        
                              </div>
                           </div>
                           <div class="tab-pane" id="tab-review">
                                <div id="review">
                                   @foreach($binhluan as $item) 
                                   <table class="table table-striped table-bordered">
                                      <tbody>
                                         <tr>
                                            <td style="width: 50%;"><strong>{{$item->TEN_NGUOIDUNG}}</strong></td>
                                            <td class="text-right">{{date($item->NGAY)}}</td>
                                         </tr>
                                         <tr>
                                            <td colspan="2">
                                               <p>{{ $item->NOIDUNG }}</p>
                                               <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 0 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>   
                                               <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 1 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>   
                                               <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 2 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>   
                                               <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 3 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span>   
                                               <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 4 ? 'fa-star' : 'fa-star-o' }} fa-stack-2x"></i></span> 
                                               <div class="content-product-left  col-md-5 col-sm-12 col-xs-12">
                                                   <div class="full_slider  contentslider--default" >
                                                        @if(isset($item->FILE_1))
                                                        <div class="image-additional">
                                                            <a href="{{$item->FILE_1}}" class="zoom0 img thumbnail" >
                                                               <img class="lazyautosizes lazyloaded" src="{{$item->FILE_1}}" sizes="82px">
                                                            </a>
                                                       </div>
                                                        @endif
                                                        @if(isset($item->FILE_2))
                                                        <div class="image-additional">
                                                           <a href="{{$item->FILE_2}}"  class="zoom0 img thumbnail">
                                                               <img class="lazyautosizes lazyloaded" src="{{$item->FILE_2}}" sizes="82px">
                                                           </a>
                                                       </div>
                                                        @endif
                                                        @if(isset($item->FILE_3))
                                                        <div class="image-additional">
                                                           <a  href="{{$item->FILE_3}}" class="zoom0 img thumbnail" >
                                                               <img class="lazyautosizes lazyloaded" src="{{$item->FILE_3}}" sizes="82px">
                                                           </a>
                                                        </div>
                                                        @endif
                                                        @if(isset($item->FILE_4))
                                                        <div class="image-additional">
                                                            <a href="{{$item->FILE_4}}" class="zoom0 img thumbnail">
                                                               <img class="lazyautosizes lazyloaded" src="{{$item->FILE_4}}" sizes="82px">
                                                            </a>
                                                        </div>
                                                        @endif
                                                        @if(isset($item->FILE_5))
                                                        <div class="image-additional">
                                                           <a  href="{{$item->FILE_5}}"  class="zoom0 img thumbnail" >
                                                               <img class="lazyautosizes lazyloaded" src="{{$item->FILE_5}}" sizes="82px">
                                                           </a>
                                                        </div>
                                                        @endif
                                                   </div>
                                               </div>
                                               
                                            </td>
                                         </tr>
                                      </tbody>
                                   </table>
                                   @endforeach
                                   <div class="text-right"></div>
                                </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
<div class="content-product-bottom clearfix">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#product-related">Sản phẩm vừa xem</a></li> 
          <li><a data-toggle="tab" href="#product-upsell">Sản phẩm mua cùng</a></li>
        </ul>
					<div class="tab-content">
					  	<div id="product-related" class="tab-pane fade in active">
                                                    <div class="module so-extraslider-ltr upsell-product">
                                                        <h3 class="modcontent hidden"><span>Related Products </span></h3>

                                                        <div id='so_extra_slider_2' class="so-extraslider buttom-type1 preset00-5 preset01-3 preset02-3 preset03-2 preset04-1 button-type1">
                                                            <!-- Products list -->
                                                            <div class="extraslider-inner products-list " data-effect="none">

                                                                @foreach($lichsu as $item )											 
                                                                <div class="item ">
                                                                    <div class="product-layout product-grid style1 ">
                                                                        <div class="product-item-container">
                                                                            <div class="left-block left-b">									
                                                                                <div class="product-image-container 	">
                                                                                    <a href="{{$item->MA_SP}}" target="_self" title="{{$item->TEN_SP}}"  >
                                                                                        <img data-sizes="auto" src="{{$item->URL}}" data-src="{{$item->URL}}" alt="{{$item->TEN_SP}}" class="lazyload" height="205px">
                                                                                    </a>						
                                                                                </div>
                                                                                <div class="box-label">
                                                                                    @if ($item->GIAMOI < $item->GIA)
                                                                                        @if((round((1-($item->GIAMOI/$item->GIA))*100))>0)
                                                                                        <span class="label-product label-sale">- {{round((1-($item->GIAMOI/$item->GIA))*100)}}%</span>
                                                                                        @endif
                                                                                    @endif    
                                                                                </div>
                                                                                <div class="so-quickview">
                                                                                    <a class="hidden" data-product='{{$item->MA_SP}}' href="/detail/{{$item->MA_SP}}"></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="right-block">
                                                                                <div class="button-group cartinfo--static">
                                                                                    <button type="button" class="addToCart " title="Thêm vào giỏ hàng" {{ $item->KHO < 1 ? 'disabled' : '' }} onclick="add_cart({{$item->MA_SP}}, '1');"><span>{{ $item->KHO < 1 ? 'Bán hết' : 'Thêm vào giỏ hàng' }}</span>					
                                                                                    </button>
                                                                                </div>

                                                                                <div class="caption hide-cont">
                                                                                    <div class="rating">
                                                                                        <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 0 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                                        <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 1 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                                        <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 2 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                                        <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 3 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                                        <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 4 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                                                    </div>
                                                                                    <h4>
                                                                                        <a href="/detail/{{$item->MA_SP}}" target="_self" title="{{$item->TEN_SP}}"  >
                                                                                            {{$item->TEN_SP}}
                                                                                        </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div  class="price">
                                                                                    <span class="price-new">{{number_format($item->GIAMOI)}}VNĐ</span>&nbsp;&nbsp;
                                                                                    <span class="price-old">{{ $item->GIA != $item->GIAMOI ? number_format($item->GIA).'VNĐ' : ' ' }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- End item-wrap-inner -->
                                                                    </div>
                                                                    <!-- End item-wrap -->
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
					  	</div>
					  	<div id="product-upsell" class="tab-pane fade">
					  	<!-- default Grid  -->
<div class="module so-extraslider-ltr upsell-product">
	<div class="modcontent">												
                    <div id="so_extra_slider_1327329431619247751" class="so-extraslider buttom-type1 preset00-5 preset01-3 preset02-3 preset03-2 preset04-1 button-type1">
                    <!-- Begin extraslider-inner -->
                    <div class="extraslider-inner products-list " data-effect="none">
																	 
                    @foreach($muacung as $item )											 
                                    <div class="item ">
                                        <div class="product-layout product-grid style1 ">
                                            <div class="product-item-container">
                                                <div class="left-block left-b">									
                                                    <div class="product-image-container 	">
                                                        <a href="{{$item->MA_SP}}" target="_self" title="{{$item->TEN_SP}}"  >
                                                            <img data-sizes="auto" src="{{$item->URL}}" data-src="{{$item->URL}}" alt="{{$item->TEN_SP}}" class="lazyload" height="205px">
                                                        </a>						
                                                    </div>
                                                    <div class="box-label">
                                                        <span class="label-product label-sale">- {{round((1-($item->GIAMOI/$item->GIA))*100)}}%</span>
                                                    </div>
                                                    <div class="so-quickview">
                                                        <a class="hidden" data-product='{{$item->MA_SP}}' href="/detail/{{$item->URL}}"></a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <div class="button-group cartinfo--static">
                                                        <button type="button" class="addToCart" title="Thêm vào giỏ hàng" onclick="add_cart({{$item->MA_SP}},1)">													
                                                                <span>Thêm vào giỏ hàng</span>
                                                            </button>
                                                    </div>

                                                    <div class="caption hide-cont">
                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 0 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 1 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 2 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 3 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 4 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                        </div>
                                                        <h4>
                                                            <a href="/detail/{{$item->MA_SP}}" target="_self" title="{{$item->TEN_SP}}"  >
                                                                {{$item->TEN_SP}}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div  class="price">
                                                        <span class="price-new">{{number_format($item->GIAMOI)}}VNĐ</span>&nbsp;&nbsp;
                                                        <span class="price-old">{{number_format($item->GIA)}}VNĐ</span>&nbsp;
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
								_delay = 500 ,
								_duration = 800 ,
								_effect = 'none ';

						$extraslider.on("initialized.owl.carousel2", function () {
							var $item_active = $(".owl2-item.active", $element);
							if ($item_active.length > 1 && _effect != "none") {
								_getAnimate($item_active);
							}
							else {
								var $item = $(".owl2-item", $element);
								$item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});
							}
							
							 
								$(".owl2-controls", $element).insertBefore($extraslider);
								$(".owl2-dots", $element).insertAfter($(".owl2-prev", $element));
							
						});

						$extraslider.owlCarousel2({
							rtl: false,
							margin: 30,
							slideBy: 1,
							autoplay: 0,
							autoplayHoverPause: 0,
							autoplayTimeout: 0 ,
							autoplaySpeed: 1000 ,
							startPosition: 0 ,
							mouseDrag: 1,
							touchDrag: 1 ,
							autoWidth: false,
							responsive: {
								0: 	{ items: 1 } ,
								480: { items: 2 },
								768: { items: 3 },
								992: { items: 3 },
								1200: {items: 5}
							},
							dotClass: "owl2-dot",
							dotsClass: "owl2-dots",
							dots: false ,
							dotsSpeed:500 ,
							nav: true ,
							loop: false ,
							navSpeed: 500 ,
							navText: ["&#171 ", "&#187 "],
							navClass: ["owl2-prev", "owl2-next"]

						});

						$extraslider.on("translate.owl.carousel2", function (e) {
				        	 
				        	var $item_active = $(".owl2-item.active", $element);
				        	_UngetAnimate($item_active);
				        	_getAnimate($item_active);
				        });
				        $extraslider.on("translated.owl.carousel2", function (e) {
				        	 
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
				        	if (_effect == "none") return;
				        	//if ($.browser.msie && parseInt($.browser.version, 10) <= 9) return;
				        	$extraslider.removeClass("extra-animate");
				        	$el.each(function (i) {
				        		var $_el = $(this);
				        		var i= i + 1;
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
					})("#so_extra_slider_1327329431619247751 ");
				});
				//]]>
                                
                                jQuery(document).ready(function ($) {
					(function (element) {
						var $element = $(element),
								$extraslider = $(".extraslider-inner", $element),
								_delay = 500 ,
								_duration = 800 ,
								_effect = 'none ';

						$extraslider.on("initialized.owl.carousel2", function () {
							var $item_active = $(".owl2-item.active", $element);
							if ($item_active.length > 1 && _effect != "none") {
								_getAnimate($item_active);
							}
							else {
								var $item = $(".owl2-item", $element);
								$item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});
							}
							
							 
								$(".owl2-controls", $element).insertBefore($extraslider);
								$(".owl2-dots", $element).insertAfter($(".owl2-prev", $element));
							
						});

						$extraslider.owlCarousel2({
							rtl: false,
							margin: 30,
							slideBy: 1,
							autoplay: 0,
							autoplayHoverPause: 0,
							autoplayTimeout: 0 ,
							autoplaySpeed: 1000 ,
							startPosition: 0 ,
							mouseDrag: 1,
							touchDrag: 1 ,
							autoWidth: false,
							responsive: {
								0: 	{ items: 1 } ,
								480: { items: 2 },
								768: { items: 3 },
								992: { items: 3 },
								1200: {items: 5}
							},
							dotClass: "owl2-dot",
							dotsClass: "owl2-dots",
							dots: false ,
							dotsSpeed:500 ,
							nav: true ,
							loop: false ,
							navSpeed: 500 ,
							navText: ["&#171 ", "&#187 "],
							navClass: ["owl2-prev", "owl2-next"]

						});

						$extraslider.on("translate.owl.carousel2", function (e) {
				        	 
				        	var $item_active = $(".owl2-item.active", $element);
				        	_UngetAnimate($item_active);
				        	_getAnimate($item_active);
				        });
				        $extraslider.on("translated.owl.carousel2", function (e) {
				        	 
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
				        	if (_effect == "none") return;
				        	//if ($.browser.msie && parseInt($.browser.version, 10) <= 9) return;
				        	$extraslider.removeClass("extra-animate");
				        	$el.each(function (i) {
				        		var $_el = $(this);
				        		var i= i + 1;
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
					})("#so_extra_slider_2 ");
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
<script>
$(".product_quantity_up").on("click", function(){
    if ($("input[name='SOLUONGMUA']").val() >= {{$ct_sp->KHO}}){
            $("input[name='SOLUONGMUA']").val({{$ct_sp->KHO - 1}});
    }
    
});

$("input[name='SOLUONGMUA']").keyup(function(){
    if ($("input[name='SOLUONGMUA']").val() >= {{$ct_sp->KHO}}){
            $("input[name='SOLUONGMUA']").val({{$ct_sp->KHO}});
    }
});

</script>
         
@endsection