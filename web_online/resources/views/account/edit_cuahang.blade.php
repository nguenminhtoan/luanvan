@extends('layouts.layout_admin')
@section('title')
Hồ sơ cửa hàng
@endsection
@section('content')
<!-- Start Content-->
<form role="form" action="/update/{{$cuahang->MA_CUAHANG}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h3 class="mt-0">
        Hồ sơ cửa hàng
    </h3>
    <div class="badge bg-secondary text-light mb-3">Ongoing</div>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-firstname">Tên Shop</label>
        <div class="col-sm-10">
            <input type="text" name="TEN_CUAHANG" value="{{$cuahang ->TEN_CUAHANG}}" placeholder="Tên shop"class="form-control">
        </div>
    </div>
    <div class="text-muted mb-2">
        <label class="col-sm-2 control-label" for="input-firstname">Mô tả</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="MOTA" id="example-textarea" rows="5" placeholder="Mô tả chi tiết của hàng"></textarea>
        </div>
    </div>
    <div class="text-muted mb-2">
        <label class="col-sm-2 control-label" for="input-telephone">Ngành hàng</label>
        <div class="col-sm-10">
            <select name="MA_NGANH">
                @foreach($nganhhang as $item)
                <option value="{{ $item -> MA_NGANH }}" {{ $cuahang->MA_NGANH == $item->MA_NGANH ? 'selected' : '' }}  >{{ $item -> TEN }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-lg-4" for="danhmuc_image">Hình nền</label>
                    <div class="col-lg-8">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail"  style="width: 200px; height: 150px;">
                                <img id='hinhanh' style="width: 200px; height: 150px;" />
                            </div>
                            <input type="hidden" name="HINHANH" id="cuahang_link" value="{{$cuahang-> HINHANH}}" >
                            <div>
                                <span class="btn btn-default btn-file">
                                    <input data-preview="#preview" name="input_img" id="imageInput" type="file" >
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-4">
                <label class="col-sm-2 control-label" for="input-lastname">Tỉnh/Huyện</label>
                <div class="col-sm-10">
                    <select class="form-control address" name="TEN_TINH" id="customer_id_province">
                        <option value="" >--</option>
                        @foreach ($tinh as $item)
                        <option value="{{$item->MA_TINH}}" >{{$item->TEN_TINH}}</option>
                        @endforeach
                    </select>
                    <select class="form-control address" name="TEN_HUYEN" id="customer_id_district">
                        <option value="" >--</option>
                        @foreach ($huyen as $item)
                        <option  value="{{$item->MA_HUYEN}}" data-tinh="{{$item->MA_TINH}}" style="display: none;">{{$item->TEN_HUYEN}}</option>
                        @endforeach
                    </select>
                </div>
            </div>    
        </div>  
        <div class="col-md-4">
            <div class="mb-4">
                <label class="col-sm-2 control-label" for="input-lastname">Xã/Ấp</label>
                <div class="col-sm-10">
                    <select class="form-control address" name="MA_XA" id="customer_id_ward">
                        <option value="" >--</option>

                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-postcode">Chi tiết địa chỉ</label>
        <div class="col-sm-10">
            <input type="text" name="DIACHI" value="{{$cuahang->DIACHI}}" placeholder="Post Code" id="input-postcode" class="form-control">
        </div>
    </div>
    <style>
        .address{
            width: 49%;
            float: left;
            margin-right: 1%;
        }
    </style>
    <div class="row mt-4">
        <div class="col-sm-6">
            <a href="/cuahang/{id}" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                <i class="mdi mdi-arrow-left"></i> Trở lại </a>
        </div>
        <!-- end col -->
        <div class="col-sm-6">
            <div class="text-sm-end">
                <button type="submit" class="btn btn-danger">
                    <i class="mdi mdi-truck-fast me-1"></i> Lưu lại </button>

            </div>
        </div>
    </div>
</form>    
    <script>

        $("#customer_id_province").change(function () {
            var ma_tinh = $(this).val();
            $("#customer_id_district").find("option").hide();
            $("#customer_id_ward").find("option").hide();
            $("#customer_id_ward").find("option[value='']").show();
            $("#customer_id_ward").find("option[value='']").prop("selected", true);
            $("#customer_id_district").find("option[value='']").show();
            $("#customer_id_district").find("option[value='']").prop("selected", true);
            $("#customer_id_district").find("option[data-tinh='" + ma_tinh + "']").show();
        });
        $("#customer_id_district").change(function () {
            var ma_huyen = $(this).val();
            $("#customer_id_ward").find("option").hide();
            $("#customer_id_ward").find("option[value='']").show();
            $("#customer_id_ward").find("option[value='']").prop("selected", true);
            $.ajax({
                url: '/load_xa',
                type: 'get',
                data: {
                    MA_HUYEN: ma_huyen
                },
                success: function (data) {
                    $("select[name='MA_XA'").html();
                    $.each(data, function (index, value) {
                        var html = "<option value=" + value.MA_XA + " data-huyen=" + value.MA_HUYEN + ">" + value.TEN_XA + "</option>";
                        $("#customer_id_ward").append(html);
                    });
                }
            });
        });
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

    <!-- container -->

    @endsection
