@extends('layouts.layout_admin')
@section('title')
Danh mục
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin">Bán hàng</a></li>
                            <li class="breadcrumb-item active">Danh mục</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Danh Mục</h4>
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
                                <a href="/admin/categories/add" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Thêm Danh mục</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="all" style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="checkAll">
                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th class="all">Tên Danh mục</th>
                                        <th class="all">Mã Danh Mục</th>
                                        <th class="all"></th>
                                        <th style="width: 200px;">Hoạt động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (is_array($danhmuc))
                                    @foreach ($danhmuc as $dmsp)
                                        @if (!$dmsp->DAN_MA_DANHMUC)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="id_danhmuc[]" value="{{$dmsp -> MA_DANHMUC}}">
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$dmsp -> TEN_DANHMUC}}
                                                </td>
                                                <td>
                                                    {{$dmsp -> MA_DANHMUC}}
                                                </td>
                                                <td>
                                                    <img alt="contact-img" title="contact-img" class="rounded me-3" height="48" src="{{$dmsp -> HINHANH}}" />
                                                </td>
                                                <td class="table-action">
                                                    <a href="/admin/categories/edit/{{$dmsp -> MA_DANHMUC}}" class="active" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="/admin/categories/delete/{{$dmsp -> MA_DANHMUC}}" onclick="return confirm('bạn có muốn xóa không ?')" class="active" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                            @foreach ($danhmuc as $item)
                                                @if ($item->DAN_MA_DANHMUC && $item->DAN_MA_DANHMUC == $dmsp->MA_DANHMUC)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="id_danhmuc[]" value="{{$dmsp -> MA_DANHMUC}}">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            ---- {{$item -> TEN_DANHMUC}}
                                                        </td>
                                                        <td>
                                                            {{$item -> MA_DANHMUC}}
                                                        </td>
                                                        <td>
                                                            <img alt="contact-img" title="contact-img" class="rounded me-3" height="48" src="{{$item -> HINHANH}}" />
                                                        </td>
                                                        <td class="table-action">
                                                            <a href="/admin/categories/edit/{{$item -> MA_DANHMUC}}" class="active" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="/admin/categories/delete/{{$item -> MA_DANHMUC}}" onclick="return confirm('bạn có muốn xóa không ?')" class="active" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
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