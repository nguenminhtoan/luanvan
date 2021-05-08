@extends('layouts.layout_admin')
@section('title')
Chỉnh sửa phương thức vận chuyển
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
                                <h3 class="mt-2">Chỉnh sửa phương thức vận chuyển</h3>
                                <p class="text-muted mb-4"></p>
                                <form role="form" action="/admin/ship/update/{{$loai->MA_VANCHUYEN}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Mã vận chuyển</label>
                                                <input class="form-control" type="text" name="MA_VANCHUYEN" placeholder="Mã vận chuyển" id="ma_nganh" value={{$loai -> MA_VANCHUYEN}} >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phương thức vận chuyển</label>
                                                <input class="form-control" name="PHUONGTHUC_VANCHUYEN" name='PHUONGTHUC_VANCHUYEN' type="text" placeholder="Phương thức vận chuyển" id="ten" value={{$loai -> PHUONGTHUC_VANCHUYEN}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Thời gian dự  kiên</label>
                                                <input class="form-control" type="text" name="THOIGIADUKIEN" placeholder="Thời gian dự  kiên" id="thoigaidukien" value={{$loai -> THOIGIADUKIEN}} >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phí phải trả</label>
                                                <input class="form-control" name="DONGIA"  type="text" placeholder="Phí phải trả" id="dongia" value={{$loai -> DONGIA}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="/admin/ship/index" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
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