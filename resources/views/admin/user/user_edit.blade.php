@extends('layouts.admin_base')
@section('content')
    <div class="card push-top">
        <div class="card-header">
            Edit & Update User
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
            <form method="POST" action="{{url('/admin/user/'.$user->id.'/edit')}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
                </div>
                <div class="form-group">
                    <label for="address">Address</label><br>
                    <textarea name="address" id="editor" cols="132"> {{ $user->address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="user_city">City</label>
                    <select class="form-control" name="user_city">
                        @foreach($cities as $city)
                            <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Update User</button>
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
