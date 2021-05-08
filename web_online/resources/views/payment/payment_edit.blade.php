@extends('layouts.layout_admin')
@section('title')
Chỉnh sửa phương thức thanh toán
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="addindustries">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3 class="mt-2">Chỉnh sửa phương thức thanh toán</h3>
                                <p class="text-muted mb-4"></p>
                                <form role="form" action="/admin/payment/update/{{$loai->MA_VANCHUYEN}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phương thức thanh toán</label>
                                                <input class="form-control" name="PHUONGTHUC_VANCHUYEN" type="text" placeholder="Phương thức thanh toán" id="ten" value={{$loai -> PHUONGTHUC_VANCHUYEN}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Thời gian dự kiến</label>
                                                <input class="form-control" type="text" name="THOIGIADUKIEN" placeholder="Thời gian dự kiến" id="Thời gian dự kiến" value={{$loai -> THOIGIADUKIEN}} >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phí dịch vụ</label>
                                                <input class="form-control" name="DONGIA" type="text" placeholder="Phí dịch vụ" id="ten" value={{$loai -> DONGIA}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="/admin/patment/index" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                <i class="mdi mdi-arrow-left"></i> Trở lại</a>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="text-sm-end">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="mdi mdi-truck-fast me-1"></i> Lưu lại </button>

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