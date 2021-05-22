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
            @foreach($noithanhtoan as $item)
                <fieldset id="account">
                    <legend>Địa chỉ của tôi</legend>
                    <div class="form-group required" style="display:  none ;">
                        <label class="col-sm-2 control-label">Customer Group</label>
                        <div class="col-sm-10">                            
                            <div class="radio">
                                <label>
                                    <input type="radio" name="customer_group_id" value="1" checked="checked">
                                    Default
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">Họ và tên</label>
                        <div class="col-sm-10">
                            <input disabled="" type="text" name="TEN_NGUOIDUNG" value="{{$item ->TEN_NGUOIDUNG}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input disabled="" type="text" name="DIACHI" value="{{$item ->CHITIET}}, {{$item ->TEN_XA}}, {{$item ->TEN_HUYEN}}, {{$item ->TEN_TINH}}"id="input-firstname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input disabled="" type="number" name="DT" value="{{$item ->DT}}"id="input-firstname" class="form-control">
                        </div>
                    </div>
                </fieldset>
            @endforeach
            <br>
                <a href="/account/add_address" class="button button-primary">+ Thêm địa chỉ mới </a>
                <ul class="pull-right">
                    <li><a href="/home"><i class="fa fa-home"></i></a> Trở về</li>
                </ul>
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