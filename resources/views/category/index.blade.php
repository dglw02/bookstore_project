@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')
    <section class="products" id="products">

        <h1  class="heading"> <span >{{$category->category_name}}</span> </h1>
        <a href="{{ URL::current()."?sort=price_asc"}}"  value="low-to-high"><h1 class="heading">Price : Low to High</h1></a>
        <a href="{{ URL::current()."?sort=price_desc"}}"  value="high-to-low"><h1 class="heading">Price : High to Low</h1></a>

        <br>
        <div class="box-container">
            @foreach($books as $book)
            <div class="box" data-item="special">
                <div class="icons">
                    <form action="{{url('cart',$book->books_id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="books_id" value={{$book['books_id']}}>
                        <input type="hidden" name="books_quantity" value="1">
                        <a class="fas fa-shopping-cart"></a>
                    </form>


                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-search"></a>
                    <a href="/detail/{{$book['books_id']}}" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src={{$book['books_image']}} alt="">
                </div>
                <div class="content">
                    <h3>{{$book['books_name']}}</h3>
                    <div class="price">
                        <div class="amount">${{$book['books_price']}}</div>

                    </div>
                    <div class="stars">
                        <span>{{$category->category_name}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
