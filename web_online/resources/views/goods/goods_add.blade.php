@extends('layouts.layout_admin')
@section('title')
Nhập sản phẩm mới của cửa hàng
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <div class="tab-content">
                    <form action="/admin/goods/save" method="POST" enctype="multipart/form-data" >
                        <div class="tab-pane show active" id="Thongtincoban">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- end row-->
                                    <h3 class="mt-4">Thông tin cơ bản</h3>
                                    <p class="text-muted mb-4">
                                    </p>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="new-adr-first-name" class="form-label">Ngày nhập</label>
                                                <input type="hidden" name="NGAYNHAP" value="{{date('Y/m/d')}}" />
                                                <input class="form-control" type="text" value="{{date('Y/m/d')}}" placeholder="ngày nhập" disabled="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="new-adr-first-name" class="form-label">Thành tiền</label>
                                                <input type="hidden" name="TONGTIEN"/>
                                                <input class="form-control" id='thanhtien' type="number" placeholder="Thành tiền" disabled=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h3 class="mt-4">Thông tin nhập sản phẩm</h3>
                                    <p class="text-muted mb-4">
                                    </p>
                                    <table class="table table-centered w-100 dt-responsive nowrap">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="col-md-4 all">Sản phẩm</th>
                                                <th class="col-md-3 all right">Giá</th>
                                                <th class="col-md-2" >Số lượng</th>
                                                <th class="col-md-3 all">Tổng</th>
                                                <th style="width: 200px;">Hoạt động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="MA_SP[]" class="form-control" onchange="get_gia(this); tong()">
                                                        <option value="" data-gia="0">--Chọn--</option>
                                                        @foreach($sanpham as $row )
                                                        <option value="{{$row->MA_SP}}" data-gia="{{$row->GIA}}" >{{$row->TEN_SP}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="number" name="GIA[]" onkeyup="tinhtien(this)" class="form-control"/></td>
                                                <td><input type="number" name="SOLUONG[]" onkeyup="tinhtien(this)" class="form-control" value="1" /></td>
                                                <td><input type="number"  name="TONG[]" onchange="tong();" value="0" class="form-control" disabled=""/></td>
                                                <td>
                                                    <a href="javascript:void(0);" onclick="add_product()" class="action-icon"><i class="mdi mdi-plus-circle"></i></a>
                                                </td>
                                            </tr>

                                            <tr class="all" id="new_sp" style="display: none;" >
                                                <td>
                                                    <select name="MA_SP[]" onchange="get_gia(this); tong()" class="form-control">
                                                        <option value="" data-gia="0">--Chọn--</option>
                                                        @foreach($sanpham as $row )
                                                        <option value="{{$row->MA_SP}}" data-gia="{{$row->GIA}}" >{{$row->TEN_SP}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="number" name="GIA[]" onkeyup="tinhtien(this)" class="form-control"vnđ/></td>
                                                <td><input type="number"  name="SOLUONG[]" onkeyup="tinhtien(this)" value="1" class="form-control" /></td>
                                                <td><input type="number" name="TONG[]" value="0" onchange="tong();" disabled="" class="form-control" /></td>
                                                <td>
                                                    <a href="javascript:void(0);" onclick=" remove(this); tong();" class="action-icon"><i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <!-- end row -->
                                </div>
                                <!-- end table-responsive -->
                            </div>
                            <!-- end .border-->
                        </div>
                        <div class="tab-pane show active" id="luachonthanhtoan">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="tab-pane show active" id="thongtinkhac">

                                        <!-- end Cash on Delivery box-->
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <a href="apps-ecommerce-products.html" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                    <i class="mdi mdi-arrow-left"></i> Home </a>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="text-sm-end">
                                                    <button  class="btn btn-danger">
                                                        <i class="mdi mdi-cash-multiple me-1"></i> Nhập hàng </button>
                                                        <br>
                                                </div>
                                            </div>
                                            <br><br><br>
                                        </div>
                                    </div>          
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function get_gia(event){
       var gia = $(event).find("option:selected").attr("data-gia");
       $(event).closest("tr").find("input[name='GIA[]']").attr("value", gia);
       var soluong = $(event).closest("tr").find("input[name='SOLUONG[]']").val();
       $(event).closest("tr").find("input[name='TONG[]']").attr("value", gia *soluong);
    }

    function add_product(){
        var html = "<tr>" + $("#new_sp").html() + "</tr>";
        $("#new_sp").before(html);
    }
    function remove(event){
        $(event).closest("tr").remove();
    }
    function tong(){
        var tien = $("input[name='TONG[]']");
        var tong = Number(0);
        tien.each(function() {
            tong = Number(tong) + Number($(this).attr("value"));
        });
        $("input[name='TONGTIEN']").attr("value",tong);
        $("#thanhtien").attr("value",tong);
    }
    
    function tinhtien(event){
       var gia = $(event).closest("tr").find("input[name='GIA[]']").val();
       var soluong = $(event).closest("tr").find("input[name='SOLUONG[]']").val();
       $(event).closest("tr").find("input[name='TONG[]']").attr("value", gia *soluong);
       tong();
    }
</script>
@endsection