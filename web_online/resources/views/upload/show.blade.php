<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/stylesheets/bootstrap.css">
<div class="col-lg-12">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail"  style="width: 600px; height: 300px;">
            <img src="{{$new->hinhanh}}" >
        </div>
        <div>
            <span class="btn btn-default btn-file">
                <button onclick="change()">OK</button>
            </span>
        </div>
    </div>
</div>
<script>
  function change(){
    window.opener.$('#' + sessionStorage.getItem("sent")).val('{{ $new->hinhanh }}');
    window.close();
  }
</script>