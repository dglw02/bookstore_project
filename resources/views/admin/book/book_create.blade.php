@extends('layouts.admin_base')
@section('content')
    <div class="card push-top">
        <div class="card-header">
            Add Book
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
            <form method="POST" action="{{url('admin/products/create')}}">
                @csrf
                <div class="form-group">
                    <label for="books_name">Name</label>
                    <input type="text" class="form-control" name="books_name"/>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <input type="number" class="form-control" name="category_id"/>
                </div>
                <div class="form-group">
                    <label for="publisher_id">Publisher</label>
                    <input type="number" class="form-control" name="publisher_id"/>
                </div>
                <div class="form-group">
                    <label for="books_description">Description</label><br>
                    <textarea name="books_description" id="editor"> </textarea>
                </div>
                <div class="form-group">
                    <label for="books_author">Author</label>
                    <input type="number" class="form-control" name="books_author"/>
                </div>
                <div class="form-group">
                    <label for="books_quantity">Quantity</label>
                    <input type="number" class="form-control" name="books_quantity"/>
                </div>
                <div class="form-group">
                    <label for="books_image">Image</label>
                    <input type="text" class="form-control" name="books_image"/>
                </div>
                <div class="form-group">
                    <label for="books_price">Price</label>
                    <input type="number" class="form-control" name="books_price"/>
                </div>
                <div class="form-group">
                    <label for="books_ISBN">ISBN</label>
                    <input type="number" class="form-control" name="books_ISBN"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Book</button>
            </form>
        </div>
    </div>
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
