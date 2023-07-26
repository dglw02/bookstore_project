@extends('layouts.admin_base')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h6 mb-0 text-gray-800"><i class="fas fa-chart-line fa-2x text-gray-300">Dashboard</i></h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Earning
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($total_earning)}} VND</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href = "{{url('/admin/completed-order')}}"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">Completed orders</div></a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$completed_orders->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <!-- Users Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href = "{{url('/admin/user')}}"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Customers</div></a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">This Year Earning
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($earning_year)}} VND</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-red text-uppercase mb-1">This Year Import
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($import_year)}} VND</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-percentage fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!-- Pending Orders Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href = "{{url('/admin/order')}}"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Orders
                                    </div></a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pending_orders->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-basket fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">This Month Earning
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($earning_month)}} VND</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-red text-uppercase mb-1">This Month Import
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($import_month)}} VND</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-percentage fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>





        <!-- Content Row -->

        <div class="row">
            <h6 style="text-align:center" class="text-center"><i class="fas fa-chart-bar fa-2x text-gray-300"> All Time Revenue</i></h6>
            <canvas id="myChart" height="100px"></canvas>
            </div>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href = "{{url('/admin/order')}}"> <h6 class="m-0 font-weight-bold text-primary">Latest orders</h6></a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($orders as $order)

                        <tr>
                            <td>{{$order->orders_id}}</td>
                            <td>{{$order->orders_name}}</td>
                            <td>${{number_format($order->orders_price)}} VND</td>
                            <td>{{$order->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Best selling books</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Sell amount</th>
                        <th>Last purchase date</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Sell amount</th>
                        <th>Last purchase date</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($top as $items)

                        <tr>
                            <td>{{$items->books->books_name}}</td>
                            <td><img src="{{$items->books->books_image}}" width="150px"/></td>
                            <td>{{$items->count}}</td>
                            <td>{{$items->books->updated_at}}</td>
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

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">
        <?php
        $orders = Illuminate\Support\Facades\DB::table('orders')
            ->select(DB::raw("sum(orders_price) as orders_price"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy('orders_id','ASC')
            ->pluck('orders_price', 'month_name');


        $labels = $orders->keys();
        $data = $orders->values();
        ?>

        var labels = {{ Js::from($labels) }};
        var orders = {{ Js::from($data) }};

        <?php
        for ($i = 0; $i < 12; $i++) {
            if ($i < 9) {
                $month = '0' . $i + 1;
            } else {
                $month = $i + 1;
            }
            $orders = Illuminate\Support\Facades\DB::table('orders')
                ->where('orders.orders_status', '<', 4)
                ->where('orders.orders_status', '>', 0)
                ->where('orders.created_at', 'like', '%' . '-' . $month . '-' . '%')
                ->select('orders.*')
                ->get();
            $sales[$i] = 0;
            foreach ($orders as $order) {
                $sales[$i] = $sales[$i] + ($order->orders_price);
            }

            $invoice = Illuminate\Support\Facades\DB::table('invoices')
                ->where('invoices.invoices_date', 'like', '%' . '-' . $month . '-' . '%')
                ->select('invoices.*')
                ->get();
            $sale[$i] = 0;
            foreach ($invoice as $invoices) {
                $sale[$i] = $sale[$i] + ($invoices->invoices_total);
            }
        }
        ?>


        const data = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Total sold',
                backgroundColor: 'rgb(44, 71, 247)',
                borderColor: 'rgb(44, 71, 247)',
                data: [<?php echo $sales[0] ?>, <?php echo $sales[1] ?>, <?php echo $sales[2] ?>, <?php echo $sales[3] ?>, <?php echo $sales[4] ?>, <?php echo $sales[5] ?>,
                    <?php echo $sales[6] ?>, <?php echo $sales[7] ?>, <?php echo $sales[8] ?>, <?php echo $sales[9] ?>, <?php echo $sales[10] ?>, <?php echo $sales[11] ?>
                ]
            },
                {
                    label: 'Total Invoice',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [<?php echo $sale[0] ?>, <?php echo $sale[1] ?>, <?php echo $sale[2] ?>, <?php echo $sale[3] ?>, <?php echo $sale[4] ?>, <?php echo $sale[5] ?>,
                        <?php echo $sale[6] ?>, <?php echo $sale[7] ?>, <?php echo $sale[8] ?>, <?php echo $sale[9] ?>, <?php echo $sale[10] ?>, <?php echo $sale[11] ?>
                    ]
                }
            ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script>
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
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
@endpush
