<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
</head>
<body>
<div class="small-container cart-page">
    <table>
        <tr>
            <th> Product </th>
            <th> Quantity </th>
            <th> Subtotal </th>
        </tr>
        <tr>
            <td>
                <div class="cart-info">
                    <img src="">
                    <div>
                        <p>Shirt</p>
                        <small>Price:55.00</small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>50.00</td>
        </tr>

        <tr>
            <td>
                <div class="cart-info">
                    <img src="">
                    <div>
                        <p>Shirt</p>
                        <small>Price:55.00</small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>50.00</td>
        </tr>

    </table>
    <div class="total-price">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>200</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>24</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>200</td>
            </tr>
        </table>
    </div>
</div>
</body>
<script src="{{ asset('js/cart.js') }}"></script>
@yield('scripts')
</body>
</html>
