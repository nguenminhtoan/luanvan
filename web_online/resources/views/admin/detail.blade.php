@extends('layouts.layout_admin')
@section('title',"Chi Tiết đơn hàng")
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Chi Tiết cửa hàng</a></li>
                </ol>
            </div> 
            <h2 class="page-title">Hồ sơ cửa hàng</h2>
        </div>
    </div>
</div>
<h3 class="mt-0">
    {{$cuahang->TEN_CUAHANG}}
</h3>

<p class="text-muted mb-2">
    Mô tả: {{$cuahang->MOTA}}
</p>
<div class="row">
    <div class="col-md-4">
        <div class="mb-4">
            <h5>Hình đại diện</h5>
            <img src="{{$cuahang->HINHANH}}" alt="user-image" class="rounded-circle" style="width: 150px; height: 170px;">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-4">
            <h5>Địa chỉ</h5>
            <p>{{$cuahang->DIACHI}},&nbsp;{{$cuahang->TEN_XA}},&nbsp;{{$cuahang->TEN_HUYEN}},&nbsp;{{$cuahang->TEN_TINH}}</p>
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
                        <h4>Chi Tiết Sản Phẩm</h4>
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
                                <th class="all">Sản Phẩm</th>
                                <th>Loại</th>
                                <th>Giá</th>
                                <th>Giảm giá</th>
                                <th>Kho</th>
                                <th>Đã bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_array($sanpham))
                            @foreach ($sanpham as $sp)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck13">
                                        <label class="form-check-label" for="customCheck13">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    <p class="m-0 d-inline-block align-middle font-16">
                                        <a href="apps-ecommerce-products-details.html" class="text-body">{{$sp->TEN_SP}}</a>
                                    </p>    

                                </td>
                                <td>
                                    {{$sp->TEN_DANHMUC}}
                                </td>
                                <td>
                                    {{$sp->GIA}}
                                </td>
                                <td>
                                    {{$sp->GIAMGIA}}
                                </td>
                                <td>
                                    {{$sp->KHO}}
                                </td>
                                <td>
                                    {{$sp->SOLUONG}}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <form action="/admin/cuahang/update_status/{{$cuahang->MA_CUAHANG}}" method="post">
                    <div class="tab-pane show active" id="luachonthanhtoan">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="tab-pane show active" id="thongtinkhac">

                                    <!-- end Cash on Delivery box-->
                                    <div class="row mt-3">
                                        <div class="col-sm-2">
                                            <a href="/admin/cuahang/list" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                <i class="mdi mdi-arrow-left"></i> Home </a>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="TRANGTHAI" class="form-control">
                                            <option value="0" {{ $cuahang -> TRANGTHAI == 0 ? "selected" : "" }} >Chờ duyệt</option>
                                            <option value="1" {{ $cuahang -> TRANGTHAI == 1 ? "selected" : "" }} >Đã Duyệt</option>
                                            <option value="2" {{ $cuahang -> TRANGTHAI == 2 ? "selected" : "" }} >Từ chối</option>
                                        </select>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="text-sm-end">
                                                <button class="btn btn-danger">
                                                    <i class="mdi mdi-cash-multiple me-1"> Cập nhật</i>
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
<!-- container -->
@endsection
