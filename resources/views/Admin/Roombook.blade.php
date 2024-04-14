<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roombook</title>
</head>
<body>
<div id="app">

@vite('assets/RoombookList.js')
    <RoombookList />
    <script src="{{ asset('build/assets/RoombookList.js') }}"></script>@php
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Country = $_POST['Country'];
$Phone = $_POST['Phone'];
$Roomtype = $_POST['roomtype'];
$Bed = $_POST['Bed'];
$NoofRoom = $_POST['NoofRoom'];
$Meal = $_POST['Meal'];
$cin = $_POST['cin'];
$cout = $_POST['cout'];
@endphp

@if (isset($_POST['roombookform']))
        @if ($Name == "" || $Email == "" || $Country == "")
            echo '<script>swal({
                        title: "Fill the proper details",
                        icon: "error",
                    });
                    </script>';
        @else
              echo '<script>swal({
                                title: "Reservation successful",
                                icon: "success",
                            });
                        </script>';
        @endif

</div>
</body>
</html>
