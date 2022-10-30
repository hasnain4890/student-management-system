<?php session_start(); ?>
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
        <a href="..\country\country-view.php" class="w3-bar-item w3-button">COUNTRY</a>
        <a href="..\class\class-view.php" class="w3-bar-item w3-button">CLASS</a>
        <a href="..\teacher\teacher-view.php" class="w3-bar-item w3-button">TEACHER</a>
        <a href="..\department\department-view.php" class="w3-bar-item w3-button">DEPARTMENT</a>
        <a href="..\school\school-view.php" class="w3-bar-item w3-button">SCHOOL DETAILS</a>


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
                        <h4>department Add</h4>
                    </div>
                    <div class="card-body">

                        <form action="department-create.php" method="POST">
                            <div class="mb-3">
                                <label for="">Enter dept name</label>
                                <input type="text" name="dept_name" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Number of teachers</label>
                                <input type="text" name="no_of_teacher" required class="form-control" />
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_department" class="btn btn-primary">Save department</button>
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