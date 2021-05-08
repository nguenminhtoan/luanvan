@extends('layouts.layout_admin')
@section('title')
Cập nhật thuộc tính
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
                                <h3 class="mt-2">Cập nhật Thuộc tính</h3>
                                <p class="text-muted mb-4"></p>
                                <form role="form" action="/admin/properties/update/{{$loai->MA_THUOCTINH}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Mã thuộc tính</label>
                                                <input class="form-control" type="text" name="MA_THUOCTINH" placeholder="Mã thuộc tính" id="ma_thuoctinh" value={{$loai -> MA_THUOCTINH}} >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tên thuộc tính</label>
                                                <input class="form-control" name="TEN_THUOCTINH" type="text" placeholder="Tên thuộc tính" id="ten_thuoctinh" value={{$loai -> TEN_THUOCTINH}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="/admin/properties/index" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
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