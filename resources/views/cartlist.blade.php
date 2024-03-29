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
    <p><a href="{{url('/')}}">Home</a>/ Cart </p>
</div>
<section class="shopping-cart">
    @if($cartitems->count() > 0)
        <h1 class="title">Products Added</h1>
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
                    <div class="price">{{number_format($item->books->books_price)}} VND</div>


                    <form action="{{url('/cart/'.$item->id.'/update')}}" method="post">
                        @csrf

                        <input type="hidden" name="id_cart" value="{{$item->id}}">
                        <input type="number"  min="1" max="{{$item->books->books_quantity}}" name="books_quantity" value="{{$item->books_quantity}}"> <br>
                        <input style="height:40px" type="submit" name="update_cart" value="update" class="option-btn">
                    </form>


                    @php $total += $item->books_quantity * $item->books->books_price @endphp
                    <div class="sub-total"> SUB TOTAL :
                        <span>{{number_format($item->books_quantity * $item->books->books_price)}} VND</span></div>
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
            @php $grandtotal = $total +($total * 0.1) + Auth::user()->province->area->area_price @endphp
            <p>TOTAL : <span>{{number_format($total)}} VND</span>
            </p>
            <p>TAX(10%) : <span>{{number_format($total * 0.1)}} VND</span>
            </p>
            <p>SHIPPING : <span>{{Auth::user()->province->area->area_price}} VND</span>
            </p>
            <p>--------------------------------------------</p>
            <p>GRAND TOTAL : <span>{{number_format($grandtotal)}} VND</span>
            </p>
            <div class="flex">
                <a href="{{url('/')}}" class="option-btn">continue shopping</a>
                <a href="{{url('checkout')}}" class="btn">COD (Cash on Delivery</a>
                <a href="{{url('checkoutonline')}}" class="btn">MOMO (Online) </a>
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



    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</script>


@yield('scripts')
</body>
</html>
