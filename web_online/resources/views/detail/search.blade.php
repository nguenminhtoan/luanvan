@extends('layouts.layout_detail')
@section('title', "Search")
@section('content')


<div class="breadcrumbs ">
   <div class="container">
      <div class="current-name">	  
        Tìm kiếm
      </div>
      <ul class="breadcrumb">
         <li><a href="/home"><i class="fa fa-home"></i></a></li>
         <li><a href="/search">Tìm kiếm</a></li>
      </ul>
   </div>
</div>
<div class="container product-listing content-main ">
    <div class="row">
    <aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column sidebar-offcanvas ">
       <span id="close-sidebar" class="fa fa-times"></span>
       <div class="module so_filter_wrap block-shopby">
          <h3 class="modtitle">Lọc sản phẩm</h3>
          <div class="modcontent">
          <form action="/search" method="get">
             <ul data-product_id="">
                <li class="so-filter-options" data-option="search">
                   <div class="so-filter-heading">
                      <div class="so-filter-heading-text">
                         <span>Tìm kiếm</span>
                      </div>
                      <i class="fa fa-chevron-down"></i>
                   </div>
                   <div class="so-filter-content-opts">
                      <div class="so-filter-content-opts-container">
                         <div class="so-filter-option" data-type="search">
                            <div class="so-option-container">
                               <div class="input-group">
                                  <input type="text" class="form-control" name="search" id="text_search" value="{{$search}}">
                                  <div class="input-group-btn">
                                      <button class="btn btn-default" type="submit" id="submit_text_search"><i class="fa fa-search"></i></button>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </li>
                <li class="so-filter-options" data-option="Price">
                   <div class="so-filter-heading">
                      <div class="so-filter-heading-text">
                         <span>Giá</span>
                      </div>
                      <i class="fa fa-chevron-down"></i>
                   </div>
                   <div class="so-filter-content-opts">
                            <div class="so-filter-content-opts-container">
                                    <div class="so-filter-content-wrapper so-filter-iscroll">
                                            <div class="so-filter-options">
                                                    <div class="so-filter-option so-filter-price">
                                                            <div class="content_min_max">
                                                                    <div class="put-min put-min_max">
                                                                        <input name="giamin" type="text" class="input_min form-control" value="{{$giamin}}" min="0" max="20000000">
                                                                    <span class="name-curent">VNĐ</span></div>
                                                                    <div class="put-max put-min_max"> 
                                                                    <input type="text" name="giamax" class="input_max form-control" value="{{$giamax}}" min="0" max="20000000">
                                                                    <span class="name-curent">VNĐ</span>
                                                                    </div>
                                                            </div>
                                                            <div class="content_scroll">
                                                                    <div id="slider-range"></div>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                    </div>
                </li>
                
                @foreach($thuoctinh as $k => $item)
                <li class="so-filter-options" data-option="Select">
                   <div class="so-filter-heading">
                      <div class="so-filter-heading-text">
                         <span>{{ $item[0]->TEN_THUOCTINH }}</span>
                      </div>
                      <i class="fa fa-chevron-down"></i>
                   </div>
                   <div class="so-filter-content-opts">
                      <div class="so-filter-content-opts-container">
                        @foreach($item as $key => $row )
                         <div class="so-filter-option opt-select  opt_enable" >
                            <div class="so-option-container">
                               <input name="thuoctinh[0][]" type="hidden" value="{{ $row->MA_THUOCTINH }}" {{ array_search($row->GIATRI, $tt_sp[1]) != '' ? '' : 'disabled' }} >
                               <input id="option_{{$k.$key}}" name="thuoctinh[1][]" type="checkbox" value="{{ $row->GIATRI }}" {{ array_search($row->GIATRI, $tt_sp[1]) != '' ? 'checked' : '' }} onclick="check_box(this);" >
                               <label for="option_{{$k.$key}}"> {{ $row->GIATRI }}</label>
                               <div class="option-count ">
                                  <i class="fa fa-times"></i>
                               </div>
                            </div>
                         </div>
                          @endforeach
                      </div>
                   </div>
                </li>
                @endforeach
                <li class="so-filter-options" data-option="Subcategory">
                   <div class="so-filter-heading">
                      <div class="so-filter-heading-text">
                         <span>Danh mục</span>
                      </div>
                      <i class="fa fa-chevron-down"></i>
                   </div>
                   <div class="so-filter-content-opts">
                      @foreach($danhmuc as $key => $item)
                      @if($item->DAN_MA_DANHMUC == "")
                      <div class="so-filter-content-opts-container">
                         <div class="so-filter-option-sub so-filter-option opt-select  " >
                            <div class="so-option-container">
                               <input id="danhmuc_{{$key}}" name="ma_danhmuc[]" type="checkbox" value="{{ $item->MA_DANHMUC }}" {{ array_search($item->MA_DANHMUC, $ma_dm) != ''  ? 'checked' : '' }}  >
                               <label for="danhmuc_{{$key}}"><img class="hidden" src="{{$item->HINHANH}}"> {{$item->TEN_DANHMUC}}</label>
                               <div class="option-count ">
                                  <i class="fa fa-times"></i>
                               </div>
                            </div>
                         </div>
                      </div>
                      @endif
                      @endforeach
                   </div>
                </li>
             </ul>
             <div class="clear_filter">
                <a href="javascript:;" class="btn btn-default inverse" id="btn_resetAll">
                <span class="hidden fa fa-times" aria-hidden="true"></span> Reset All
                </a>
             </div>
          </form>
          </div>
       </div>
       <script type="text/javascript">
          //<![CDATA[
          
          
        function check_box(envt){
            if ($(envt).prop("checked")){
                $(envt).closest(".so-option-container").find("input").eq(0).removeAttr("disabled");
            }else{
                $(envt).closest(".so-option-container").find("input").eq(0).attr("disabled", true);
            }
        }
          jQuery(window).load(function($){
            $ = typeof($ !== 'funtion') ? jQuery : $;
            
            

            var obj_class 			= $('#content .row').find('.product-layout').parent(),
                    product_arr_all 	= $(".so_filter_wrap .modcontent ul").attr("data-product_id"),
                    opt_value_id		= "",
                    att_value_id		= "",
                    manu_value_id		= "",
                    subcate_value_id	= "",
                    $minPrice			= 0,
                    $maxPrice 			= 20000000,
                    $minPrice_new 		= 500000,
                    $maxPrice_new 		= 500000,
                    url 				= '/search';
                    search			= "";


                    var range = document.getElementById('slider-range');
                    noUiSlider.create(range, {
                            start: [$minPrice_new, $maxPrice_new],
                            step: 50000,
                            connect: true,
                            range: {
                                    'min': $minPrice,
                                    'max': $maxPrice
                            },
                            slide: function(event, ui) {
                        if ($minPrice == $maxPrice) {
                            return false;
                        }
                    }
                    });
                    var valueMin = $('.content_min_max .input_min'),
                         valueMax = $('.content_min_max .input_max');

                    range.noUiSlider.on('change', function( values, handle ) {
                            if ( handle ) {

                                    valueMax.val(values[handle]);
                                    $maxPrice_new = values[handle];
                                    if(url.indexOf("maxPrice") != -1){
                                            if($maxPrice_new != "169"){
                                                    url = url.replace(/(&maxPrice=)[^\&]+/,'&maxPrice='+$maxPrice_new);
                                            }else{
                                                    url = url.replace(/(&maxPrice=)[^\&]+/,'');
                                                    location.href= url;
                                            }
                                    }else{
                                            url = url+'&maxPrice='+$maxPrice_new;
                                    }
                            } else {
                                    valueMin.val(values[handle]);
                                    $minPrice_new = values[handle];
                                    if(url.indexOf("minPrice") != -1){
                                            if($minPrice_new != "66"){
                                                    url = url.replace(/(&minPrice=)[^\&]+/,'&minPrice='+$minPrice_new);
                                            }else{
                                                    url = url.replace(/(&minPrice=)[^\&]+/,'');
                                                    location.href= url;
                                            }
                                    }else{
                                            url = url+'&minPrice='+$minPrice_new;
                                    }
                            }
                            obj_class.find(".product-layout").css('display','none');
                           

                    });

                    range.noUiSlider.on('end', function( values, handle ) {
                            if ( handle ) {
                                    $maxPrice_new = values[handle];
                                    if(url.indexOf("maxPrice") != -1){
                                            if($maxPrice_new != "169"){
                                                    url = url.replace(/(&maxPrice=)[^\&]+/,'&maxPrice='+$maxPrice_new);
                                            }else{
                                                    url = url.replace(/(&maxPrice=)[^\&]+/,'');
                                                    location.href= url;
                                            }
                                    }else{
                                            url = url+'&maxPrice='+$maxPrice_new;
                                    }

                            } else {
                                    $minPrice_new = values[handle];
                                    if(url.indexOf("minPrice") != -1){
                                            if($minPrice_new != "66"){
                                                    url = url.replace(/(&minPrice=)[^\&]+/,'&minPrice='+$minPrice_new);
                                            }else{
                                                    url = url.replace(/(&minPrice=)[^\&]+/,'');
                                                    location.href= url;
                                            }
                                    }else{
                                            url = url+'&minPrice='+$minPrice_new;
                                    }

                            }
                            obj_class.find(".product-layout").css('display','none');
                            
                    });

                    $('.content_min_max .input_min').change(function(){
                            var valueMin = $(this).val();
                            var maxPrice__ = getUrlVars()["maxPrice"];

                            if(typeof maxPrice__ === 'undefined'){
                                    $maxPrice_new = 20000000;
                            }else{
                                    $maxPrice_new = maxPrice__;
                            }
                            if(valueMin < 66){
                                    valueMin = 66;
                                    $(this).val(valueMin);
                            }
                            if(valueMin > 169){
                                    valueMin = 169;
                                    $(this).val(valueMin);
                            }
                            range.noUiSlider.set([valueMin,null]);
                            if(url.indexOf("minPrice") != -1){
                                    if(valueMin != "66"){
                                            url = url.replace(/(&minPrice=)[^\&]+/,'&minPrice='+valueMin);
                                    }else{
                                            url = url.replace(/(&minPrice=)[^\&]+/,'');
                                            location.href= url;
                                    }
                            }else{
                                    url = url+'&minPrice='+valueMin;
                            }
                            obj_class.find(".product-layout").css('display','none');
                           
                            $minPrice_new = valueMin;
                    });

                    $('.content_min_max .input_max').change(function(){
                            var valueMax = $(this).val();
                            var minPrice__ = getUrlVars()["minPrice"];
                            if(typeof minPrice__ === 'undefined'){
                                    $minPrice_new = 66;
                            }else{
                                    $minPrice_new = minPrice__;
                            }
                            if(valueMax > 169){
                                    valueMax = 169;
                                    $(this).val(valueMax);
                            }
                            if(valueMax < 66){
                                    valueMax = 169;
                                    $(this).val(valueMax);
                            }
                            range.noUiSlider.set([null, valueMax]);
                            if(url.indexOf("maxPrice") != -1){
                                    if(valueMax != "20000000"){
                                            url = url.replace(/(&maxPrice=)[^\&]+/,'&maxPrice='+valueMax);
                                    }else{
                                            url = url.replace(/(&maxPrice=)[^\&]+/,'');
                                            location.href= url;
                                    }
                            }else{
                                    url = url+'&maxPrice='+valueMax;
                            }
                            obj_class.find(".product-layout").css('display','none');
                      
                            $maxPrice_new = valueMax;
                    });

                           

                    $('#btn_resetAll').on("click",function(){
                        $("input[name='search']").val("");
                        $("input[name='giamin']").val(0);
                        $("input[name='giamax']").val(20000000);
                        $("input[name='thuoctinh[0][]']").prop("disabled",true);
                        $("input[type='checkbox'").prop("checked",false);
                    });


          });
          //]]>
       </script>
    </aside>
    <div id="content" class="col-md-9 col-sm-12 col-xs-12 fluid-sidebar">
       <div id="so-groups" class="right so-groups-sticky hidden-xs" style="top: 196px">
          <a class="sticky-categories" data-target="popup" data-popup="#popup-categories"><span>Categories</span><i class="fa fa-align-justify"></i></a>
          <a class="sticky-mycart" data-target="popup" data-popup="#popup-mycart"><span>Cart</span><i class="fa fa-shopping-cart"></i></a>
          <a class="sticky-myaccount" data-target="popup" data-popup="#popup-myaccount"><span>Account</span><i class="fa fa-user"></i></a>
          <a class="sticky-mysearch" data-target="popup" data-popup="#popup-mysearch"><span>Search</span><i class="fa fa-search"></i></a>
          <a class="sticky-recent" data-target="popup" data-popup="#popup-recent"><span>Recent View</span><i class="fa fa-recent"></i></a>
          
       </div>
        
