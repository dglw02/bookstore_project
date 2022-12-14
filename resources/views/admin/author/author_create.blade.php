@extends('layouts.admin_base')
@section('content')
    <div class="card push-top">
        <div class="card-header">
            Add Author
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
            <form method="POST" action="{{url('admin/author/create')}}">
                @csrf
                <div class="form-group">
                    <label for="author_name">Name</label>
                    <input type="text" class="form-control" name="author_name"/>
                </div>
                <div class="form-group">
                    <label for="author_image">Image</label>
                    <input type="text" class="form-control" name="author_image"/>
                </div>
                <div class="form-group">
                    <label for="author_description">Description</label><br>
                    <textarea name="author_description" id="editor"> </textarea>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Author</button>
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
