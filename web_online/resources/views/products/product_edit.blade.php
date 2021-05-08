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
                    <form action="/admin/product/update/{{$sanpham->MA_SP}}" method="POST" enctype="multipart/form-data" >
                        <div class="tab-pane show active" id="Thongtincoban">
                            <div class="row">
                                <div class="col-lg-8">
                                    <!-- end row-->
                                    <h3 class="mt-4">Thông tin cơ bản</h3>
                                    <p class="text-muted mb-4">
                                    </p>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="new-adr-first-name" class="form-label">Tên sản phẩm</label>
                                                <input class="form-control" type="text" name="TEN_SP" placeholder="Tên sản phẩm" value="{{ $sanpham -> TEN_SP}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="new-adr-email-address" class="form-label">Danh mục<span class="text-danger">*</span></label>
                                                <select data-toggle="select2" class="form-control" name="MA_DANHMUC">
                                                    @if(is_array($danhmuc))
                                                    <option value="">--</option>
                                                    @foreach ($danhmuc as $dmsp)
                                                    <option value="{{ $dmsp->MA_DANHMUC }}"  {{ $dmsp->MA_DANHMUC == $sanpham->MA_DANHMUC ? 'selected' : '' }}>{{ $dmsp->TEN_DANHMUC }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @if(is_array($thuoctinhsp))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Thuộc tính<span class="text-danger">*</span></label>
                                                    <select class='form-control' name="MA_THUOCTINH[]" title="Country">
                                                        @if(is_array($thuoctinh))
                                                        <option value="">--</option>
                                                        @foreach ($thuoctinh as $dmsp)
                                                        <option value="{{ $dmsp->MA_THUOCTINH }}" {{ $dmsp->MA_THUOCTINH == $thuoctinhsp[0]->MA_THUOCTINH ? 'selected' : '' }}>{{ $dmsp->TEN_THUOCTINH }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label"> Giá trị</label>
                                                <div class="mb-3" >
                                                    <input class="form-control" name='GIATRI[]' value="{{ $thuoctinhsp[0]->GIATRI }}" />
                                                </div>
                                            </div>
                                        </div>
                                        @for($key = 1; $key < sizeof($thuoctinhsp); $key++)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <select class='form-control' name="MA_THUOCTINH[]" title="Country">
                                                            @if(is_array($thuoctinh))
                                                            <option value="">--</option>
                                                            @foreach ($thuoctinh as $dmsp)
                                                            <option value="{{ $dmsp->MA_THUOCTINH }}" {{ $dmsp->MA_THUOCTINH == $thuoctinhsp[$key]->MA_THUOCTINH ? 'selected' : '' }}>{{ $dmsp->TEN_THUOCTINH }}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3" >
                                                        <input class="form-control" name='GIATRI[]'  value="{{ $thuoctinhsp[$key]->GIATRI }}"  />
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class='text-sm-end'>
                                                        <a href="javascript:void(0);" onclick="remove_attribute(this);" class="btn btn-success"><i class="fas fa-check"></i> Xóa</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    @endif
                                    <div class="row" id="template" style="display: none;">
                                        <div class="col-md-6">
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
                                        <div class="col-md-4">
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
                                <div class="col-lg-8">
                                    <!-- end row-->
                                    <h4 class="mt-4">Thông tin Bán Hàng</h4>
                                    <p class="text-muted mb-4">
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="new-adr-first-name" class="form-label">Giá</label>
                                                <input class="form-control" name="GIA" value="{{$sanpham->GIA}}" type="number" placeholder="tiền " id="new-adr-first-name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="new-adr-last-name" class="form-label">Mua nhiều giảm giá</label>
                                                <input class="form-control" name="GIAMGIA" {{$sanpham->GIAMGIA}} type="number" placeholder="tiền giảm giá" id="new-adr-last-name" />
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
                                <div class="col-lg-8">
                                    <!-- end row-->
                                    <h3 class="mt-4">Quản lý hình ảnh</h3>
                                    <p class="text-muted mb-4">
                                    </p>
                                    <div class="row">
                                        @if(is_array($hinhanh))
                                            <div class="col-md-3">
                                                <img id='hinhanh' src="{{ $hinhanh[0]->URL }}" class="img-fluid rounded mb-2" style="width: 200px; height: 150px;" />
                                                <div>
                                                    <input type="hidden" name="HINHANH[]" value="{{ $hinhanh[0]->URL }}" >
                                                    <input id="img_0" accept="image/x-png,image/gif,image/jpeg"  class="btn btn-primary btn-sm" name="input_img[]" onchange="change_img(this)" type="file" style="display: none;">
                                                    <label for="img_0" class="btn btn-primary btn-sm" >upload</label>

                                                </div>
                                            </div>
                                            @for($key = 1; $key < sizeof($hinhanh); $key++)
                                            <div class="col-md-3">
                                                <img src="{{ $hinhanh[$key]->URL }}" class="img-fluid rounded mb-2" style="width: 200px; height: 150px;" />
                                                <div>
                                                    <input type="hidden" name="HINHANH[]" value="{{ $hinhanh[$key]->URL }}" >
                                                    <input id="img_{{$key}}" accept="image/x-png,image/gif,image/jpeg" class="btn btn-primary btn-sm" name="input_img[]" onchange="change_img(this)" type="file" style="display: none;">
                                                    <label for="img_{{$key}}" class="btn btn-primary btn-sm" href="#">upload</label>
                                                    <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="remove_img(this);" >remove</a>
                                                </div>
                                            </div>
                                            @endfor
                                        @endif
                                        
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
                                <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="new-adr-last-name" class="form-label">Mô tả sản phẩm</label>
                                            <textarea class="form-control" rows="20" name="CHI_TIET" rows="5" placeholder="Mô tả chi tiết sản phẩm">{{$sanpham -> CHI_TIET}}</textarea>
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
                                <div class="col-lg-8">
                                    
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
    
    var i = 20;
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
        html.find("input[type='file']").attr("id", "img_up"+ i);
        html.find("label").attr("for", "img_up"+ i);
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