<div class="module so-listing-tabs-ltr ">
    <div class="modcontent">
        <!--[if lt IE 9]>
        <div id="so_listing_tabs_184" class="so-listing-tabs msie lt-ie9 first-load module"><![endif]-->
        <!--[if IE 9]>
        <div id="so_listing_tabs_184" class="so-listing-tabs msie first-load module"><![endif]-->
        <!--[if gt IE 9]><!-->
        <div id="so_listing_tabs_184" class="so-listing-tabs category-featured module"><!--<![endif]-->
            <div class="ltabs-wrap ">
                <div class="ltabs-tabs-container" data-delay="500"
                     data-duration="800"
                     data-effect="none"
                     data-ajaxurl="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=product/category&path=33&minPrice=84.00&maxPrice=154.00" data-type_source="1"
                     data-type_show="slider" >

                    <div class="ltabs-tabs-wrap">
                        <span class='ltabs-tab-selected'></span>
                        <span class="ltabs-tab-arrow">▼</span>
                        <ul class="ltabs-tabs cf list-sub-cat font-title">


                            <li class="ltabs-tab   tab-sel tab-loaded "
                                data-category-id="sell"
                                data-active-content-l=".items-category-sell
                                ">
                                <span class="ltabs-tab-label">
                                    Bán chạy
                                </span>
                            </li>
                            <li class="ltabs-tab  "
                                data-category-id="p_date_added"
                                data-active-content-l=".items-category-p_date_added">
                                <span class="ltabs-tab-label">
                                    
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wap-listing-tabs products-list grid">
                    <div class="so-loadeding" ></div>
                    <div class="ltabs-items-container">
                        <div class="products-list ltabs-items  ltabs-items-selected ltabs-items-loaded items-category-sell" data-total="6">
                            <div class="ltabs-items-inner owl2-carousel  ltabs-slider ">
                                @foreach($banchay as $item)
                                <div class="ltabs-item ">
                                    <div class="item-inner product-layout transition">
                                        <div class="product-item-container">
                                            <div class="left-block col-sm-5">		
                                                <div class="product-image-container 	">
                                                    <a href="/detail/{{$item->MA_SP}}" target="_self" title="{{$item->TEN_SP}}"  >
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

                                            </div>
                                            <div class="right-block  col-sm-7">
                                                <div class="caption">
                                                    <h4><a href="/detail/{{$item->MA_SP}}" title="{{$item->TEN_SP}}" target="_self" >{{$item->TEN_SP}}</a></h4>
                                                    <div class="rating">
                                                        <div class="rating-box">
                                                            <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 0 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 1 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 2 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 3 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa {{$item->DANHGIA > 4 ? 'fa-star' : 'fa-star-o'}} fa-stack-2x"></i></span>
                                                        </div>
                                                        <a class="rating-num"  href="/detail/{{$item->MA_SP}}" rel="nofollow" target="_blank" >(1)</a>
                                                    </div>
                                                     <div  class="price">
                                                        <span class="price-new">{{number_format($item->GIAMOI)}}VNĐ</span>&nbsp;&nbsp;
                                                        <span class="price-old">{{ $item->GIA != $item->GIAMOI ? number_format($item->GIA).'VNĐ' : ' ' }}</span>
                                                    </div>
                                                    <div class="item-available">
                                                        <div class="row">
                                                            <span class="col-sm-5 text-right">Bán: <b>{{$item->SOLUONG}}</b>  </span>
                                                            <span class="col-sm-7 text-left">Còn: <b>{{$item->KHO}}</b> </span>
                                                        </div>
                                                        <div class="available">
                                                            <span class="color_width" data-title="{{round(($item->SOLUONG/$item->TONGSL)*100)}}%" data-toggle='tooltip' style="width:{{round(($item->SOLUONG/$item->TONGSL)*100)}}%"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button-group so-quickview ">
                                                    <button type="button" class="addToCart " title="Thêm vào giỏ hàng" {{ $item->KHO < 1 ? 'disabled' : '' }} onclick="add_cart({{$item->MA_SP}}, '1');"><span>{{ $item->KHO < 1 ? 'Bán hết' : 'Thêm vào giỏ hàng' }}</span>					
                                                    </button>
                                                    <a class="hidden" data-product='{{$item->MA_SP}}' href="/detail/{{$item->MA_SP}}" target="_self" ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <script type="text/javascript">
                                jQuery(document).ready(function ($) {
                                    var $tag_id = $('#so_listing_tabs_184'),
                                            parent_active = $('.items-category-sell', $tag_id),
                                            total_product = parent_active.data('total'),
                                            tab_active = $('.ltabs-items-inner', parent_active),
                                            nb_column0 = 3,
                                            nb_column1 = 2,
                                            nb_column2 = 2,
                                            nb_column3 = 1,
                                            nb_column4 = 1;
                                    tab_active.owlCarousel2({
                                        rtl: false,
                                        nav: false,
                                        dots: true,
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
                                                nav: total_product <= nb_column0 ? false : ((false) ? true : false),
                                            },
                                            480: {
                                                items: nb_column3,
                                                nav: total_product <= nb_column0 ? false : ((false) ? true : false),
                                            },
                                            768: {
                                                items: nb_column2,
                                                nav: total_product <= nb_column0 ? false : ((false) ? true : false),
                                            },
                                            992: {
                                                items: nb_column1,
                                                nav: total_product <= nb_column0 ? false : ((false) ? true : false),
                                            },
                                            1200: {
                                                items: nb_column0,

                                                nav: total_product <= nb_column0 ? false : ((false) ? true : false),
                                            }
                                        }
                                    });
                                });
                            </script>


                        </div>
                        <div class="products-list ltabs-items  items-category-p_date_added" data-total="6">
                            <div class="ltabs-loading"></div>

                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
