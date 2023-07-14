@extends('layouts.admin_base')

@section('content')
<?php
$username = "root";
$password = "";
$database = "bookshop";

try {
    $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die ("ERROR : Could not connect." . $e->getMessage());
}
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .chartMenu {
            width: 100vw;
            height: 40px;
            background: #1A1A1A;
            color: rgba(54, 162, 235, 1);
        }

        .chartMenu p {
            padding: 10px;
            font-size: 20px;
        }

        .chartCard {
            width: 90vw;
            height: calc(100vh - 40px);
            background: rgba(54, 162, 235, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chartBox {
            width: 1500px;
            padding: 20px;
            border-radius: 20px;
            border: solid 3px rgba(54, 162, 235, 1);
            background: white;
        }
    </style>
</head>
<body>
<div class="chartCard">
    <div class="chartBox">
        <input type="date" onchange="startDateFilter(this)" value="2023-07-01" min="2000-01-01" max="2100-12-31">
        <input type="date" onchange="endDateFilter(this)" value="2023-07-30" min="2000-01-01" max="2100-12-31">
        <canvas id="myChart"></canvas>
    </div>
</div>

<?php
try
{
    $sql ="SELECT * FROM bookshop.invoices";
    $sql2 ="SELECT * FROM bookshop.orders";
    $result = $pdo->query($sql);
    $result2 = $pdo->query($sql2);

    if($result->rowCount() > 0)
    {
        while ($row = $result->fetch())
        {
            $dateArray[] = $row["invoices_date"];
            $priceArray[] = $row["invoices_total"];
        }
        unset($result);
    }else
    {
        echo 'No result in database';
    }

    if($result2->rowCount() > 0)
    {
        while ($row2 = $result2->fetch())
        {
            $dateArray2[] = $row2["created_at"];
            $priceArray2[] = $row2["orders_price"];
        }
        unset($result2);
    }else
    {
        echo 'No result in database';
    }
}catch (PDOException $e)
    {
    die("Error");
    }
unset($pdo);

?>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

<script>
    const dateArrayJS = <?php echo json_encode($dateArray); ?>;
    const dateArrayJS2 = <?php echo json_encode($dateArray2); ?>;

    // ERROR
    const dateChartJS = dateArrayJS.map((day,index)=>{
        let dayjs = new Date(day);
        return dayjs.setHours(0,0,0,0)
    });

    const dateChartJS2 = dateArrayJS2.map((day,index)=>{
        let dayjs = new Date(day);
        return dayjs.setHours(0,0,0,0)
    });





    // setup
    const data = {
        labels: dateChartJS,
        datasets: [{
            label: 'Invoices',
            data: <?php echo json_encode($priceArray); ?>,
            backgroundColor: [
                'rgba(255, 26, 104, 0.2)',
            ],
            borderColor: [
                'rgba(255, 26, 104, 1)',
            ],
            borderWidth: 1
        }],


        {{--labels: dateChartJS2,--}}
        {{--datasets: [{--}}
        {{--        label: 'Orders',--}}
        {{--        data: <?php echo json_encode($priceArray2); ?>,--}}
        {{--        backgroundColor: [--}}
        {{--            'rgba(0, 0, 255, 0.2)',--}}
        {{--        ],--}}
        {{--        borderColor: [--}}
        {{--            'rgba(0, 0, 255, 1)',--}}
        {{--        ],--}}
        {{--        borderWidth: 1--}}
        {{--    }--}}
        {{--],--}}
    };


    // config
    const config = {
        type: 'bar',
        data,
        options: {
            scales: {
                x:{
                    min: '2000-01-01',
                    max: '2100-12-31',
                    type:'time',
                    time: {
                        unit: 'day'
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // render init block
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );






    function startDateFilter(date){
        const startDate = new Date(date.value);
        console.log(startDate.setHours(0,0,0,0));
        myChart.config.options.scales.x.min = startDate.setHours(0,0,0,0);
        myChart.update()
    }

    function endDateFilter(date){
        const endDate = new Date(date.value);
        console.log(endDate.setHours(0,0,0,0));
        myChart.config.options.scales.x.max = endDate.setHours(0,0,0,0);
        myChart.update()
    }

    // Instantly assign Chart.js version
    // const chartVersion = document.getElementById('chartVersion');
    // chartVersion.innerText = Chart.version;
</script>

</body>
</html>
@endsection
