@extends('layouts.admin_base')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Books</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                    <div>
                        <a href="{{url('admin/products/create')}}" class="btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>
                            Add Book
                        </a>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <span class="mr-2"><a href="{{route('admin.book')}}">All books</a> |</span>

                </div>
            </div>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All books list</h6>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Publisher</th>
                            <th>Author</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>ISBN</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Publisher</th>
                            <th>Author</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>ISBN</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($books as $book)

                        <tr>
                            <td>{{$book->books_name}}
                                <p></p>
                                <img src="{{$book->books_image}}" width="150px"/></td>
                            <td>{{$book->category_name}}</td>
                            <td>{{$book->publisher_name}}</td>
                            <td>{{$book->author_name}}</td>
                            <td>{{$book->books_quantity}}</td>
                            <td>{{$book->books_price}}</td>
                            <td>{{$book->books_ISBN}}</td>
                            <td>
                                <div class="action d-flex flex-row">
                                    <a href="{{url('/admin/products/'.$book->books_id.'/edit')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{url('/admin/products/'.$book->books_id.'/delete')}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Book will move to trash! Are you sure to delete??')"
                                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
