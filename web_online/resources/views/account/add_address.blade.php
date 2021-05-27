@extends('layouts.layout_detail')
@section('title')
Add Address
@endsection
@section('content')
<div id="account-register" class="container">
    <ul class="breadcrumb">
        <li><a href="/home"><i class="fa fa-home"></i></a></li>
        <li><a href="/account">Tài khoản</a></li>
        <li><a href="/account/add_address">Thêm địa chỉ mới</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">
            <h1>Thêm 1 địa chỉ mới</h1>
            <form action="/account/add_address/save" method="post" enctype="multipart/form-data" class="form-horizontal">
                <fieldset id="account">
                    <legend>Nơi thanh toán</legend>
                    <div class="form-group required" style="display:  none ;">
                        <label class="col-sm-2 control-label">Customer Group</label>
                        <div class="col-sm-10">                            <div class="radio">
                                <label>
                                    <input type="radio" name="customer_group_id" value="1" checked="checked">
                                    Default</label>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-lastname">Tỉnh - Huyện</label>
                        <div class="col-sm-10">
                            <select class="form-control address" name="TEN_TINH" id="customer_id_province">
                                <option value="" >--</option>
                                @foreach ($tinh as $item)
                                <option value="{{$item->MA_TINH}}" >{{$item->TEN_TINH}}</option>
                                @endforeach
                            </select>
                            <select class="form-control address" name="TEN_HUYEN" id="customer_id_district">
                                <option value="" >--</option>
                                @foreach ($huyen as $item)
                                <option hidden=""  value="{{$item->MA_HUYEN}}" data-tinh="{{$item->MA_TINH}}">{{$item->TEN_HUYEN}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-lastname">Xã - Ấp</label>
                        <div class="col-sm-10">
                            <select class="form-control address" name="MA_XA" id="customer_id_ward">
                                <option value="" >--</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-postcode">Đường / Số nhà</label>
                        <div class="col-sm-10">
                            <input type="text" name="CHITIET" value="{{$noithanhtoan->CHITIET}}" placeholder="Đường / Số nhà" id="input-postcode" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-postcode">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input type="number" name="DT" value="{{$noithanhtoan->DT}}" placeholder="số điện thoại" id="input-postcode" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                        <input type="submit" value="Hoàn thành" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <script>

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
                $.ajax({
                url: '/load_xa',
                      type: 'get',
                      data:{
                      MA_HUYEN : ma_huyen
                    },                              
                    success: function( data ) {
                        $("select[name='MA_XA'").html();
                        $.each(data, function(index, value){
                            var html = "<option value=" +  value.MA_XA +" data-huyen="+  value.MA_HUYEN + ">" +  value.TEN_XA + "</option>";
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
                <a href="/account/orders" class="list-group-item">Lịch sử mua hàng</a>
                <a href="/chat" class="list-group-item">Trao đỏi với shop</a>
                <a href="/voucher" class="list-group-item">Lấy mã khuyến mãi</a> 
                <a href="/account/pass" class="list-group-item">cập nhật mật khẩu</a> 
                <a href="/logout" class="list-group-item">Đăng xuất</a> 
            </div>
        </aside>
    </div>
</div>
@endsection