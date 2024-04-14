<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room</title>
</head>
<body>
<div id="app">
@vite('assets/RoomList.js')
    <RoomList />
    <script src="{{ asset('build/assets/RoomList.js') }}"></script>
    @php
    $typeofroom = $_POST['troom'];
    $typeofbed = $_POST['bed'];
    @endphp

    <!--  Room Add -->
    @if (isset($_POST['addroombutton']))

            @if ($typeofroom == "" || $typeofbed == "" )
            echo '<script>swal({
                        title: "Fill the proper details",
                        icon: "error",
                    });
                    </script>';
            @else{
                echo '<script>swal({
                                title: "Room Added Successfully",
                                icon: "success",
                            });
                        </script>';
            }
    @endif

    <!-- Room Delete -->
    @if (isset($_POST['deleteroombutton']))
        echo '<script>swal({
                    title: "Room Deleted",
                    icon: "success",
                });
            </script>';
</div>
</body>
</html>
