<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Forest</title>
    <link rel="icon" href="{{ url('asset/img/logo.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
</head>
<body>

<header class="header">

    <div class="header-1">
        <a href="{{url('/')}}" class="logo">
            <img style="height:30px;width: 50px;border-radius: 950px;" src={{asset('/asset/img/logo.png')}} alt=""> Book
            Forest </a>

        <form action="/search" class="search-form">
            @csrf
            <input type="search" name="query" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
            <button id="search-btn" class="fas fa-search"></button>
        </form>

        <div class="icons">
            @if(Auth::check() == false)
                <a href="{{url('register')}}">Register</a>
                <a href="{{url('login')}}">Login</a>
            @else
                <a href="{{url('cartlist')}}" class="fas fa-shopping-cart"><span class="badge badge-pill bg-success cart-count">{{Auth::user()->cart->count()}}</span></a>
                <div class="dropdown">
                    {{Auth::user()->name ?? 'None'}}
                    <div class="dropdown-content">
                        <form action="{{url("/my-order")}}" >
                            <button class="btn btn-success">Order</button>
                        </form>
                        <form action="{{url('logout')}}" method="POST">
                            @csrf
                            <button class="btn btn-success">logout</button>
                        </form>


                    </div>
                </div>

            @endif

        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="{{url('/')}}">Home</a>
            <a href="{{URL::to('/new')}}">New</a>
            <a href="{{URL::to('/bestseller')}}">Best Seller</a>
            <a href="{{URL::to('/category')}}">Category</a>
            <a href="{{URL::to('/allbooks')}}">All</a>
            <a href="{{URL::to('/about')}}">About</a>
        </nav>
    </div>
</header>
<!-- header section ends -->

<!-- bottom navbar  -->

<nav class="bottom-navbar">
    <a href="{{url('/')}}">Home</a>
    <a href="{{URL::to('/new')}}">New</a>
    <a href="{{URL::to('/topsellers')}}">Top Sellers</a>
    <a href="{{URL::to('/allbooks')}}">All</a>
    <a href="{{URL::to('/about')}}">About</a>
</nav>


<!-- home section starts  -->


<!-- Content -->
@yield('content')


<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Book Forest</h3>
            <p> 74 Xa Dan, Dong Da, Ha Noi, Viet Nam <br>
                Book Publishing Joint Stock Company - Book Forest</p>
            <p> Book Forest accepts online orders and has home delivery.</p>

        </div>

        <div class="box">
            <h3>our locations</h3>
            <a><i class="fas fa-map-marker-alt"></i> 74 Xa Dan, Dong Da, Ha Noi </a>
            <a><i class="fas fa-map-marker-alt"></i> 20 Hang Dao, Hoan Kiem, Ha Noi </a>
            <a> <i class="fas fa-map-marker-alt"></i> 74 Kim Ma, Ba Dinh, Ha Noi </a>
            <a><i class="fas fa-map-marker-alt"></i> 220 Nguyen Van Cu, Long Bien, Ha Noi </a>

        </div>

        <div class="box">
            <h3>Menu</h3>
            <a href="{{url('/')}}"><i class="fas fa-arrow-right"></i>Home</a>
            <a href="{{URL::to('/new')}}"><i class="fas fa-arrow-right"></i>New</a>
            <a href="{{URL::to('/bestseller')}}"><i class="fas fa-arrow-right"></i>Best Seller</a>
            <a href="{{URL::to('/category')}}"><i class="fas fa-arrow-right"></i>Category</a>
            <a href="{{URL::to('/allbooks')}}"><i class="fas fa-arrow-right"></i>All</a>
            <a href="{{URL::to('/about')}}"><i class="fas fa-arrow-right"></i>About</a>
        </div>


        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
            <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
            <a href="#"> <i class="fas fa-envelope"></i> Bookforest@gmail.com </a>
        </div>

    </div>

    <div class="share">
        <a href="https://www.facebook.com" class="fab fa-facebook-f"></a>
        <a href="https://twitter.com/?lang=vi" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com" class="fab fa-instagram"></a>
        <a href="https://www.youtube.com" class="fab fa-youtube"></a>
        <a href="https://www.tiktok.com/vi-VN/" class="fab fa-tiktok"></a>
    </div>

    <div class="credit"><span>A room without books is like a body without a soul</span></div>

</section>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="{{ asset('js/layout.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@yield('scripts')
@include('sweetalert::alert')
</body>
</html>
