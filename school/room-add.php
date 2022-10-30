<?php session_start();
include('dbconn.php');
$db = new DatabaseConnection
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOPS - Insert Data into database in php mysql using oops</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="w3-sidebar w3-grey w3-bar-block" style="width:8%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="..\student-view.php" class="w3-bar-item w3-button">STUDENT</a>
        <a href="..\country\country-index.php" class="w3-bar-item w3-button">COUNTRY</a>
        <a href="..\class\class-view.php" class="w3-bar-item w3-button">CLASS</a>
        <a href="..\teacher\teacher-view.php" class="w3-bar-item w3-button">TEACHER</a>
        <a href="..\department\department-view.php" class="w3-bar-item w3-button">DEPARTMENT</a>
        <a href="school-view.php" class="w3-bar-item w3-button">SCHOOL DETAILS</a>


    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['message'])) {
                    echo "<h5>" . $_SESSION['message'] . "</h5>";
                    unset($_SESSION['message']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Room Add</h4>
                    </div>
                    <div class="card-body">

                        <form action="room-create.php" method="POST">


                            <div class="mb-3">
                                <label for="">Enter Room name</label>
                                <input type="text" name="name" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Number of seats</label>
                                <input type="text" name="no_of_seat" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_room" class="btn btn-primary">Save Room</button>
                            </div>
                            <div>
                                <label>Floors</label>
                                <select name="floor_name">
                                    <option value="">Select school</option>
                                    //populate value using php
                                    <?php
                                    $sql = "SELECT b.id, a.name as 'schoolname',b.name as 'floorname' FROM school AS a RIGHT JOIN school AS b ON a.id=b.parent_id where a.parent_id=0;";
                                    $results = $db->conn->query($sql);
                                    //loop
                                    foreach ($results as $floor) {
                                    ?>
                                        <option value="<?php echo $floor["id"]; ?>"><?php echo $floor["floorname"] . ' of ' . $floor["schoolname"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>