@extends('layouts.layout_admin')
@section('title',"Tổng quan")
@section('content')
<!-- start page title -->
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
    <div class="col-xl-5 col-lg-6">
        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Lượt truy cập</h5>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">(Sản phẩm)</h5>
                        <h3 class="mt-3 mb-3">{{$cuahang -> LUOTXEM}} lượt</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2">{{$t_dh -> DH}} đơn</span>
                            <span class="text-nowrap">Tổng đơn bán </span>
                        </p>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart-plus widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Đơn hàng bán được</h5>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">(Tháng hiện tại)</h5>
                        
                        <h3 class="mt-3 mb-3">{{$dh->DH}} đơn</h3>
                        <p class="mb-0 text-muted">
                            @if($t->DH >0)
                                @if( $dh->DH > $t->DH)
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-up-bold"}}></i>{{ abs(round((($dh->DH - $t->DH) / $t->DH)*100))}}%</span>
                                @else 
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"}}></i>{{ abs(round((($dh->DH - $t->DH) / $t->DH)*100))}}%</span>
                                @endif
                            <span class="text-nowrap">Kể từ tháng trước</span>
                            @else 
                            <span class="text-nowrap"><br></span>
                            @endif
                        </p>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-currency-usd widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Doanh thu</h5>
                        <h3 class="mt-3 mb-3">{{number_format($dh->DOANHTHU)}} VNĐ</h3>
                        <p class="mb-0 text-muted">
                            @if($t->DOANHTHU >0)
                                @if( $dh->DOANHTHU > $t->DOANHTHU)
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"}}></i>{{ abs(round((($dh->DOANHTHU-$t->DOANHTHU)/$t->DOANHTHU)*100)) }}%</span>
                                @else 
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"}}></i>{{ abs(round((($dh->DOANHTHU-$t->DOANHTHU)/$t->DOANHTHU)*100)) }}%</span>
                                @endif
                            <span class="text-nowrap">Kể từ tháng trước</span>
                            @else 
                            <span class="text-nowrap"><br></span>
                            @endif
                        </p>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-pulse widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Growth">Lợi nhuận</h5>
                        <h3 class="mt-3 mb-3">{{ $lnnow != "" ? number_format($lnnow->LN) : 0 }} VNĐ</h3>
                        <p class="mb-0 text-muted">
                            @if($lnnow != "" && $lntrc != "" &&  $lntrc->LN >0)
                                @if( $lnnow->LN > $lntrc->LN)
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-up-bold"}}></i>{{ abs(round((($lnnow->LN - $lntrc->LN)/$lntrc->LN)*100)) }}%</span>
                                @else 
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"}}></i>{{ abs(round((($lnnow->LN - $lntrc->LN)/$lntrc->LN)*100)) }}%</span>
                                @endif
                            <span class="text-nowrap">Kể từ tháng trước</span>
                            @else 
                            <span class="text-nowrap"><br></span>
                            @endif
                        </p>
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
    <div class="col-xl-7 col-lg-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#bar-chart" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Báo cáo Doanh thu</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Báo cáo Lợi nhuận</a>
                    </div>
                </div>
                <h4 class="header-title mb-3">Sơ đồ</h4>
                <div dir="ltr">
                    <div id="high-performing-product" class="apex-charts" data-colors="#727cf5,#e3eaef">
                        <canvas id="bar-chart" width="200px" height="100px"></canvas>
                        <script>
                        new Chart(document.getElementById("bar-chart"), {
                            type: 'bar',
                            data: {
                              labels: [@foreach($loinhuan as $key=>$item)
                                        @if($key == 0 )
                                            "Tháng {{$item->TG}}"
                                        @else    
                                            ,"Tháng {{$item->TG}}"
                                        @endif    
                                        @endforeach],
                              datasets: [
                                {
                                  label: "Population (millions)",
                                  backgroundColor: ["#CF8AB3", "#E8B772","#3cba9f","#e8c3b9","#c45850","#C750BB","#84828C","#A6963A","#3AA6A6","#3AA6A6","#3e95cd","#9EE647"],
                                  data: [@foreach($loinhuan AS $key=>$item)
                                            @if($key == 0 )
                                            {{$item->LN}}
                                            @else    
                                            ,{{$item->LN}}
                                            @endif   
                                        @endforeach] 
                                }
                              ]
                            },
                            options: {
                              legend: { display: false },
                              title: {
                                display: true,
                                text: 'Lợi nhuận từng tháng trong năm 2021'
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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Báo cáo bán hàng</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Báo cáo xuất khẩu</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Lợi nhuận</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Hoạt động</a>
                    </div>
                </div>
                <h4 class="header-title mb-3">Doanh thu</h4>
                <div class="chart-content-bg">
                    <div class="row text-center">
                        <div class="col-md-6">
                            <p class="text-muted mb-0 mt-3">Tháng này</p>
                            <h2 class="fw-normal mb-3">
                                <small class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"></small>
                                <span>{{number_format($dh->DOANHTHU)}} VNĐ</span>
                            </h2>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted mb-0 mt-3">Tháng trước</p>
                            <h2 class="fw-normal mb-3">
                                <small class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
                                <span>{{number_format($t->DOANHTHU)}} VNĐ</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="dash-item-overlay d-none d-md-block" dir="ltr">
                    @if($hnay->DOANHTHU > 0)
                    <h5>Thu thập hôm nay: {{number_format($hnay->DOANHTHU)}} VNĐ</h5>
                    @else 
                    <h5>Thu thập hôm nay: Chưa có đơn hàng</h5>
                    @endif
                </div>
                <div dir="ltr">
                    <div id="revenue-chart" class="apex-charts mt-3" data-colors="#727cf5,#0acf97"></div>
                </div>
            </div>
            <!-- end card-body-->
        </div>
        <!-- end card-->
    </div>
    <!-- end col-->
    
</div>
<!-- end row -->
<div class="row">
    <div class="col-xl-8 col-lg-12 order-lg-2 order-xl-1">
        <div class="card">
            <div class="card-body">
                <a href="" class="btn btn-sm btn-link float-end">Xuất khẩu
                    <i class="mdi mdi-download ms-1"></i>
                </a>
                <h4 class="header-title mt-2 mb-3">Sản phẩm bán chạy nhất</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover mb-0">
                        <tbody>
                            @foreach($banchay as $item)
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{$item->TEN_SP}}</h5>
                                    <span class="text-muted font-13">&nbsp;</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{number_format($item->GIAMOI)}}</h5>
                                    <span class="text-muted font-13">Giá</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{$item->SOLUONG}}</h5>
                                    <span class="text-muted font-13">Số lượng</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{number_format($item->SOLUONG*$item->DONGIA)}}VNĐ</h5>
                                    <span class="text-muted font-13">Tổng tiền</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive-->
            </div>
            <!-- end card-body-->
        </div>
        <!-- end card-->
    </div>
    <!-- end col-->
    <div class="col-xl-4 col-lg-6 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title mb-2">Hoạt động gần đây</h4>
                <div data-simplebar style="max-height: 419px;">
                    <div class="timeline-alt pb-0">
                        <div class="timeline-item">
                            <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info fw-bold mb-1 d-block">Bạn đã bán một mặt hàng</a>
                                <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">5 minutes ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary fw-bold mb-1 d-block">Sản phẩm trên thị trường Boootstrap </a>
                                <small>Dave Gamache added
                                    <span class="fw-bold">Admin Dashboard</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">30 minutes ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <i class="mdi mdi-microphone bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info fw-bold mb-1 d-block">Robert Delaney</a>
                                <small>Gửi cho bạn tin nhăn
                                    <span class="fw-bold">"Are you there?"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">2 hours ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <i class="mdi mdi-upload bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary fw-bold mb-1 d-block">Audrey Tobey</a>
                                <small>Uploaded a photo
                                    <span class="fw-bold">"Error.jpg"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">14 hours ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info fw-bold mb-1 d-block">Bạn đã bán mặt hàng</a>
                                <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">16 hours ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary fw-bold mb-1 d-block">Product on the Bootstrap Market</a>
                                <small>Dave Gamache added
                                    <span class="fw-bold">Admin Dashboard</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">22 hours ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <i class="mdi mdi-microphone bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info fw-bold mb-1 d-block">Robert Delaney</a>
                                <small>Send you message
                                    <span class="fw-bold">"Are you there?"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">2 days ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- end timeline -->
                </div>
                <!-- end slimscroll -->
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card-->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection