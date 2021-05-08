@extends('layouts.layout_admin')
@section('title')
Phương thức vận chuyển đơn hàng mới
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
                                <h3 class="mt-2">Thêm 1 Phương thức vận chuyển Mới</h3>
                                <p class="text-muted mb-4"></p>
                                <form role="form" action="/admin/ship/save" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Phương Thức Vận Chuyển</label>
                                                <input class="form-control" type="text" name="PHUONGTHUC_VANCHUYEN" placeholder="Phương Thức Vận Chuyển" id="phuongthu_vanchuyen" value={{$loai -> PHUONGTHUC_VANCHUYEN}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  class="form-label">Thời Gian Dự Kiến</label>
                                                <input class="form-control" type="text" name="THOIGIADUKIEN" placeholder="Thời Gian Dự Kiến" id="thoigiandukien" value={{$loai -> THOIGIADUKIEN}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Đơn Giá</label>
                                                <input class="form-control" type="text" name="DONGIA" placeholder="Đơn Giá" id="dongia" value={{$loai -> DONGIA}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="/admin/ship/index" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
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