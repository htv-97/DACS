@extends('master')
@section('content')
<link rel="stylesheet" href="{{url::asset('source/css/checkout.css')}}">
    
<section class="checkout">
    <div class="title">
        <h2>Thông tin thanh toán</h2>
    </div>
    <form class="d-flex">
        <div class="form-info">
            <label>
                <span class="fname">Họ <span class="required">*</span></span>
                <input type="text" name="fname">
            </label>
            <label>
                <span class="lname">Tên <span class="required">*</span></span>
                <input type="text" name="lname">
            </label>
            <label>
                <span>Địa chỉ nhà</span>
                <input type="text" name="houseadd" placeholder="Địa chỉ nhà">
            </label>
            <label>
                <span>Địa chỉ <span class="required">*</span></span>
                <input type="text" name="direct" placeholder="Địa chỉ giao hàng" required>
            </label>
            <label>
                <span>Số điện thoại <span class="required">*</span></span>
                <input type="tel" name="city"> 
            </label>
            <label>
                <span>Email <span class="required">*</span></span>
                <input type="email" name="city"> 
            </label>
        </div>
        <div class="Yorder">
            <table>
                <tr>
                    <th colspan="2">Chi tiết hóa đơn</th>
                </tr>
                <tr class="border-0">
                    <td>Đầm xanh <span class="quantity">x2</span></td>
                    <td class="đ">300.000</td>
                </tr>
                <tr class="border-0">
                    <td>Đầm xanh <span class="quantity">x2</span></td>
                    <td class="đ">300.000</td>
                </tr>
                <tr class="border-0">
                    <td>Đầm xanh <span class="quantity">x2</span></td>
                    <td class="đ">300.000</td>
                </tr>                                
                <tr>
                    <td>Đầm xanh <span class="quantity">x2</span></td>
                    <td class="đ">300.000</td>
                </tr>
                <tr>
                    <td>Phí giao hàng</td>
                    <td>Miễn phí</td>
                </tr>
                <tr>
                    <td>Tổng cộng</td>
                    <td class="price">600.000</td>
                </tr>
            </table><br>
            <div>
                <input type="radio" name="dbt" value="dbt" checked>Chuyển khoản ngân hàng
            </div>
            <div>
            <input type="radio" name="dbt" value="cd"> Trả trực tiếp (sau khi nhận hàng)
            </div>
            <button type="submit">Thanh toán</button>
        </div><!-- Yorder -->
    </form>
</section>
@endsection