//<![CDATA[
                jQuery(document).ready(function ($) {
                    ;
                    (function (element) {
                        var $element = $(element),
                                $tab = $('.ltabs-tab', $element),
                                $tab_label = $('.ltabs-tab-label', $tab),
                                $tabs = $('.ltabs-tabs', $element),
                                ajax_url = $tabs.parents('.ltabs-tabs-container').attr('data-ajaxurl'),
                                effect = $tabs.parents('.ltabs-tabs-container').attr('data-effect'),
                                delay = $tabs.parents('.ltabs-tabs-container').attr('data-delay'),
                                duration = $tabs.parents('.ltabs-tabs-container').attr('data-duration'),
                                type_source = $tabs.parents('.ltabs-tabs-container').attr('data-type_source'),
                                $items_content = $('.ltabs-items', $element),
                                $items_inner = $('.ltabs-items-inner', $items_content),
                                $items_first_active = $('.ltabs-items-selected', $element),
                                $load_more = $('.ltabs-loadmore', $element),
                                $btn_loadmore = $('.ltabs-loadmore-btn', $load_more),
                                $select_box = $('.ltabs-selectbox', $element),
                                $tab_label_select = $('.ltabs-tab-selected', $element),
                                setting = 'a:74:{s:6:"action";s:9:"save_edit";s:4:"name";s:17:"Category Features";s:18:"module_description";a:2:{i:2;a:1:{s:9:"head_name";s:17:"Category Features";}i:1;a:1:{s:9:"head_name";s:17:"Category Features";}}s:9:"head_name";s:17:"Category Features";s:17:"disp_title_module";s:1:"0";s:6:"status";s:1:"1";s:12:"store_layout";s:8:"category";s:12:"class_suffix";s:0:"";s:16:"item_link_target";s:5:"_self";s:10:"nb_column0";s:1:"3";s:10:"nb_column1";s:1:"2";s:10:"nb_column2";s:1:"2";s:10:"nb_column3";s:1:"1";s:10:"nb_column4";s:1:"1";s:9:"type_show";s:6:"slider";s:6:"nb_row";s:1:"1";s:11:"type_source";s:1:"1";s:8:"category";a:2:{i:0;s:2:"24";i:1;s:3:"102";}s:14:"child_category";s:1:"1";s:14:"category_depth";s:1:"1";s:12:"product_sort";s:12:"p.date_added";s:16:"product_ordering";s:4:"DESC";s:12:"source_limit";s:1:"6";s:13:"catid_preload";s:1:"*";s:17:"field_product_tab";a:2:{i:0;s:12:"p_date_added";i:1;s:4:"sell";}s:13:"field_preload";s:4:"sell";s:15:"tab_all_display";s:1:"1";s:18:"tab_max_characters";s:2:"25";s:16:"tab_icon_display";s:1:"1";s:12:"cat_order_by";s:4:"name";s:15:"imgcfgcat_width";s:2:"30";s:16:"imgcfgcat_height";s:2:"30";s:13:"display_title";s:1:"1";s:15:"title_maxlength";s:2:"50";s:19:"display_description";s:1:"0";s:21:"description_maxlength";s:3:"100";s:13:"display_price";s:1:"1";s:19:"display_add_to_cart";s:1:"1";s:16:"display_wishlist";s:1:"0";s:15:"display_compare";s:1:"0";s:14:"display_rating";s:1:"1";s:12:"display_sale";s:1:"1";s:11:"display_new";s:1:"1";s:8:"date_day";s:1:"7";s:17:"product_image_num";s:1:"1";s:13:"product_image";s:1:"1";s:22:"product_get_image_data";s:1:"1";s:23:"product_get_image_image";s:1:"1";s:5:"width";s:3:"270";s:6:"height";s:3:"270";s:24:"product_placeholder_path";s:11:"nophoto.png";s:20:"display_banner_image";s:1:"0";s:12:"banner_image";s:12:"no_image.png";s:12:"banner_width";s:3:"150";s:13:"banner_height";s:3:"250";s:16:"banner_image_url";s:0:"";s:6:"effect";s:4:"none";s:8:"duration";s:3:"800";s:5:"delay";s:3:"500";s:8:"autoplay";s:1:"0";s:11:"display_nav";s:1:"0";s:12:"display_loop";s:1:"1";s:9:"touchdrag";s:1:"1";s:9:"mousedrag";s:1:"1";s:10:"pausehover";s:1:"0";s:15:"autoplayTimeout";s:4:"5000";s:13:"autoplaySpeed";s:4:"1000";s:8:"pre_text";s:0:"";s:9:"post_text";s:0:"";s:9:"use_cache";s:1:"0";s:10:"cache_time";s:4:"3600";s:8:"moduleid";s:3:"184";s:11:"cfp_setting";a:5:{s:43:"module_so_call_for_price_send_mail_customer";s:1:"1";s:37:"module_so_call_for_price_send_mail_to";s:17:"contact@ytcvn.com";s:37:"module_so_call_for_price_replace_cart";s:1:"0";s:34:"module_so_call_for_price_hide_cart";s:1:"0";s:31:"module_so_call_for_price_status";s:1:"1";}s:5:"start";i:0;}',
                                type_show = 'slider';

                        enableSelectBoxes();
                        function enableSelectBoxes() {
                            $tab_wrap = $('.ltabs-tabs-wrap', $element),
                                    $tab_label_select.html($('.ltabs-tab', $element).filter('.tab-sel').children('.ltabs-tab-label').html());
                            if ($(window).innerWidth() <= 991) {
                                $tab_wrap.addClass('ltabs-selectbox');
                            } else {
                                $tab_wrap.removeClass('ltabs-selectbox');
                            }
                        }

                        $('span.ltabs-tab-selected, span.ltabs-tab-arrow', $element).click(function () {
                            if ($('.ltabs-tabs', $element).hasClass('ltabs-open')) {
                                $('.ltabs-tabs', $element).removeClass('ltabs-open');
                            } else {
                                $('.ltabs-tabs', $element).addClass('ltabs-open');
                            }
                        });

                        $(window).resize(function () {
                            if ($(window).innerWidth() <= 991) {
                                $('.ltabs-tabs-wrap', $element).addClass('ltabs-selectbox');
                            } else {
                                $('.ltabs-tabs-wrap', $element).removeClass('ltabs-selectbox');
                            }
                        });

                        function showAnimateItems(el) {
                            var $_items = $('.new-ltabs-item', el), nub = 0;
                            $('.ltabs-loadmore-btn', el).fadeOut('fast');
                            $_items.each(function (i) {
                                nub++;
                                switch (effect) {
                                    case 'none' :
                                        $(this).css({'opacity': '1', 'filter': 'alpha(opacity = 100)'});
                                        break;
                                    default:
                                        animatesItems($(this), nub * delay, i, el);
                                }
                                if (i == $_items.length - 1) {
                                    $('.ltabs-loadmore-btn', el).fadeIn(3000);
                                }
                                $(this).removeClass('new-ltabs-item');
                            });
                        }

                        function animatesItems($this, fdelay, i, el) {
                            var $_items = $('.ltabs-item', el);
                            $this.stop(true, true).attr("style",
                                    "-webkit-animation:" + effect + " " + duration + "ms;"
                                    + "-moz-animation:" + effect + " " + duration + "ms;"
                                    + "-o-animation:" + effect + " " + duration + "ms;"
                                    + "-moz-animation-delay:" + fdelay + "ms;"
                                    + "-webkit-animation-delay:" + fdelay + "ms;"
                                    + "-o-animation-delay:" + fdelay + "ms;"
                                    + "animation-delay:" + fdelay + "ms;").delay(fdelay).animate({
                                opacity: 1,
                                filter: 'alpha(opacity = 100)'
                            }, {
                                delay: 1000
                            });
                            if (i == ($_items.length - 1)) {
                                $(".ltabs-items-inner").addClass("play");
                            }
                        }
                        if (type_show == 'loadmore') {
                            showAnimateItems($items_first_active);
                        }
                        $tab.on('click.ltabs-tab', function () {
                            var $this = $(this);
                            if ($this.hasClass('tab-sel'))
                                return false;
                            if ($this.parents('.ltabs-tabs').hasClass('ltabs-open')) {
                                $this.parents('.ltabs-tabs').removeClass('ltabs-open');
                            }

                            $tab.removeClass('tab-sel');
                            $this.addClass('tab-sel');
                            var items_active = $this.attr('data-active-content-l');
                            var _items_active = $(items_active, $element);
                            $items_content.removeClass('ltabs-items-selected');
                            _items_active.addClass('ltabs-items-selected');
                            $tab_label_select.html($tab.filter('.tab-sel').children('.ltabs-tab-label').html());
                            var $loading = $('.ltabs-loading', _items_active);
                            var loaded = _items_active.hasClass('ltabs-items-loaded');
                            type_show = $tabs.parents('.ltabs-tabs-container').attr('data-type_show');
                            if (!loaded && !_items_active.hasClass('ltabs-process')) {
                                _items_active.addClass('ltabs-process');
                                var category_id = $this.attr('data-category-id');
                                //var see_all 		= $this.attr('data-seeall');
                                $loading.show();
                                $.ajax({
                                    type: 'POST',
                                    url: ajax_url,
                                    data: {
                                        is_ajax_listing_tabs: 1,
                                        ajax_reslisting_start: 0,
                                        categoryid: category_id,
                                        setting: setting,
                                        lbmoduleid: 184
                                                //url_seeall: see_all
                                    },
                                    success: function (data) {

                                        if (data.items_markup != '') {
                                            $('.ltabs-loading', _items_active).replaceWith(data.items_markup);
                                            _items_active.addClass('ltabs-items-loaded').removeClass('ltabs-process');
                                            $loading.remove();
                                            if (type_show != 'slider') {
                                                showAnimateItems(_items_active);
                                            }
                                            updateStatus(_items_active);

                                        }



                                        if (typeof (_SoQuickView) != 'undefined') {
                                            _SoQuickView();
                                        }

                                    },
                                    dataType: 'json'
                                });

                            } else {
                                if (type_show == 'loadmore') {
                                    $('.ltabs-item', $items_content).removeAttr('style').addClass('new-ltabs-item');
                                    showAnimateItems(_items_active);
                                } else {
                                    var owl = $('.owl2-carousel', _items_active);
                                    owl = owl.data('owlCarousel2');
                                    if (typeof owl !== 'undefined') {
                                        owl.onResize();
                                    }
                                }
                            }
                        });

                        function updateStatus($el) {
                            $('.ltabs-loadmore-btn', $el).removeClass('loading');
                            var countitem = $('.ltabs-item', $el).length;
                            $('.ltabs-image-loading', $el).css({display: 'none'});
                            $('.ltabs-loadmore-btn', $el).parent().attr('data-rl_start', countitem);
                            var rl_total = $('.ltabs-loadmore-btn', $el).parent().attr('data-rl_total');
                            var rl_load = $('.ltabs-loadmore-btn', $el).parent().attr('data-rl_load');
                            var rl_allready = $('.ltabs-loadmore-btn', $el).parent().attr('data-rl_allready');

                            if (countitem >= rl_total) {
                                $('.ltabs-loadmore-btn', $el).addClass('loaded');
                                $('.ltabs-image-loading', $el).css({display: 'none'});
                                $('.ltabs-loadmore-btn', $el).attr('data-label', rl_allready);
                                $('.ltabs-loadmore-btn', $el).removeClass('loading');
                            }
                        }

                        $btn_loadmore.on('click.loadmore', function () {
                            var $this = $(this);
                            if ($this.hasClass('loaded') || $this.hasClass('loading')) {
                                return false;
                            } else {
                                $this.addClass('loading');
                                $('.ltabs-image-loading', $this).css({display: 'inline-block'});
                                var rl_start = $this.parent().attr('data-rl_start'),
                                        rl_ajaxurl = $this.parent().attr('data-ajaxurl'),
                                        effect = $this.parent().attr('data-effect'),
                                        category_id = $this.parent().attr('data-categoryid'),
                                        items_active = $this.parent().attr('data-active-content');

                                var _items_active = $(items_active, $element);

                                $.ajax({
                                    type: 'POST',
                                    url: rl_ajaxurl,
                                    data: {
                                        is_ajax_listing_tabs: 1,
                                        ajax_reslisting_start: rl_start,
                                        categoryid: category_id,
                                        setting: setting,
                                        lbmoduleid: 184
                                    },
                                    success: function (data) {
                                        if (data.items_markup != '') {
                                            $($(data.items_markup).html()).insertAfter($('.ltabs-item', _items_active).nextAll().last());
                                            $('.ltabs-image-loading', $this).css({display: 'none'});
                                            showAnimateItems(_items_active);
                                            updateStatus(_items_active);
                                        }
                                        if (typeof (_SoQuickView) != 'undefined') {
                                            _SoQuickView();
                                        }
                                    }, dataType: 'json'
                                });
                            }
                            return false;
                        });
                    })('#so_listing_tabs_184');
                });
