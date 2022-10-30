<?php session_start();
include('dbconn.php');
include_once('StudentController.php');
$db = new DatabaseConnection;
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

    <div class="w3-sidebar w3-black w3-bar-block" style="width:8%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="student-view.php" class="w3-bar-item w3-button">STUDENT</a>
        <a href="..\crud_oop\country\country-view.php" class="w3-bar-item w3-button">COUNTRY</a>
        <a href="..\crud_oop\class\class-view.php" class="w3-bar-item w3-button">CLASS</a>
        <a href="..\crud_oop\teacher\teacher-view.php" class="w3-bar-item w3-button">TEACHER</a>
        <a href="..\crud_oop\department\department-view.php" class="w3-bar-item w3-button">DEPARTMENT</a>
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
                        <h4>Student Add</h4>
                        <a href="student-view.php" class="btn btn-success">GO TO STUDENT VIEW</a>
                    </div>

                    <div class="card-body">

                        <form action="create.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Roll Number</label>
                                <input type="number" name="rollnumber" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">address</label>
                                <input type="text" name="address" required class="form-control" />
                            </div>


                            <!-- <div class="mb-3">
                                <label for="">country</label>
                                <input type="text" name="country_name" required class="form-control" />
                            </div> -->

                            <div class="mb-3">
                                <label for="">Phone No</label>
                                <input type="text" name="phone" required class="form-control" />
                            </div>






                            <label>Class</label>
                            <select name="class_name">
                                <option value="">Select Class</option>
                                //populate value using php
                                <?php
                                $sql = "SELECT * FROM `class`";
                                $results = $db->conn->query($sql);
                                //loop
                                foreach ($results as $class) {
                                ?>
                                    <option value="<?php echo $class["id"]; ?>"><?php echo $class["class_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select><br><br>


                            <label>Country</label>
                            <select name="country_name">
                                <option value="">Select Country</option>
                                //populate value using php
                                <?php
                                $sql = "SELECT * FROM `country`";
                                $results = $db->conn->query($sql);
                                //loop
                                foreach ($results as $country) {
                                ?>
                                    <option value="<?php echo $country["id"]; ?>"><?php echo $country["country_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </div>
                    <div class="country">


                        <div class="form-group">
                            <input type="file" name="photo" class="form-control">
                        </div><br>


                        <div class="mb-3">
                            <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
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