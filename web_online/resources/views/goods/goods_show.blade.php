@extends('layouts.layout_admin')
@section('title',"Tất cả đơn hàng bán được")
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
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-7">
                        
                        
                        <div class="text-sm-end">
                            <form action="/admin/goods/index" method="get">
                            <div class="row">
                                <div class="col-md-4">
                                        <input class="form-control" name="batdau" type="date" value="{{$batdau}}">
                                    
                                </div>
                                <div class="col-md-4">
                                        <input class="form-control" name="ketthuc" type="date" value="{{$ketthuc}}">
                                    
                                </div>
                                <div class="col-md-4">
                                        <button type="submit" class="btn btn-light mb-2 me-1">Tìm kiếm</button>
                                        <button type="button" class="btn btn-light mb-2">Xuất HĐ</button>
                                </div>
                                <div class="col-md-4">
                                <!-- end row -->
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
                                <th class="all">Sản phẩm</th>
                                <th>Ngày nhập</th>
                                <th>Tổng số lượng</th>
                                <th>Thành tiền</th>

                                <th style="width: 85px;">Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_array($donhang))
                            @foreach ($donhang as $sp)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck13">
                                        <label class="form-check-label" for="customCheck13">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                  {{$sp -> TEN_SP}}
                                </td>
                                <td>
                                    {{$sp ->NGAYNHAP }}
                                </td>
                                <td>
                                    {{$sp ->SOLUONG }}
                                </td>
                                
                                <td>
                                    {{$sp->TONGTIEN}}
                                </td>
                                <td class="table-action">
                                     <a href="/admin/goods/view/{{$sp->MA_DONNHAP}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="/admin/goods/edit/{{$sp->MA_DONNHAP}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="/admin/goods/delete/{{$sp->MA_DONNHAP}}" onclick="return confirm('ban có muốn xóa')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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



                                                