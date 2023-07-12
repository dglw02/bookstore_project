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
<style>
    .container-fluid {
        width: 100%;
        padding-right: 7.5px;
        padding-left: 7.5px;
        margin-right: auto;
        margin-left: auto;
    }

    .p-4 {
        padding: 1.5rem !important;
    }

    .card {
        box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
        margin-bottom: 1rem;
    }

    .table:not(.table-dark) {
        color: inherit;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: transparent;
    }

    table {
        border-collapse: collapse;
    }

    .table thead th {
        text-align: center;
        border-bottom: 2px solid #dee2e6;
    }

    .table td, .table th {
        font-size: 20px;
        padding: 1.5rem;
        border-style: groove;
        text-align: center;
        border-color: green;
    }

    th {
        text-align: inherit;
        text-align: -webkit-match-parent;
    }

    tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }

    .h4, h4 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
        display: block;
        margin-block-start: 1.33em;
        margin-block-end: 1.33em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
    }

</style>
<body>

<div class="heading">
    <h3>your orders</h3>
    <p><a href="{{url('/')}}">home</a> / orders </p>
</div>

<section class="placed-orders">
    <h1 class="title">placed orders</h1>

    <div class="box-container">
        @if($orders->count() > 0)
            <div class="box">
                <p> placed on : <span>{{$orders->created_at}}</span></p>
                <p> name : <span>{{$orders->orders_name}}</span></p>
                <p> number : <span>{{$orders->orders_phone}}</span></p>
                <p> email : <span>{{$orders->orders_email}}</span></p>
                <p> address : <span>{{$orders->orders_address}} </span></p>
                <p> Province : <span>{{$orders->province->province_name}} </span></p>
                <p> District : <span> {{$orders->district->district_name}} </span></p>
                <p> Wards : <span>{{$orders->wards->wards_name}} </span></p>
                <p> payment method : <span>{{$orders->orders_payment}}</span></p>


                <p> your orders :
                    @foreach($orders->orderdetail as $items)
                        <span>({{$items->books->books_name}} / x {{$items->quantity}} ), </span>
                    @endforeach
                </p>
                <p> total price : <span>{{number_format($orders->orders_price)}} VND</span></p>
                <p> payment status :
                    @if($orders->orders_status == 0)
                        <span>Pending</span>
                <div style="margin-top: 2rem; text-align:center;">
                    <form method="POST" action="{{url('/vieworder/'.$orders->orders_id.'/delete-order')}}">
                        @csrf
                        @method('put')
                        <button type="submit" class="delete-btn"
                                onclick="return confirm('Are you sure you want to cancelled your order?')">Cancelled
                            order
                        </button>
                    </form>
                </div>
                @elseif($orders->orders_status == 1)
                    <span>Approved</span>
                    <div style="margin-top: 2rem; text-align:center;">
                        <form method="POST" action="{{url('/vieworder/'.$orders->orders_id.'/delete-order')}}">
                            @csrf
                            @method('put')
                            <button type="submit" class="delete-btn"
                                    onclick="return confirm('Are you sure you want to cancelled your order?')">Cancelled
                                order
                            </button>
                        </form>
                    </div>
                @elseif($orders->orders_status == 2)
                    <span>Transported</span>
                @elseif($orders->orders_status == 3)
                    <span>Completed</span>
                @else
                    <span>Canceled</span>
                @endif
            </div>
        @else
            <p class="empty">no orders placed yet!</p>
        @endif
    </div>


    <div class="box-container">
        @if($orders->count() > 0)

            <div class="container-fluid">
                <div class="card my-4">
                    <h4 class="p-4">Order information</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Book Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $total = 0;@endphp
                        @foreach($orders->orderdetail as $ord)
                            <tr>
                                <td>{{$ord->books->books_name}}</td>
                                <td><img src={{$ord->books->books_image}} width="150px" alt="a"></td>
                                <td>{{$ord->quantity}}</td>
                                <td>{{number_format($ord->price)}} VND</td>
                                @php $total += $ord->quantity * $ord->price @endphp
                                <td>{{number_format($ord->quantity * $ord->price)}} VND</td>
                            </tr>
                        @endforeach
                        @php $grandtotal = $total +($total * 0.1) + Auth::user()->province->area->area_price @endphp
                        <tr>
                            <td colspan="3"></td>

                            <td><strong>Total</strong></td>
                            <td><strong>{{number_format($total)}} VND</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>

                            <td><strong>Tax(10%)</strong></td>
                            <td><strong>{{number_format($total * 0.1)}} VND</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>Grand Total</strong></td>
                            <td><strong>{{number_format($grandtotal)}} VND</strong></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        @endif
    </div>


</section>
</body>
</html>
@endsection
