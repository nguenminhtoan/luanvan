<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title') &DoubleVerticalBar;   shop</title>
        <link href="/admin_css/images/favicon2.png" rel="icon" />    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- third party css -->
        <link href="{{ URL::asset('/admin_css/css/style.css') }} " rel="stylesheet" type="text/css" />
        <link href="/admin_css/css/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        <!-- App css -->
        <link href="/admin_css/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin_css/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="/admin_css/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <!-- end demo js-->
        <script src="/js/chartjs-example-charts.js"></script>
    </head>
    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="/admin_css/images/logo.png" alt="" height="30">
                    </span>
                    <span class="logo-sm">
                        <img src="/admin_css/images/logo.png" alt="" height="16">
                    </span>
                </a>
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="/admin_css/images/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="/admin_css/images/logo.png" alt="" height="16">
                    </span>
                </a>
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!--- Sidemenu -->
                    <ul class="side-nav">
                        <li class="side-nav-title side-nav-item"></li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span class="badge bg-success float-end">3</span>
                                <span>T???ng quan</span>
                            </a>
                            <div class="collapse" id="sidebarDashboards">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="/admin/dashboard">Ph??n t??ch b??n h??ng</a>
                                    </li>
                                    <li>
                                        <a href="index.html">Marketing</a>
                                    </li>
                                    <li>
                                        <a href="projects.html">D??? ??n</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-title side-nav-item">???ng d???ng</li>
                        <li class="side-nav-item">
                            <a href="/admin/categories/index" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span>Danh m???c s???n ph???m </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="/admin/chat" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> Tr?? chuy???n </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Qu???n l?? s???n ph???m </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="/admin/product/index">T???t c??? s???n ph???m</a>
                                    </li>
                                    <li>
                                        <a href="/admin/product/add">Th??m s???n ph???m</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                                <i class="uil-envelope"></i>
                                <span> Ch??m s??c kh??ch h??ng </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEmail">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="Email.html">Email</a>
                                    </li>
                                    <li>
                                        <a href="readEmail.html">?????c mail</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                                <i class="uil-briefcase"></i>
                                <span> Qu???n l?? shop </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarProjects">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="sellers.html">Nh??n vi??n</a>
                                    </li>
                                    <li>
                                        <a href="/cuahang/{{$cuahang->MA_CUAHANG}}">H??? s?? shop</a>
                                    </li>
                                    <li>
                                        <a href="/admin/industries/index">Ng??nh H??ng shop</a>
                                    </li>
                                    <li>
                                        <a href="createproject.html">Trang tr?? shop<span class="badge rounded-pill badge-light-lighten font-10 float-end">New</span></a>
                                    </li>
                                    <li>
                                        <a href="/admin/categories/index">Danh m???c c???a shop <span class="badge rounded-pill badge-success-lighten font-10 float-end">New</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebargoods" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                                <i class="uil-briefcase"></i>
                                <span> Qu???n l?? nh???p h??ng </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebargoods">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="/admin/goods/add">Nh???p s???n ph???m</a>
                                    </li>
                                    <li>
                                        <a href="/admin/goods/index">H??a ????n nh???p</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                                <i class="uil-clipboard-alt"></i>
                                <span> Qu???n l?? ????n h??ng </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="/admin/orders/index">????n h??ng</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                                <i class="uil-copy-alt"></i>
                                <span> Thi???t l???p shop </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPages">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="/admin/properties/index">Thu???c t??nh s???n ph???m</a>
                                    </li>
                                    <li>
                                        <a href="/admin/status/index">C??c tr???ng th??i s???n ph???m</a>
                                    </li>
                                    <li>
                                        <a href="/admin/ship/index">Ph????ng th???c v???n chuy???n</a>
                                    </li>
                                    <li>
                                        <a href="/admin/voucher/index">C??c h??nh th???c khuy???n m??i</a>
                                    </li>
                                    <li>
                                        <a href="pages-faq.html">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
                                <i class="uil-table"></i>
                                <span> T??i ch??nh </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTables">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="tables-basic.html">Doanh thu</a>
                                    </li>
                                    <li>
                                        <a href="tables-datatable.html">V?? shop </a>
                                    </li>
                                    <li>
                                        <a href="tables-basic.html">T??i kho???n ng??n h??ng</a>
                                    </li>
                                    <li>
                                        <a href="/admin/payment/index">Thi???t l???p thanh to??n </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
                                <i class="uil-table"></i>
                                <span> T??i ch??nh </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTables">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="tables-basic.html">Doanh thu</a>
                                    </li>
                                    <li>
                                        <a href="tables-datatable.html">V?? shop </a>
                                    </li>
                                    <li>
                                        <a href="tables-basic.html">T??i kho???n ng??n h??ng</a>
                                    </li>
                                    <li>
                                        <a href="tables-datatable.html">Thi???t l???p thanh to??n </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">
                                <i class="uil-chart"></i>
                                <span> D??? li???u </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarCharts">
                                <ul class="side-nav-second-level">

                                    <li>
                                        <a href="charts-brite.html">Ph??n t??ch ho???t ?????ng</a>
                                    </li>
                                    <li>
                                        <a href="charts-chartjs.html">????nh gi?? y??u th??ch</a>
                                    </li>
                                    <li>
                                        <a href="charts-sparkline.html">Sparklines</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                    <!-- End Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- content -->
                <div class="content">
                    
                    @include("layouts.navbar-custom")
                    @yield('content')
                <!-- content -->
                
                </div>
                <!-- Footer Start -->
                
                @include("layouts.admin_footer")
                <!-- end Footer -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        
        @include("layouts.menu_bar")
        <!-- bundle -->
        <script src="/admin_css/js/vendor.min.js"></script>
        <script src="/admin_css/js/app.min.js"></script>
        <!-- third party js -->
        <script src="/admin_css/js/jquery.dataTables.min.js"></script>
        <script src="/admin_css/js/dataTables.bootstrap4.js"></script>
        <script src="/admin_css/js/dataTables.responsive.min.js"></script>
        <script src="/admin_css/js/responsive.bootstrap4.min.js"></script>
        <script src="/admin_css/js/dataTables.checkboxes.min.js"></script>
        <!-- third party js ends -->
        <!-- demo app -->
        <script src="/admin_css/js/demo.products.js"></script>
    </body>
</html>