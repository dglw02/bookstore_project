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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>

<div class="heading">
    <h3>{{$books->category->category_name}}</h3> <br>
    <p><a href="/">home</a>/<a href={{url('/category/'.$books->category->category_name)}}>{{$books->category->category_name}}</a></p>
</div>



<form action="{{url('cart',$books->books_id)}}" method="POST">
    @csrf
<section class="about">

    <div class="flex">

        <div class="image">
            <img src={{$books->books_image}} alt="">
        </div>

        <div class="content">
            <h3>{{$books->books_name}}</h3>

            <p>{{$books->books_description}}</p>
            <section class="shopping-cart">
                <div class="box-container">
                    <div class="box">
                        @if(($books->books_quantity >0))
                        <div class="name">IN STOCK</div>
                            <div class="price">{{number_format($books->books_price)}} VND</div>
                        <form method="POST">
                            @csrf
                            <input type="hidden" name="books_id" value={{$books['books_id']}}>
                            <input type="number" min="1" max="{{$books->books_quantity}}" name="books_quantity" value="1"><br>
                            <button style="height:40px" class="option-btn add-cart"> Add to Cart</button>
                        </form>
                        <div class="sub-total"> ISBN :
                            <span>{{$books->books_ISBN}}</span></div>
                        @else
                            <div class="sub-total"><span>OUT OF STOCK</span></div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
</form>

<section class="reviews">

    <h1 class="title">Author / Publisher</h1>

    <div class="box-container">

        <div class="box">
            <img src="{{$books->author->author_image}}" alt="">
            <p>{{$books->author->author_description}}</p>
            <h3>{{$books->author->author_name}}</h3>
        </div>

        <div class="box">
            <img src="{{$books->publisher->publisher_image}}" alt="">
            <p>Professional who prepares and manages the distribution of books and other materials. Publishers often work with magazines and books, but they can also work with journals and music production. A publisher typically supervises or advises writers and creators and receives direction from creative directors and publishing managers.</p>
            <h3>{{$books->publisher->publisher_name}}</h3>
        </div>

    </div>

</section>



<section class="featured" id="featured">
    <h2 style="color: red" class="heading"> <span>Related Products</span> </h2>
<div class="swiper featured-slider">
<div class="swiper-wrapper">
    @foreach($books->category->books as $book)
        <div class="swiper-slide box">
            <div class="icons">
                <a href="/detail/{{$book->books_id}}" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <a href="/detail/{{$book->books_id}}"><img src={{$book->books_image}} alt="a"></a>
            </div>
            <div class="content">
                <h3>{{$book->books_name}}</h3>
                <div class="price">{{number_format($book->books_price)}} VND</div><br>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>
    @endforeach
</div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

</section>

</body>
</html>
@endsection
