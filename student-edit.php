<?php
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
    <title>PHP OOPS - Edit & Update Data into database in php mysql using oops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid px-4">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        // when id showing in URL is there in database , go inside function 
                        if (isset($_GET['id'])) {
                            $student_id =  $_GET['id'];
                            $student = new StudentController;
                            $result = $student->edit($student_id);

                            //this id to get class_id and country_id to use in update 
                            list($country_id, $class_id) = $student->getcountryclassid($student_id);


                            if ($result) {
                        ?>
                                <form action="student-update.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="student_id" value="<?= $result['id'] ?>">

                                    <div class="mb-3">
                                        <label for="">First Name</label>
                                        <input type="text" name="firstname" value="<?= $result['firstname'] ?>" required class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Last Name</label>
                                        <input type="text" name="lastname" value="<?= $result['lastname'] ?>" required class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Roll Number</label>
                                        <input type="text" name="rollnumber" value="<?= $result['rollnumber'] ?>" required class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Address</label>
                                        <input type="text" name="address" value="<?= $result['address'] ?>" required class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Phone No</label>
                                        <input type="text" name="phone" value="<?= $result['phone'] ?>" required class="form-control" />
                                    </div>







                                    <div class="class">
                                        <label>Class</label>
                                        <select name="class_name">


                                            //populate value using php

                                            <?php
                                            $sql = "SELECT * FROM `class`";
                                            $results = $db->conn->query($sql);
                                            //loop
                                            //  print_r($results);

                                            foreach ($results as $class) {
                                                if ($class['id'] == $class_id) { ?>

                                                    <option value="<?php echo $class['id']; ?> " selected> <?php echo $class['class_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                                <option value="<?php echo $class['id']; ?>"><?php echo $class['class_name']; ?></option>
                                            <?php
                                            }
                                            ?>


                                        </select>
                                    </div>
                                    <div class="country">
                                        <label>Country</label>
                                        <select name="country_name">


                                            //populate value using php

                                            <?php
                                            $sql1 = "SELECT * FROM `country`";
                                            $results = $db->conn->query($sql1);
                                            //loop
                                            //  print_r($results);

                                            foreach ($results as $country) {

                                                if ($country['id'] == $country_id) { ?>
                                                    <option value="<?php echo $country['id']; ?> " selected> <?php echo $country['country_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                                <option value="<?php echo $country['id']; ?>"><?php echo $country['country_name']; ?></option>
                                            <?php
                                            }
                                            ?>


                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="file" name="photo" class="form-control">
                                    </div><br>

                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>

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