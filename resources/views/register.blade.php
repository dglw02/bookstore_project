<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Register</title>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
<div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
        <div class="form-container">
            <form method="POST" action="{{url('register')}}">
                @csrf
                <h3>register now</h3>
                <input type="text" name="name" placeholder="enter your name" required class="box">
                <input type="email" name="email" placeholder="enter your email" required class="box">
                <input type="text" name="address" placeholder="enter your address" required class="box">
                <input type="number" name="phone" placeholder="enter your phone" required class="box">
                <select required class="box" name="user_province" >
                    @foreach($province as $provinces)
                        <option value="{{ $provinces->province_id }}">{{ $provinces->province_name }}</option>
                    @endforeach
                </select>
                <input type="password" name="password" placeholder="enter your password" required class="box"
                       autocomplete="current-password">
                <input type="password" name="password_confirmation" placeholder="confirm your password" required class="box"
                       autocomplete="current-password">
                <input type="submit" name="submit" value="register now" class="btn">
                <p>already have an account? <a href="{{url('login')}}">login now</a></p>

            </form>

        </div>
</div>


</body>
</html>

@section('js')
    @parent
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
