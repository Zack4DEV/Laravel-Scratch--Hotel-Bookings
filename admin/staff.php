<?php
//session_start();
include '../config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/room.css">
    <style>
        .roombox {
            background-color: #d1d7ff;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="addroomsection">
        <form action="" method="POST">
            <label for="troom">Name :</label>
            <input type="text" name="staffname" class="form-control">

            <label for="bed">Work :</label>
            <select name="staffwork" class="form-control">
                <option value selected></option>
                <option value="Manager">Manager</option>
                <option value="Cook">Cook</option>
                <option value="Helper">Helper</option>
                <option value="cleaner">Cleaner</option>
                <option value="weighter">weighter</option>
            </select>

            <button type="submit" class="btn btn-success" name="addstaff">Add Staff</button>
        </form>

        <?php
        if (isset($_POST['addstaff'])) {
            $staffname = $_POST['staffname'];
            $staffwork = $_POST['staffwork'];

            //$sql = $conn->query("INSERT INTO staff VALUES ('','$staffname', '$staffwork')");
            //$sql->execute();
            $sresult = $conn->prepare("INSERT INTO staff VALUES ('','$staffname', '$staffwork')")->execute();
            if ($sresult > 0){
                header("Location:staff.php");
           }
        }
        ?>
    </div>

    <div class="room">
        <?php
        $sql = $conn->query("SELECT * FROM staff");
        $sql->execute();
        $st = $sql->fetchAll(PDO::FETCH_ASSOC);
	foreach ($st as $row) {
	    $name = $row['name'];
	    $id = $row['id'];
            echo "<div class='roombox'>
						<div class='text-center no-boder'>
                            <i class='fa fa-users fa-5x'></i>
							<h3>" . $name . "</h3>
                            <div class='mb-1'>" . $row['work'] . "</div>
                            <a href='staffdelete.php?id=" . $id . "'><button class='btn btn-danger'>Delete</button></a>
						</div>
                    </div>";
        }
        ?>
    </div>

</body>

</html>