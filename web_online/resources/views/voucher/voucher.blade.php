@extends('layouts.layout_admin')
@section('title')
Các hình thức Khuyến mãi
@endsection
@section('content') 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="/admin/voucher/add" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Thêm voucher mới</a>
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
                        <th class="all">Mã khuyến mãi</th>
                        <th>Tên khuyến mãi</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Giảm giá</th>
                        <th style="width: 85px;">Hoạt động</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (is_array($khuyenmai))
                            @foreach ($khuyenmai as $item)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    
                                    {{$item -> MA_KHUYENMAI}}
                                    
                                </td>
                                <td>
                                    {{$item -> TEN_KM}}
                                </td>
                                <td>
                                    {{$item -> BATDAU}}
                                </td>
                                <td>
                                    {{$item -> KETTHUC}}
                                </td>
                                <td>
                                    {{$item -> GIAMGIA}}VNĐ
                                </td>
                                <td class="table-action">
                                    <a href="/admin/voucher/edit/{{$item -> MA_KHUYENMAI}}" class="active" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="/admin/voucher/delete/{{$item -> MA_KHUYENMAI}}" onclick="return confirm('bạn có muốn xóa không ?')" class="active" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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