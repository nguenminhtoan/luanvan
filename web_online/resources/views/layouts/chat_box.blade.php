<script src="{{ asset('js/app.js') }}"></script>
<script>
    var closed;
    var ma_cuahang;
    var check = true;
    if (typeof(localStorage.getItem("chat-box"))=='undefined') {
        localStorage.setItem("chat-box",1);
    }

    
    function remove_img(){
       $("#img_show").css("display", "none");
       $("input[type='file']").val("");
    }
    
    $("#cart").click(function () {
        
        if({{ is_null($user) ? "true" : "false" }}){
            window.location.href= '/login';
        }else{
            window.location.href = "/cart"
        }
    });
    
    function Closed(){
        if({{ is_null($user) ? "true" : "false" }}){
            window.location.href= '/login';
        }else{
            if(localStorage.getItem("chat-box") == "1"){
                $("#show_box").removeAttr("class");
                $("#show_box").addClass("src-components-MainLayout-index__wrapper--27ZAv");
                $("#show_box").attr("data-close", 0)
                localStorage.setItem("chat-box",0);
            }else {
                $("#show_box").attr("data-close", 1)
                $("#show_box").addClass("src-components-MainLayout-index__container--pU83Q");
                localStorage.setItem("chat-box",1);
            }
        }
    }

    function sent_messages(event){
        var key = window.event.keyCode;
        if (key == 13) {
            send();
        }
    };

    function change_img(event){

        if (event.files && event.files[0]) {
            var reader = new FileReader();
            var img = $("#show-temp")
            reader.onload = function (e) {
                img.attr("src", e.target.result);
                img.css("display", "block");
            }
            reader.readAsDataURL(event.files[0]); // convert to base64 string
        }
    }    

     function remove_img(event){
        $("#show-temp").remove();
     }

    function clearImg(){
        $("input[type='file']").val("");
        $("#show-temp").css("display", "none");
    }

    window.onload = function(){
    // short timeout
        setTimeout(function() {
            $.ajax({
                method: "get",
                url: "/chat",
                success: (function(data){
                    data.list_nguoidung.forEach(function(value, key){
                        var template = $("#template").clone();
                        template.css("top", (key*48)+"px");
                        template.css("display", "flex");
                        template.find("img").attr("src", value.HINHANH);
                        template.find(".src-components-ConversationListsLayout-ConversationCells-index__username--SOXgT").html(value.TEN_CUAHANG);
                        template.find(".src-components-ConversationListsLayout-ConversationCells-index__message--2aCpi").html(value.NOIDUNG);
//                                    var now = dateFormat(new Date(), "yyyy-mm-dd");
                        template.find(".src-components-ConversationListsLayout-ConversationCells-index__timestamp--wvvBM").html(value.THOIGIAN);
                        template.attr("onclick", "loadIndex("+ value.MA_CUAHANG + ")");
                        if (value.TRANGTHAI != 0 && key != 0){
                            template.find(".thong_bao").html(value.TRANGTHAI);
                        }
                        template.attr("id", "user_id_" + value.MA_CUAHANG);
                        $("#template").after(template);
                    });

                    $(".src-components-ConversationDetailLayout-BuyerProfile-index__name--1UP54").html(data.TEN_CUAHANG);
                    ma_cuahang = data.MA_CUAHANG;
                    $("input[name='MA_CUAHANG']").val(data.MA_CUAHANG);
                    data.list_noidung.forEach(function(value, key){
                        var template = "";
                        if(value.TRA_MA_TRAODOI == null){
                            template = $("#template-reply").clone();
                            template.find("pre").html(value.NOIDUNG);
                            if(value.FILE){
                                template.append("<div style='margin-top: 5px; text-align: right' ><img style='height: 60px; text-align: right;' src='" +value.FILE + "' >");
                            }
                        }else{
                            template = $("#template_sent").clone();
                            template.find("pre").html(value.NOIDUNG);
                            if(value.FILE){
                                template.append("<div style='margin-top: 5px; text-align: left' ><img style='height: 60px; text-align: right;' src='" +value.FILE + "' >");
                            }
                        }
                        template.css("display","block");
                        template.attr("onclick", "loadIndex("+value.MA_CUAHANG+")");
                        $("#content_noidung").append(template);
                        if(localStorage.getItem("chat-box") == "0"){
                            $("#show_box").removeAttr("class");
                            $("#show_box").addClass("src-components-MainLayout-index__wrapper--27ZAv");
                        }else {
                            $("#show_box").attr("data-close", 1)
                            $("#show_box").addClass("src-components-MainLayout-index__container--pU83Q");
                        }
                    });

                    var d = $('#content_noidung');
                    $("#content_noidung").scrollTop(d.prop("scrollHeight"));

//                                $("#content_noidung").css("height", height);
//                                $("#content_noidung .ReactVirtualized__Grid__innerScrollContainer").css("height", height);
                })
            });
        }, 15);
    };

    function loadIndex(ma_ch){
        $("#user_id_" + ma_ch).find(".thong_bao").html("");
        $.ajax({
                method: "get",
                url: "/chat?id="+ma_ch,
                success: (function(data){
                    $("#content_noidung").html("");
                    $(".src-components-ConversationDetailLayout-BuyerProfile-index__name--1UP54").html(data.TEN_CUAHANG);
                    ma_cuahang = data.MA_CUAHANG;
                    $("input[name='MA_CUAHANG']").val(data.MA_CUAHANG);
                    data.list_noidung.forEach(function(value, key){
                        var template = "";
                        if(value.TRA_MA_TRAODOI == null){
                            template = $("#template-reply").clone();
                            template.find("pre").html(value.NOIDUNG);
                            if(value.FILE){
                                template.append("<div style='margin-top: 5px; text-align: right' ><img style='height: 60px; text-align: right;' src='" +value.FILE + "' >");
                            }

                        }else{
                            template = $("#template_sent").clone();
                            template.find("pre").html(value.NOIDUNG);
                            if(value.FILE){
                                template.append("<div style='margin-top: 5px; text-align: left' ><img style='height: 60px; text-align: right;' src='" +value.FILE + "' >");
                            }
                        }
                        template.css("display","block");
                        template.attr("onclick", "loadIndex("+value.MA_CUAHANG+")");
                        $("#content_noidung").append(template);
                    });

                    var d = $('#content_noidung');
                    $("#content_noidung").scrollTop(d.prop("scrollHeight"));
                })
            });
    }



    var pusher = new Pusher('24d4b050dc48945113d1', {
        encrypted: true,
        cluster: "ap1"
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('chat');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\MessageSent', function(data) {
        if(ma_cuahang == data.data.MA_CUAHANG && data.data.MA_NGUOIDUNG == {{$user ? $user->MA_NGUOIDUNG : "0" }}){
            var template = $("#template_sent").clone();
            template.find("pre").html(data.data.NOIDUNG);
            template.css("display","block");
            $("#content_noidung").append(template);
            if(data.data.FILE){
                template.append("<div style='margin-top: 5px; text-align: left' ><img style='height: 60px; text-align: right;' src='" +data.data.FILE + "' >");
            }
            var d = $('#content_noidung');
            d.append(template);
            $("#content_noidung").scrollTop(d.prop("scrollHeight"));
        }else if(data.data.MA_NGUOIDUNG == {{$user ? $user->MA_NGUOIDUNG : "0" }}){
            var item = $("#user_id_" + data.data.MA_CUAHANG);
            item.find(".src-components-ConversationListsLayout-ConversationCells-index__message--2aCpi").html(data.data.NOIDUNG);
            var i = Number(item.find(".thong_bao").html()) + 1;
            item.find(".thong_bao").html(i);
        }
    });


    // Subscribe to the channel we specified in our Laravel Event
    var replay_channel = pusher.subscribe('reply-chat');

    // Bind a function to a Event (the full Laravel class)
    replay_channel.bind('App\\Events\\MessageReply', function(data) {
        var template = $("#template-reply").clone();
        template.find("pre").html(data.data.NOIDUNG);
        template.css("display","block");
        $("#content_noidung").append(template);
        if(data.data.FILE){
            template.append("<div style='margin-top: 5px; text-align: right' ><img style='height: 60px; text-align: right;' src='" +data.data.FILE + "' >");
        }
        var d = $('#content_noidung');
        d.append(template);
        $("#content_noidung").scrollTop(d.prop("scrollHeight"));
        $("textarea#send-message").val("");
        clearImg();
        check = true;
    });

    function send(){
        if(check && $("#send-message").val().trim() != ""){

            var form = $("#form_message");

            // you can't pass Jquery form it has to be javascript form object
            var formData = new FormData(form[0]);
            formData.append('file',$("input[type='file']")[0].files);
            $.ajax({
                method: "post",
                enctype: 'multipart/form-data',
                data: formData,
                contentType: false,
                processData: false,
                url: "/admin/chat/reply",
                success: (function(data){
                })
            });
            check = false;
            $(".invalid-feedback").css("display","none");
        }else{
            $(".invalid-feedback").css("display","block");
        }
    }


