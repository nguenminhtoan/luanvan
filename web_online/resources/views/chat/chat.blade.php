@extends('layouts.layout_admin')
@section('title')
Chăm sóc khách hàng
@endsection
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Tổng quan</a></li>
                        <li class="breadcrumb-item active">Chat</li>
                    </ol>
                </div>
                <h4 class="page-title">Chăm sóc khách hàng</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <!-- start chat users-->
        <div class="col-xxl-3 col-xl-6 order-xl-1">
            <div class="card">
                <div class="card-body p-0">
                    <ul class="nav nav-tabs nav-bordered">
                        <li class="nav-item">
                            <a href="#allUsers" data-bs-toggle="tab" aria-expanded="false" class="nav-link active py-2">
                                Tất cả
                            </a>
                        </li>
                    </ul>
                    <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active p-3" id="newpost">
                            <!-- start search box -->
                            <div class="app-search">
                                <form>
                                    <div class="mb-2 position-relative">
                                        <input type="text" class="form-control"
                                               placeholder="Người, nhóm & tin nhắn..." />
                                        <span class="mdi mdi-magnify search-icon"></span>
                                    </div>
                                </form>
                            </div>
                            <!-- end search box -->
                            <!-- users -->
                            <div class="row">
                                <div class="col">
                                    <div data-simplebar style="max-height: 550px">
                                        @foreach($list_nguoidung as $item)
                                        <a href="/admin/chat/chat?id={{$item->MA_NGUOIDUNG}}" class="text-body" id="user_id_{{$item->MA_NGUOIDUNG}}">
                                            <div class="d-flex align-items-start mt-1 p-2">
                                                <img src="images/user-1.jpg" class="me-2 rounded-circle" height="48" alt="{{ $item->TEN_NGUOIDUNG }}" />
                                                <div class="w-100 overflow-hidden">
                                                    <h5 class="mt-0 mb-0 font-14">
                                                        <span class="float-end text-muted font-12">{{ date("Y-m-d", strtotime($item->THOIGIAN)) == date("Y-m-d") ? date("H:m", strtotime($item->THOIGIAN)) : date("Y-m-d", strtotime($item->THOIGIAN))  }}</span>
                                                        {{ $item->TEN_NGUOIDUNG }}
                                                    </h5>
                                                    <p class="mt-1 mb-0 text-muted font-14">
                                                        <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">{{ $item->TRANGTHAI == 0 ? "" : $item->TRANGTHAI }}</span></span>
                                                        <span class="w-75">{{ $item->NOIDUNG}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                    <!-- end slimscroll-->
                                </div>
                                <!-- End col -->
                            </div>
                            <!-- end users -->
                        </div>
                        <!-- end Tab Pane-->
                    </div>
                    <!-- end tab content-->
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card-->
        </div>
        <!-- end chat users-->
        <!-- chat area -->
        <div class="col-xxl-6 col-xl-12 order-xl-2">
            <div class="card">
                <div class="card-body">
                    <ul id="show_messages" class="conversation-list mes" data-simplebar style="height: 460px">
                        <li class="clearfix odd" hidden="" id="template">
                            <div class="chat-avatar">
                                <img src="" alt="dominic" class="rounded" />
                                <i class="time"></i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i id="name" >Dominic</i>
                                    <p id="noidung" >
                                    </p>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        @foreach($list_noidung as $item)
                        @if ($item->TRA_MA_TRAODOI)
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="{{$item->HINHANH}}" alt="dominic" class="rounded" />
                                <i class="time">{{ date("Y-m-d", strtotime($item->THOIGIAN)) == date("Y-m-d") ? date("H:m", strtotime($item->THOIGIAN)) : date("Y-m-d", strtotime($item->THOIGIAN))  }}</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i id="name" >{{$item->TEN_CUAHANG}}</i>
                                    <p id="noidung" >
                                        {{$item->NOIDUNG}}
                                    </p>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        @else
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="//" alt="dominic" class="rounded" />
                                <i class="time">{{ date("Y-m-d", strtotime($item->THOIGIAN)) == date("Y-m-d") ? date("H:m", strtotime($item->THOIGIAN)) : date("Y-m-d", strtotime($item->THOIGIAN))  }}</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i id="name" >{{$item->TEN_NGUOIDUNG}}</i>
                                    <p id="noidung" >
                                        {{$item->NOIDUNG}}
                                    </p>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    <div class="row">
                        <div class="col">
                            <div class="mt-2 bg-light p-3 rounded">
                                <form class="needs-validation" novalidate="" name="chat-form" id="chat-form" action="/admin/chat/messages" method="post" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <input type="hidden" name="MA_NGUOIDUNG" value="{{$id}}" />
                                        <input type="hidden" name="MA_TRAODOI" value="{{$ma_traodoi}}" />
                                        <div class="col mb-2 mb-sm-0">
                                            <input type="text" id="send-message" name="NOIDUNG" class="form-control border-0" placeholder="Enter your text" required="">
                                            <div class="invalid-feedback">
                                                Please enter your messsage
                                            </div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <div class="btn-group">
                                                <input name="file" type="input_img" hidden="" id="upload_file" accept="/img">
                                                <label for="upload_file" class="btn btn-light"> <i class='uil uil-paperclip'></i> </label>
                                                <a href="#" class="btn btn-light"><i class="uil uil-smile"></i></a>
                                                <div class="d-grid">
                                                    <button onclick="send_chat()" type="button" class="btn btn-success chat-send"><i class='uil uil-message'></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row-->
                                </form>
                            </div>
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
<script>

    var check = true;
    var pusher = new Pusher('24d4b050dc48945113d1', {
        encrypted: true,
        cluster: "ap1"
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('chat');
    
    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\MessageSent', function(data) {
        var template = $("#template").clone();
        template.removeAttr("hidden");
        template.removeAttr("id");
        template.find("#noidung").html(data.data.NOIDUNG);
        template.find(".chat-avatar").find("img").attr("src", data.data.HINHANH);
        template.find(".chat-avatar").find(".time").html(data.data.THOIGIAN);
        template.find("#name").html(data.data.TEN_CUAHANG);
        var d = $('#show_messages .simplebar-content');
        d.append(template);
        $("#show_messages .simplebar-content-wrapper").scrollTop(d.prop("scrollHeight"));
        $("input#send-message").val("");
        check = true;
    });
    $('form').submit(function() {
        return false;
    });
    $("input#send-message").keyup(function(event) {
        if (event.keyCode == 13) {
            send_chat();
        }
    });
    
    function send_chat(){
        if(check){
            $.ajax({
                method: "post",
                data: $("#chat-form").serialize(),
                url: "/admin/chat/messages",
                success: (function(data){
                })
            });
            check = false;
        }
    }
    
    // Subscribe to the channel we specified in our Laravel Event
    var replay_channel = pusher.subscribe('reply-chat');

    // Bind a function to a Event (the full Laravel class)
    replay_channel.bind('App\\Events\\MessageReply', function(data) {
        if(data.data.MA_NGUOIDUNG == {{$id}} ){
            var template = $("#template").clone();
            template.removeClass("odd");
            template.removeAttr("hidden");
            template.removeAttr("id");
            template.find("#noidung").html(data.data.NOIDUNG);
            template.find(".chat-avatar").find("img").attr("src", data.data.HINHANH);
            template.find(".chat-avatar").find(".time").html(data.data.THOIGIAN);
            template.find("#name").html(data.data.TEN_CUAHANG);
            $("input[name='MA_TRAODOI']").val(data.data.MA_TRAODOI);
            var d = $('#show_messages .simplebar-content');
            d.append(template);
            $("#show_messages .simplebar-content-wrapper").scrollTop(d.prop("scrollHeight"));
        }else{
            var item = $("#user_id_" + data.data.MA_NGUOIDUNG);
            var number = item.find("p").find(".badge.badge-danger-lighten").html();
            item.find("p").find(".badge.badge-danger-lighten").html(Number(number) + 1);
            item.find("p").find(".w-75").html(data.data.NOIDUNG);
        }
    });
    
    
    window.onload = function(){
    // short timeout
        setTimeout(function() {
            var d = $('#show_messages .simplebar-content');
            $("#show_messages .simplebar-content-wrapper").scrollTop(d.prop("scrollHeight"));
        }, 15);
    };
</script>
        <!-- end chat area-->
        <!-- start user detail -->
        
                                      
        <div class="col-xxl-3 col-xl-6 order-xl-1 order-xxl-2" }}">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        
                    </div>
                    <div class="mt-3 text-center">
                        <h4>//</h4> 
                    </div>
                    <div class="mt-3">
                        <hr class="" />
                        <p class="mt-4 mb-1"><strong><i class='uil uil-at'></i> Email:</strong></p>
                        <p>support@coderthemes.com</p>
                        <p class="mt-3 mb-1"><strong><i class='uil uil-phone'></i> Số điện thoại:</strong></p>
                        <p>+1 456 9595 9594</p>
                        <p class="mt-3 mb-1"><strong><i class='uil uil-location'></i> Địa chỉ:</strong></p>
                        <p>California, USA</p>
                        <p class="mt-3 mb-1"><strong><i class='uil uil-globe'></i> Ngôn ngữ:</strong></p>
                        <p>English, German, Spanish</p>
                        <p class="mt-3 mb-2"><strong><i class='uil uil-users-alt'></i> Các nhóm:</strong></p>
                        <p>
                            <span class="badge badge-success-lighten p-1 font-14">Công việc</span>
                            <span class="badge badge-primary-lighten p-1 font-14">Bạn bè</span>
                        </p>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card-->
        </div>
        
        <!-- end col -->
        <!-- end user detail -->
    </div>
    <!-- end row-->
</div>

<!-- container -->

@endsection