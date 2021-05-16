@extends('layouts.layout_admin')
@section('title')
Chăm sóc khách hàng
@endsection
@section('content')
        <div id="shopee-mini-chat-embedded" style="position: fixed; right: 8px; bottom: 0px; z-index: 99999;">
            <div class="src-components-MainLayout-index__wrapper--27ZAv  src-components-MainLayout-index__container--pU83Q">
                <div class="src-components-MainLayout-index__root--1hhpV">
                    <div class="src-components-MainLayout-index__logo-wrapper--aKCJc">
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
                        <div class="src-components-MainLayout-index__operator-item-wrapper--1Zyy4">
                            <div class="">
                                <i class="_3kEAcT1Mk5 src-components-MainLayout-index__hide-dialog--3DGUg src-components-MainLayout-index__operator-item--3BQSc">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="chat-icon">
                                        <path d="M14 1a1 1 0 011 1v12a1 1 0 01-1 1H9v-1h5V2H9V1h5zM2 13v1h1v1H2a1 1 0 01-.993-.883L1 14v-1h1zm6 1v1H4v-1h4zM2 3.999V12H1V3.999h1zm5.854 1.319l2.828 2.828a.5.5 0 010 .708l-2.828 2.828a.5.5 0 11-.708-.707L9.121 9H4.5a.5.5 0 010-1h4.621L7.146 6.025a.5.5 0 11.708-.707zM3 1v1H2v.999H1V2a1 1 0 01.883-.993L2 1h1zm5 0v1H4V1h4z"></path>
                                    </svg>
                                </i>
                            </div>
                        </div>
                        <div class="src-components-MainLayout-index__operator-item-wrapper--1Zyy4">
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
                        <div class="src-components-MainLayout-index__blank--3gNvq">
                            <img src="data:image/png;base64,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" class="src-components-MainLayout-index__image--3jl8-">
                                <div class="src-components-MainLayout-index__title--3od6M">Welcome to Chat
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <canvas id="bar-chart" width="200px" height="100px"></canvas>
        <script>
            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                    datasets: [
                        {
                            label: "Population (millions)",
                            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                            data: [2478, 5267, 734, 784, 433]
                        }
                    ]
                },
                options: {
                    legend: {display: false},
                    title: {
                        display: true,
                        text: 'Predicted world population (millions) in 2050'
                    }
                }
            });
        </script>
@endsection