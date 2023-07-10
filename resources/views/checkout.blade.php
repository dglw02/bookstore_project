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
    @if($cartitems->count() > 0)
    <div class="grand-total"> Order detail<span></span> </div>
    @php $total = 0;@endphp
    @foreach($cartitems as $item)
    <p>{{$item->books->books_name}}=<span>{{$item->books->books_price}}  VND/x{{$item->books_quantity}} = {{$item->books_quantity * $item->books->books_price}} VND</span> </p>
        @php $total += $item->books_quantity * $item->books->books_price@endphp
    @endforeach
    @php $grandtotal = $total +($total * 0.1) + Auth::user()->city->areas->areas_price @endphp
    <div class="grand-total"> Grand total : <span>{{$total}}  VND + Tax 10% + Ship {{Auth::user()->city->areas->areas_price}} VND = {{$grandtotal}} VND</span> </div>
    @else
        <h3>There is no product in cart to check out</h3>
    @endif
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
                    <option value="credit card">credit card</option>
                    <option value="Momo">Momo</option>
                    {{--<option value="paytm">paytm</option>--}}
                </select>
            </div>
            <div class="inputBox">
                <span>address line 01 :</span>
                <input type="text" min="0" value="{{Auth::user()->address}}"  name="orders_address" required placeholder="e.g. flat no.">
            </div>
            <div class="inputBox">
                <span>city :</span>
                <select class="form-control" name="orders_city" >
                    @foreach($cities as $city)
                        <option value="{{ $city->city_id }}"{{ old('city_id', Auth::user()->city->city_id) == $city->city_id ? 'selected' : '' }}>{{ $city->city_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if($cartitems->count() > 0)
        <a href="{{url('cartlist')}}" class="btn">Back to cart</a>
        <input type="submit" value="order now" class="btn" name="order_btn">

        @else
            <a href="{{url('/')}}" class="btn">Back to Shopping</a>
        @endif
    </form>

    <form action="{{url('/momo_payment')}}" method="POST">
        @csrf
        <input type="hidden" name="total" value="{{$grandtotal}}">
        <button type="submit" class="btn btn-default" name="payUrl">Momo</button>
    </form>
    @include('sweetalert::alert')

</section>
<script src="{{ asset('js/register.js') }}"></script>
@yield('scripts')

</body>
</html>
