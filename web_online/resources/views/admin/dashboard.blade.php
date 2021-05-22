<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>ADMIN &DoubleVerticalBar;   shop</title>
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
        <!--         end demo js
                <script src="/js/chartjs-example-charts.js"></script>-->
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
                            <a  href="/admin/chat/chat" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Tổng quan </span>
                            </a>

                        </li>
                        <li class="side-nav-title side-nav-item">Ứng dụng</li>

                        <li class="side-nav-item">
                            <a href="/admin/index" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span>Tất cả Cửa hàng <span class="badge rounded-pill badge-success-lighten font-10 float-end"> mới</span> </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="/admin/customers" class="side-nav-link">
                                <i class="uil-briefcase"></i>
                                <span> Khách hàng </span>
                                <span class="menu-arrow"></span>
                            </a>
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
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-bell noti-icon"></i>
                                <span class="noti-icon-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="javascript: void(0);" class="text-dark">
                                                <small>Làm sạch tât cả</small>
                                            </a>
                                        </span>Thông báo
                                    </h5>
                                </div>
                                <div style="max-height: 230px;" data-simplebar>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">1 min ago</small>
                                        </p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> 
                                        </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hi, How are you? What about our next meeting</small>
                                        </p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">4 days ago</small>
                                        </p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> 
                                        </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Wow ! this admin looks good and awesome design</small>
                                        </p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    Xem tất cả
                                </a>
                            </div>
                        </li>
                        <li class="dropdown notification-list d-none d-sm-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-view-apps noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">
                                <div class="p-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/admin/images/slack.png" alt="slack">
                                                <span>Slack</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/admin/images/github.png" alt="Github">
                                                <span>GitHub</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/admin/images/dribbble.png" alt="dribbble">
                                                <span>Dribbble</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/admin/images/bitbucket.png" alt="bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/admin/images/dropbox.png" alt="dropbox">
                                                <span>Dropbox</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/admin/images/g-suite.png" alt="G Suite">
                                                <span>G Suite</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end row-->
                                </div>
                            </div>
                        </li>
                        <li class="notification-list">
                            <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                <i class="dripicons-gear noti-icon"></i>
                            </a>
                        </li>
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                               aria-expanded="false">
                                <span class="account-user-avatar"> 
                                    <img data-src="/img/B612_20181214_203550_766.jpg" src="/img/B612_20181214_203550_766.jpg" class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-position">ADMIN</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">

                                <a href="/logout" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Đăng xuất</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="button-menu-mobile open-left disable-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="app-search dropdown d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control dropdown-toggle"  placeholder="Tìm kiếm..." id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn-primary" type="submit">Tìm kiếm</button>
                            </div>
                        </form>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                            </div>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-notes font-16 me-1"></i>
                                <span>Analytics Report</span>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-life-ring font-16 me-1"></i>
                                <span>How can I help you?</span>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-cog font-16 me-1"></i>
                                <span>User profile settings</span>
                            </a>
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                            </div>
                            <div class="notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle" src="/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Erwin Brown</h5>
                                            <span class="font-12 mb-0">UI Designer</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle" src="/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Jacob Deo</h5>
                                            <span class="font-12 mb-0">Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Topbar -->
                <!-- content -->
                <div class="content">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tất cả cửa hàng</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Cửa hàng</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title --> 
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">

                                </div>
                                <h4 class="page-title">Bảng Thống Kê</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-xl-3 ">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-end">
                                                <i class="mdi mdi-account-multiple widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Khách hàng đăng ký</h5>
                                            <h3 class="mt-3 mb-3"> người</h3>
                                            
                                        </div>
                                        <!-- end card-body-->
                                    </div>
                                    <!-- end card-->
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-end">
                                                <i class="mdi mdi-currency-usd widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Cửa hàng đăng ký</h5>
                                            <h3 class="mt-3 mb-3">cửa hàng</h3>
                                            
                                        </div>
                                        <!-- end card-body-->
                                    </div>
                                    <!-- end card-->
                                </div>
                                <!-- end col-->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-7 col-lg-8 ">
                            <div class="card card-h-100">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#bar-chart" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                    </div>
                                    <h4 class="header-title mb-3">Sơ đồ</h4>
                                    <div dir="ltr">
                                        <div id="high-performing-product" class="apex-charts" data-colors="#727cf5,#e3eaef">
                                            <canvas id="bar-chart" width="200px" height="100px"></canvas>
                                            <script>
                                                new Chart(document.getElementById("bar-chart"), {
                                                type: 'bar',
                                                        data: {
                                                        labels: [@foreach($doanhthu as $key => $item)
                                                                @if ($key == 0)
                                                                " {{$item->TEN_CUAHANG}}"
                                                                @ else
                                                                , " {{$item->TEN_CUAHANG}}"
                                                                @endif
                                                                @endforeach],
                                                                datasets: [
                                                                {
                                                                label: "Population (millions)",
                                                                        backgroundColor: ["#CF8AB3", "#E8B772", "#3cba9f", "#e8c3b9", "#c45850", "#C750BB", "#84828C", "#A6963A", "#3AA6A6", "#3AA6A6", "#3e95cd", "#9EE647","#CF8AB3", "#E8B772", "#3cba9f", "#e8c3b9", "#c45850", "#C750BB", "#84828C", "#A6963A", "#3AA6A6", "#3AA6A6", "#3e95cd", "#9EE647"],
                                                                        data: [@foreach($doanhthu AS $key => $item)
                                                                                @if ($key == 0)
                                                                                {{$item -> DOANHTHU}}
                                                                                @ else
                                                                                , {{$item -> DOANHTHU}}
                                                                                @endif
                                                                               @endforeach]
                                                                }
                                                                ]
                                                        },
                                                        options: {
                                                        legend: { display: false },
                                                                title: {
                                                                display: true,
                                                                        text: 'Doanh thu của từng cửa hàng'
                                                                }
                                                        }
                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    
                    <!-- end row -->
                    
                    <!-- end row -->        
                </div>
                <!-- container -->
            </div>
            <!-- end row -->
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