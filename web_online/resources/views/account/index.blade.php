@extends('layouts.layout_detail')
@section('title')
Account
@endsection
@section('content')
<div id="account-register" class="container">
    <ul class="breadcrumb">
        <li><a href="/home"><i class="fa fa-home"></i></a></li>
        <li><a href="/account">Tài khoản</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">
            <h1>Tài khoản của tôi</h1>
            <form action="/account/update/{{$nguoidung->MA_NGUOIDUNG}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset id="account">
                    <legend>Thông tin cá nhân</legend>
                    <div class="form-group required" style="display:  none ;">
                        <label class="col-sm-2 control-label">Customer Group</label>
                        <div class="col-sm-10">                            <div class="radio">
                                <label>
                                    <input type="radio" name="customer_group_id" value="1" checked="checked">
                                    Default</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">Họ và tên</label>
                        <div class="col-sm-10">
                            <input type="text" name="TEN_NGUOIDUNG" value="{{$nguoidung ->TEN_NGUOIDUNG}}"id="input-firstname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-lastname">Giới tính</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" {{ $nguoidung ->GIOITINH == 'Nam' ? 'checked' : '' }} name="GIOITINH" value="Nam">
                                Nam
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="GIOITINH"  {{ $nguoidung ->GIOITINH == 'Nữ' ? 'checked' : '' }}  value="Nữ" >
                                Nữ
                            </label>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="EMAIL" value="{{$nguoidung ->EMAIL}}" id="input-email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-lastname">Ngày sinh</label>
                        <div class="col-sm-10">
                            <input name="NGAYSINH" value="{{$nguoidung ->NGAYSINH}}" id="input-lastname" class="form-control">
                        </div>
                    </div>
                    <style>
                        .address{
                            width: 49%;
                            float: left;
                            margin-right: 1%;
                        }
                    </style>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-country">Tỉnh / Thành phố</label>
                                <div class="col-sm-10">
                                    <select class="form-control address" name="MA_TINH" id="customer_id_province">
                                        <option value="" ></option>
                                        @foreach ($tinh as $item)
                                        <option value="{{$item->MA_TINH}}" {{ $item->MA_TINH ==  $nguoidung->MA_TINH ? "selected=''" : ""}} >{{$item->TEN_TINH}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-zone">Quận / Huyện</label>
                                <div class="col-sm-10">
                                    <select class="form-control address" name="MA_HUYEN" id="customer_id_district">
                                        <option value="" ></option>
                                        @foreach ($huyen as $item)
                                        <option value="{{$item->MA_HUYEN}}" {{$item->MA_TINH ==  $nguoidung->MA_TINH ? "" : 'hidden'}} {{ $item->MA_HUYEN ==  $nguoidung->MA_HUYEN ? "selected=''" : ""}} data-tinh="{{$item->MA_TINH}}">{{$item->TEN_HUYEN}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-zone">Xã / Thị trấn</label>
                                <div class="col-sm-10">
                                    <select class="form-control address" name="MA_XA" id="customer_id_ward">
                                        <option value="" ></option>
                                        @foreach ($xa as $item)
                                        @if( $item->MA_HUYEN ==  $nguoidung->MA_HUYEN)
                                        <option value="{{$item->MA_XA}}"  {{ $item->MA_XA ==  $nguoidung->MA_XA ? "selected=''" : ""}} data-huyen="{{$item->MA_HUYEN}}">{{$item->TEN_XA}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-telephone">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input type="tel" name="SDT" value="{{$nguoidung ->SDT}}" id="input-telephone" class="form-control">
                        </div>
                    </div>
                    <button type="submit" id="button-quote" data-loading-text="Loading..." class="btn btn-primary">Cập nhật Thông tin</button>
                </fieldset>
                <ul class="pull-right">
                    <li><a href="/home"><i class="fa fa-home"></i></a> Trở về</li>
                </ul>
            </form>
        </div>
<script type="text/javascript">
    $("#customer_id_province").change(function () {
        var ma_tinh = $(this).val();
        $("#customer_id_district").find("option").hide();
        $("#customer_id_ward").find("option").hide();
        $("#customer_id_ward").find("option[value='']").show();
        $("#customer_id_ward").find("option[value='']").prop("selected", true);
        $("#customer_id_district").find("option[value='']").show();
        $("#customer_id_district").find("option[value='']").prop("selected", true);
        $("#customer_id_district").find("option[data-tinh='" + ma_tinh + "']").show();
    });

    $("#customer_id_district").change(function () {
        var ma_huyen = $(this).val();
        $("#customer_id_ward").find("option").hide();
        $("#customer_id_ward").find("option[value='']").show();
        $("#customer_id_ward").find("option[value='']").prop("selected", true);
        $("#customer_id_ward").find("option[data-huyen='" + ma_huyen + "']").show();
//        var ma_huyen = $("select[name='TEN_HUYEN'").find("option:selected").val();
        $.ajax({
            url: '/load_xa',
                type: 'get',
                data:{
                MA_HUYEN : ma_huyen
                },
                success: function(data) {
                $("select[name='MA_XA'").html();
                $.each(data, function(index, value){
                var html = "<option value=" + value.MA_XA + " data-huyen=" + value.MA_HUYEN + ">" + value.TEN_XA + "</option>";
                $("#customer_id_ward").append(html);
                });
            }
        });
    });
</script>
        <aside class="col-md-3 col-sm-4 col-xs-12 content-aside right_column sidebar-offcanvas">
            <span id="close-sidebar" class="fa fa-times"></span>
            <div class="list-group">
                <a href="/account/index" class="list-group-item">Tài khoản của tôi</a>
                <a href="/account/address" class="list-group-item">Địa chỉ giao hàng</a> 
                <a href="/search?cookie=1" class="list-group-item">Sản phẩm vừa xem</a>
                <a href="/account/orders" class="list-group-item">Mua hàng</a>
                <a href="/chat" class="list-group-item">Trao đỏi với shop</a>
                <a href="/voucher" class="list-group-item">Lấy mã khuyến mãi</a> 
                <a href="/account/pass" class="list-group-item">cập nhật mật khẩu</a> 
                <a href="/logout" class="list-group-item">Đăng xuất</a> 
            </div>
        </aside>
    </div>
</div>
@endsection