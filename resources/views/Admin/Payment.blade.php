<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
<div id="app">
@vite('assets/PaymentList.js')
    <PaymentList />
    <script src="{{ asset('build/assets/PaymentList.js') }}"></script>

    @php
    $id = $_GET['id'];
    $Name = $_GET['Name'];
    $roomtype = $_GET['roomtype'];
    $bed = $_GET['bed'];
    $cin = $_GET['cin'];
    $cout = $_GET['cout'];
    $noofdays = $_GET['noofdays'];
    $noofroom = $_GET['noofroom'];
    $Meal = $_GET['meal'];
    $roomtotal = $_GET['roomtotal'];
    $bedtotal = $_GET['bedtotal'];
    $mealtotal = $_GET['mealtotal'];
    $finaltotal = $_GET['finaltotal'];
    @endphp

    @if(isset($_POST['invoiceprint']))
    $roomtotal = 0;
    @if ($type_of_room == "Superior Room")
        $roomtotal = 320;
     @elseif ($type_of_room == "Deluxe Room")
        $roomtotal = 220;
     @elseif ($type_of_room == "Guest House")
        $roomtotal = 180;
     @elseif ($type_of_room == "Single Room")
        $roomtotal = 150;
    @endif

    @if ($bed == "Single")
        $bedtotal = $roomtotal * 1 / 100;
     @elseif ($bed == "Double")
        $bedtotal = $roomtotal * 2 / 100;
     @elseif ($bed == "Triple")
        $bedtotal = $roomtotal * 3 / 100;
     @elseif ($bed == "Quad")
        $bedtotal = $roomtotal * 4 / 100;
    @endif


    $mealtotal = 0;
    @if ($meal == "Room only")
        $mealtotal = $bedtotal * 0;
     @elseif ($meal == "Breakfast")
        $mealtotal = $bedtotal * 2;
     @elseif ($meal == "Half Board")
        $mealtotal = $bedtotal * 3;
     @elseif ($meal == "Full Board")
        $mealtotal = $bedtotal * 4;
    @endif


$roomtotal = $roomtype * $NoofRoom * $noofdays;
$mealtotal = $meal * $noofdays;
$bedtotal = $bed * $noofdays;

$finaltotal = $roomtotal + $mealtotal + $bedtotal;
@endif
</div>
</body>
</html>
