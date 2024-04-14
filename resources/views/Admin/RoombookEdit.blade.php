<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RoombookEdit</title>
</head>
<body>
<div id="app">
<script src="{{ asset('build/assets/RoombookEdit.js') }}"></script>
@php
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Country = $_POST['Country'];
$Phone = $_POST['Phone'];
$RoomType = $_POST['RoomType'];
$Bed = $_POST['Bed'];
$NoofRoom = $_POST['noofroom'];
$Meal = $_POST['Meal'];
$cin = $_POST['cin'];
$cout = $_POST['cout'];
@endphp

@if(isset($_POST['editroombook']))
$type_of_room = 0;
 @if ($RoomType == "Superior Room")
$type_of_room = 3000;
 @elseif ($RoomType == "Deluxe Room")
$type_of_room = 2000;
 @elseif ($RoomType == "Guest House")
$type_of_room = 1500;
 @elseif ($RoomType == "Single Room")
$type_of_room = 1000;
 @endif


@if ($Bed == "Single")
$type_of_bed = $type_of_room * 1 / 100;
 @elseif ($Bed == "Double")
$type_of_bed = $type_of_room * 2 / 100;
 @elseif ($Bed == "Triple")
$type_of_bed = $type_of_room * 3 / 100;
 @elseif ($Bed == "Quad")
$type_of_bed = $type_of_room * 4 / 100;
@endif


@if ($Meal == "Room only")
$type_of_meal = $type_of_bed * 0;
 @elseif ($Meal == "Breakfast")
$type_of_meal = $type_of_bed * 2;
 @elseif ($Meal == "Half Board")
$type_of_meal = $type_of_bed * 3;
 @elseif ($Meal == "Full Board")
$type_of_meal = $type_of_bed * 4;
 @endif

$RoomType = $type_of_room * $NoofRoom * $noofday;
$Meal = $type_of_meal * $noofday;
$Bed = $type_of_bed * $noofday;

$finaltotal = $RoomType + $Meal + $Bed;

@endif
</div>
</body>
</html>
