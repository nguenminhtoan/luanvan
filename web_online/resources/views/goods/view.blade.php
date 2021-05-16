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
                                <div class="col-lg-8">
                                    <!-- end row-->
                                    <h3 class="mt-4">Thông tin cơ bản</h3>
                                    <p class="text-muted mb-4">
                                    </p>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="new-adr-first-name" class="form-label">Ngày nhập</label>
                                                <input type="hidden" name="NGAYNHAP" value="{{date('Y/m/d')}}" />
                                                <input class="form-control" type="text" value="{{$hoadon->NGAYNHAP}}" placeholder="ngày nhập" disabled="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="new-adr-first-name" class="form-label">Thành tiền</label>
                                                <input type="hidden" name="TONGTIEN"/>
                                                <input class="form-control" id='thanhtien' type="number" value="{{$hoadon->TONGTIEN}}" placeholder="Thành tiền" disabled=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <!-- end row-->
                                    <h3 class="mt-4">Thông tin nhập sản phẩm</h3>
                                    <p class="text-muted mb-4">
                                    </p>

                                    <!-- end row -->
                                    <table class="table table-centered w-100 dt-responsive nowrap">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="col-md-4 all">Sản phẩm</th>
                                                <th class="col-md-3 all right">Giá</th>
                                                <th class="col-md-2" >Số lượng</th>
                                                <th class="col-md-3 all">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ct_sp as $item)
                                            <tr>
                                                <td>
                                                    <input disabled="" type="text" name="GIA[]" onkeyup="tinhtien(this)" value="{{ $item->TEN_SP }}" class="form-control"/>
                                                    
                                                </td>
                                                <td><input disabled="" type="number" name="GIA[]" onkeyup="tinhtien(this)" value="{{ $item->DONGIA }}" class="form-control"/></td>
                                                <td><input disabled="" type="number" name="SOLUONG[]" onkeyup="tinhtien(this)" value="{{ $item->SOLUONG }}"  class="form-control" /></td>
                                                <td><input type="number"  name="TONG[]" onchange="tong();" value="{{ $item->DONGIA*$item->SOLUONG}}"  class="form-control" disabled=""/></td>
                                                
                                            </tr>
                                            @endforeach
                                            
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
                                <div class="col-lg-8">

                                    <div class="tab-pane show active" id="thongtinkhac">

                                        <!-- end Cash on Delivery box-->
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <a href="/admin/goods/index" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                    <i class="mdi mdi-arrow-left"></i> Home </a>
                                            </div>
                                            <!-- end col -->
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