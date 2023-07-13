@extends('layouts.admin_base')

@section('content')

    <h1 class="text-center">This Year Revenue</h1>
    <select class="form-select" id="year" name="year">
        <option value="">year</option>
        <option value="1940">1940</option>
        <option value="1941">1941</option>
        <option value="1942">1942</option>
        <option value="1943">1943</option>
        <option value="1944">1944</option>
        <option value="1945">1945</option>
        <option value="1946">1946</option>
        <option value="1947">1947</option>
        <option value="1948">1948</option>
        <option value="1949">1949</option>
        <option value="1950">1950</option>
        <option value="1951">1951</option>
        <option value="1952">1952</option>
        <option value="1953">1953</option>
        <option value="1954">1954</option>
        <option value="1955">1955</option>
        <option value="1956">1956</option>
        <option value="1957">1957</option>
        <option value="1958">1958</option>
        <option value="1959">1959</option>
        <option value="1960">1960</option>
        <option value="1961">1961</option>
        <option value="1962">1962</option>
        <option value="1963">1963</option>
        <option value="1964">1964</option>
        <option value="1965">1965</option>
        <option value="1966">1966</option>
        <option value="1967">1967</option>
        <option value="1968">1968</option>
        <option value="1969">1969</option>
        <option value="1970">1970</option>
        <option value="1971">1971</option>
        <option value="1972">1972</option>
        <option value="1973">1973</option>
        <option value="1974">1974</option>
        <option value="1975">1975</option>
        <option value="1976">1976</option>
        <option value="1977">1977</option>
        <option value="1978">1978</option>
        <option value="1979">1979</option>
        <option value="1980">1980</option>
        <option value="1981">1981</option>
        <option value="1982">1982</option>
        <option value="1983">1983</option>
        <option value="1984">1984</option>
        <option value="1985">1985</option>
        <option value="1986">1986</option>
        <option value="1987">1987</option>
        <option value="1988">1988</option>
        <option value="1989">1989</option>
        <option value="1990">1990</option>
        <option value="1991">1991</option>
        <option value="1992">1992</option>
        <option value="1993">1993</option>
        <option value="1994">1994</option>
        <option value="1995">1995</option>
        <option value="1996">1996</option>
        <option value="1997">1997</option>
        <option value="1998">1998</option>
        <option value="1999">1999</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
        <option value="2002">2002</option>
        <option value="2003">2003</option>
        <option value="2004">2004</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
        <option value="2007">2007</option>
        <option value="2008">2008</option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
        <option value="2028">2028</option>
        <option value="2029">2029</option>
        <option value="2030">2030</option>
        <option value="2031">2031</option>
        <option value="2032">2032</option>
        <option value="2033">2033</option>
        <option value="2034">2034</option>
        <option value="2035">2035</option>
        <option value="2036">2036</option>
        <option value="2037">2037</option>
        <option value="2038">2038</option>
        <option value="2039">2039</option>
        <option value="2040">2040</option>
    </select>
    <select class="form-select" id="month" name="month">
        <option value="">month</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>
    <a href=""
       class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>
    <canvas id="myChart" height="100px"></canvas>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">

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
