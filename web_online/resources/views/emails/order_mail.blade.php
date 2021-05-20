<div style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important; height:100%; padding-top: 20px; padding-bottom: 20px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px" >
    <div style="width: 600px; background-color: #FFF; padding: 20px; margin-left:auto; margin-right: auto;">
        <div style="font-size: 40px;line-height: 50px; color: #444; text-decoration: none;" >
            <a href="http://localhost/" style="color: #444; text-decoration: none;"><span style="color: #ff5e00;font-size: 60px;">S</span>uppert Markert</a>
        </div>
        <h3> Cám ơn quý khách {{$order->TEN_NGUOIDUNG}} đã đặt hàng tại shop chúng tôi</h3>
        <hr style="border: 2px solid #ff5e00;">
        <p>SupperMarkert rất vui lòng thông báo đơn hàng #{{$order->MA_DONBAN}} của quý khách đã được nhân viên xác nhận.
            Quý khách vui lòng truy cập vào <a href="http://localhost:8000/account/orders/{{$order->MA_DONBAN}}" style="border: 0px; color: #FFF; background-color: #ff5e00; padding: 3px;">Chi tiết</a> để theo dõi tình trạng đơn hàng</p>

        <h4 style="margin-bottom: 4px;">Thông tin đơn hàng #{{$order->MA_DONBAN}}</h4>
        <div style="border: 0.5px solid #DDD; width: 100%; height: 0px;"></div>
        <table>
            <tr>
                <th width = "300px" align="left">Thông tin thanh toán</th>
                <th align="left">Địa chỉ giao hàng</th>
            </tr>
            <tr>
                <td>{{$order->TEN_NGUOIDUNG}}<br>#{{$order->SDT}}</td>
                <td>{{$order->DIACHI }}</td>
            </tr>
            <tr>
                <td colspan="2">Phương thức thanh toán: {{$order->PHUONGTHUC_THANHTOAN}}</td>
            </tr>
            <tr>
                <td colspan="2">Phương thức vận chuyển: {{$order->PHUONGTHUC_VANCHUYEN}}</td>
            </tr>
            <tr>
                <td colspan="2">Phí vận chuyển: </td>
            </tr>
            <tr>
                <td colspan="2">Thời gian dự kiến giao hàng: {{date('Y/m/d', strtotime($order->NGAYDAT."+ ".$order->THOIGIADUKIEN." day"))}}</td>
            </tr>
        </table>
        <table width="100%" cellspacing="0" cellpadding="0" style="border-spacing: 0; border-collapse: collapse;">
          <thead>
              <tr style="background-color: #ff5e00; color: #FFF; padding: 5px">
                  <th width="5%">STT</th>
                  <th width="30%" style="text-align: left !important;padding: 5px">Tên Sản Phẩm</th>
                  <th style="text-align: left !important;padding: 5px">Giá</th>
                  <th style="text-align: left !important;padding: 5px">Số Lượng</th>
                  <th style="text-align: right !important; width: 25%;padding: 5px">Tổng Tiền</th>
              </tr>
          </thead>
          <tbody id="table" >
              @foreach($detail as $key=>$row)
              <tr style="background-color: #EEE">
                  <td align="center" >{{$key+1}}</td>
                  <td style="padding: 5px">{{$row->TEN_SP}}</td>
                  <td style="padding: 5px">{{number_format($row->SOLUONG)}}</td>
                  <td style="padding: 5px">{{number_format($row->DONGIA)}} VNĐ</td>
                  <td style="text-align: right; padding: 5px;" >{{number_format($row->DONGIA*$row->SOLUONG)}} VNĐ</td>
              </tr>
              @endforeach
              <tr style="background-color: #EDEDED">
                  <th colspan="4" style="text-align: right;">Tạm tính</th>
                  <td style=" padding: 5px;" align="right">{{ number_format($order->TONGTIEN - $order->DONGIA + ($order->GIAMGIA ? $order->GIAMGIA : 0)) }} VNĐ</td>
              </tr>
              <tr style="background-color: #DDD">
                  <th colspan="4" style="text-align: right;">Khuyến mãi</th>
                  <td style=" padding: 5px;" align="right">{{number_format($order->GIAMGIA)}} VNĐ</td>
              </tr>
              <tr style="background-color: #EDEDED">
                  <th colspan="4" style="text-align: right;">Vận chuyển</th>
                  <td style=" padding: 5px;" align="right">{{number_format($order->DONGIA)}} VNĐ</td>
              </tr>
              <tr style="background-color: #DDD">
                  <td colspan="4" style="text-align: right; font-size: 16px;"><b>Tổng giá trị đơn hàng</b></td>
                  <td style=" padding: 5px; font-size: 16px;" align="right"><b>{{number_format($order->TONGTIEN)}} VNĐ</b></td>
              </tr>
              
          </tbody>
        </table>
        <a href="http://localhost:8000/home">Tiếp tục mua hàng</a>
    </div>
</div>