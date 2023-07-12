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
                            <h3><a style="color:blue">{{$items->orders_name}}</a> / {{$items->orders_address}}  / {{$items->created_at}} / @if($items->orders_status == 0)
                                    <a style="color:blue">Pending</a>
                                @elseif($items->orders_status == 1)
                                <a style="color:blue">Approved</a>
                                @elseif($items->orders_status == 2)
                                <a style="color:Green">Transported</a>
                                @elseif($items->orders_status == 3)
                                    <a style="color:Green">Completed</a>
                                @else
                                <a style="color:red">Cancel</a>
                                @endif
                            </h3>
                            <p><a style="color:green">{{number_format($items->orders_price)}} VND</a></p>
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
