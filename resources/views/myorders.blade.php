@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')
    <head>
        <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    </head>
    <section class="blogs" id="blogs">

        <h1 class="heading"> <span>your order</span> </h1>

        <div class="swiper blogs-slider">
            @if($orders->count() > 0)
            @foreach($orders as $items)
                    <div class="swiper-slide box">
                        <div class="content">
                            <h3>{{$items->orders_name}}-({{$items->created_at}})-@if($items->orders_status = 0)
                                    Pending
                                @elseif($items->orders_status == 1)
                                    Approved
                                @elseif($items->orders_status == 2)
                                    Completed
                                @else
                                    Cancel
                                @endif
                            </h3>
                            <p>${{$items->orders_price}}</p>
                            <a href="{{url('vieworder/'.$items->orders_id)}}" class="btn">Order detail</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="empty">no orders placed yet!</p>
            @endif

        </div>
    </section>
@endsection
