
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/stylesheets/bootstrap.css">
<form action="/admin/upload" class="form-horizontal" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
<div class="col-lg-12">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail"  style="width: 600px; height: 300px;">
           
        </div>
        <input type="hidden" name ="hinhanh" value="{{ $new->hinhanh }}" >
        <div>
            <span class="btn btn-default btn-file">
                <input type="file" name="file" class="img" accept="image/*" />
            </span>
            <button >Upload file</button>
        </div>
    </div>
</div>
</form>
<script>
    $(".fileinput-exists").click(function(){
        $('.img').val('');
        $(".fileinput-preview.thumbnail").html('');
    });
    $(".img").change(function(event) {
        var files = this.files;
        var img = new Image;
        img.src = window.URL.createObjectURL(files[0]);
        $(".fileinput-preview.thumbnail").html(img);
    });
</script>