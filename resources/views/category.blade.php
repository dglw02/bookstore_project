@extends('layout.base')

@section('title','Allcategory')

@section('content')

    <section class="blogs" id="blogs">

        <h1 class="heading"> <span>our categories</span> </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">
                @foreach($categories as $cate)
                <div class="swiper-slide box">
                    <div class="image">
                        <img src={{asset('/asset/img/book_background1.jpg')}} alt="">
                    </div>
                    <div class="content">
                        <h3>{{$cate->category_name}}</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                        <a href={{url('/category/'.$cate->category_name)}} class="btn">Check now</a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </section>
@endsection
