@extends('layouts.admin_base')
@section('content')
    <div class="card push-top">
        <div class="card-header">
            Edit & Update Author
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
            <form method="POST" action="{{url('/admin/author/'.$author->author_id.'/edit')}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="author_name">Name</label>
                    <input type="text" class="form-control" name="author_name" value="{{ $author->author_name }}"/>
                </div>
                <div class="form-group">
                    <label for="author_image">Image</label>
                    <input type="text" class="form-control" name="author_image" value="{{ $author->author_image }}"/> <br>
                    <img src="{{$author->author_image}}" width="150px"/>
                </div>
                <div class="form-group">
                    <label for="author_description">Description</label> <br>
                    <textarea name="author_description"  cols="132"> {{ $author->author_description }}</textarea>
                </div>

                <button type="submit" class="btn btn-block btn-danger">Update Author</button>
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
