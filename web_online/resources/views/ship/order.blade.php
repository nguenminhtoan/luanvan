@extends('layouts.layout_admin')
@section('title')
Thêm sản phẩm mới
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Đơn Hàng </a></li>
                    <li class="breadcrumb-item active">Sản Phẩm</li>
                </ol>
            </div>
            <h4 class="page-title">Đơn hàng</h4>
        </div>
    </div>
</div>
<!-- end page title --> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-9">


                        <div class="text-sm-end">
                            <form action="/admin/ship/order" method="get">
                                <div class="row">

                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" name="batdau" type="date" value="{{$batdau}}">

                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" name="ketthuc" type="date" value="{{$ketthuc}}">

                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-light mb-2 me-1">Tìm kiếm</button>
                                        <button type="button" class="btn btn-light mb-2">Xuất HĐ</button>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- end row -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end col-->
                </div>
                <div class="table-responsive">
                    <table class="table table-centered w-100 dt-responsive nowrap" >
                        <thead class="table-light">
                            <tr>
                                <th class="all" style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th class="all">Mã Đơn hàng </th>
                                <th>Ngày đặt hàng</th>
                                <th>Ngày giao dự kiến</th>
                                <th>Ngày tiếp nhận</th>
                                <th>Thanh toán</th>
                                <th>Trạng thái</th>
                                <th>Địa chỉ lấy hàng</th>
                                <th>Địa chỉ giao hàng</th>
                                <th>Thanh toán</th>
                                <th style="width: 85px;">Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_array($donhangban))
                            @foreach ($donhangban as $sp)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck13">
                                        <label class="form-check-label" for="customCheck13">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    <p class="m-0 d-inline-block align-middle font-16">
                                        <a href="#" class="text-body">{{$sp->MA_DONBAN}}</a>
                                    </p>    

                                </td>
                                <td>
                                    {{$sp -> NGAYDAT}}
                                </td>
                                <td>
                                    {{date("Y-m-d", strtotime($sp -> NGAYDAT. "+ ".$sp->THOIGIADUKIEN." days") )}}
                                </td>
                                <td>
                                    {{$sp -> TIEPNHAN}}
                                </td>
                                <td>
                                    {{$sp->PHUONGTHUC_THANHTOAN}}
                                </td>

                                <td>
                                    Đang vận chuyển
                                </td>
                                <td>
                                    {{ $sp->CH_DIACHI. ", ".$sp->TEN_XA. ", ". $sp->TEN_HUYEN.", ".$sp->TEN_TINH }}
                                </td>
                                <td>
                                    {{$sp->DIACHI}}
                                </td>
                                <td>
                                    {{$sp->TONGTIEN}}
                                </td>
                                <td class="table-action">
                                    <a href="javascript:void(0)" onclick="giaohang(this, {{$sp -> MA_DONBAN}});" class="btn btn-primary">Giao hàng</a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane show active" id="luachonthanhtoan">
                    <div class="row">
                        <div class="col-lg-8">

                            <div class="tab-pane show active" id="thongtinkhac">

                                <!-- end Cash on Delivery box-->
                                <div class="row mt-4">
                                    <div class="col-sm-6">
                                        <a href="apps-ecommerce-products.html" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                            <i class="mdi mdi-arrow-left"></i> Home </a>
                                    </div>
                                    <!-- end col -->

                                </div>
                            </div>          
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
</div>
<!-- container -->
<script>
    function giaohang(evnt,id){
        $.ajax({
            method: "get",
            url: "/admin/ship/giaohang?MA_DONBAN="+id,
            success: (function(data){
                $(evnt).closest("tr").remove();
            })
        });
    }
</script>
@endsection