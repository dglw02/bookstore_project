@extends('layout.base')

@section('title','Allcategory')

@section('content')
    <head>
        <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    </head>
    <section class="blogs" id="blogs">

        <h1 class="heading"> <span>our categories</span> </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">
                @foreach($categories as $cate)
                <div class="swiper-slide box">
                    <div class="image">
                        <img src={{$cate->category_image}} alt="">
                    </div>
                    <div class="content">
                        <h3>{{$cate->category_name}}</h3>
                        <p>{{$cate->category_description}}</p>
                        <a href={{url('/category/'.$cate->category_name)}} class="btn">Check now</a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </section>
@endsection
