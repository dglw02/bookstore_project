@extends('layouts.admin_base')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Books</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                    <div>
                        <a href="#" class="btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>
                            Add Book
                        </a>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <span class="mr-2"><a href="#">All books</a> |</span>

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
                            <th>Action</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Regular Price</th>
                            <th>Discount</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Action</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Regular Price</th>
                            <th>Discount</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <tr>
                            <td>

                                <div class="action d-flex flex-row">
                                    <a href="#" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                    <button type="submit"
                                            onclick="return confirm('Book will move to trash! Are you sure to delete??')"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </div>

                            </td>
                            <td><img src="#" width="60" height="70" alt=""></td>
                            <td><a href="#"></a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
