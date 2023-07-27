@extends('layouts.admin_base')
@section('content')
    <br>
    <div class="card push-top">
        <div class="card-header">
            <h1>Edit & Update Book</h1>
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
            <form method="POST" action="{{url('/admin/products/'.$book->books_id.'/edit')}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="books_name">Name</label>
                    <input type="text" class="form-control" name="books_name" value="{{ $book->books_name }}"/>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $cate)
                            <option value="{{ $cate->category_id }}"{{ old('category_id', $book->category_id) == $cate->category_id ? 'selected' : '' }}>{{ $cate->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="publisher_id">Publisher</label>
                    <select class="form-control" name="publisher_id">
                        @foreach($publishers as $pub)
                            <option value="{{ $pub->publisher_id }}"{{ old('publisher_id', $book->publisher_id) == $pub->publisher_id ? 'selected' : '' }}>{{ $pub->publisher_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="books_description">Description</label><br>
                    <textarea name="books_description" id="editor" cols="137"> {{ $book->books_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="books_author">Author</label>
                    <select class="form-control" name="books_author">
                        @foreach($authors as $aut)
                            <option value="{{ $aut->author_id }}"{{ old('author_id', $book->books_author) == $aut->author_id ? 'selected' : '' }}>{{ $aut->author_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="books_quantity">Quantity</label>
                    <input type="number" class="form-control" name="books_quantity" value="{{ $book->books_quantity }}"/>
                </div>
                <div class="form-group">
                    <label for="books_image">Image</label>
                    <input type="text" class="form-control" name="books_image" value="{{ $book->books_image }}"/> <br>
                    <img src="{{$book->books_image}}" width="150px"/>
                </div>
                <div class="form-group">
                    <label for="books_price">Price</label>
                    <input type="number" class="form-control" name="books_price" value="{{ $book->books_price }}"/>
                </div>
                <div class="form-group">
                    <label for="books_ISBN">ISBN</label>
                    <input type="number" class="form-control" name="books_ISBN" value="{{ $book->books_ISBN }}" min="000000000" max="999999999"/>
                </div>
                <button type="submit" class="btn btn-block btn-success">Update Book</button>
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
