@extends('layouts.layout_admin')
@section('title')
Thuộc tính sản phẩm
@endsection
@section('content') 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="/admin/properties/add" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Thêm Thuộc tính mới</a>
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
                        <th class="all">Mã Thuộc tính</th>
                        <th>Tên Thuộc tính</th>
                        <th style="width: 85px;">Hoạt động</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (is_array($thuoctinh))
                            @foreach ($thuoctinh as $item)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    
                                    {{$item -> MA_THUOCTINH}}
                                    
                                </td>
                                <td>
                                    {{$item -> TEN_THUOCTINH}}
                                </td>
                                <td class="table-action">
                                    <a href="/admin/properties/edit/{{$item -> MA_THUOCTINH}}" class="active" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="/admin/properties/delete/{{$item -> MA_THUOCTINH}}" onclick="return confirm('bạn có muốn xóa không ?')" class="active" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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


@endsection