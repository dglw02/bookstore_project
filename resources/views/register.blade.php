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
                    <li>{{ $error }}</li>
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
                <select class="form-control" name="user_city">
                    @foreach($cities as $city)
                        <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                    @endforeach
                </select>
                <input type="password" name="password" placeholder="enter your password" required class="box">
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
