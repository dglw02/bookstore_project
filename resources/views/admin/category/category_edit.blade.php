@extends('layouts.admin_base')
@section('content')
    <div class="card push-top">
        <div class="card-header">
            Edit & Update Category
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
            <form method="POST" action="{{url('/admin/category/'.$category->category_id.'/edit')}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category_name">Name</label>
                    <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}"/>
                </div>
                <div class="form-group">
                    <label for="category_image">Image</label>
                    <input type="text" class="form-control" name="category_image" value="{{ $category->category_image }}"/> <br>
                    <img src="{{$category->category_image}}" width="150px"/>
                </div>
                <div class="form-group">
                    <label for="category_description">Description</label> <br>
                    <textarea name="category_description" cols="132"> {{ $category->category_description }}</textarea>
                </div>

                <button type="submit" class="btn btn-block btn-danger">Update Category</button>
            </form>
        </div>
    </div>
@endsection
