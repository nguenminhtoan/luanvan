@extends('layouts.layout_admin')
@section('title',"Chi Tiết đơn hàng")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Đơn sản phẩm</a></li>
                    <li class="breadcrumb-item active">Sản Phẩm</li>
                </ol>
            </div>
            <h4 class="page-title">Đơn sản phẩm</h4>
        </div>
    </div>
</div>
<!-- end page title --> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">Nhập khẩu</button>
                            <button type="button" class="btn btn-light mb-2">Xuất khẩu</button>
                        </div>
                    </div>
                    <!-- end col-->
                </div>
                
                 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="new-adr-first-name" class="form-label">Tên khách hàng</label>
                            <input disabled="" class="form-control" type="text" placeholder="Tên sản phẩm" value="{{ $donhang -> TEN_NGUOIDUNG}}" />
                        </div>
                    </div>
                     
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="new-adr-first-name" class="form-label">Ngày mua</label>
                            <input disabled="" class="form-control" type="text" placeholder="1990/01/01" value="{{ $donhang -> NGAYDAT}}" />
                        </div>
                    </div>
                </div>
                
                 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="new-adr-first-name" class="form-label">Tên vận chuyển</label>
                            <input disabled="" class="form-control" type="text" placeholder="Tên sản phẩm" value="{{ $donhang -> PHUONGTHUC_VANCHUYEN}}" />
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                            <label for="new-adr-first-name" class="form-label">chi phí</label>
                            <input disabled="" class="form-control" type="text" placeholder="Tên sản phẩm" value="{{ $donhang -> DONGIA}}" />
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="new-adr-first-name" class="form-label">Phương thức thanh toán</label>
                            <input disabled="" class="form-control" type="text" placeholder="Tên sản phẩm" value="{{ $donhang -> PHUONGTHUC_THANHTOAN}}" />
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                            <label for="new-adr-first-name" class="form-label">Khuyến mãi</label>
                            <input disabled="" class="form-control" type="text" placeholder="Tên sản phẩm" value="{{ $donhang -> GIAMGIA}}" />
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div>
                        Ngày bán:
                    </div>
                    <table class="table table-centered w-100 dt-responsive nowrap" >
                        <thead class="table-light">
                            <tr>
                                <th class="all" style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th class="all">Tên sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Giảm giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
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
                                    {{$sp->TEN_SP}}
                                </td>
                                
                                <td>
                                    {{$sp->GIA}}
                                </td>
                                
                                <td>
                                    {{$sp->GIAMGIA}}
                                </td>
                                
                                <td>
                                    {{$sp->SOLUONG}}
                                </td>
                                <td>
                                    {{$sp->SOLUONG* ($sp->GIA - $sp->GIAMGIA)}}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                
                
                 <div class="row">
                    <div class="col-sm-6">
                    </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                            <label for="new-adr-first-name" class="form-label">Thành tiền </label>
                            <input disabled="" class="form-control" type="text" placeholder="Tên sản phẩm" value="{{ $donhang -> TONGTIEN}}" />
                        </div>
                    </div>
                </div>
                <form action="/admin/orders/update_status/{{$donhang->MA_DONBAN}}" method="post">
                    <input name="MA_TRANGTHAI" value="{{ $donhang->MA_TRANGTHAI == 5 ? 7 : $donhang->MA_TRANGTHAI + 1 }}" hidden="" />
                    <div class="tab-pane show active" id="luachonthanhtoan">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="tab-pane show active" id="thongtinkhac">

                                    <!-- end Cash on Delivery box-->
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="apps-ecommerce-products.html" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                <i class="mdi mdi-arrow-left"></i> Home </a>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="text-sm-end">
                                                <button class="btn btn-danger">
                                                    <i class="mdi mdi-cash-multiple me-1"></i> 
                                                    @switch($donhang->MA_TRANGTHAI)
                                                    @case(2)
                                                        Xác nhận đặt hàng
                                                        @break
                                                    @case(3)
                                                        Gọi shipper lấy hàng
                                                        @break
                                                    @case(4)
                                                        shipper đang giao hàng
                                                        @break
                                                    @default    
                                                        Hủy đơn hàng
                                                    @endswitch
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>          
                            </div>
                        </div>
                    </div>
                </form>
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
</div>
@endsection
