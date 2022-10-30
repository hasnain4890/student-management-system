<?php
include('dbconn.php');
include_once('StudentController.php');
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


    <div>

        <div class="w3-sidebar w3-black w3-bar-block" style="width:8%">
            <h3 class="w3-bar-item">Menu</h3>
            <a href="student-view.php" class="w3-bar-item w3-button">STUDENT</a>
            <a href="..\crud_oop\country\country-view.php" class="w3-bar-item w3-button">COUNTRY</a>
            <a href="..\crud_oop\class\class-view.php" class="w3-bar-item w3-button">CLASS</a>
            <a href="..\crud_oop\teacher\teacher-view.php" class="w3-bar-item w3-button">TEACHER</a>
            <a href="..\crud_oop\department\department-view.php" class="w3-bar-item w3-button">DEPARTMENT</a>
            <a href="..\crud_oop\school\school-view.php" class="w3-bar-item w3-button">SCHOOL DETAILS</a>
        </div>


        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Student View</h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Roll number</th>
                                            <th>Address</th>

                                            <th>Phone</th>
                                            <th>country</th>

                                            <th>image</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = mysqli_connect("localhost", "hasnain", "4890", "crud-oop");
                                        if (isset($_GET['search'])) {

                                            $filtervalues = $_GET['search'];
                                            $searchquery = "SELECT * FROM student_details join country ON student_details.id=country.id WHERE CONCAT(firstname,lastname,address) LIKE '%" . $filtervalues . "%'";
                                            $query_run = mysqli_query($conn, $searchquery);
                                            if ($query_run->num_rows > 0) {
                                                foreach ($query_run as $row) {

                                        ?>
                                                    <tr>
                                                        <td><?= $row['id'] ?></td>
                                                        <td><?= $row['firstname'] ?></td>
                                                        <td><?= $row['lastname'] ?></td>
                                                        <td><?= $row['rollnumber'] ?></td>
                                                        <td><?= $row['address'] ?></td>
                                                        <td><?= $row['phone'] ?></td>
                                                        <td><?= $row['country_name'] ?></td>


                                                        <td> <img src="<?= $row['photo']; ?>" width="100px" height="80px"><img> </td>


                                            <?php
                                                }
                                            }






                                            //$result = $students->searchfilter();



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
            // this function is for delete confirmation box message
            function checkdelete() {
                return confirm('Do you Really want to Delete student Record');
            }
        </script>
</body>

</html>