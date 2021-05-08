@extends('layouts.layout_admin')
@section('title')
Thanh Toán
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                    <li class="breadcrumb-item active">Thanh Toán</li>
                </ol>
            </div>
            <h4 class="page-title">Thanh Toán</h4>
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
                        <a href="/admin/payment/add" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Thêm Phương thức thanh toán</a>
                    </div>
                    <!-- end col-->
                </div>
                <div class="table-responsive">
                    <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                        <thead class="table-light">
                            <tr>
                                <th class="all" style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                        <span class="text-warning mdi mdi-star"></span>
                        <th class="all">Mã Thanh toán</th>
                        <th>Phương Thức Thanh toán</th>
                        <th style="width: 85px;">Hoạt động</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (is_array($loaisp))
                            @foreach ($loaisp as $dmsp)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                <td>
                                    {{$dmsp -> MA_THANHTOAN}} 
                                </td>
                                <td>
                                    {{$dmsp -> PHUONGTHUC_THANHTOAN}}
                                </td>
                                <td class="table-action">
                                    <a href="/admin/payment/edit/{{$dmsp -> MA_THANHTOAN}}" class="active" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="/admin/payment/delete/{{$dmsp -> MA_THANHTOAN}}" onclick="return confirm('bạn có muốn xóa không ?')" class="active" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
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
@endsection