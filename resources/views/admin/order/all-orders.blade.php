@extends('layouts.admin_base')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pending orders</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6 text-right">
                    <span class="mr-2"><a href="{{url('/admin/order/')}}">Pending orders</a> |</span>
                    <span class="mr-2"><a href="{{url('/admin/approved-order/')}}">Approved orders</a> |</span>
                    <span class="mr-2"><a href="{{url('/admin/completed-order/')}}">Completed orders</a> |</span>
                    <span class="mr-2"><a href="{{url('/admin/canceled-order/')}}">Canceled orders</a></span>
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
                            <th>Name</th>
                            <th>Payment</th>
                            <th>Price</th>
                            <th>Order status</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Payment</th>
                            <th>Price</th>
                            <th>Order status</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->orders_id}}</td>
                            <td>{{$order->orders_name}}</td>
                            <td>{{$order->orders_payment}}</td>
                            <td>{{$order->orders_price}} $</td>
                            <td>
                                @if($order->orders_status == 0)
                                    <p>Pending</p>
                                @elseif($order->orders_status == 1)
                                <p>Approved</p>
                                @elseif($order->orders_status == 2)
                                    <p>Completed</p>
                                @else
                                    <p>Canceled</p>
                                @endif
                            </td>
                            <td><a href="{{url('/admin/order/'.$order->orders_id.'/detail')}}">Order Details</a></td>
                            <td>
                                <div class="action d-flex flex-row">
                                    <form method="POST" action="{{url('/admin/order/'.$order->orders_id.'/delete')}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Order will move to trash! Are you sure to delete??')"
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
    @include('sweetalert::alert')
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
@endpush
