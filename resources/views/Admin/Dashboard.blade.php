<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<div id="app">

<script src="{{ asset('build/assets/DashboardAdmin.js') }}">
const labels = ["Superior Room", "Deluxe Room", "Guest House", "Single Room"]
const data = {
    labels: labels,
    datasets: [
        {
            label: "My First dataset",
            backgroundColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(255, 159, 64, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(153, 102, 255, 1)",
            ],
            borderColor: "black",
        },
    ],
}

const doughnutchart = {
    type: "doughnut",
    data: data,
    options: {},
}

const myChart = new Chart(
    document.getElementById("bookroomchart"),
    doughnutchart,
)

Morris.Bar({
    element: "profitchart",
    xkey: "date",
    ykeys: ["profit"],
    labels: ["Profit"],
    hideHover: "auto",
    stacked: true,
    barColors: ["rgba(153, 102, 255, 1)"],
})
</script>
<style>
.chartbox {
  width: 100%;
  display: flex;
  justify-content: space-evenly;
}

.profitchart {
  width: 660px;
  background-color: #ccdff4;
  padding: 10px;
  border-radius: 10px;
}

.bookroomchart {
  width: 330px;
  padding: 10px 80px;
  background-color: #ccdff4;
  border-radius: 10px;
}

</style>
@php
$cout = $_SESSION['cout'];
$finaltotal = $_SESSION['finaltotal'];

$total = 0;
$chart_data = "{ date:" . $cout . ", profit:" . $finaltotal * 10 / 100 . "}";
$total += $finaltotal * 10 / 100;

$bookedrooms = $_SESSION['stat']->match("/<td>Confimred<\/td>/")->count();

$maxrooms = $_SESSION['bedding']->count();
$havedrooms = $maxrooms - $bookedrooms;

$maxstaff = $_SESSION['work']->count();
@endphp
</div>
</body>
</html>
