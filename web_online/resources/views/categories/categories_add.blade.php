@extends('layouts.layout_admin')
@section('title')
Thêm danh mục
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
                                <h3 class="mt-2">Thêm 1 Danh mục Mới</h3>
                                <p class="text-muted mb-4"></p>
                                <form role="form" action="/admin/categories/save" method="post" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Danh mục cha</label>
                                                <select class="form-control" name="DAN_MA_DANHMUC">
                                                    @if(is_array($danhmuc))
                                                    <option value="">--</option>
                                                    @foreach ($danhmuc as $dmsp)
                                                        @if (!$dmsp->DAN_MA_DANHMUC)
                                                        <option value="{{ $dmsp->MA_DANHMUC }}">{{ $dmsp->TEN_DANHMUC }}</option>
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Mã Danh Mục</label>
                                                <input class="form-control" type="text" name="MA_DANHMUC" placeholder="Mã Danh mục" id="ma_danhmuc" value={{$loai -> MA_DANHMUC}} >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Tên Danh Mục</label>
                                                <input class="form-control" name="TEN_DANHMUC" type="text" placeholder="Tên Danh Mục" id="ten_danhmuc" value={{$loai -> TEN_DANHMUC}}>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="danhmuc_image">Hình ảnh</label>
                                            <div class="col-lg-8">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail"  style="width: 200px; height: 150px;">
                                                        <img id='hinhanh' style="width: 200px; height: 150px;" />
                                                    </div>
                                                    <input type="hidden" name="HINHANH" id="danhmuc_link" value="{{$loai-> HINHANH}}" >
                                                    <div>
                                                        <span class="btn btn-default btn-file">
                                                            <input data-preview="#preview" name="input_img" id="imageInput" type="file" >
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="/admin/categories/index" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                <i class="mdi mdi-arrow-left"></i> Home </a>
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