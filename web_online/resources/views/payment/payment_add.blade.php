@extends('layouts.layout_admin')
@section('title')
Thêm phương thức thanh toán
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="addproduct">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3 class="mt-2">Thêm 1 Phương thức thanh toán Mới</h3>
                                <p class="text-muted mb-4"></p>
                                <form role="form" action="/admin/payment/save" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="billing-first-name" class="form-label">Mã Thanh toán</label>
                                                <input class="form-control" name="MA_THANHTOAN" type="text" placeholder="Mã Thanh toán" id="ma_danhmuc" value={{$loai -> MA_THANHTOAN}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Phương Thức Thanh toán</label>
                                                <input class="form-control" name="PHUONGTHUC_THANHTOAN" type="text" placeholder="Phương Thức Thanh toán" id="ten_danhmuc" value={{$loai -> PHUONGTHUC_THANHTOAN}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="/admin/payment/index" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                <i class="mdi mdi-arrow-left"></i> Home </a>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="text-sm-end">
                                                <button  type="submit" class="btn btn-danger"/>
                                                    <i class="mdi mdi-truck-fast me-1"></i> Lưu lại </a>

                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                </form>                  
                            </div>     
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection