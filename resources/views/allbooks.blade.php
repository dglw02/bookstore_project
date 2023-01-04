@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')

    <section class="products" id="products">

        <h1  class="heading"> <span >Our products</span> </h1>
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h3>Sort by:</h3>

                    <a href="{{ URL::current()."?sort=price_asc"}}"  value="low-to-high"><i class="fas fa-arrow-right" ></i>Price : Low to High</a>
                    <a href="{{ URL::current()."?sort=price_desc"}}"  value="high-to-low"><i class="fas fa-arrow-right"></i>Price : High to Low</a>
                </div>
            </div>
        </section>
        <br>
        <div class="box-container">
            @foreach($books as $book)
                <div class="box" data-item="special">
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
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
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
