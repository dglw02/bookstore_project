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
    <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src={{asset('/asset/img/background_1.jpg')}} alt="">
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>Choosing Book Forest can allow you to purchase the best selling books which are being written by some of the most popular authors. Apart from the numerous advantages of choosing us, some of the most important ones are being mentioned below:</p>
            <p>+ 100% original books</p>
            <p>+ Books available at affordable prices</p>
            <p>+ 100% Secure and Safe Shopping</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

    </div>

</section>

<section class="reviews">

    <h1 class="title">client's reviews</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic-1.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
        </div>



        <div class="box">
            <img src="images/pic-6.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
        </div>

    </div>

</section>

<section class="authors">

    <h1 class="title">greate authors</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/author-1.jpg" alt="">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
        </div>

        <div class="box">
            <img src="images/author-2.jpg" alt="">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
        </div>

        <div class="box">
            <img src="images/author-3.jpg" alt="">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
        </div>

        <div class="box">
            <img src="images/author-4.jpg" alt="">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
        </div>

        <div class="box">
            <img src="images/author-5.jpg" alt="">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
        </div>

        <div class="box">
            <img src="images/author-6.jpg" alt="">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
        </div>

    </div>

</section>









    <!-- custom js file link  -->
<script src="{{ asset('js/register.js') }}"></script>
@yield('scripts')
</body>
</html>
@endsection
