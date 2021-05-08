@extends('layouts.layout_admin')
@section('title')
Hồ sơ cửa hàng
@endsection
@section('content')
<!-- Start Content-->
<h3 class="mt-0">
    Hồ sơ cửa hàng
</h3>
<div class="badge bg-secondary text-light mb-3">Ongoing</div>
<h5>Tên Cửa Hàng: {{$cuahang->TEN_CUAHANG}}</h5>
<p class="text-muted mb-2">
    {{$cuahang->MOTA}}
</p>
<div class="row">
    <div class="col-md-4">
        <div class="mb-4">
            <h5>Hình đại diện</h5>
            <img src="{{$cuahang->HINHANH}}" alt="user-image" class="rounded-circle" style="width: 150px; height: 170px;">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-4">
            <h5>Địa chỉ</h5>
            <p>{{$cuahang->DIACHI}},&nbsp;{{$cuahang->TEN_XA}},&nbsp;{{$cuahang->TEN_HUYEN}},&nbsp;{{$cuahang->TEN_TINH}}</p>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-sm-6">
        <a href="/edit/{{$cuahang->MA_CUAHANG}}" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
            <i class="mdi mdi-arrow-left"></i> Chỉnh sửa </a>
    </div>
</div>

<!-- container -->

@endsection