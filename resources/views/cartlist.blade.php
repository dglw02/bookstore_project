<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ url('asset/img/logo.png') }}">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
<div class="heading">
    <h3>shopping cart</h3>
    <p><a href="{{url('/')}}">home</a>/ cart </p>
</div>
<section class="shopping-cart">
    @if($cartitems->count() > 0)
        <h1 class="title">products added</h1>
        <div class="box-container">
            @php $total = 0; @endphp
            @foreach($cartitems as $item)
                <div class="box">
                    <form method="POST" action="{{url('/cart/'.$item->id.'/delete')}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="fas fa-times"
                                onclick="return confirm('Book will move to trash! Are you sure to delete??')"></button>
                    </form>
                    <img src={{$item->books->books_image}} alt="">
                    <div class="name">{{$item->books->books_name}}</div>
                    <div class="price">${{$item->books->books_price}}/-</div>
                    <form action="" method="post">
                        @csrf
                        @method('put')
                        <input type="text" name="id_cart" value="{{$item->id}}">
                        <input type="number"  name="cart_quantity" value="{{$item->books_quantity}}">
                        <input type="submit" name="update_cart" value="update" class="option-btn">
                    </form>
                    @php $total += $item->books_quantity * $item->books->books_price @endphp
                    <div class="sub-total"> sub total :
                        <span>${{$item->books_quantity * $item->books->books_price}}/-</span></div>
                </div>
            @endforeach
        </div>
        <div style="margin-top: 2rem; text-align:center;">
            <form method="POST" action="{{url('/cart/deleteall')}}">
                @csrf
                @method('delete')
                <button type="submit" class="delete-btn" onclick="return confirm('Delete all?')">delete all</button>
            </form>
        </div>
        <div class="cart-total">
            @php $grandtotal = $total +($total * 0.1) + Auth::user()->city->areas->areas_price @endphp
            <p>grand total : <span>${{$total}} + Tax10% ${{$total * 0.1}} + Ship ${{Auth::user()->city->areas->areas_price}} = ${{$grandtotal}}</span>
            </p>
            <div class="flex">
                <a href="{{url('/')}}" class="option-btn">continue shopping</a>
                <a href="{{url('checkout')}}" class="btn">proceed to checkout</a>
            </div>
        </div>
    @else
        <h1 class="title">Cart empty</h1>
        <div class="cart-total">
            <a href="{{url('/')}}" class="option-btn">continue shopping</a>
        </div>
    @endif
</section>

@include('sweetalert::alert')


<script
    src="https://code.jquery.com/jquery-3.6.2.min.js"
    integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="
    crossorigin="anonymous"></script>

@yield('scripts')
</body>
</html>
