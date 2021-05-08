
function add_cart(ma_sp, soluong){
    $.ajax({
        url:"/cart/add",
        type:"GET",
        dataType:"html",
        data:{ MA_SP: ma_sp, SOLUONG: soluong
        },
        success: function(data){ 
            if(data == 1){
                alert("Đã Thêm Vào Giỏ Hàng");
                $("#cartquantity").html(Number($("#cartquantity").html()) + Number(data));
            }
            else{
                alert("vui long đăng nhập");
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("vui long đăng nhập");
        }
    });
}

