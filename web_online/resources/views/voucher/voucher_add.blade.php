@extends('layouts.layout_admin')
@section('title')
Thêm một voucher mới
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="addvoucher">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3 class="mt-2">Thêm 1 hình thức khuyến mãi mới</h3>
                                <p class="text-muted mb-4"></p>
                                <form role="form" action="/admin/voucher/save" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Mã khuyến mãi</label>
                                                <input class="form-control" type="text" name="MA_KHUYENMAI" placeholder="Mã khuyến mãi" id="ma_khuyenmai" value={{$loai -> MA_KHUYENMAI}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  class="form-label">Tên khuyến mãi</label>
                                                <input class="form-control" type="text" name="TEN_KM" placeholder="Tên khuyến mãi" id="ten_km" value={{$loai -> TEN_KM}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  class="form-label">Bắt đầu</label>
                                                <input class="form-control" type="date" name="BATDAU" placeholder="Bắt đầu" id="batdau" value={{$loai -> BATDAU}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Kết thúc</label>
                                                <input class="form-control" type="date" name="KETTHUC" placeholder="Kết thúc" id="ketthuc" value={{$loai -> KETTHUC}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Giảm giá</label>
                                                <input class="form-control" type="number" name="GIAMGIA" placeholder="Giảm giá" id="giamgia" value={{$loai -> GIAMGIA}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="/admin/voucher/index" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                <i class="mdi mdi-arrow-left"></i> Home </a>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="text-sm-end">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="mdi mdi-truck-fast me-1"></i> Lưu lại </button>
                                            </div>
                                            <!-- end col -->
                                        </div>
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
<script>
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
@endsection