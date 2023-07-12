@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')
    <head>
        <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    </head>
    <body>

    <section class="products" id="products">

        <h1  class="heading"> <span >Our products</span> </h1>

        <div class="box-container">
            @if($books->count() > 0)
            @foreach($books as $book)
                <div class="box" data-item="special">
                    <div class="icons">
                        <a href="/detail/{{$book['books_id']}}" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src={{$book['books_image']}} alt="">
                    </div>
                    <div class="content">
                        <h3>{{$book['books_name']}}</h3>
                        <div class="price">
                            <div class="amount">{{number_format($book['books_price'])}}VND</div>
                        </div>
                        <form action="{{url('cart',$book->books_id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="books_id" value={{$book['books_id']}}>
                            <input type="hidden" name="books_quantity" value="1">
                            <button class="btn">Add to Cart</button>
                        </form>
                    </div>
                </div>
            @endforeach
            @else
                <p class="empty">There is no products with the name that you searched</p>
            @endif
        </div>
    </section>

@endsection
