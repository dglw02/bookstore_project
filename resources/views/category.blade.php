@extends('layout.base')

@section('title','category')

@section('content')
    <div class="swiper featured-slider">
        <div class="swiper-wrapper">
            @foreach($category as $cate)
                <div class="swiper-slide box">
                    <div class="content">
                        <h3></h3>
                        <div class="price"></div>
                        <a href="{{url('view-category/'.$cate->category_id)}}" class="btn">{{$cate->category_name}}</a>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

@endsection
