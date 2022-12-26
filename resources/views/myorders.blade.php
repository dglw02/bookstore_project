<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

<div class="heading">
    <h3>your orders</h3>
    <p> <a href="home.php">home</a> / orders </p>
</div>

<section class="placed-orders">

    <h1 class="title">placed orders</h1>

    <div class="box-container">


        @if($orders->count() > 0)
        <div class="box">
            @foreach($orders as $items)
            <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
            <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
            <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
            <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
            <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
            <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
            <p> your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
            <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
            <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
            @endforeach
        </div>
        @else
            <p class="empty">no orders placed yet!</p>
        @endif
    </div>

</section>
<script></script>
</body>
</html>
