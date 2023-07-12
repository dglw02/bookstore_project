@extends('layouts.admin_base')

@section('content')
<?php
$invoices = Illuminate\Support\Facades\DB::table('invoices')
    ->select('invoices.*')
    ->get();
?>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Invoices</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                </div>
            </div>
        </div>

        {{--Flash Message--}}


        <!-- DataTales Example -->
        <div class="col-6">
                    <div>
                        <a href="{{url('/admin/invoices/create')}}" class="btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>
                            Add Invoices
                        </a>
                    </div>
                </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class="m-0 font-weight-bold text-primary">Invoices list</span>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>

                            <th>Name</th>

                            <th>Total Price</th>

                            <th>Date</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>

                            <th>Name</th>

                            <th>Total Price</th>

                            <th>Date</th>
                            <th>Details</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($invoices as $invoice)
                        <tr>
                            <td>{{$invoice->invoices_id}}</td>
                            <td>{{$invoice->invoices_name}}</td>
                            <td>{{''.number_format($invoice->invoices_total)}} VND</td>

                            <td>{{$invoice->invoices_date}}</td>
                            <td><form method="POST"
                                      action="{{url('/admin/invoice/'.$invoice->invoices_id.'/delete')}}">
                                    @csrf
                                    @method('delete')
                                <a href="{{url('/admin/invoice/'.$invoice->invoices_id.'/edit')}}"
                                           class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                <a href="{{url('/admin/invoice/'.$invoice->invoices_id.'/detail')}}"
                                   class="btn-primary btn btn-sm mr-2"><i class="fas fa-receipt"></i></a>

                                    <button type="submit"
                                            onclick="return confirm('Invoice will move to trash! Are you sure to delete??')"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
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
