@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')
    <section class="blogs" id="blogs">

        <h1 class="heading"> <span>our categories</span> </h1>

        <div class="swiper blogs-slider">


            @foreach($orders as $items)
                    <div class="swiper-slide box">
                        <div class="content">
                            <h3>{{$items->orders_name}}</h3>
                            <p>${{$items->orders_price}}</p>
                            <a href="{{url('vieworder/'.$items->orders_id)}}" class="btn">Order detail</a>
                        </div>
                    </div>
                @endforeach

        </div>
    </section>
@endsection
