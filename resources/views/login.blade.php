<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Login</title>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
<div class="card-body">
    <div class="form-container">

        <form action="{{url('login')}}" method="POST">
            @csrf
            <h3>login now</h3>
            <input type="email" name="email" placeholder="enter your email" required class="box">
            <input type="password" name="password" placeholder="enter your password" required class="box">
            <input type="submit" name="submit" value="login now" class="btn">
            <p>don't have an account? <a href="{{url('register')}}">register now</a></p>
        </form>

    </div>
</div>


</body>
</html>

