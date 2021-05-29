@extends('layouts.layout_detail')
@section('title')
Register Cửa hàng
@endsection
@section('content')
<div id="account-register" class="container">
    <ul class="breadcrumb">
        <li><a href="/home"><i class="fa fa-home"></i></a></li>
        <li><a href="/account">Account</a></li>
        <li><a href="/account/register_shipper">Tạo tài khoản chuyển hàng</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">
            <h1>Tài khoản chuyển hàng</h1>
            <p><a href="/login">Trang tạo </a>.</p>
            <form action="/admin/create_shipper" method="post" class="form-horizontal">
                    <fieldset id="account">
                        <legend>Thông tin Shipper</legend>

                        {{ csrf_field() }}
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-firstname">Phương tiện vận chuyển</label>
                            <div class="col-sm-10">
                                <input type="text" name="PHUONGTIEN" value="" placeholder="Loại phương tiện"class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-firstname">Đơn vị vận chuyển</label>
                            <div class="col-sm-10">
                                <select class="form-control address" name="TEN_HUYEN" id="customer_id_district">
                                    @foreach ($vanchuyen as $item)
                                    <option value="{{$item->MA_VANCHUYEN}}">{{$item->PHUONGTHUC_VANCHUYEN}}</option>
                                    @endforeach
                                </select>
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