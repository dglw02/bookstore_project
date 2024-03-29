@extends('layouts.admin_base')
@section('content')
    <div class="card push-top">
        <div class="card-header">
            <h1>Edit & Update Admin</h1>
        </div>
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
            <form method="POST" action="{{url('/admin/admin/'.$user->id.'/edit')}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
                </div>
                <div class="form-group">
                    <label for="address">Address</label><br>
                    <textarea name="address" id="editor" cols="139"> {{ $user->address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="user_city">City</label>
                    <select class="form-control" name="user_province">
                        @foreach($province as $provinces)
                            <option value="{{ $provinces->province_id }}">{{ $provinces->province_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-success">Update Admin</button>
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection

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
