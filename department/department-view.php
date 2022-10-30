<?php
include('dbconn.php');
include_once('departmentcontroller.php');

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
        <a href="..\country\country-index.php" class="w3-bar-item w3-button">COUNTRY</a>
        <a href="..\class\class-view.php" class="w3-bar-item w3-button">CLASS</a>
        <a href="..\teacher\teacher-view.php" class="w3-bar-item w3-button">TEACHER</a>
        <a href="department-view.php" class="w3-bar-item w3-button">DEPARTMENT</a>
        <a href="..\school\school-view.php" class="w3-bar-item w3-button">SCHOOL DETAILS</a>


    </div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>DEPARTMENT View</h4>
                        <a href="department-add.php" class="btn btn-success">Enter dept again</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>dept name</th>
                                        <th>No of teachers</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $department = new departmentController;
                                    $result = $department->index();
                                    if ($result) {
                                        foreach ($result as $row) {
                                    ?>
                                            <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['dept_name'] ?></td>
                                                <td><?= $row['no_of_teacher'] ?></td>

                                                <td>
                                                    <a href="department-edit.php?id=<?= $row['id']; ?>" class="btn btn-success">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="department-delete.php" method="POST">
                                                        <button type="submit" name="deletedepartment" value="<?= $row['id'] ?>" class="btn btn-danger" onclick='return checkdelete()'>Delete</button>
                                                    </form>
                                                </td>

                                                <td>
                                                    <a href="department-view-single.php?id=<?= $row['id']; ?>" class="btn btn-success">view</a>

                                                </td>

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