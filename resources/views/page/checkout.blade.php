@extends('master')
@section('content')
<link rel="stylesheet" href="{{URL::asset('source/css/checkout.css')}}">

<section class="checkout">
    <div class="title">
        <h2>Thông tin thanh toán</h2>
    </div>
    @if(Session::has('checkout-success'))
        <p class="text c-red mb-1">{{Session::get('checkout-success')}}</p>
    @endif
    <form class="d-flex" method="POST" action="{{route('postCheckout')}}">
        @csrf
        <div class="form-info">
            <label>
                <span>Tên <span class="required">*</span></span>
                <input type="text" name="name">
            </label>
            <label>
                <span>Địa chỉ nhà</span>
                <input type="text" name="address" placeholder="Địa chỉ nhà">
            </label>
            <label>
                <span>Địa chỉ <span class="required">*</span></span>
                <input type="text" name="direct" placeholder="Địa chỉ giao hàng" required>
            </label>
            <label>
                <span>Số điện thoại <span class="required">*</span></span>
                <input type="tel" name="phone"> 
            </label>
            <label>
                <span>Email <span class="required">*</span></span>
                <input type="email" name="email"> 
            </label>
            <label class="flex">
                <span>Giới tính <span class="required">*</span></span>
                <input type="radio" name="gender" value='male' checked>Nam
                <input type="radio" name="gender" value='female'>Nữ
            </label>

        </div>
        <div class="Yorder">
           
                <table>
                    <tr>
                        <th colspan="2" class="upp">Chi tiết hóa đơn</th>
                    </tr>
                @if(Session::has('cart') && $totalQty != 0)
                    @foreach ($productCart as $item)
                        
                    <tr class="border-0">
                        <td>{{$item['item']->name}} <strong class="pl-1"> x {{$item['qty']}}</strong></td>
                        <td class="vnd">{{number_format($item['price'],0,',','.')}}</td>
                    </tr>

                    @endforeach

                @else
                    <center><strong style="color:red;margin:2rem auto;display:block;">Không có sản phẩm....</strong></center>
                
                @endif

                    <tr>
                        <td>Phí giao hàng</td>
                        <td>Miễn phí</td>
                    </tr>
                    <tr>
                        <td>Tổng cộng</td>
                        @if(Session::has('cart') && $totalQty != 0)
                        <td class="price">{{number_format($totalPrice,0,',','.')}}</td>
                        @else
                        <td class="price">0</td>
                        @endif
                        {{-- <input type="hidden" name="totalPrice" value="{{$totalPrice}}"> --}}

                    </tr>
                </table><br>

            
            <div>
                <label><input type="radio" name="payment" value="bank" checked>Chuyển khoản ngân hàng</label>
            </div>
            <div>
                <label><input type="radio" name="payment" value="cash"> Trả trực tiếp (sau khi nhận hàng)</label>
            </div>
            <button type="submit">Thanh toán</button>
        </div>
    </form>
</section>
@endsection