</script>
<div id="shopee-mini-chat-embedded" style="position: fixed; right: 8px; bottom: 0px; z-index: 99999;">
    <div id="show_box" data-close="1" class="src-components-MainLayout-index__wrapper--27ZAv">
        <div class="src-components-MainLayout-index__root--1hhpV">
            <div onclick="Closed();" class="src-components-MainLayout-index__logo-wrapper--aKCJc">
                <i class="_3kEAcT1Mk5 src-components-MainLayout-index__chat--3J2KN">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="chat-icon">
                        <path d="M18 6.07a1 1 0 01.993.883L19 7.07v10.365a1 1 0 01-1.64.768l-1.6-1.333H6.42a1 1 0 01-.98-.8l-.016-.117-.149-1.783h9.292a1.8 1.8 0 001.776-1.508l.018-.154.494-6.438H18zm-2.78-4.5a1 1 0 011 1l-.003.077-.746 9.7a1 1 0 01-.997.923H4.24l-1.6 1.333a1 1 0 01-.5.222l-.14.01a1 1 0 01-.993-.883L1 13.835V2.57a1 1 0 011-1h13.22zm-4.638 5.082c-.223.222-.53.397-.903.526A4.61 4.61 0 018.2 7.42a4.61 4.61 0 01-1.48-.242c-.372-.129-.68-.304-.902-.526a.45.45 0 00-.636.636c.329.33.753.571 1.246.74A5.448 5.448 0 008.2 8.32c.51 0 1.126-.068 1.772-.291.493-.17.917-.412 1.246-.74a.45.45 0 00-.636-.637z"></path>
                    </svg>
                </i>
                <i class="_3kEAcT1Mk5 src-components-MainLayout-index__logo--1byC8">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 22" class="chat-icon">
                        <path d="M9.286 6.001c1.161 0 2.276.365 3.164 1.033.092.064.137.107.252.194.09.085.158.064.203 0 .046-.043.182-.194.251-.26.182-.17.433-.43.752-.752a.445.445 0 00.159-.323c0-.172-.092-.3-.227-.365A7.517 7.517 0 009.286 4C5.278 4 2 7.077 2 10.885s3.256 6.885 7.286 6.885a7.49 7.49 0 004.508-1.484l.022-.043a.411.411 0 00.046-.71v-.022a25.083 25.083 0 00-.957-.946.156.156 0 00-.227 0c-.933.796-2.117 1.205-3.392 1.205-2.846 0-5.169-2.196-5.169-4.885C4.117 8.195 6.417 6 9.286 6zm32.27 9.998h-.736c-.69 0-1.247-.54-1.247-1.209v-3.715h1.96a.44.44 0 00.445-.433V9.347h-2.45V7.035c-.021-.043-.066-.065-.111-.043l-1.603.583a.423.423 0 00-.29.41v1.362h-1.781v1.295c0 .238.2.433.445.433h1.337v4.19c0 1.382 1.158 2.505 2.583 2.505H42v-1.339a.44.44 0 00-.445-.432zm-21.901-6.62c-.739 0-1.41.172-2.013.496V4.43a.44.44 0 00-.446-.43h-1.788v13.77h2.234v-4.303c0-1.076.895-1.936 2.013-1.936 1.117 0 2.01.86 2.01 1.936v4.239h2.234v-4.561l-.021-.043c-.202-2.088-2.012-3.723-4.223-3.723zm10.054 6.785c-1.475 0-2.681-1.12-2.681-2.525 0-1.383 1.206-2.524 2.681-2.524 1.476 0 2.682 1.12 2.682 2.524 0 1.405-1.206 2.525-2.682 2.525zm2.884-6.224v.603a4.786 4.786 0 00-2.985-1.035c-2.533 0-4.591 1.897-4.591 4.246 0 2.35 2.058 4.246 4.59 4.246 1.131 0 2.194-.388 2.986-1.035v.604c0 .237.203.431.453.431h1.356V9.508h-1.356c-.25 0-.453.173-.453.432z"></path>
                    </svg>
                </i>
            </div>
            <div class="src-components-MainLayout-index__operator-wrapper--151w3">

                <div style="width: 20px" onclick="Closed();" class="src-components-MainLayout-index__operator-item-wrapper--1Zyy4">
                    <div class="">
                        <i class="_3kEAcT1Mk5 src-components-MainLayout-index__minimize--30m1T src-components-MainLayout-index__operator-item--3BQSc"> 
                            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="chat-icon">
                                <path d="M14 1a1 1 0 011 1v12a1 1 0 01-1 1H2a1 1 0 01-1-1V2a1 1 0 011-1h12zm0 1H2v12h12V2zm-2.904 5.268l-2.828 2.828a.5.5 0 01-.707 0L4.732 7.268a.5.5 0 11.707-.707l2.475 2.475L10.39 6.56a.5.5 0 11.707.707z"></path>
                            </svg>
                        </i>
                    </div>
                </div>
            </div>
        </div>
        <div class="src-components-MainLayout-index__windows--1hePz">
            <div class="src-components-MainLayout-index__details--2Ww8a">
                <div class="src-components-MainLayout-index__details--2Ww8a">
                    <div class="src-components-ConversationDetailLayout-index__header--3JK16">
                        <div class="src-components-ConversationDetailLayout-BuyerProfile-index__root--jfvei">
                            <div class="src-components-Common-Menus-index__root--2dnxA">
                                <div class="src-components-Common-Menus-index__popover--kPHFo">
                                    <div class="src-components-Common-Menus-index__button--2et6C" style="display: flex; align-items: center; overflow: hidden; justify-content: flex-start;">
                                        <div class="src-components-ConversationDetailLayout-BuyerProfile-index__name--1UP54"></div>
                                        <i class="_3kEAcT1Mk5 src-components-ConversationDetailLayout-BuyerProfile-index__arrow--3PolG">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" class="chat-icon">
                                                <path d="M6.243 6.182L9.425 3l1.06 1.06-4.242 4.243L2 4.061 3.06 3z"></path>
                                            </svg>
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="src-components-ConversationDetailLayout-index__zone--n6a0J">
                        <div id="messagesContainer" class="src-components-ConversationDetailLayout-index__message--2EHHy">
                            <div class="_3B-_5RU5ihxWqvPFT2BAZa null">
                                <div class="_7-BLd7BF4xzVLsB696_-8 null">
                                    <div class="src-components-MessageSectionLayout-index__message-section--ohVwx" style="position: relative;">

                                        <div id="content_noidung" aria-label="grid" aria-readonly="true" class="ReactVirtualized__Grid ReactVirtualized__List src-components-MessageSectionLayout-index__grid--3lPyW" role="grid" tabindex="0" style="height: 243px; width: 283px; overflow: scroll">


                                        </div>
                                        <div id="template-reply" class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__root--2sDHO  undefined" style="display: none;">
                                            <!--                                                   <div class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__message-time--3jGGy">6 Th12 2020, 19:45</div>-->
                                            <div class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__message-send--3sIFE src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__message--49iPR" style="margin-top: 8px;">
                                                <div class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__bubble--1lWyZ">
                                                    <pre class="_2Zb8khbVxMFlHDDD2kMhKl "></pre>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="template_sent" class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__root--2sDHO  undefined" style="display: none;">
                                            <div class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__message-receive--13_8K src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__message--49iPR" style="margin-top: 4px;">
                                                <div class="src-components-MessageSectionLayout-ConversationMessages-BaseMessage-index__bubble--1lWyZ">
                                                    <pre class="_2Zb8khbVxMFlHDDD2kMhKl"></pre>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="src-components-ConversationDetailLayout-index__input--2w54V">
                            <div class="src-components-ConversationDetailLayout-InputFieldLayout-index__root--2-LH7">
                                <div class="invalid-feedback">vui lòng nhâp tin nhắn....</div>
                                <div style="position: relative; z-index: 0"><img onclick="clearImg()" id="show-temp" /></div>
                                <form method="post" enctype="multipart/form-data" id="form_message" >
                                    {{ csrf_field() }}
                                    <input name="MA_CUAHANG" type="hidden" value=""/>
                                    <div>
                                        <div class="src-components-ConversationDetailLayout-InputFieldLayout-ChatEditor-index__root--bvWJK">
                                            <textarea id="send-message" onkeypress="sent_messages(this);" name="NOIDUNG" class="src-components-ConversationDetailLayout-InputFieldLayout-ChatEditor-index__editor--3D_Zq" placeholder="Gửi tin nhắn" style="overflow: hidden; height: 30px;"></textarea>
                                            <div class="src-components-ConversationDetailLayout-InputFieldLayout-ChatEditor-index__send-button--1uW8l">
                                                <i onclick="send()" class="_3kEAcT1Mk5 src-components-ConversationDetailLayout-InputFieldLayout-ChatEditor-index__button--3btwx">
                                                    <svg style="display: block" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="chat-icon">
                                                        <path d="M4 14.497v3.724L18.409 12 4 5.779v3.718l10 2.5-10 2.5zM2.698 3.038l18.63 8.044a1 1 0 010 1.836l-18.63 8.044a.5.5 0 01-.698-.46V3.498a.5.5 0 01.698-.459z"></path>
                                                    </svg>
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="src-components-ConversationDetailLayout-InputFieldLayout-index__toolbar--1D95T">
                                        <div class="src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__root--UeP3I">
                                            <div class="src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__left--28Ouu">

                                                <div class="src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__drawer--1hRAt">
                                                    <div>
                                                        <input id="input_file" accept="image/png,image/jpeg,image/jpg" name="input_img" type="file" style="display: none;" onchange="change_img(this)">
                                                            <label style="display: block" for="input_file" class="">
                                                                <i class="_3kEAcT1Mk5 src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__image--R4hl2 src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__label--2cJlV src-components-ConversationDetailLayout-InputFieldLayout-Toolbar-index__inactive-label--3LxJq">
                                                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="chat-icon">
                                                                        <path d="M19 18.974V5H5v14h.005l4.775-5.594a.5.5 0 01.656-.093L19 18.974zM4 3h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1zm11.5 8a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"></path>
                                                                    </svg>
                                                                </i>
                                                            </label>
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
            <div class="src-components-ConversationListsLayout-index__root--mbMGC">
                <div class="src-components-ConversationListsLayout-Headerbar-index__root--28G_E">
                    <div class="src-components-ConversationListsLayout-Headerbar-index__search--1yyji">
                        <input class="src-components-ConversationListsLayout-Headerbar-index__input--10eES" placeholder="Search name" value="">
                            <div class="src-components-ConversationListsLayout-Headerbar-index__wrapper--WeH6A ">
                                <i class="_3kEAcT1Mk5 src-components-ConversationListsLayout-Headerbar-index__icon--2Qaml">
                                    <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="chat-icon">
                                        <g transform="translate(3 3)">
                                            <path d="M393.846 708.923c174.012 0 315.077-141.065 315.077-315.077S567.858 78.77 393.846 78.77 78.77 219.834 78.77 393.846s141.065 315.077 315.077 315.077zm0 78.77C176.331 787.692 0 611.36 0 393.845S176.33 0 393.846 0c217.515 0 393.846 176.33 393.846 393.846 0 217.515-176.33 393.846-393.846 393.846z"></path>
                                            <rect transform="rotate(135 825.098 825.098)" x="785.713" y="588.79" width="78.769" height="472.615" rx="1"></rect>
                                        </g>
                                    </svg>
                                </i>
                            </div>
                    </div>
                    <div class="src-components-ConversationListsLayout-Headerbar-index__filter--2SqAf src-components-ConversationListsLayout-Headerbar-index__reddot-filter--1UXvG">
                        <div class="src-components-Common-Menus-index__root--2dnxA">
                            <div class="src-components-Common-Menus-index__popover--kPHFo">
                                <div class="src-components-Common-Menus-index__button--2et6C">
                                    <div class="src-components-ConversationListsLayout-Headerbar-index__selected--3FjOw">All
                                        <i class="_3kEAcT1Mk5 src-components-ConversationListsLayout-Headerbar-index__arrow-down--3Bxlh">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" class="chat-icon">
                                                <path d="M6.243 6.182L9.425 3l1.06 1.06-4.242 4.243L2 4.061 3.06 3z"></path>
                                            </svg>
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="src-components-ConversationListsLayout-index__conversation-lists--1cNKp">

                    <div class="_3B-_5RU5ihxWqvPFT2BAZa null">
                        <div class="_7-BLd7BF4xzVLsB696_-8 null">
                            <div class="src-components-Common-InfiniteList-index__root--3StQn" style="position: relative;">
                                <div style="overflow: visible; height: 0px; width: 0px;">
                                    <div aria-label="grid" aria-readonly="true" class="ReactVirtualized__Grid ReactVirtualized__List src-components-Common-InfiniteList-index__list--3kTYP " role="grid" tabindex="0" style="box-sizing: border-box; direction: ltr; height: 304px; position: relative; width: 220px; will-change: transform; overflow: auto;">
                                        <div class="ReactVirtualized__Grid__innerScrollContainer" role="rowgroup" style="width: auto; height: 1986px; max-width: 220px; max-height: 1986px; overflow: hidden; position: relative;">
                                            <div id="template" class="src-components-ConversationListsLayout-ConversationCells-index__root--3IRzV " style="height: 48px; left: 0px; position: absolute; width: 100%; display: none;" >
                                                <div class="src-components-ConversationListsLayout-ConversationCells-index__avatar--3-I9g">
                                                    <div class="src-components-Common-Avatar-index__root--2xGjv undefined">
                                                        <div class="src-components-Common-Avatar-index__avatar-wrapper--29uog">
                                                            <img src="">
                                                                <div class="src-components-Common-Avatar-index__avatar-border--2Wkz3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="src-components-ConversationListsLayout-ConversationCells-index__container--OwwoK">
                                                    <div class="src-components-ConversationListsLayout-ConversationCells-index__upper--31gYr">
                                                        <div class="src-components-ConversationListsLayout-ConversationCells-index__username--SOXgT" title="locknlockvn"></div>
                                                        <div class="thong_bao" style="color: red;"></div>
                                                    </div>
                                                    <div class="src-components-ConversationListsLayout-ConversationCells-index__lower--2JERn">
                                                        <div class="src-components-ConversationListsLayout-ConversationCells-index__message--2aCpi"><span ></span></div>
                                                        <div class="src-components-ConversationListsLayout-ConversationCells-index__timestamp--wvvBM"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 221px; height: 305px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="src-components-Common-Empty-index__root--1Gl0b src-components-ConversationListsLayout-ConversationCells-index__empty--3kq9U">
                        <img src="https://deo.shopeemobile.com/shopee/shopee-seller-live-vn/chateasy/143e062750363ec2d5f8d5601a9b595a.png" class="src-components-Common-Empty-index__img--36TCh">
                            <div class="src-components-Common-Empty-index__text--1OZJD">No conversation found</div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <div class="ReactModalPortal"></div>

</div>
<style>
            #show-temp{
                position: absolute;
                top: -68px;
                left: 0px;
                height: 60px;
                width: 60px;
                display: none;
            }
            #send-message{
                z-index: 100;
            }

            .invalid-feedback{
                color: red;
                display: none;
            }
</style>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
  FB.init({
    xfbml            : true,
    version          : 'v10.0'
  });
};

(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
attribution="setup_tool"
page_id="105458130814027">
</div>