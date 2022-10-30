<?php
include('dbconn.php');
include_once('countryController.php');

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

    <div class="w3-sidebar w3-grey w3-bar-block" style="width:8%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="..\student-view.php" class="w3-bar-item w3-button">STUDENT</a>
        <a href="country-index.php" class="w3-bar-item w3-button">COUNTRY</a>
        <a href="..\class\class-view.php" class="w3-bar-item w3-button">CLASS</a>
        <a href="..\teacher\teacher-view.php" class="w3-bar-item w3-button">TEACHER</a>
        <a href="..\department\department-view.php" class="w3-bar-item w3-button">DEPARTMENT</a>
        <a href="..\school\school-view.php" class="w3-bar-item w3-button">SCHOOL DETAILS</a>


    </div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>country View</h4>
                        <a href="country-index.php" class="btn btn-success">Enter Country</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>country name</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $country = new countryController;
                                    $result = $country->index();
                                    if ($result) {
                                        foreach ($result as $row) {
                                    ?>
                                            <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['country_name'] ?></td>

                                                <td>
                                                    <a href="country-edit.php?id=<?= $row['id']; ?>" class="btn btn-success">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="country-delete.php" method="POST">
                                                        <button type="submit" name="deleteStudent" value="<?= $row['id'] ?>" class="btn btn-danger" onclick='return checkdelete()'>Delete</button>
                                                    </form>
                                                </td>

                                                <td>
                                                    <a href="country_view_single.php?id=<?= $row['id']; ?>" class="btn btn-success">view</a>

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