@extends('layouts.layout_admin')
@section('title',"ADMIN - Supermarket| E-Commerce")
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tất cả Khách hàng</a></li>
                </ol>
            </div>
            <h4 class="page-title">Khách Hàng</h4>
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
                                <th class="all">Tên người dùng</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Địa chỉ</th>
                                <th>Địa chỉ EMAIL</th>
                                <th>Số điện Thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_array($nguoidung))
                            @foreach ($nguoidung as $nd)
                            <tr>

                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck13">
                                        <label class="form-check-label" for="customCheck13">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    <p class="m-0 d-inline-block align-middle font-16">
                                        <a href="#" class="text-body">{{$nd -> TEN_NGUOIDUNG}}</a>
                                    </p>    

                                </td>
                                <td>
                                    {{$nd -> NGAYSINH}}
                                </td>
                                <td>
                                    {{$nd -> GIOITINH}}
                                </td>
                                <td>
                                    {{$nd -> TEN_XA}},{{$nd -> TEN_HUYEN}},{{$nd -> TEN_TINH }}
                                </td>
                                <td>
                                    {{$nd -> EMAIL}}
                                </td>
                                <td>
                                    {{$nd -> SDT}}
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
@endsection