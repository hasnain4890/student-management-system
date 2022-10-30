<?php session_start();
include('dbconn.php');
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

    <div class="w3-sidebar w3-grey w3-bar-block" style="width:7.3%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="..\student-view.php" class="w3-bar-item w3-button">STUDENT</a>
        <a href="..\country\country-view.php" class="w3-bar-item w3-button">COUNTRY</a>
        <a href="..\class\class-view.php" class="w3-bar-item w3-button">CLASS</a>
        <a href="..\teacher\teacher-VIEW.php" class="w3-bar-item w3-button">TEACHER</a>
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
                        <h4>Student Add</h4>
                        <a href="teacher-view.php" class="btn btn-success">GO TO TEACHER VIEW</a>
                    </div>
                    <div class="card-body">

                        <form action="teacher-create.php" method="POST">
                            <div class="mb-3">
                                <label for="">TEACHER NAME</label>
                                <input type="text" name="teacher_name" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">QUALIFICATION</label>
                                <input type="text" name="qualification" required class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label for="">address</label>
                                <input type="text" name="address" required class="form-control" />
                            </div>

                            <div class="form-check">
                                <label for="">GENDER</label><br>

                                <input type="radio" name="gender" value="Male" checked /> MALE
                                <input type="radio" name="gender" value="Female" /> FEMALE <br>


                                </label><br>
                            </div>

                            <div class="mb-3">
                                <label for="">TEACHER salary</label>
                                <input type="number" name="teacher_salary" required class="form-control" />
                            </div>

                    </div>

                    <label>SUBJECTS</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="subjects[]" value="maths" id="flexCheckDefault" checked>
                        <label class="form-check-label">
                            MATHS
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="subjects[]" value="english" id="flexCheckChecked">
                        <label class="form-check-label">
                            ENGLISH
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="subjects[]" value="urdu" id="flexCheckDefault">
                        <label class="form-check-label">
                            URDU
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="subjects[]" value="science" id="flexCheckChecked">
                        <label class="form-check-label">
                            SCIENCE
                        </label>
                    </div>


                    <!-- <label>SUBJECTS</label>
                    <div class="form-group mb-3">
                        <input type="checkbox" name="subjects[]" value="maths"> maths <br>
                        <input type="checkbox" name="subjects[]" value="english"> english <br>
                        <input type="checkbox" name="subjects[]" value="urdu"> urdu <br>
                        <input type="checkbox" name="subjects[]" value="php"> php <br>
                        <input type="checkbox" name="subjects[]" value="Karbon"> Karbon <br>
                    </div> -->

                    <div class="mb-3">
                        <button type="submit" name="save_teacher" class="btn btn-primary">Save teacher</button>
                    </div>


                    <label>DEPARTMENT</label>
                    <select name="dept_name">
                        <option value="">Select department</option>
                        //populate value using php
                        <?php
                        $sql = "SELECT * FROM `department`";
                        $results = $db->conn->query($sql);
                        //loop

                        foreach ($results as $department) {
                        ?>
                            <option value="<?php echo $department["id"]; ?>"><?php echo $department["dept_name"]; ?></option>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>