@extends('layouts.layout_admin')
@section('title')
Thêm danh mục
@endsection
@section('content')
<div id="main" class="col-lg-12">
    <div class="row">
        <style>
            .nav-tabs.nav-justified > li >a{background-color:#0060b1; color:#FFF; font-weight:bold; font-size:13px}
            .nav-tabs.nav-justified{margin-bottom:0px}
            .nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:hover, .nav-tabs.nav-justified > .active > a:focus{color: #0060b1; background-color:#FFF}
            .tab-content{ border: #EBEBEB solid 1px; border-top: 0px; }
            #list>li{ list-style:none; margin-left:-40px; padding:5px}
            #list>li:hover{background-color:#EEE;}
            #list>li>a{ text-decoration:none; color:#000}
            #list>li>a>img{ padding:0px; padding-right:0px}
            #list>li>a>.icon{font-size:25px; color:#093; margin-right:15px}
            td:nth-first{
                padding: 1px !important;
                padding-left: 20px !important;
            }
            .nd, .noidung{
                word-wrap: break-word;
            }
            td img{
                height: 15px !important;
            }
            .online{ background-color: #093}
            .nd{text-align:left; float:left;}
            .boxchat{ height: 650px; margin:5px; width:100%; border: #EEE solid 1px;border-radius:6px 6px 0px 0px}
            .boxchat>header{padding:3px; height:50px; background-color:#0060b1; color:#FFF; border-radius:6px 6px 0px 0px;}
            .boxchat>header>.closes{ font-size:13px; padding:0px; color:#FFF; background-color:inherit; font-weight:100; float:right;}
            .boxchat>header>.closes:hover{color:#0060b1; background-color:#FFF;}
            .boxchat>header>.ip{ font-size:13px; margin:3px}
            .boxchat>header>span{ padding-left: 5px}
            .boxchat>.body{height:530px;overflow:auto; padding:10px}
            .boxchat>.body>.admin{ margin:10px 0px 5px 0px; }
            .boxchat>.body>.admin>.img{ width:35px; float:left} 
            .boxchat>.body>.admin>.group{ background-color:#FFF; border:#ebebeb solid 1px; color:#000; border-radius:10px; padding:6px 10px 8px 10px; float:left; max-width:75%}

            .boxchat>.body>.user{ margin:10px 0px 5px 0px; text-align:right; display:block}
            .boxchat>.body>.user>.img{ width:35px; float:right} 
            .boxchat>.body>.user>.group{ background: -webkit-gradient(linear,left top,left bottom,color-stop(0.2, #EEF7FF),color-stop(0.8, #CCE1FD)); border:#B8CBE6 solid 1px; color:#000; border-radius:10px; padding:6px 10px 8px 10px; float:right; max-width:75%}

            .boxchat>footer textarea{ border:0px; border-top:#EEE solid 1px; width:100%; padding:8px; height:68px;}


        </style>
        <div class="col-lg-7">
            <div class="row">
                <div id="t" class="" style="border:0px">
                    <div id="toan" class="boxchat">
                        <header>
                            <span><b id="ten"><%= @phong.first.hoten if @phong.present? %></b></span>
                            <div class="ip"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;<%= @phong.first.ip if @phong.present? %></div>
                        </header>
                        <div class="body" id="message">
                            <chat-messages :messages="messages"></chat-messages>
                        </div>
                        <footer>
                            <form id="form_message" action="/admin/chat/reply" method="post" >
                              {{ csrf_field() }}
                              <input type="hidden" name="MA_CUAHANG" value="1"/>
                                <input type="file" name="file_img" hidden="" />
                                <textarea name="NOIDUNG" id="send-message" placeholder="Chat với khách hàng ..."></textarea>
                                <button type="submit">sent</button>
                            </form>
                        </footer>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="" style="margin:5px;">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a data-toggle="tab" href="#online">KHÁCH HÀNG ĐANG ONLINE</a></li>
                </ul>

                <div class="tab-content">
                    <div id="online" class="tab-pane fade in active">
                        <table class="table table-condensed table-wrapper-scroll-y table-hover responsive-table sortableTable tablesorter tablesorter-default" style="" role="grid">
                            <thead> 
                                <tr role="row" class="tablesorter-headerRow">
                                    <th>Anh</th>
                                    <th  width="230px">Họ Tên</th>
                                    <th>IP</th>
                                </tr>
                            </thead>
                            <tbody id="room" aria-live="polite" aria-relevant="all">
                                <% @phong.each do |v| %>
                                  <tr class="old" onclick="changeIdPhong(this, <%= v.id_phongchat %>);" style="cursor: pointer">
                                    <td><img src="/img/user.jpg" width="10px" height="10px"></td>
                                    <td><%= v.hoten %></td>
                                    <td><%= v.ip %></td>
                                    <%= hidden_field_tag "id_phongchat", v.id_phongchat %>
                                    <%= hidden_field_tag "count", v.count  %>
                                  </tr>
                                <% end %>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <a href="#" class="listview__item">
        <img src="demo/img/profile-pics/1.jpg" class="listview__img" alt="">

          <div class="listview__content" id="test_message">
           <div class="listview__heading">David Belle</div>
           </div>
 </a>-->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    
    var pusher = new Pusher('24d4b050dc48945113d1', {
        encrypted: true,
        cluster: "ap1"
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('chat');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\MessageReply', function(data) {
        $('#message').append('<p>'+data.message+'</p>');
    });
    
    $("textarea#send-message").keyup(function(event) {
        if (event.keyCode == 13) {
            $.ajax({
                method: "post",
                data: $("#form_message").serialize(),
                url: "/admin/chat/reply",
                success: (function(data){
                })
            });
            $("#message").append('<div class="user row"><div class="img" style="padding:0px"><img src="/img/admin.jpg" width="30px" height="30px" class="img-circle"></div><div class="group"><span class="noidung">' + $("#form_message textarea").val() + '</span></div></div>');
            var d = $('#message');
            d.scrollTop(d.prop("scrollHeight"));
            $("#form_message textarea").val("");
        }
    });
</script>

 
@endsection