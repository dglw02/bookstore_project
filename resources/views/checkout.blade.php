<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>

<div class="heading">
    <h3>checkout</h3>
    <p> <a href="{{url('/')}}">home</a> / checkout </p>
</div>

<section class="display-order">
    <div class="grand-total"> Order detail<span></span> </div>
    @php $total = 0;@endphp
    @foreach($cartitems as $item)

    <p>{{$item->books->books_name}}=<span>${{$item->books->books_price}}/x{{$item->books_quantity}}</span> </p>

        @php $total += $item->books_quantity * $item->books->books_price@endphp
        <p>{{$item->books_quantity * $item->books->books_price}}</p>
    @endforeach
    @php $grandtotal = $total +($total * 0.1) + Auth::user()->city->areas->areas_price @endphp
    <div class="grand-total"> Grand total : <span>${{$total}} + Tax 10% + Ship ${{Auth::user()->city->areas->areas_price}} = ${{$grandtotal}}</span> </div>

</section>

<section class="checkout">

    <form action="{{url('place-order')}}" method="post">
        @csrf
        <h3>place your order</h3>
        <div class="flex">
            <div class="inputBox">
                <span>your name :</span>
                <input type="text" value="{{Auth::user()->name}}" name="orders_name" required placeholder="enter your name">
            </div>
            <div class="inputBox">
                <span>your number :</span>
                <input type="number" value="{{Auth::user()->phone}}" name="orders_phone" required placeholder="enter your number">
            </div>
            <div class="inputBox">
                <span>your email :</span>
                <input type="email" value="{{Auth::user()->email}}" name="orders_email" required placeholder="enter your email">
            </div>
            <div class="inputBox">
                <span>payment method :</span>
                <select name="orders_payment">
                    <option value="cash on delivery">cash on delivery</option>
                    {{--<option value="credit card">credit card</option>--}}
                    {{--<option value="paypal">paypal</option>--}}
                    {{--<option value="paytm">paytm</option>--}}
                </select>
            </div>
            <div class="inputBox">
                <span>address line 01 :</span>
                <input type="text" min="0" value="{{Auth::user()->address}}"  name="orders_address" required placeholder="e.g. flat no.">
            </div>
            <div class="inputBox">
                <span>city :</span>
                <input type="text" value="{{Auth::user()->city->city_name}}" name="orders_city" required placeholder="e.g. mumbai">
            </div>
        </div>
        <input type="submit" value="order now" class="btn" name="order_btn">
    </form>

</section>









<script src="{{ asset('js/register.js') }}"></script>
@yield('scripts')

</body>
</html>
