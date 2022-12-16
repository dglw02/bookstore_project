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

        input[type=text], input[type=password], textarea {
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
        <label for="name">
            Name
        </label>
        <input type="text" name="name" placeholder="Name" size="15" required/>

        <div>
            <label for="user_areas">
                Area :
            </label>
            <br>
            <select class="form-control" name="category_id">
                @foreach($areas as $area)
                    <option value="{{ $area->areas_id }}">{{ $area->areas_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>
                City :
            </label>
        </div>
        <label for="phone">
            Phone :
        </label>
        <input type="text" name="phone" placeholder="phone no." size="10" required>
        <label for="address">
            Current Address :
        </label>

        <textarea cols="80" rows="5" placeholder="Address" value="address" required>
        </textarea>
        <label for="email">
                Email
        </label>
        <input type="text" placeholder="Enter Email" name="email" required>
        <label for="password">
                Password
        </label>
        <input type="password" placeholder="Enter Password" name="password" required>
    </div>
    <h3 type="submit" class="registerbtn">Register</h3>
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
