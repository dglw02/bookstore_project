@extends('layouts.admin_base')
@section('content')
    <div class="card push-top">
        <div class="card-header">
            Add Category
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
            <form method="POST" action="{{url('admin/category/create')}}">
                @csrf
                <div class="form-group">
                    <label for="category_name">Name</label>
                    <input type="text" class="form-control" name="category_name" placeholder="Please enter category name"/>
                </div>
                <div class="form-group">
                    <label for="category_image">Image</label>
                    <input type="text" class="form-control" name="category_image" placeholder="Please enter category image"/>
                </div>
                <div class="form-group">
                    <label for="category_description">Name</label><br>
                    <textarea name="category_description" id="editor" cols="132"> </textarea>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Category</button>
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
