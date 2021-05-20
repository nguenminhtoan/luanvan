<div style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important; height:100%; padding-top: 20px; padding-bottom: 20px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px" >
    <div style="width: 600px; background-color: #FFF; padding: 20px; margin-left:auto; margin-right: auto;">
        <div style="font-size: 40px;line-height: 50px; color: #444; text-decoration: none;" >
            <a href="http://localhost/" style="color: #444; text-decoration: none;"><span style="color: #ee82a6;font-size: 60px;">K</span>OREAN FASHION</a>
        </div>
        <h3> Cám ơn quý khách {{$nguoidung->TEN_NGUOIDUNG}} đã đặt hàng tại shop chúng tôi</h3>
        <hr style="border: 2px solid #ee82a6;">
        <p>KOREAN FASHION rất vui lòng thông báo đơn hàng <%= @user['id_order'] %> của quý khách đã được nhân viên xác nhận.
            Quý khách vui lòng truy cập vào <a href="http://localhost:1000/sale/order?id_order=<%= @user['id_order'] %>" style="border: 0px; color: #FFF; background-color: #ee82a6; padding: 3px;">Chi tiết</a> để theo dõi tình trạng đơn hàng</p>

        <h4 style="margin-bottom: 4px;">Thông tin đơn hàng <%= @user['id_order'] %></h4>
        <div style="border: 0.5px solid #DDD; width: 100%; height: 0px;"></div>
        <table>
            <tr>
                <th width = "300px" align="left">Thông tin thanh toán</th>
                <th align="left">Địa chỉ giao hàng</th>
            </tr>
            <tr>
                <td><%= @user['customer'] %><br><%= @user['phone'] %></td>
                <td><%= @user['address'] %></td>
            </tr>
            <tr>
                <td colspan="2">Phương thức thanh toán: <%= @user['payment'] %></td>
            </tr>
            <tr>
                <td colspan="2">Phương thức vận chuyển: <%= @user['shipment'] %></td>
            </tr>
            <tr>
                <td colspan="2">Phí vận chuyển: <%= number_to_currency(@user['freeship'], :unit => 'VNĐ', :precision => 0, :format => "%n %u") %></td>
            </tr>
        </table>
        <table width="100%" cellspacing="0" cellpadding="0" style="border-spacing: 0; border-collapse: collapse;">
          <thead>
              <tr style="background-color: #ee82a6; color: #FFF; padding: 5px">
                  <th width="5%">STT</th>
                  <th width="30%" style="text-align: left !important;padding: 5px">Tên Sản Phẩm</th>
                  <th style="text-align: left !important;padding: 5px">Giá</th>
                  <th style="text-align: left !important;padding: 5px">Số Lượng</th>
                  <th style="text-align: right !important; width: 25%;padding: 5px">Tổng Tiền</th>
              </tr>
          </thead>
          <tbody id="table" >
              <% @detail.present? %>
              <% @detail.each_with_index do |row, index| %>
              <tr style="background-color: #EEE">
                  <td align="center" ><%= index+1 %></td>
                  <td style="padding: 5px"><%= row['title'] %></td>
                  <td style="padding: 5px"><%= number_to_currency(row['price'], :unit => 'VNĐ', :precision => 0, :format => "%n %u") %></td>
                  <td style="padding: 5px"><%= number_with_delimiter(row['quantity'])%></td>
                  <td style="text-align: right; padding: 5px;" ><%= number_to_currency(row['quantity']*row['price'], :unit => 'VNĐ', :precision => 0, :format => "%n %u") %></td>
              </tr>
              <% end %>
              
              <tr style="background-color: #EDEDED">
                  <th colspan="4" style="text-align: right;">Tạm tính</th>
                  <td style=" padding: 5px;" align="right"><%= number_to_currency(@user['total'], :unit => 'VNĐ', :precision => 0, :format => "%n %u") %></td>
              </tr>
              <tr style="background-color: #DDD">
                  <th colspan="4" style="text-align: right;">Khuyến mãi</th>
                  <td style=" padding: 5px;" align="right"><%= @sale %> %</td>
              </tr>
              <tr style="background-color: #EDEDED">
                  <th colspan="4" style="text-align: right;">Vận chuyển</th>
                  <td style=" padding: 5px;" align="right"><%= number_to_currency(@user['freeship'], :unit => 'VNĐ', :precision => 0, :format => "%n %u") %></td>
              </tr>
              <tr style="background-color: #DDD">
                  <td colspan="4" style="text-align: right; font-size: 16px;"><b>Tổng giá trị đơn hàng</b></td>
                  <td style=" padding: 5px; font-size: 16px;" align="right"><b><%= number_to_currency( @user['freeship']+(@user['total']-(@user['total']*@sale/100)).to_i, :unit => 'VNĐ', :precision => 0, :format => "%n %u") %></b></td>
              </tr>
          </tbody>
        </table>
        <a href="">Tiếp tục mua hàng</a>
    </div>
</div>