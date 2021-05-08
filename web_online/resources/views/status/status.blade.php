@extends('layouts.layout_admin')
@section('title')
Trạng thái đơn hàng
@endsection
@section('content')
<!-- Start Content-->
    <!-- end page title --> 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="/admin/status/add" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Thêm Trạng Thái</a>
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
                            <th class="all">Mã Trạng Thái</th>
                            <th>Tên Trạng Thái</th>
                            <th style="width: 85px;">Hoạt động</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (is_array($trangthai))
                                @foreach ($trangthai as $item)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck2">
                                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                        {{$item -> MA_TRANGTHAI}}
                                    </td>

                                    <td>
                                        {{$item -> TEN_TRANGTHAI}}
                                    </td>

                                    <td class="table-action">
                                        <a href="/admin/status/edit/{{$item -> MA_TRANGTHAI}}" class="active" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="/admin/status/delete/{{$item -> MA_TRANGTHAI}}" onclick="return confirm('bạn có muốn xóa không ?')" class="active" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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