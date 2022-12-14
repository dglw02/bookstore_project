@extends('layouts.admin_base')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Categories</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                    <div>
                        <a href="{{url('admin/category/create')}}" class="btn-primary btn-sm">
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
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($categories as $cate)
                        <tr>
                            <td>{{$cate->category_name}}</td>
                            <td> <img src="{{$cate->category_image}}" width="150px"/></td>
                            <td>
                                <div class="action d-flex flex-row">
                                <a href="{{url('/admin/category/'.$cate->category_id.'/edit')}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                <form method="POST" action="{{url('/admin/category/'.$cate->category_id.'/delete')}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Category will move to trash! Are you sure to delete??')"
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
