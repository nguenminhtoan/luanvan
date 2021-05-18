@extends('layouts.layout_admin')
@section('title')
Ngành Hàng
@endsection
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="/admin/industries/add" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Thêm Ngành Hàng</a>
                        </div>
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
                            <th class="all">Mã Ngành Hàng</th>
                            <th>Tên Ngành Hàng</th>
                            <th style="width: 85px;">Hoạt động</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (is_array($nganhhang))
                                @foreach ($nganhhang as $ttdm)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck2">
                                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                        {{$ttdm -> MA_NGANH}} 
                                    </td>

                                    <td>
                                        {{$ttdm -> TEN}}
                                    </td>

                                    <td class="table-action">
                                        <a href="/admin/industries/edit/{{$ttdm -> MA_NGANH}}" class="active" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="/admin/industries/delete/{{$ttdm -> MA_NGANH}}" onclick="return confirm('bạn có muốn xóa không ?')" class="active" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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
