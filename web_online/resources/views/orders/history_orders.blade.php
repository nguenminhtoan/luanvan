@extends('layouts.layout_detail')
@section('title',"My_Orders")
@section('content')
<div class="breadcrumbs ">
   <div class="container">
      <div class="current-name">	  
        Hồ sơ cá nhân
      </div>
      <ul class="breadcrumb">
         <li><a href="/home"><i class="fa fa-home"></i></a></li>
         <li><a href="/search">Thông Tin Cá Nhân</a></li>
         <li><a href="/admin/orders/history">Đơn hàng</a></li>
      </ul>
   </div>
</div>
<div class="container product-listing content-main ">
    <div class="row">
        <aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column sidebar-offcanvas ">
            <span id="close-sidebar" class="fa fa-times"></span>
            <div class="module so_filter_wrap block-shopby">
               <h3 class="modtitle">Thông Tin Cá Nhân</h3>
               <div class="modcontent">
                   <ul data-product_id="">
                        <li class="so-filter-options" data-option="Subcategory">
                            <div class="list-group">
                                <a href="/account" class="sticky-myaccount" data-target="popup" data-popup="#popup-myaccount"> <i class="fa fa-user"></i> &nbsp;{{$user->TEN_NGUOIDUNG}}</a> 
                                <a href="/admin/ordes/history" class="list-group-item">Lịch sử mua hàng</a>
                                <a href="#" class="list-group-item">Hợp thư mới</a>
                            </div>
                         </li>
                   </ul>
               </div>
            </div>
        </aside>    
        <div class="module so-listing-tabs-ltr ">
            <div class="modcontent">
                <div id="so_listing_tabs_184" class="so-listing-tabs category-featured module"><!--<![endif]-->
                    <div class="ltabs-wrap ">
                        <div class="ltabs-tabs-container" data-delay="500"
                            data-duration="800"
                            data-effect="none"
                            data-ajaxurl="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=product/category&path=33&minPrice=84.00&maxPrice=154.00" data-type_source="1"
                            data-type_show="slider" >
                           <div class="ltabs-tabs-wrap">
                               <span class='ltabs-tab-selected'>Tất cả</span>
                               <span class="ltabs-tab-arrow">▼</span>
                               <ul class="ltabs-tabs cf list-sub-cat font-title">
                                   <li class="ltabs-tab tab-sel tab-loaded "
                                       data-category-id="sell"
                                       data-active-content-l=".items-category-sell
                                       ">
                                       <span class="ltabs-tab-label">
                                           Tất cả
                                       </span>
                                   </li>
                                   <li class="ltabs-tab  "
                                       data-category-id="p_date_added"
                                       data-active-content-l=".items-category-p_date_added">
                                       <span class="ltabs-tab-label">
                                           Trong giỏ
                                       </span>
                                   </li>
                                   <li class="ltabs-tab  "
                                       data-category-id="d_date_added"
                                       data-active-content-l=".items-category-d_date_added">
                                       <span class="ltabs-tab-label">
                                           Đang giao
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
                                    <div class="ltabs-loading">
                                    </div>

                                </div>
                                <div class="products-list ltabs-items  items-category-d_date_added" data-total="6">
                                    <div class="ltabs-loading">
                                    </div>

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
