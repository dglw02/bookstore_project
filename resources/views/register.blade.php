<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Calibri, Helvetica, sans-serif;
            background-color: pink;
        }

        .container {
            padding: 50px;
            background-color: lightblue;
        }

        input[type=text], input[type=password], input[type=number], select, textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: orange;
            outline: none;
        }

        div {
            padding: 10px 0;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }
    </style>
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
<form method="POST" action="{{url('register')}}">
    @csrf
    <div class="container">
        <center>
            <h1>
                Customer Register Form
            </h1>
        </center>
        <hr>
        <div class="form-group">
        <label for="name">
            Name
        </label>
        <input type="text" name="name" class="form-control" placeholder="Name" size="15"/>
        </div>

        <div class="form-group">
            <label>
                City :
            </label>
            <br>
            <select class="form-control" name="user_city">
                @foreach($cities as $city)
                    <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
        <label for="phone">
            Phone :
        </label>
        <input type="number" class="form-control" name="phone" placeholder="phone no." >
        </div>

        <div class="form-group">
        <label for="address">
            Current Address :
        </label>

        <textarea cols="80" rows="5" placeholder="Address" name="address" required>
        </textarea>
        </div>

        <div class="form-group">
        <label for="email">
                Email
        </label>
        <input type="text" class="form-control" placeholder="Enter Email" name="email" required>
        </div>

        <div class="form-group">
        <label for="password">
                Password
        </label>
        <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
        </div>

    </div>
    <button type="submit" class="registerbtn">Register</button>
</form>
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
