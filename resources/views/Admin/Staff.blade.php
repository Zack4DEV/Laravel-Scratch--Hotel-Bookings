<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
</head>
<body>
<div id="app">

@vite('assets/StaffList.js')
    <StaffList />
    <script src="{{ asset('build/assets/StaffList.js') }}"></script>

    @php
    $staffname = $_POST['staffname'];
    $staffwork = $_POST['staffwork'];
    @endphp

    <!-- Staff Add -->
    @if (isset($_POST['addstaffbutton']))

            @if ($staffname == "" || $staffwork == "" )
            echo '<script>swal({
                        title: "Fill the proper details",
                        icon: "error",
                    });
                    </script>';
            @else{
                echo '<script>swal({
                                title: "Staff Added Successfully",
                                icon: "success",
                            });
                        </script>';
            }
            @endif
    @endif

    <!-- Staff Delete -->
    @if (isset($_POST['deletestaffbutton']))
        echo '<script>swal({
                    title: "Staff Deleted",
                    icon: "success",
                });
            </script>';
    @endif
</div>
</body>
</html>
