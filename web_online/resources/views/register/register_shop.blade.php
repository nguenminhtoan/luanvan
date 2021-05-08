@extends('layouts.layout_detail')
@section('title')
Register Cửa hàng
@endsection
@section('content')
<div id="account-register" class="container">
    <ul class="breadcrumb">
        <li><a href="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=common/home"><i class="fa fa-home"></i></a></li>
        <li><a href="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=account/account">Account</a></li>
        <li><a href="https://opencart.opencartworks.com/themes/so_supermarket/index.php?route=account/register">Tạo cửa hàng</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">
            <h1>Tài khoản của tôi</h1>
            <p><a href="/login">Trang tạo của hàng</a>.</p>
            <form action="/admin/create_shop" method="post" enctype="multipart/form-data" class="form-horizontal">
                <fieldset id="account">
                    <legend>Thông tin Shop</legend>
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
                        <label class="col-sm-2 control-label" for="input-firstname">Tên Shop</label>
                        <div class="col-sm-10">
                            <input type="text" name="TEN_CUAHANG" value="{{$cuahang ->TEN_CUAHANG}}" placeholder="Tên shop"class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">Mô tả</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="MOTA" id="example-textarea" rows="5" placeholder="Mô tả chi tiết của hàng"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-lg-4" for="danhmuc_image">Hình nền</label>
                            <div class="col-lg-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail"  style="width: 200px; height: 150px;">
                                        <img id='hinhanh' style="width: 200px; height: 150px;" />
                                    </div>
                                    <input type="hidden" name="HINHANH" id="cuahang_link" value="{{$cuahang-> HINHANH}}" >
                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <input data-preview="#preview" name="input_img" id="imageInput" type="file" >
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .address{
                            width: 49%;
                            float: left;
                            margin-right: 1%;
                        }
                    </style>
                    <fieldset>
                        <div class="form-horizontal">
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
                                <label class="col-sm-2 control-label" for="input-postcode">Chi tiết địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" name="DIACHI" value="{{$cuahang->DIACHI}}" placeholder="Post Code" id="input-postcode" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-telephone">Ngành hàng</label>
                                <div class="col-sm-10">
                                    <select name="MA_NGANH">
                                        @foreach($nganhhang as $item)
                                        <option value="{{ $item -> MA_NGANH }}" >{{ $item -> TEN }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons">
                        <div class="pull-right">
                            <input type="submit" value="Đăng ký" class="btn btn-primary">
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
                    data: {
                        MA_HUYEN: ma_huyen
                    },
                    success: function (data) {
                        $("select[name='MA_XA'").html();
                        $.each(data, function (index, value) {
                            var html = "<option value=" + value.MA_XA + " data-huyen=" + value.MA_HUYEN + ">" + value.TEN_XA + "</option>";
                            $("#customer_id_ward").append(html);
                        });
                    }
                });
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#hinhanh').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#imageInput").change(function () {
                readURL(this);
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