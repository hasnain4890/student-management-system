<?php
include('dbconn.php');
include_once('schoolcontroller.php');

$db = new DatabaseConnection;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOPS - Edit & Update Data into database in php mysql using oops</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid px-4">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Room Edit</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $room_id = mysqli_real_escape_string($db->conn, $_GET['id']);
                            $room = new schoolController;
                            $result = $room->edit_room($room_id);

                            if ($result) {
                        ?>
                                <form action="room-update.php" method="POST">
                                    <input type="hidden" name="room_id" value="<?= $result['id'] ?>">

                                    <div class="mb-3">
                                        <label for="">room name</label>
                                        <input type="text" name="name" value="<?= $result['name'] ?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">No Of seats</label>
                                        <input type="number" name="no_of_seat" value="<?= $result['no_of_seat'] ?>" required class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_room" class="btn btn-primary">Update room</button>
                                    </div>
                                </form>

                        <?php
                            } else {
                                echo "<h4>No Record Found</h4>";
                            }
                        } else {
                            echo "<h4>Something Went Wront</h4>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>