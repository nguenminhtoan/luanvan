@extends('layouts.layout_admin')
@section('title',"Chi Tiết đơn hàng")
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tất cả cửa hàng</a></li>
                </ol>
            </div>
            <h4 class="page-title">Cửa hàng</h4>
        </div>
    </div>
</div>
<!-- end page title --> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-9">
                        <div class="text-sm-end">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="trangthai" class="form-control">
                                            <option value="" >Tất cả</option>
                                            <option value="1" >Chờ duyệt</option>
                                            <option value="2" >Duyệt</option>
                                            <option value="3" >Đã duyệt</option>
                                        </select>

                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-light mb-2 me-1">Tìm kiếm</button>
                                        <button type="button" class="btn btn-light mb-2">Xuất HĐ</button>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- end row -->
                                    </div>
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
                                <th class="all">Tên cửa hàng</th>
                                <th>Chủ shop</th>
                                <th>Địa chỉ</th>
                                <th>Số điện Thoại</th>
                                <th>Ngành bán</th>
                                <th>Trạng thái</th>
                                <th style="width: 85px;">Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_array($cuahang))
                            @foreach ($cuahang as $ch)
                            <tr>

                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck13">
                                        <label class="form-check-label" for="customCheck13">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    <p class="m-0 d-inline-block align-middle font-16">
                                        <a href="#" class="text-body">{{$ch -> TEN_CUAHANG}}</a>
                                    </p>    

                                </td>
                                <td>
                                    {{$ch -> TEN_NGUOIDUNG}} 
                                </td>
                                <td>
                                    {{$ch -> DIACHI}}
                                </td>
                                <td>
                                    {{$ch -> SDT}}
                                </td>

                                <td>
                                    {{$ch -> TEN}}
                                </td>

                                <td>
                                    <form action="/admin/cuahang/update_status/{{$ch->MA_CUAHANG}}" method="post">
                                        {{ csrf_field() }}
                                        <select name="TRANGTHAI" class="form-control">
                                            @if($ch -> TRANGTHAI == 0)
                                                <option value="" >Chờ duyệt</option>
                                            @elseif($ch -> TRANGTHAI == 1)
                                                <option value="1" >Đã Duyệt</option>
                                            @else
                                                <option value="2" >Từ chối</option>
                                            @endif  
                                            <option value="1" >Đã Duyệt</option>
                                            <option value="2" >Từ chối</option>
                                        </select>
                                        <button class="btn btn-danger">
                                            <i class="mdi mdi-cash-multiple me-1"> Cập nhật</i>
                                        </button>
                                    </form>
                                </td>
                                <td class="table-action">
                                    <a href="/admin/cuahang/detail/{{$ch -> MA_CUAHANG}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
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
                                        <a href="/admin/management/dashboard" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
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
@endsection