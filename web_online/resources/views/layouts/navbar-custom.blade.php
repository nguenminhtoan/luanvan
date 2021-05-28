<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <span id="alert" class="noti-icon-badge" style="{{ count($thongbao) > 0 ? "display: block" : ""}}"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-end">
                            <a href="javascript:void(0);" onclick="clearAlert();" class="text-dark">
                                <small>Làm sạch tât cả</small>
                            </a>
                        </span>Thông báo
                    </h5>
                </div>
                <div id="clear" style="max-height: 230px;" data-simplebar>
                    <!-- item-->
                    <a href="/admin/orders/detail/" id="template_notifi" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary">
                            <i class="mdi mdi-comment-account-outline"></i>
                        </div>
                        <p class="notify-details">
                            <small class="text-muted"></small>
                        </p>
                    </a>
                    @foreach($thongbao as $item)
                    <a href="/admin/orders/detail/{{$item->MA_DONBAN}}" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary">
                            <i class="mdi mdi-comment-account-outline"></i>
                        </div>
                        <p class="notify-details">
                            <small class="text-muted">{{$item->NGAYDAT}}</small>
                            Mã đơn #{{$item->MA_DONBAN}}, {{$item->DIACHI}}
                        </p>
                    </a>
                    @endforeach
                </div>
                <!-- All-->
                <a href="/admin/orders/index" class="dropdown-item text-center text-primary notify-item notify-all">
                    Xem tất cả
                </a>
            </div>
        </li>
        <li class="dropdown notification-list d-none d-sm-inline-block">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-view-apps noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">
                <div class="p-2">
                    <div class="row g-0">
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="/admin/images/slack.png" alt="slack">
                                <span>Slack</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="/admin/images/github.png" alt="Github">
                                <span>GitHub</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="/admin/images/dribbble.png" alt="dribbble">
                                <span>Dribbble</span>
                            </a>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="/admin/images/bitbucket.png" alt="bitbucket">
                                <span>Bitbucket</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="/admin/images/dropbox.png" alt="dropbox">
                                <span>Dropbox</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="/admin/images/g-suite.png" alt="G Suite">
                                <span>G Suite</span>
                            </a>
                        </div>
                    </div>
                    <!-- end row-->
                </div>
            </div>
        </li>
        <li class="notification-list">
            <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                <i class="dripicons-gear noti-icon"></i>
            </a>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
               aria-expanded="false">
                @if($cuahang)
                <span class="account-user-avatar"> 
                    <img data-src="{{$cuahang->HINHANH}}" src="{{$cuahang->HINHANH}}" class="rounded-circle">
                </span>
                <span>
                    <span class="account-position">{{$cuahang->TEN_CUAHANG}}</span>
                </span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Chào mừng !</h6>
                </div>
                <!-- item-->
                <a href="/cuahang/{{$cuahang->MA_CUAHANG}}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>Tài khoản của tôi</span>
                </a>
                <!-- item-->
                <a href="/edit/{{$cuahang->MA_CUAHANG}}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-edit me-1"></i>
                    <span>Cài đặt</span>
                </a>
                <a href="/home" class="dropdown-item notify-item">
                    <i class="mdi mdi-lock-outline me-1"></i>
                    <span>Trang chủ</span>
                </a>
                <!-- item-->
                <a href="/logout" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Đăng xuất</span>
                </a>
            </div>
        </li>
    </ul>
    <button class="button-menu-mobile open-left disable-btn">
        <i class="mdi mdi-menu"></i>
    </button>
    <div class="app-search dropdown d-none d-lg-block">
        <form>
            <div class="input-group">
                <input type="text" class="form-control dropdown-toggle"  placeholder="Tìm kiếm..." id="top-search">
                <span class="mdi mdi-magnify search-icon"></span>
                <button class="input-group-text btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
            <!-- item-->
            <div class="dropdown-header noti-title">
                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
            </div>
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-notes font-16 me-1"></i>
                <span>Analytics Report</span>
            </a>
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-life-ring font-16 me-1"></i>
                <span>How can I help you?</span>
            </a>
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-cog font-16 me-1"></i>
                <span>User profile settings</span>
            </a>
            <!-- item-->
            <div class="dropdown-header noti-title">
                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
            </div>
            <div class="notification-list">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="d-flex">
                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                        <div class="w-100">
                            <h5 class="m-0 font-14">Erwin Brown</h5>
                            <span class="font-12 mb-0">UI Designer</span>
                        </div>
                    </div>
                </a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="d-flex">
                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                        <div class="w-100">
                            <h5 class="m-0 font-14">Jacob Deo</h5>
                            <span class="font-12 mb-0">Developer</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<audio id="notification" src="/mp3/notifi.ogg" muted allow="autoplay"></audio>


<style>
    #template_notifi, #alert{
        display: none;
    }
    
</style>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    
    
    var pusher = new Pusher('24d4b050dc48945113d1', {
        encrypted: true,
        cluster: "ap1"
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('notifi');
    
    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\Notifi', function(data) {
        
        $.each(data.data,function(key, item){
            if(item.MA_CUAHANG == {{$cuahang ? $cuahang->MA_CUAHANG : "0" }}){
                temp = $("#template_notifi").clone();
                temp.removeAttr("id");
                temp.find("p").append("Mã đơn #" + item.MA_DONBAN + ", " + item.DIACHI);
                temp.find("small").html(item.NGAYDAT);
                temp.find("a").attr("href", "/admin/orders/detail/" + item.MA_DONBAN);
                $("#template_notifi").before(temp);
                $("#alert").css("display", "block");
                src = "http://localhost:8000/mp3/notifi.mp3";
//                var audio = new Audio(src);
                document.getElementById('notification').muted = false;
                document.getElementById('notification').play();
                
            }
        })
    });
    
    
    //Plays the sound
    function play() {
       //Set the current time for the audio file to the beginning
       soundFile.currentTime = 0.01;
       soundFile.volume = volume;

       //Due to a bug in Firefox, the audio needs to be played after a delay
       setTimeout(function(){soundFile.play();},1);
    }
    function clearAlert(){
        $.ajax({
            method: "get",
            url: "/admin/orders/notifi",
            success: (function(data){
                $("#alert").css("display", "none");
                $.each($("#clear").find("a"), function(key, value){
                   if($(value).attr("id") != "template_notifi")
                   {
                       $(value).remove();
                   }
                });
            })
        });
    }
</script>
<!-- end Topbar -->