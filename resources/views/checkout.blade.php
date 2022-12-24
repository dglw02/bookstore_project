<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>

<div class="heading">
    <h3>checkout</h3>
    <p> <a href="{{url('/')}}">home</a> / checkout </p>
</div>

<section class="display-order">
    @php $total = 0;@endphp
    @foreach($cartitems as $item)

    <p>{{$item->books->books_name}}=<span>${{$item->books->books_price}}/x{{$item->books_quantity}}</span> </p>
        @php $total += $item->books_quantity * $item->books->books_price@endphp
    @endforeach
    @php $total = $total +($total * 0.1)@endphp
    <div class="grand-total"> grand total : <span>${{$total}}</span> </div>

</section>

<section class="checkout">

    <form action="" method="post">
        <h3>place your order</h3>
        <div class="flex">
            <div class="inputBox">
                <span>your name :</span>
                <input type="text" name="name" required placeholder="enter your name">
            </div>
            <div class="inputBox">
                <span>your number :</span>
                <input type="number" name="number" required placeholder="enter your number">
            </div>
            <div class="inputBox">
                <span>your email :</span>
                <input type="email" name="email" required placeholder="enter your email">
            </div>
            <div class="inputBox">
                <span>payment method :</span>
                <select name="method">
                    <option value="cash on delivery">cash on delivery</option>
                    <option value="credit card">credit card</option>
                    <option value="paypal">paypal</option>
                    <option value="paytm">paytm</option>
                </select>
            </div>
            <div class="inputBox">
                <span>address line 01 :</span>
                <input type="number" min="0" name="flat" required placeholder="e.g. flat no.">
            </div>
            <div class="inputBox">
                <span>address line 01 :</span>
                <input type="text" name="street" required placeholder="e.g. street name">
            </div>
            <div class="inputBox">
                <span>city :</span>
                <input type="text" name="city" required placeholder="e.g. mumbai">
            </div>
            <div class="inputBox">
                <span>state :</span>
                <input type="text" name="state" required placeholder="e.g. maharashtra">
            </div>
            <div class="inputBox">
                <span>country :</span>
                <input type="text" name="country" required placeholder="e.g. india">
            </div>
            <div class="inputBox">
                <span>pin code :</span>
                <input type="number" min="0" name="pin_code" required placeholder="e.g. 123456">
            </div>
        </div>
        <input type="submit" value="order now" class="btn" name="order_btn">
    </form>

</section>









<script src="{{ asset('js/register.js') }}"></script>
@yield('scripts')

</body>
</html>
