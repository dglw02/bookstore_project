@extends('layouts.admin_base')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All orders</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6 text-right">
                    <span class="mr-2"><a href="#">All orders</a> |</span>
                    <span class="mr-2"><a href="#">Pending orders</a></span>
                </div>
            </div>
        </div>

        {{--Flash Message--}}


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class="m-0 font-weight-bold text-primary">Orders list</span>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>User</th>
                            <th>Payment</th>
                            <th>Total Price</th>
                            <th>Order status</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>User</th>
                            <th>Payment</th>
                            <th>Total Price</th>
                            <th>Order status</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <input type="hidden" name="order_status" value="0">
                                <button type="submit" class="btn btn-success btn-sm">Accepted</button>


                                <input type="hidden" name="order_status" value="1">
                                <button type="submit" class="btn btn-warning btn-sm">Pending</button>


                            </td>
                            <td><a href="#">Order Details</a></td>
                            <td>

                                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i>
                                </button>

                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
