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
                    <form action="/admin/chat/save" method="POST" enctype="multipart/form-data" >
                        <div class="tab-pane show active" id="Thongtincoban">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- end row-->
                                    <h3 class="mt-4">Tự động trả lời khi không online</h3>
                                    <p class="text-muted mb-4">
                                    </p>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label for="new-adr-first-name" class="form-label">Tắt mở chức năng<span class="text-danger">*</span></label>
                                                <select class="form-control" name="ONOFF" >
                                                    <option value="1" {{ $cuahang->TRALOI == 1 ? "selected" : "" }}>Mở</option>
                                                    <option value="0" {{ $cuahang->TRALOI == 0 ? "selected" : "" }}>Tắt</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label for="new-adr-first-name" class="form-label">Khi không tìm thấy công trả lời<span class="text-danger">*</span></label>
                                                <input class="form-control" name="MACDINH" value="{{$cuahang->MACDINH}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label"> Từ khóa</label>
                                            <div class="mb-3">
                                                <input class="form-control" name='TRIGGE[]' />
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <label class="form-label"> Trả lời</label>
                                            <div class="mb-3" >
                                                <input class="form-control" name='REPLY[]' />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-1">
                                            <label class="form-label"> <br></label>
                                            <div class='text-sm-end'>
                                                <a href="javascript:void(0);" onclick="add_attribute();" class="btn btn-success"><i class="fas fa-check"></i> Thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($traloi as $row)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <input class="form-control" name='TRIGGE[]' value="{{$row->TRIGGE}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="mb-4" >
                                                <input class="form-control" name='REPLY[]' value="{{$row->REPLY}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class='text-sm-end'>
                                                <a href="javascript:void(0);" onclick="remove_attribute(this);" class="btn btn-success"><i class="fas fa-check"></i> Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="row" id="template" style="display: none;">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <input class="form-control" name='TRIGGE[]' />
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="mb-4" >
                                                <input class="form-control" name='REPLY[]' />
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class='text-sm-end'>
                                                <a href="javascript:void(0);" onclick="remove_attribute(this);" class="btn btn-success"><i class="fas fa-check"></i> Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end table-responsive -->
                            </div>
                            <!-- end .border-->
                        </div>
                        <!-- end col -->            


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
                                                    <a href="javascript:void(0);" onclick="submit(0);"  class="btn btn-danger">
                                                        <i class="mdi mdi-cash-multiple me-1"></i> Lưu lựa chọn</a>
                                                    
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