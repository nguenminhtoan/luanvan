@extends('layouts.layout_admin')
@section('title')
Thêm sản phẩm mới
@endsection
@section('content')
<script src="/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({ 
  selector:'textarea',
  plugins: [ "advlist autolink lists link image charmap print preview anchor textcolor textcolor colorpicker",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table contextmenu paste"],
  file_browser_callback: function(field_name, url, type, win) {
    sessionStorage.setItem("sent", field_name);
    window.open("/admin/upload", field_name, "width=650, height=500");
  }
});
</script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <form action="/admin/product/save" method="POST" enctype="multipart/form-data" >
                        <div class="tab-pane show active" id="Thongtincoban">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- end row-->
                                    <h3 class="mt-4">Thông tin cơ bản</h3>
                                    <p class="text-muted mb-4">
                                    </p>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label for="new-adr-first-name" class="form-label">Tên sản phẩm<span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="TEN_SP" placeholder="Tên sản phẩm" id="new-adr-first-name" />
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="new-adr-email-address" class="form-label">Danh mục<span class="text-danger">*</span></label>
                                                <select data-toggle="select2" class="form-control" name="MA_DANHMUC">
                                                    @if(is_array($danhmuc))
                                                    <option value="">--</option>
                                                    @foreach ($danhmuc as $dmsp)
                                                    <option value="{{ $dmsp->MA_DANHMUC }}">{{ $dmsp->TEN_DANHMUC }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label class="form-label">Thuộc tính</label>
                                                <select class='form-control' name="MA_THUOCTINH[]" title="THUOCTINH_SP">
                                                    @if(is_array($thuoctinh))
                                                    <option value="">--</option>
                                                    @foreach ($thuoctinh as $dmsp)
                                                    <option value="{{ $dmsp->MA_THUOCTINH }}">{{ $dmsp->TEN_THUOCTINH }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label"> Giá trị</label>
                                            <div class="mb-3" >
                                                <input class="form-control" name='GIATRI[]' />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="template" style="display: none;">
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <select class='form-control' name="MA_THUOCTINH[]" title="Country">
                                                    @if(is_array($thuoctinh))
                                                    <option value="">--</option>
                                                    @foreach ($thuoctinh as $dmsp)
                                                    <option value="{{ $dmsp->MA_THUOCTINH }}">{{ $dmsp->TEN_THUOCTINH }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3" >
                                                <input class="form-control" name='GIATRI[]' />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class='text-sm-end'>
                                                <a href="javascript:void(0);" onclick="remove_attribute(this);" class="btn btn-success"><i class="fas fa-check"></i> Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='text-sm-end'>
                                            <a href="javascript:void(0);" onclick="add_attribute();" class="btn btn-success"><i class="fas fa-check"></i> Thêm</a>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end table-responsive -->
                            </div>
                            <!-- end .border-->
                        </div>
                        <!-- end col -->            

                        <!-- End Shipping Information Content-->
                        <div class="tab-pane show active" id="thongtinbanhang">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- end row-->
                                    <h4 class="mt-4">Thông tin Bán Hàng</h4>
                                    <p class="text-muted mb-4">
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="new-adr-first-name" class="form-label">Giá</label>
                                                <input class="form-control" name="GIA" type="number" placeholder="tiền " id="new-adr-first-name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="new-adr-last-name" class="form-label">Giảm giá</label>
                                                <input class="form-control" name="GIAMGIA" type="number" placeholder="tiền giảm giá" id="new-adr-last-name" />
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                                <!-- end .border-->
                            </div>
                            <!-- end col -->            
                        </div>
                        <!-- end row-->

                        <!-- Quản lý hình ảnh-->
                        <div class="tab-pane show active" id="quanlyhinhanh">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- end row-->
                                    <h3 class="mt-4">Quản lý hình ảnh</h3>
                                    <p class="text-muted mb-4">
                                    </p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img id='hinhanh' class="img-fluid rounded mb-2" style="width: 200px; height: 150px;" />
                                            <div>
                                                    <input type="hidden" name="HINHANH[]" >
                                                    <input id="img_1" accept="image/x-png,image/gif,image/jpeg"  class="btn btn-primary btn-sm" name="input_img[]" onchange="change_img(this)" type="file" style="display: none;">
                                                    <label for="img_1" class="btn btn-primary btn-sm" >upload</label>
                                                    
                                            </div>
                                        </div>
                                        
                                        <div id="add_img" style="display: none;">
                                            <div class="col-md-3">
                                                <img id='hinhanh' class="img-fluid rounded mb-2" style="width: 200px; height: 150px;" />
                                                <div>
                                                        <input type="hidden" name="HINHANH[]" >
                                                        <input accept="image/x-png,image/gif,image/jpeg" class="btn btn-primary btn-sm" name="input_img[]" onchange="change_img(this)" type="file" style="display: none;">
                                                        <label for="" class="btn btn-primary btn-sm" href="#">upload</label>
                                                        <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="remove_img(this);" >remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='row'>
                                        <div class='text-sm-end'>
                                            <a href="javascript:void(0);" onclick="add_img();" class="btn btn-success"><i class="fas fa-check"></i> +</a>
                                        </div>
                                    </div> 
                                            
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="new-adr-last-name" class="form-label">Mô tả sản phẩm</label>
                                            <textarea class="form-control" rows="15" name="CHI_TIET" rows="5" placeholder="Mô tả chi tiết sản phẩm"></textarea>
                                        </div>
                                    </div>
                            </div>
                            <!-- end table-responsive -->

                            <!-- end .border-->
                        </div>
                        <!-- end col -->            

                        <!-- end row-->
                        <!-- Payment Content-->
                        <div class="tab-pane show active" id="luachonthanhtoan">
                            <div class="row">
                                <div class="col-lg-12">
                                    
                                    <div class="tab-pane show active" id="thongtinkhac">
                                        
                                        <!-- end Cash on Delivery box-->
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <a href="apps-ecommerce-products.html" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                    <i class="mdi mdi-arrow-left"></i> Home </a>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="text-sm-end">
                                                    <input name="AN_HIEN" value="1" type="hidden"  />
                                                    <a href="javascript:void(0);" onclick="submit(1);" class="btn btn-danger">
                                                        <i class="mdi mdi-cash-multiple me-1"></i> Lưu và hiễn thị </a>
                                                
                                                    <a href="javascript:void(0);" onclick="submit(0);"  class="btn btn-danger">
                                                        <i class="mdi mdi-cash-multiple me-1"></i> Lưu và Ẩn </a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
<script>
    
    var i = 1;
    function add_attribute(){
        var html = "<div class='row' > " + $("#template").html() + "</div>";
        $("#template").before(html);
    }
    
    function remove_attribute(event){
        $(event).closest(".row").remove();
    }
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var img = $(input).closest(".col-md-3").find("img");
            reader.onload = function (e) {
                img.attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    function add_img(){
        var html = $("#add_img");
        i = i + 1;
        html.find("input[type='file']").attr("id", "img_"+ i);
        html.find("label").attr("for", "img_"+ i);
        $("#add_img").before(html.html());
    }
    function remove_img(event){
        $(event).closest(".col-md-3").remove();
    }
    
    function change_img(event){
        readURL(event);
    }
    
    function submit(num){
        $("input[name='AN_HIEN']").attr('value',num);
        $("form").submit();
    }
</script>
@endsection