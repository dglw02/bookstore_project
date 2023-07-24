@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')
    <head>
        <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    </head>
    <body>

    <section class="products" id="products">

        <h1  class="heading"> <span >Best selling books</span> </h1>

        <div class="box-container">
            @if($top->count() > 0)
            @foreach($top as $tops)
                <div class="box" data-item="special">
                    <div class="icons">
                        <a href="/detail/{{$tops->books->books_id}}" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src={{$tops->books->books_image}} alt="">
                    </div>
                    <div class="content">
                        <h3>{{$tops->books->books_name}}</h3>
                        <h3 style="color:red">Has sold ({{$tops->count}})</h3>
                        <div class="price">
                            <div class="amount">{{number_format($tops->books->books_price)}} VND</div>
                        </div>
                        <form action="{{url('cart',$tops->books->books_id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="books_id" value={{$tops->books->books_id}}>
                            <input type="hidden" name="books_quantity" value="1">
                            <button class="btn">Add to Cart</button>
                        </form>
                    </div>
                </div>
            @endforeach
                @else
                <h1 class="title">There is no best selling books yet</h1>
            @endif
        </div>
    </section>
@endsection
