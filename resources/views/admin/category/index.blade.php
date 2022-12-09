@extends('layouts.admin_base')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Categories</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                    <div>
                        <a href="#" class="btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>
                            Add categories
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{--Flash Message--}}


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class="m-0 font-weight-bold text-primary">Categories list</span>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Books Count</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Books Count</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <tr>
                            <td>


                                <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                                <button type="submit"
                                        onclick="return confirm('Category will delete permanently. All books related with this category will deleted. Are you sure to delete??')"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>

                            </td>
                            <td><a href="#"></a></td>
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
