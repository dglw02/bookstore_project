@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')

    <section class="home" id="home">

        <div class="row">

            <div class="content">
                <h3>Welcome to the Book Forest</h3>
                <h2>Where the most thrilling books you've ever laid eyes on!!</h2>
                <a href="{{URL::to('/allbooks')}}" class="btn">shop now</a>
            </div>

            <div class="swiper books-slider">
                <div class="swiper-wrapper">
                    @foreach($books as $book)
                        <a href="detail/{{$book['books_id']}}" class="swiper-slide"><img src={{$book['books_image']}} alt=""></a>
                    @endforeach
                </div>
            </div>

        </div>

    </section>

    <!-- home section ense  -->

    <!-- icons section starts  -->

    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-shipping-fast"></i>
            <div class="content">
                <h3>free shipping</h3>
                <p>order over $100</p>
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

        <h1 class="heading"> <span>The New York Times Best Sellers</span> </h1>

        <div class="swiper featured-slider">

            <div class="swiper-wrapper">
                @foreach($books as $book)
                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="detail/{{$book['books_id']}}" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <a href="detail/{{$book['books_id']}}"><img src={{$book['books_image']}} alt="a"></a>
                    </div>
                    <div class="content">
                        <h3>{{$book['books_name']}}</h3>
                        <div class="price">${{$book['books_price']}}</div>
                        <form action="{{url('cart',$book->books_id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="books_id" value={{$book['books_id']}}>
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


    <!-- home section starts  -->

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

    <!-- home section ends -->

    <!-- banner section starts  -->

    <section class="banner-container">

        <div class="banner">
            <img src={{asset('/asset/img/book_background1.jpg')}} alt="">
            <div class="content">
                <span>special offer</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>

        <div class="banner">
            <img src={{asset('/asset/img/book_background2.jpg')}} alt="">
            <div class="content">
                <span>special offer</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>

    </section>

    <!-- banner section ends -->


    <!-- arrivals section starts  -->

    <section class="arrivals" id="arrivals">

        <h1 class="heading"> <span>new Books</span> </h1>

        <div class="swiper arrivals-slider">

            <div class="swiper-wrapper">
                @foreach($newbook as $book)
                <a href="detail/{{$book['books_id']}}" class="swiper-slide box">
                    <div class="image">
                        <img src={{$book['books_image']}}  alt="a" >
                    </div>
                    <div class="content">
                        <h3>{{$book['books_name']}}</h3>
                        <div class="price">${{$book['books_price']}}</div>
                        <form action="{{url('cart',$book->books_id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="books_id" value={{$book['books_id']}}>
                            <button class="btn">Add to Cart</button>
                        </form>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </section>

    <!-- arrivals section ends -->


    <!-- reviews section starts  -->

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

@endsection
