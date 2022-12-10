@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')
    <section class="featured" id="featured">

        <h1 class="heading"> <span>Result for Books</span> </h1>
        @foreach($books as $book)
            <div class="swiper-slide box">
                <div class="image">
                    <a href="detail/{{$book['books_id']}}"><img src={{$book['books_image']}} alt="a"></a>
                </div>
                <div class="content">
                    <h1>{{$book['books_name']}}</h1>
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
    </section>

@endsection
