@extends('layout.base')
@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">

</head>
<body>
<div class="heading">
    <h3>about us</h3>
    <p><a href="home.php">home</a> / about </p>
</div>

<section class="about">
    <div class="flex">

        <div class="image">
            <img src={{asset('/asset/img/background_1.jpg')}} alt="">
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>Choosing Book Forest can allow you to purchase the best selling books which are being written by some of the most popular authors. Apart from the numerous advantages of choosing us, some of the most important ones are being mentioned below:</p>
            <p>+ 100% original books & Secure and Safe Shopping</p>
            <p>+ Books available at affordable prices</p>
            <p>+ Cash on Delivery facility available</p>

        </div>

    </div>

</section>

<section class="reviews">

    <h1 class="title">client's reviews</h1>

    <div class="box-container">

        <div class="box">
            <img src="{{asset('/asset/img/client_1.jfif')}}" alt="">
            <p>Excellent service, rapid delivery and well packed item. Arrived in good time and in perfect condition. Easily as good if not better than amazon, especially as the purchase benefits independent bookshops instead of a vast faceless corporation.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Jason Ryder</h3>
        </div>

        <div class="box">
            <img src="{{asset('/asset/img/PP4.2.jpg')}}" alt="">
            <p>Excellent! Delivered the day after I ordered and right near Christmas with all the strikes etc. I didn't expect it to be there before so was a very pleasant surprise and my friend was very happy with their gift. Will absolutely order from here again.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>John Louis</h3>
        </div>


        <div class="box">
            <img src="{{asset('/asset/img/client_2.jfif')}}" alt="">
            <p>I had a panic that my order would be delayed because of everything going on in the weeks before Christmas but I was amazed by how quickly my books arrived. Incredible! I choose Bookshop as my first option when buying books now.Thank you</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Ryan Sterling</h3>
        </div>

    </div>

</section>

<section class="authors">

    <h1 class="title">create authors</h1>

    <div class="box-container">

        <div class="box">
            <img src="{{asset('/asset/img/download (1).png')}}" alt="">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Duong Luu</h3>
        </div>

        <div class="box">
            <img src="{{asset('/asset/img/download (1).png')}}" alt="">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Minh Dat</h3>
        </div>

    </div>

</section>









    <!-- custom js file link  -->
<script src="{{ asset('js/register.js') }}"></script>
@yield('scripts')
</body>
</html>
@endsection
