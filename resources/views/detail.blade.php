@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single E-commerce Product Page using HTML, CSS - Codingscape</title>
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="container">
    <div class="single-product">
        <div class="row">
            <div class="col-6">
                <div class="product-image">
                    <div class="product-image-main">
                        <img src={{$books['books_image']}} alt="" id="product-main-image">
                    </div>

                </div>
            </div>
            <div class="col-6">
                <div class="breadcrumb">
                    <span><a href="#">Home</a></span>
                    <span><a href="#">{{$books->category->category_name}}</a></span>
                </div>

                <div class="product">
                    <div class="product-title">
                        <h2>{{$books['books_name']}}</h2>
                    </div>
                    <div class="product-price">
                        <span class="offer-price">${{$books['books_price']}}</span>
                    </div>

                    <div class="product-details">
                        <h3>ISBN</h3>
                        <p>{{$books['books_ISBN']}}</p>
                    </div>

                    <div class="product-details">
                        <h3>Category</h3>
                        <p>{{$books->category->category_name}}</p>
                    </div>

                    <div class="product-details">
                        <h3>Publisher</h3>
                        <p>{{$books->publisher->publisher_name}}</p>
                    </div>

                    <div class="product-details">
                        <h3>Author</h3>
                        <p>{{$books->author->author_name}}</p>
                    </div>

                    <div class="product-details">
                        <h3>Quantity</h3>
                        <p>{{$books['books_quantity']}}</p>
                    </div>

                    <div class="product-details">
                        <h3>Description</h3>
                        <p>{{$books['books_description']}}</p>
                    </div>


                    <span class="divider"></span>

                    <div class="product-btn-group">
                        <div class="button buy-now"><i class='bx bxs-zap' ></i> Buy Now</div>
                        <form action="/add_to_cart" method="POST">
                            @csrf
                            <input type="hidden" name="books_id" value={{$books['books_id']}}>
                        <button class="button add-cart"><i class='bx bxs-cart' ></i> Add to Cart</button>
                        </form>
                        <div class="button heart"><i class='bx bxs-heart' ></i> Add to Wishlist</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--script-->
<script src="{{ asset('js/detail.js') }}"></script>
</body>
</html>
@endsection
