@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')
    <head>
        <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    </head>
    <body>

    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">
                @foreach($category as $cate)
                    <div class="swiper-slide slide" style="background:url({{$cate->category_image}}) no-repeat;background-size: cover;">
                        <div class="content">
                            <h3>{{$cate->category_name}}</h3>
                            <a href={{url('/category/'.$cate->category_name)}} class="btn">shop now</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- home section ense  -->

    <!-- icons section starts  -->

    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-shipping-fast"></i>
            <div class="content">
                <h3>reputable shipping</h3>
                <p>ensure shipping to the right place</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>secure payment</h3>
                <p>100 secure payment</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="content">
                <h3>easy returns</h3>
                <p>10 days returns</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>24/7 support</h3>
                <p>call us anytime</p>
            </div>
        </div>

    </section>

    <!-- icons section ends -->

    <!-- featured section starts  -->

    <section class="featured" id="featured">

        <h1 class="heading"> <span>Featured Products</span> </h1>

        <div class="swiper featured-slider">

            <div class="swiper-wrapper">
                @foreach($books as $book)
                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="detail/{{$book['books_id']}}" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <a href="detail/{{$book['books_id']}}"><img src={{$book['books_image']}} alt="a"></a>
                    </div>
                    <div class="content">
                        <h3>{{$book['books_name']}}</h3>
                        <div class="price">{{number_format($book['books_price'])}} VND</div>
                        <form action="{{url('cart',$book->books_id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="books_id" value={{$book['books_id']}}>
                            <input type="hidden" name="books_quantity" value="1">
                            <button class="btn">Add to Cart</button>
                        </form>

                    </div>
                </div>
                @endforeach

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- featured section ends -->
    <section class="banner-container">

        <div class="banner">
            <img src={{asset('/asset/img/book_background1.jpg')}} alt="">
            <div class="content">
                <span>special offer</span>
                <h3>upto 50% off</h3> <br>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>

        <div class="banner">
            <img src={{asset('/asset/img/book_background2.jpg')}} alt="">
            <div class="content">
                <span>special offer</span>
                <h3>upto 50% off</h3> <br>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>

    </section>

    <!-- home section starts  -->



    <!-- home section ends -->



    <section class="products">

        <h1 class="title">latest products</h1>

        <div class="box-container">
            @foreach($newbook as $book)
            <form action="{{url('cart',$book->books_id)}}" method="POST" class="box">
                @csrf
                <input type="hidden" name="books_id" value={{$book['books_id']}}>
                <a href="detail/{{$book['books_id']}}"><img class="image" src="{{$book->books_image}}" alt=""></a>
                <div class="name">{{$book->books_name}}</div>
                <div class="price">{{number_format($book->books_price)}} VND</div>
                <input type="number" min="1" max="{{$book->books_quantity}}" name="books_quantity" value="1" class="qty">
                <input type="hidden" name="books_image" value="{{$book->books_name}}">
                <input type="hidden" name="books_price" value="{{number_format($book->books_price)}}">
                <input type="hidden" name="books_image" value="{{$book->books_image}}">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
            @endforeach
        </div>


    </section>

    <section class="reviews" id="reviews">

        <h1 class="heading"> <span>Author info</span> </h1>

        <div class="swiper reviews-slider">

            <div class="swiper-wrapper">
                @foreach($author as $authors)
                <div class="swiper-slide box">
                    <img src={{$authors->author_image}} alt="">
                    <h3>{{$authors->author_name}}</h3>
                    <p>{{$authors->author_description}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    </body>
@endsection
