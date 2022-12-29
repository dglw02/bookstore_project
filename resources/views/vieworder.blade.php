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
                    <p> address : <span>{{$orders->orders_address}}</span> </p>
                    <p> payment method : <span>{{$orders->orders_payment}}</span> </p>
                    <p> your orders : <span></span> </p>
                    <p> total price : <span>${{$orders->orders_price}}</span> </p>
                    <p> payment status :
                        @if($orders->orders_status == 0)
                            <span>Pending</span>
                        @elseif($orders->orders_status == 1)
                            <span>Approved</span>
                        @else
                            <span>Completed</span>
                        @endif
                    </p>
            </div>
        @else
            <p class="empty">no orders placed yet!</p>
        @endif
    </div>
</section>
<script src="{{ asset('js/register.js') }}"></script>
@yield('scripts')
</body>
</html>