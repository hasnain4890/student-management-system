<?php

include_once('schoolcontroller.php');
include('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOPS - Fetch Data from database in php mysql using oops</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="w3-sidebar w3-black w3-bar-block" style="width:8%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="student-view.php" class="w3-bar-item w3-button">STUDENT</a>
        <a href="..\crud_oop\country\country-view.php" class="w3-bar-item w3-button">COUNTRY</a>
        <a href="..\crud_oop\class\class-view.php" class="w3-bar-item w3-button">CLASS</a>
        <a href="..\crud_oop\teacher\teacher-view.php" class="w3-bar-item w3-button">TEACHER</a>
        <a href="..\crud_oop\department\department-view.php" class="w3-bar-item w3-button">DEPARTMENT</a>
        <a href="school-view.php" class="w3-bar-item w3-button">SCHOOL DETAILS</a>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>floor View single</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>

                                        <th>floorname</th>
                                        <th>no of rooms</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getid = $_GET['id'];
                                    // echo $getid;
                                    // exit;

                                    $floor = new schoolController;
                                    $result = $floor->floor_view_single($getid);
                                    if ($result) {


                                        foreach ($result as $row) {

                                    ?>
                                            <tr>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['no_of_room'] ?></td>

                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "No Record Found";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <a href="school-add.php" class="btn btn-success">Enter school</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>