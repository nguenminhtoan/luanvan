@extends('layouts.layout_admin')
@section('title',"Chi Tiết đơn hàng")
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tất cả cửa hàng</a></li>
                </ol>
            </div>
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
    <div class="col-xl-2 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Khách hàng đăng ký</h5>
                        <h3 class="mt-3 mb-3">{{$nguoidung -> SOLUONG}} người</h3>

                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-basket widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Khách hàng đăng ký bán hàng</h5>
                        <h3 class="mt-3 mb-3">{{$cuahang -> SOLUONG}} cửa hàng</h3>

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
    <div class="col-xl-10 col-lg-12">
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
                              labels: [@foreach($doanhthu as $key=>$item)
                                        @if($key == 0 )
                                            "cửa hàng {{$item->TEN_CUAHANG}}"
                                        @else    
                                            ,"cửa hàng {{$item->TEN_CUAHANG}}"
                                        @endif    
                                        @endforeach],
                              datasets: [
                                {
                                  label: "Population (millions)",
                                  backgroundColor: ["#CF8AB3", "#E8B772","#3cba9f","#e8c3b9","#c45850","#C750BB","#84828C","#A6963A","#3AA6A6","#3AA6A6","#3e95cd","#9EE647"],
                                  data: [@foreach($doanhthu AS $key=>$item)
                                            @if($key == 0 )
                                            {{$item->DOANHTHU}}
                                            @else    
                                            ,{{$item->DOANHTHU}}
                                            @endif   
                                        @endforeach] 
                                }
                              ]
                            },
                            options: {
                              legend: { display: false },
                              title: {
                                display: true,
                                text: 'Doanh thu của các cửa hàng'
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
<div class="row">
    <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
        <div class="card">
            <div class="card-body">
                <a href="" class="btn btn-sm btn-link float-end">Xuất khẩu
                    <i class="mdi mdi-download ms-1"></i>
                </a>
                <h4 class="header-title mt-2 mb-3">Số tiền đầu tư của của hàng</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover mb-0">
                        <tbody>
                            @foreach($dautu as $item)
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{$item->TEN_CUAHANG}}</h5>
                                    <span class="text-muted font-13">&nbsp;</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{$item->SOLUONG}}</h5>
                                    <span class="text-muted font-13">Số lượng</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{number_format($item->DAUTU)}}VNĐ</h5>
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
    <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
        <div class="card">
            <div class="card-body">
                <a href="" class="btn btn-sm btn-link float-end">Xuất khẩu
                    <i class="mdi mdi-download ms-1"></i>
                </a>
                <h4 class="header-title mt-2 mb-3">Sản phẩm bán chạy</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover mb-0">
                        <tbody>
                            @foreach($sanpham as $item)
                            <tr>
                                <td><span class="oi oi-heart"></span>
                                    <h5 class="font-14 my-1 fw-normal">{{$item->TEN_SP}}</h5>
                                    <span class="text-muted font-13 ">@if($item->DANHGIA == 1)&Star;
                                                                        @elseif($item->DANHGIA ==2)&Star;
                                                                        @elseif($item->DANHGIA ==3)&Star;&Star;&Star;
                                                                        @elseif($item->DANHGIA ==4)&Star;&Star;&Star;&Star;
                                                                        @elseif($item->DANHGIA ==5)&Star;&Star;&Star;&Star;&Star;
                                                                     @endif
                                    </span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{$item->SOLUONG}}</h5>
                                    <span class="text-muted font-13">Số lượng</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{number_format($item->DONGIA)}}VNĐ</h5>
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
    <!-- end col -->
</div>
@endsection