<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
</head>
<body>
<h1>Shopping Cart</h1>

<div class="shopping-cart">

    <div class="column-labels">
        <label class="product-image">Image</label>
        <label class="product-details">Product</label>
        <label class="product-price">Price</label>
        <label class="product-quantity">Quantity</label>
        <label class="product-removal">Remove</label>
        <label class="product-line-price">Total</label>
    </div>
    @foreach($cartitems as $item)
    <div class="product">
        <div class="product-image">
            <img src={{$item->books->books_image}}>
        </div>
        <div class="product-details">
            <div class="product-title">{{$item->books->books_name}}</div>
            <p class="product-description">{{$item->books->books_description}}</p>
        </div>
        <div class="product-price">{{$item->books->books_price}}</div>
        <div class="product-quantity">
            <input type="hidden" class="books_id" value="{{$item->books_id}}">
            <input type="number" value="{{$item->books_quantity}}" min="1">
        </div>
        <form method="POST" action="{{url('/cart/'.$item->id.'/delete')}}">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')"
                    class="btn btn-sm btn-danger">Remove</button>
        </form>
        <div class="product-removal">
            <button class="remove-product">Remove</button>
        </div>
        <div class="product-line-price">25.98</div>
    </div>
    @endforeach

    <div class="totals">
        <div class="totals-item">
            <label>Subtotal</label>
            <div class="totals-value" id="cart-subtotal">71.97</div>
        </div>
        <div class="totals-item">
            <label>Tax (5%)</label>
            <div class="totals-value" id="cart-tax">3.60</div>
        </div>
        <div class="totals-item">
            <label>Shipping</label>
            <div class="totals-value" id="cart-shipping">15.00</div>
        </div>
        <div class="totals-item totals-item-total">
            <label>Grand Total</label>
            <div class="totals-value" id="cart-total">90.57</div>
        </div>
    </div>

    <button class="checkout">Checkout</button>
    <button class="checkout">Back to Shopping</button>

</div>
<script
    src="https://code.jquery.com/jquery-3.6.2.min.js"
    integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="
    crossorigin="anonymous"></script>
<script src="{{ asset('js/cart.js') }}"></script>
@yield('scripts')
</body>
</html>
