<?php
include('dbconn.php');
include_once('schoolcontroller.php');
$db = new schoolController;

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
        <a href="..\student-view.php" class="w3-bar-item w3-button">STUDENT</a>
        <a href="..\country\country-view.php" class="w3-bar-item w3-button">COUNTRY</a>
        <a href="class-view.php" class="w3-bar-item w3-button">CLASS</a>
        <a href="..\teacher\teacher-view.php" class="w3-bar-item w3-button">TEACHER</a>
        <a href="..\department\department-view.php" class="w3-bar-item w3-button">DEPARTMENT</a>
        <a href="..\department\department-view.php" class="w3-bar-item w3-button">SCHOOL DETAILS</a>


    </div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>school View</h4>
                        <a href="school-add.php" class="btn btn-success">Enter school again</a>
                        <a href="floor-add.php" class="btn btn-success">Enter floor again</a>
                        <a href="room-add.php" class="btn btn-success">Enter room again</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>


                                        <th></th>
                                        <th></th>
                                        <th></th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $school = new schoolController;
                                    $result = $school->display();
                                    if ($result) {
                                        foreach ($result as $row) {
                                    ?>
                                            <tr style="font-weight:bold">
                                                <?php

                                                if ($row['name']) { ?>



                                                    <td style="background-color:aqua"> SCHOOL NAME : <?= $row['name'] ?></td>
                                                    <td> NO OF FLOORS : <?= $row['no_of_floor'] ?></td>
                                                    <td>
                                                        <a href="school-view-single.php?id=<?= $row['id']; ?>" class="btn btn-success">view</a>
                                                        <a href="school-edit.php?id=<?= $row['id']; ?>" class="btn btn-success">edit</a>
                                                        <a href="delete.php?schoolid=<?= $row['id']; ?>" onclick="return checkdelete()" class="btn btn-danger">delete</a>
                                                    </td>



                                            </tr>

                                        <?php
                                                    $sql = "SELECT * from school where parent_id=$row[id]";
                                                    $res = $db->conn->query($sql);
                                                }

                                                foreach ($res as $floor) {
                                        ?> <tr> <?php

                                                    if ($floor['name']) { ?>

                                                    <td> FLOOR NAME : <?= $floor['name'] ?></td>
                                                    <td> NO OF ROOM :<?= $floor['no_of_room'] ?></td>
                                                    <td>
                                                        <a href="floor-view-single.php?id=<?= $floor['id']; ?>" class="btn btn-success">view</a>
                                                        <a href="floor-edit.php?id=<?= $floor['id']; ?>" class="btn btn-success">edit</a>
                                                        <a href="delete.php?floorid=<?= $floor['id']; ?>" onclick="return checkdelete()" class="btn btn-danger">delete</a>

                                                    </td>



                                            </tr>
                                            <?php
                                                        if ($res) {
                                                            $sql1 = "SELECT * from school where parent_id=$floor[id]";
                                                            $res1 = $db->conn->query($sql1);
                                                        }
                                                    }

                                                    foreach ($res1 as $room) {
                                            ?> <tr> <?php

                                                        if ($room['name']) { ?>

                                                    <td>ROOM NAME : <?= $room['name'] ?></td>
                                                    <td> NO OF SEATS :<?= $room['no_of_seat'] ?></td>
                                                    <td>
                                                        <a href="room-view-single.php?id=<?= $room['id']; ?>" class="btn btn-success">view</a>
                                                        <a href="room-edit.php?id=<?= $room['id']; ?>" class="btn btn-success">edit</a>
                                                        <a href="delete.php?roomid=<?= $room['id']; ?>" onclick="return checkdelete()" class="btn btn-danger">delete</a>

                                                    </td>



                                        <?php
                                                        }
                                                    }
                                                } ?>
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function checkdelete() {
            return confirm('Rre you Really want to Delete this Record');
        }
    </script>
</body>

</html>