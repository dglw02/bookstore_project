@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')

    <section class="featured" id="featured">
        <h1 class="heading"> <span>Education</span> </h1>
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
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <a href="#" class="btn">add to cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <section class="featured" id="featured">

        <h1 class="heading"> <span>Manga</span> </h1>

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
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <a href="#" class="btn">add to cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <section class="featured" id="featured">

        <h1 class="heading"> <span>Guide</span> </h1>

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
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <a href="#" class="btn">add to cart</a>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <section class="featured" id="featured">

        <h1 class="heading"> <span>Novel</span> </h1>

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
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <a href="#" class="btn">add to cart</a>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <section class="featured" id="featured">

        <h1 class="heading"> <span>Philosophy</span> </h1>

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
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <a href="#" class="btn">add to cart</a>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>
@endsection
