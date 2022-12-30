@extends('layout.base')

@section('title','Danh mục sản phẩm')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="container">
    <form action="{{url('cart',$books->books_id)}}" method="POST">
        @csrf
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
                    <span><a href={{url('/')}}>Home</a></span>
                    <span><a href={{url('/category/'.$books->category->category_name)}}>{{$books->category->category_name}}</a></span>
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
                        <h3>Publisher</h3>
                        <p>{{$books->publisher->publisher_name}}</p>
                    </div>

                    <div class="product-details">
                        <h3>Author</h3>
                        <p>{{$books->author->author_name}}</p>
                        <a href="{{url('/')}}" class="logo"> <img style="height:100px;width: 100px;border-radius: 950px" src={{$books->author->author_image}} alt=""></a>
                    </div>



                    @if($books->books_quantity > 0)
                        <a href="#" class="btn">In Stock</a>
                    <div class="product-details">
                        <br>
                        <input type="number" value="1" min="1" class="form-control" style="width: 100px" name="books_quantity">
                        @else
                            <a href="#" class="btn">Out of Stock</a>
                        @endif
                    </div>


                    <div class="product-details">
                        <h3>Description</h3>
                        <p>{{$books['books_description']}}</p>
                    </div>


                    <span class="divider"></span>
                    @if($books->books_quantity >0)
                    <div class="product-btn-group">
                        {{--<div class="button buy-now"><i class='bx bxs-zap' ></i> Buy Now</div>--}}
                        <form method="POST">
                            @csrf
                            <input type="hidden" name="books_id" value={{$books['books_id']}}>
                        <button class="button add-cart"><i class='bx bxs-cart' ></i> Add to Cart</button>
                        </form>
                        {{--<div class="button heart"><i class='bx bxs-heart' ></i> Add to Wishlist</div>--}}

                    </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</form>
</div>



<section class="featured" id="featured">

    <h1 class="heading"> <span>Related Products</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">
            @foreach($books->category->books as $book)
                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="/detail/{{$book->books_id}}" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <a href="/detail/{{$book->books_id}}"><img src={{$book->books_image}} alt="a"></a>
                    </div>
                    <div class="content">
                        <h3>{{$book->books_name}}</h3>
                        <div class="price">${{$book->books_price}}</div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>



<!--script-->
<script src="{{ asset('js/detail.js') }}"></script>
</body>
</html>
@endsection

