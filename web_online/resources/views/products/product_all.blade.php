@extends('layouts.layout_admin')
@section('title')
Tất cả sản phẩm
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tất cả sản phẩm</a></li>
                    <li class="breadcrumb-item active">Sản Phẩm</li>
                </ol>
            </div>
            <h4 class="page-title">Tất Cả Sản Phẩm</h4>
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
                        <a href="/admin/product/add" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Thêm Sản Phẩm</a>
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

                                <th style="width: 85px;">Hoạt động</th>
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
                                <td class="table-action">
                                    <a href="/admin/product/edit/{{$sp->MA_SP}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="/admin/product/delete/{{$sp->MA_SP}}" onclick="return confirm('bạn có muốn xóa không ?')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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