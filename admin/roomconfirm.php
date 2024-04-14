<?php
include '../config.php';
require_once 'roombook.php';

$sql = $conn->query("SELECT * FROM roombook");
$sql->execute();
$re = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($re as $row) {
   // $id = $_POST[$_SESSION['id']];
    $Name = $row['Name'];
    $Email = $row['Email'];
    $Country = $row['Country'];
    $Phone = $row['Phone'];
    $RoomType = $row['RoomType'];
    $Bed = $row['Bed'];
    $NoofRoom = $row['NoofRoom'];
    $Meal = $row['Meal'];
    $cin = $row['cin'];
    $cout = $row['cout'];
    $noofday = $row['nodays'];
    $stat = $row['stat'];


if ($stat == "NotConfirm") {

    $st = "Confirm";
    $id = $_GET['id'];

    $rsql = $conn->prepare("UPDATE roombook SET stat = '$st'  WHERE id = '$id'")->execute();
    //$rsqlf = $rsql->fetchAll(PDO::FETCH_ASSOC);

	if ($rsql) {

        $type_of_room = 0;
        if ($RoomType == "Superior Room") {
            $type_of_room = 3000;
        } elseif ($RoomType == "Deluxe Room") {
            $type_of_room = 2000;
        } elseif ($RoomType == "Guest House") {
            $type_of_room = 1500;
        } elseif ($RoomType == "Single Room") {
            $type_of_room = 1000;
        }


        if ($Bed == "Single") {
            $type_of_bed = $type_of_room * 1 / 100;
        } elseif ($Bed == "Double") {
            $type_of_bed = $type_of_room * 2 / 100;
        } elseif ($Bed == "Triple") {
            $type_of_bed = $type_of_room * 3 / 100;
        } elseif ($Bed == "Quad") {
            $type_of_bed = $type_of_room * 4 / 100;
        }

        if ($Meal == "Room only") {
            $type_of_meal = $type_of_bed * 0;
        } elseif ($Meal == "Breakfast") {
            $type_of_meal = $type_of_bed * 2;
        } elseif ($Meal == "Half Board") {
            $type_of_meal = $type_of_bed * 3;
        } elseif ($Meal == "Full Board") {
            $type_of_meal = $type_of_bed * 4;
        }


        $ttot = $type_of_room * $noofday * $NoofRoom;
        $mepr = $type_of_meal * $noofday;
        $btot = $type_of_bed * $noofday;

        $fintot = $ttot + $mepr + $btot;

        $psql = $conn->query("INSERT INTO payment VALUES('$id','$Name', '$Email', '$RoomType', '$Bed', '$NoofRoom', '$cin', '$cout', '$noofday', '$ttot', '$btot', '$Meal', '$mepr', '$fintot')")->execute();
        //$psql->execute();

        header("Location: roombook.php");
    }
}

}


// else
// {
//     echo "<script>alert('Guest Already Confirmed')</script>";
//     header("Location: roombook.php");
// }