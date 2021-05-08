@extends('layouts.layout_admin')
@section('title')
Thêm trạng thái đơn hàng mới
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
                                <h3 class="mt-2">Thêm 1 Ngành Hàng Mới</h3>
                                <p class="text-muted mb-4"></p>
                                <form role="form" action="/admin/status/save" method="post" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Mã trạng thái</label>
                                                <input class="form-control" type="text" name="MA_TRANGTHAI" placeholder="Mã trạng thái" id="ma_trangthai" value={{$loai -> MA_TRANGTHAI}} >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Tên trạng thái</label>
                                                <input class="form-control" name="TEN_TRANGTHAI" type="text" placeholder="Tên trạng thái" id="ten" value={{$loai -> TEN_TRANGTHAI}}>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="/admin/status/index" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                <i class="mdi mdi-arrow-left"></i> Trở Lại</a>
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
</html>