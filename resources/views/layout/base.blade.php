<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Forest</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
</head>
<body>

<header class="header">

    <div class="header-1">

        <a href="{{url('/')}}" class="logo"> <i class="fas fa-book"></i> Book Forest </a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <div id="login-btn" class="fas fa-user"></div>
        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="{{url('/')}}">Home</a>
            <a href="{{URL::to('/new')}}">New</a>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Category</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="{{URL::to('/education')}}">Education</a>
                    <a href="{{URL::to('/manga')}}">Manga</a>
                    <a href="{{URL::to('/philosophy')}}">Philosophy</a>
                    <a href="{{URL::to('/guide')}}">Guide</a>
                    <a href="{{URL::to('/novel')}}">Novel</a>
                </div>
            </div>
            <a href="{{URL::to('/topsellers')}}">Top Sellers</a>
            <a href="{{URL::to('/highrating')}}">High Rating</a>
            <a href="{{URL::to('/onsale')}}">On Sale</a>
        </nav>
    </div>
</header>
<!-- header section ends -->

<!-- bottom navbar  -->

<nav class="bottom-navbar">
    <a href="{{url('/')}}">Home</a>
    <a href="{{URL::to('/new')}}">New</a>
    <a href="{{URL::to('/topsellers')}}">Top Sellers</a>
    <a href="{{URL::to('/highrating')}}">High Rating</a>
    <a href="{{URL::to('/onsale')}}">On Sale</a>
</nav>

<!-- login form  -->
<div class="login-form-container">
    <div id="close-login-btn" class="fas fa-times"></div>
    <form action="">
        <h3>sign in</h3>
        <span>email</span>
        <input type="email" name="" class="box" placeholder="enter your email" id="">
        <span>password</span>
        <input type="password" name="" class="box" placeholder="enter your password" id="">
        <div class="checkbox">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
        </div>
        <input type="submit" value="sign in" class="btn">
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="#">create one</a></p>
    </form>
</div>

<!-- home section starts  -->



<!-- Content -->
@yield('content')


<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>our locations</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> india </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> USA </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> russia </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> france </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> japan </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> africa </a>

        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="{{url('/')}}"><i class="fas fa-arrow-right"></i>Home</a>
            <a href="{{URL::to('/new')}}"><i class="fas fa-arrow-right"></i>New</a>
            <a href="{{URL::to('/topsellers')}}"><i class="fas fa-arrow-right"></i>Top Sellers</a>
            <a href="{{URL::to('/highrating')}}"><i class="fas fa-arrow-right"></i>High Rating</a>
            <a href="{{URL::to('/onsale')}}"><i class="fas fa-arrow-right"></i>On Sale</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> account info </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> ordered items </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> privacy policy </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> payment method </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> our serivces </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
            <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
            <a href="#"> <i class="fas fa-envelope"></i> asdfghj@gmail.com </a>
            <img src="image/worldmap.png" class="map" alt="">
        </div>

    </div>

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
    </div>

    <div class="credit"> <span>A room without books is like a body without a soul</span></div>

</section>

<!-- footer section ends -->

<!-- loader  -->

<div class="loader-container">
    <img src="image/loader-img.gif" alt="">
</div>

<!-- footer section ends -->




<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="{{ asset('js/layout.js') }}"></script>
@yield('scripts')
</body>
</html>
