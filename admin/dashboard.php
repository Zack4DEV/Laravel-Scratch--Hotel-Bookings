<?php
include '../config.php';
//session_start();
//$id = $_SESSION['id'];
$cout = $_SESSION['cout'];
$finaltotal = $_SESSION['finaltotal'];

$tot = 0;
$chart_data = "{ date:" . $cout . ", profit:" . $finaltotal * 10 / 100 . "}";
$tot += $finaltotal * 10 / 100;

$bookedrooms = $_SESSION['stat']->match("/<td>Confimred<\/td>/")->count();

$maxrooms = $_SESSION['bedding']->count();
$havedrooms = $maxrooms - $bookedrooms;

$maxstaff = $_SESSION['work']->count();

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/dashboard.css">
  <!-- chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- morish bar -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  <title>Admin</title>
</head>

<body>
 <div class="databox">
            <div class="box roombookbox">
                <h2>Total Rooms</h2>
                <h1><?php echo $maxrooms ?></h1>
            </div>
            <div class="box guestbox">
                <h2>Total Staff</h2>
                <h1><?php echo $maxstaff ?></h1>
            </div>
            <div class="box profitbox">
                <h2>Total Profit</h2>
                <h2>
                    <?php echo $ total ?>
                    <span>$</span>
                </h2>
            </div>
        </div>
        <div class="chartbox">
            <div class="bookroomchart">
                <canvas id="bookroomchart"></canvas>
                <h3 style="text-align: center; margin: 10px 0">Booked Rooms</h3>
                <h1><?php echo $bookedrooms ?></h1>
            </div>
            <div class="profitchart">
                <div id="profitchart"></div>
                <h3 style="text-align: center; margin: 10px 0">Profit</h3>
            </div>
        </div>
    </div>
</body>



<script>
  const labels = [
    'Superior Room',
    'Deluxe Room',
    'Guest House',
    'Single Room',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(153, 102, 255, 1)',
      ],
      borderColor: 'black',
      data: [<?php echo $chartroom1row  ?>, <?php echo $chartroom2row  ?>, <?php echo $chartroom3row  ?>, <?php echo $chartroom4row  ?>],
    }]
  };

  const doughnutchart = {
    type: 'doughnut',
    data: data,
    options: {}
  };

  const myChart = new Chart(
    document.getElementById('bookroomchart'),
    doughnutchart);
</script>

<script>
  Morris.Bar({
    element: 'profitchart',
    data: [<?php echo $chart_data;  ?>],
    xkey: 'date',
    ykeys: ['profit'],
    labels: ['Profit'],
    hideHover: 'auto',
    stacked: true,
    barColors: [
      'rgba(153, 102, 255, 1)',
    ]
  });
</script>

</html>
