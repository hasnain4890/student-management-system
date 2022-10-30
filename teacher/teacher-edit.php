<?php
include('dbconn.php');
include_once('teachercontroller.php');
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
                        <h4>teacher Edit</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        // when id showing in URL is there in database , go inside function 
                        if (isset($_GET['id'])) {
                            $teacher_id =  $_GET['id'];
                            $teacher = new teacherController;
                            $result = $teacher->edit($teacher_id);

                            //this id to get class_id and country_id to use in update 
                            //list($dept_id) = $teacher->getdeptid($teacher_id);


                            if ($result) {
                        ?>
                                <form action="teacher-update.php" method="POST">
                                    <input type="hidden" name="teacher_id" value="<?= $result['id'] ?>">

                                    <div class="mb-3">
                                        <label for="">teacher Name</label>
                                        <input type="text" name="teacher_name" value="<?= $result['teacher_name'] ?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Qualification</label>
                                        <input type="text" name="qualification" value="<?= $result['qualification'] ?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Address</label>
                                        <input type="text" name="address" value="<?= $result['address'] ?>" required class="form-control" />
                                    </div>

                                    <div class="form-check">
                                        <label for="">GENDER</label>

                                        <input type="radio" name="gender" value="Male" checked /> MALE
                                        <input type="radio" name="gender" value="Female" checked /> FEMALE


                                        </label>
                                    </div>

                                    <label>SUBJECTS</label>
                                    <div class="form-group mb-3">
                                        <input type="checkbox" name="subjects[]" value="maths"> maths <br>
                                        <input type="checkbox" name="subjects[]" value="english"> english <br>
                                        <input type="checkbox" name="subjects[]" value="urdu"> urdu <br>
                                        <input type="checkbox" name="subjects[]" value="php"> php <br>
                                        <input type="checkbox" name="subjects[]" value="Karbon"> Karbon <br>
                                    </div>



                                    <div class="department">
                                        <label>department</label>
                                        <select name="dept_name">


                                            //populate value using php

                                            <?php
                                            $sql = "SELECT * FROM `department`";
                                            $results = $db->conn->query($sql);
                                            //loop
                                            //  print_r($results);

                                            foreach ($results as $dept) {

                                                if ($dept['id'] == $result['dept_id']) { ?>

                                                    <option value="<?php echo $dept['id']; ?> " selected> <?php echo $dept['dept_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                                <option value="<?php echo $dept['id']; ?>"><?php echo $dept['dept_name']; ?></option>
                                            <?php
                                            }
                                            ?>


                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_teacher" class="btn btn-primary">Update Student</button>
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