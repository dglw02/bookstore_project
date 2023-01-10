@extends('layout.base')
    @section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<div class="heading">
    <h3>your orders</h3>
    <p> <a href="{{url('/')}}">home</a> / orders </p>
</div>

<section class="placed-orders">

    <h1 class="title">placed orders</h1>

    <div class="box-container">


        @if($orders->count() > 0)
            <div class="box">
                    <p> placed on : <span>{{$orders->created_at}}</span> </p>
                    <p> name : <span>{{$orders->orders_name}}</span> </p>
                    <p> number : <span>{{$orders->orders_phone}}</span> </p>
                    <p> email : <span>{{$orders->orders_email}}</span> </p>
                    <p> address : <span>{{$orders->orders_address}}, {{$orders->orders_city}} </span> </p>
                    <p> payment method : <span>{{$orders->orders_payment}}</span> </p>


                    <p> your orders :
                        @foreach($orders->orderdetail as $items)
                            <span>({{$items->books->books_name}} / x {{$items->quantity}} ), </span>
                @endforeach
                    </p>
                    <p> total price : <span>${{$orders->orders_price}}</span> </p>
                    <p> payment status :
                        @if($orders->orders_status == 0)
                            <span>Pending</span>
                <div style="margin-top: 2rem; text-align:center;">
                    <form method="POST" action="{{url('/vieworder/'.$orders->orders_id.'/delete-order')}}">
                        @csrf
                        @method('put')
                        <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to cancelled your order?')" >Cancelled order</button>
                    </form>
                </div>
                        @elseif($orders->orders_status == 1)
                            <span>Approved</span>
                    <div style="margin-top: 2rem; text-align:center;">
                        <form method="POST" action="{{url('/vieworder/'.$orders->orders_id.'/delete-order')}}">
                            @csrf
                            @method('put')
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to cancelled your order?')">Cancelled order</button>
                        </form>
                    </div>
                @elseif($orders->orders_status == 2)
                    <span>Completed</span>
                        @else
                            <span>Canceled</span>
                        @endif
            </div>
        @else
            <p class="empty">no orders placed yet!</p>
        @endif
    </div>
</section>
</body>
</html>
@endsection
