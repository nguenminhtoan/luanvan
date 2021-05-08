@extends('layouts.layout_detail')
@section('title',"Order")
@endsection
@section('content')
<div id="checkout-cart" class="container" method="post" action="/cart/add_order">
    <ul class="breadcrumb">
        <li><a href="/home"><i class="fa fa-home"></i></a></li>
        <li><a href="/cart">Shopping Cart</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-12">
            <h1>Đơn hàng của bạn
            </h1>
                @foreach($cuahang as $item)
                <div class="table-responsive">
                    <h1>{{ $item->TEN_CUAHANG}}</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-left">Sản phẩm</td>
                                <td class="text-left">Tổng sản phẩm</td>
                                <td class="text-left">Tổng tiền</td>
                                <td class="text-left">Giảm giá</td>
                                <td class="text-left">Voucher</td>
                                <td class="text-left">Phương thức thanh toán</td>
                                <td class="text-right">Phương thức vận chuyển</td>
                                <td class="text-right">Tổng tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_array($sanpham))
                                @foreach ($sanpham as $sp)
                                @if($item->MA_CUAHANG == $sp->MA_CUAHANG)
                                <tr>
                                    <td class="text-center"><img src="{{$sp->URL}}" style="width: 47px; height: 47px; " alt="Sausage cowbee" title="Sausage cowbee" class="img-thumbnail"></td>
                                    <td class="text-left">{{$sp->TEN_SP}}<br>              
                                    </td>
                                    <td class="text-left">
                                        {{}}
                                    </td>
                                    <td class="text-left">
                                        {{number_format($sp->TONGTIEN)}}VNĐ
                                    </td>
                                    <td class="text-right">{{number_format($sp->GIAMGIA)}}VNĐ</td>
                                    <td class="text-right">{{number_format($sp->KHUYENMAI)}}VNĐ</td>
                                    
                                    <td class="text-right">{{$sp->PHUONGTHUC_THANHTOAN}}</td>
                                    <td class="text-right">{{$sp->PHUONGTHUC_VANCHUYEN}}</td>
                                </tr>
                                @endif
                                @endforeach 
                            @endif
                        </tbody>
                    </table> 
                </div>
                @endforeach
            <div class="buttons clearfix">
                <div class="pull-left"><a href="/home" class="btn btn-default">Tiếp tục mua</a></div>
            </div>
        </div>
    </div>
</div>


@endsection