//]]>
            </script>
        </div>
    </div> <!-- /.modcontent-->

</div>	
             <div class="products-category clearfix">
                
                <h3 class="title-category ">Sản phẩm</h3>
                <div class="product-filter product-filter-top filters-panel">
                   <div class="row">
                      <div class="col-md-3 col-sm-5 view-mode">
                         <a href="javascript:void(0)" class="open-sidebar hidden-lg hidden-md"><i class="fa fa-bars"></i>Sidebar</a>
                         <div class="sidebar-overlay "></div>
                         <div class="list-view">
                            <div class="btn btn-gridview">Grid View:</div>
                            <button type="button" id="grid-view-4" class="btn btn-view hidden-sm hidden-xs active"><i class="fa fas fa-th"></i></button>
                            <button type="button" id="grid-view" class="btn btn-default grid hidden-lg hidden-md" title="Grid"><i class="fa fa-th-large"></i></button>
                            <button type="button" id="list-view" class="btn btn-default list" title="List"><i class="fa fa-bars"></i></button>
                            <button type="button" id="table-view" class="btn btn-view"><i class="fa fa-table" aria-hidden="true"></i></button>
                         </div>
                      </div>
                      <div class="short-by-show form-inline text-right col-md-9 col-sm-7 col-xs-12">
                         <div class="form-group short-by">
                            <label class="control-label" for="input-sort">Sắp xếp bởi:</label>
                            <select id="input-sort" class="form-control" onchange="location = this.value;">
                               <option value="/index.php?route=product/category&amp;path=33&amp;sort=p.sort_order&amp;order=ASC" selected="selected">Mặc định</option>
                               <option value="/index.php?route=product/category&amp;path=33&amp;sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                               <option value="/index.php?route=product/category&amp;path=33&amp;sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                               <option value="/index.php?route=product/category&amp;path=33&amp;sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                               <option value="/index.php?route=product/category&amp;path=33&amp;sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                               <option value="/index.php?route=product/category&amp;path=33&amp;sort=rating&amp;order=DESC">Rating (Highest)</option>
                               <option value="/index.php?route=product/category&amp;path=33&amp;sort=rating&amp;order=ASC">Rating (Lowest)</option>
                               <option value="/index.php?route=product/category&amp;path=33&amp;sort=p.model&amp;order=ASC">Model (A - Z)</option>
                               <option value="/index.php?route=product/category&amp;path=33&amp;sort=p.model&amp;order=DESC">Model (Z - A)</option>
                            </select>
                         </div>
                         <div class="form-group">
                            <label class="control-label" for="input-limit">Hiển thị:</label>
                            <select id="input-limit" class="form-control" onchange="location = this.value;">
                               <option value="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=product/category&amp;path=33&amp;limit=15" selected="selected">15</option>
                               <option value="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=product/category&amp;path=33&amp;limit=25">25</option>
                               <option value="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=product/category&amp;path=33&amp;limit=50">50</option>
                               <option value="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=product/category&amp;path=33&amp;limit=75">75</option>
                               <option value="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=product/category&amp;path=33&amp;limit=100">100</option>
                            </select>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="products-list row nopadding-xs so-filter-gird">
                    @foreach($sanpham as $item)
                    <div class="product-layout product-grid product-grid-4 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                       <div class="product-item-container">
                          <div class="left-block left-b">
                             <div class="product-card__gallery product-card__right">
                                @foreach($item->HINHANH as $key => $hinh)
                                <div class="item-img {{$key == 0 ? 'thumb-active' : ''}}" data-src="{{$hinh->URL}}"><img class="lazyautosizes lazyloaded" width="42px" height="42px" data-sizes="42px" src="{{$hinh->URL}}" alt="{{$item->TEN_SP}}" sizes="46px"></div>
                                @endforeach
                             </div>
                             <div class="product-image-container">
                                <a href="/detail/{{$item->MA_SP}}" title="{{$item->TEN_SP}}">
                                    <img src="{{ $item->HINHANH ? $item->HINHANH[0]->URL : ''}}" alt="{{$item->TEN_SP}}" title="{{$item->TEN_SP}}" class="lazyautosizes lazyloaded" height="220px"  sizes="180px">
                                </a>
                             </div>
                             <div class="box-label">
                                 @if ($item->GIAMOI < $item->GIA)
                                    @if((round((1-($item->GIAMOI/$item->GIA))*100))>0)
                                    <span class="label-product label-sale">
                                    -{{ round((1-($item->GIAMOI/$item->GIA))*100) }}%
                                    </span>
                                    @endif
                                 @endif   
                             </div>
                             <a class="quickview iframe-link visible-lg btn-button" title="Quickview" data-fancybox-type="iframe" href="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=extension/soconfig/quickview&amp;product_id=82"> <i class="fa fa-eye"></i><span>Quickview</span> </a>
                          </div>
                          <div class="right-block right-b">
                             <div class="button-group cartinfo--static">	
                                <button class="addToCart" type="button" title="Thêm vào giỏ hàng" {{ $item->KHO < 1 ? 'disabled' : '' }} onclick="add_cart({{$item->MA_SP}}, '1');"><span>{{ $item->KHO < 1 ? 'Bán hết' : 'Thêm vào giỏ hàng' }}</span></button>
                             </div>
                             <div class="hide-cont">
                                <div class="rate-history">
                                   <div class="ratings">
                                      <div class="rating-box">
                                         <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 0 ? 'fa-star' : 'fa-star-o' }} fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                         <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 1 ? 'fa-star' : 'fa-star-o' }}  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                         <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 2 ? 'fa-star' : 'fa-star-o' }}  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                         <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 3 ? 'fa-star' : 'fa-star-o' }}  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                         <span class="fa fa-stack"><i class="fa {{ $item->DANHGIA > 4 ? 'fa-star' : 'fa-star-o' }}  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                      </div>
                                      <a class="rating-num" href="" rel="nofollow" target="_blank">({{$item->SL}})</a>
                                   </div>
                                   <div class="order-num">Đã bán ({{$item->SOLUONG}})</div>
                                </div>
                                 <h4><a href="/detail/{{$item->MA_SP}}">{{$item->TEN_SP}}</a></h4>
                             </div>
                             <div class="price">
                                <span class="price-new">{{number_format($item->GIAMOI)}}VNĐ</span>
                                <span class="price-old">{{ $item->GIA != $item->GIAMOI ? number_format($item->GIA).'VNĐ' : ' ' }}</span>
                             </div>
                             <div class="description">
                                 <p>
                                     {!! substr(strip_tags($item->CHI_TIET), 0, 1000)!!} ...
                                 </p>
                             </div>
                          </div>
                          <div class="list-block">
                              <button class="addToCart btn-button" type="button" title="Thêm vào giỏ hàng" {{ $item->KHO < 1 ? 'disabled' : '' }} onclick="add_cart({{$item->MA_SP}}, '1');"><span>{{ $item->KHO < 1 ? 'Bán hết' : 'Thêm vào giỏ hàng' }}</span><i class="fa fa-shopping-cart"></i></button>
                          </div>
                       </div>
                    </div>
                    @endforeach
                </div>
                <div class="product-filter product-filter-bottom filters-panel">
                   <div class="row">
                      <div class="col-sm-6 text-left"></div>
                      <div class="col-sm-6 text-right">Showing 1 to 6 of 6 (1 Pages)</div>
                   </div>
                </div>
                <script type="text/javascript"><!--
                   reinitView();

                   function reinitView() {

                    $( '.product-card__gallery .item-img').hover(function() {
                            $(this).addClass('thumb-active').siblings().removeClass('thumb-active');
                            var thumb_src = $(this).attr("data-src");
                            $(this).closest('.product-item-container').find('img.img-responsive').attr("src",thumb_src);
                    }); 

                    $('.view-mode .list-view button').bind("click", function() {
                            $(this).parent().find('button').removeClass('active');
                            $(this).addClass('active');
                    });	
                    // Product List
                    $('#list-view').click(function() {
                            $('.products-category .product-layout').attr('class', 'product-layout product-list col-xs-12');
                            localStorage.setItem('listview', 'list');
                    });

                    // Product Grid
                    $('#grid-view').click(function() {
                            var cols = $('.left_column , .right_column ').length;


                            $('.products-category .product-layout').attr('class', 'product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12');

                            localStorage.setItem('listview', 'grid');
                    });

                    // Product Grid 2
                    $('#grid-view-2').click(function() {
                            $('.products-category .product-layout').attr('class', 'product-layout product-grid product-grid-2 col-lg-6 col-md-6 col-sm-6 col-xs-12');
                            localStorage.setItem('listview', 'grid-2');
                    });

                    // Product Grid 3
                    $('#grid-view-3').click(function() {
                            $('.products-category .product-layout').attr('class', 'product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12');
                            localStorage.setItem('listview', 'grid-3');
                    });

                    // Product Grid 4
                    $('#grid-view-4').click(function() {
                            $('.products-category .product-layout').attr('class', 'product-layout product-grid product-grid-4 col-lg-3 col-md-4 col-sm-6 col-xs-12');
                            localStorage.setItem('listview', 'grid-4');
                    });

                    // Product Grid 5
                    $('#grid-view-5').click(function() {
                            $('.products-category .product-layout').attr('class', 'product-layout product-grid product-grid-5 col-lg-15 col-md-4 col-sm-6 col-xs-12');
                            localStorage.setItem('listview', 'grid-5');
                    });

                    // Product Table
                    $('#table-view').click(function() {
                            $('.products-category .product-layout').attr('class', 'product-layout product-table col-xs-12');
                            localStorage.setItem('listview', 'table');
                    })


                                    if(localStorage.getItem('listview')== null) localStorage.setItem('listview', 'grid-5');

                    if (localStorage.getItem('listview') == 'table') {
                            $('#table-view').trigger('click');
                    } else if (localStorage.getItem('listview') == 'grid-2'){
                            $('#grid-view-2').trigger('click');
                    } else if (localStorage.getItem('listview') == 'grid-3'){
                            $('#grid-view-3').trigger('click');
                    } else if (localStorage.getItem('listview') == 'grid-4'){
                            $('#grid-view-4').trigger('click');
                    } else if (localStorage.getItem('listview') == 'grid-5'){
                            $('#grid-view-5').trigger('click');
                    } else {
                            $('#list-view').trigger('click');
                    }


                   }

                   //-->
                </script> 				
             </div>
          </div>
          <script type="text/javascript"><!--
             $(window).load(sidebar_sticky_update);
             $(window).resize(sidebar_sticky_update);

                    function sidebar_sticky_update(){
                             var viewportWidth = $(window).width();
                             if (viewportWidth > 1200) {
                            // Initialize the sticky scrolling on an item 
                            sidebar_sticky = 'disable';

                            if(sidebar_sticky=='left'){
                                    $(".left_column").stick_in_parent({
                                        offset_top: 10,
                                        bottoming   : true
                                    });
                            }else if (sidebar_sticky=='right'){
                                    $(".right_column").stick_in_parent({
                                        offset_top: 10,
                                        bottoming   : true
                                    });
                            }else if (sidebar_sticky=='all'){
                                    $(".content-aside").stick_in_parent({
                                        offset_top: 10,
                                        bottoming   : true
                                    });
                            }
                    }
                    }


             //-->
          </script> 
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
	
	   

@stop