@extends('layouts.admin_base')
@section('content')
    <div class="card push-top">
        <div class="card-header">
            <h1>Invoices</h1>
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
            <form method="POST" action="{{url('admin/invoices/create')}}">
                @csrf
                <div class="form-group">
                    <label for="books_name">Name</label>
                    <input type="text" class="form-control" name="books_name" placeholder="Please enter "/>
                </div>
                <div class="form-group">
                    <label for="books_description">Description</label><br>
                    <textarea name="books_description" id="editor" cols="132"> </textarea>
                </div>
                <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Book Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total price</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @php $total = 0;@endphp --}}
                
                            <tr>
                                <td><select class="form-control" name="category_id">
                    @foreach($books as $book)
                            <option value="{{ $book->book_id }}">{{ $book->books_name }}</option>
                    @endforeach
                    </select></td>
                                <td><input type="number" class="form-control" name="books_quantity" placeholder="Please enter book quantity"/></td>
                                <td><input type="number" class="form-control" name="books_price" placeholder="book price" placeholder="Please enter book price"/></td>
                                {{-- @php $total += books_quantity * books_price @endphp --}}
                                <td>$Total price</td>
                            </tr>
                        
                            {{--  @php $grandtotal = $total +($total * 0.1) + Auth::user()->city->areas->areas_price @endphp --}}
                        <tr>
                            <td colspan="1"></td>
                            <td><strong>Total Quantity</strong></td>
                            <td><strong>Total</strong></td>
                            <td><strong>$Grand Price</strong></td>
                        </tr>
                        
                        </tbody>
                    </table>
                <button type="submit" class="btn btn-block btn-danger">Create Book</button>
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
