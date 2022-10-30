<?php
include('dbconn.php');
include_once('classController.php');

$db = new DatabaseConnection;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOPS - Edit & Update Data into database in php mysql using oops</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid px-4">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>class Edit</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $class_id = mysqli_real_escape_string($db->conn, $_GET['id']);
                            $class = new classController;
                            $result = $class->edit($class_id);

                            if ($result) {
                        ?>
                                <form action="class-update.php" method="POST">
                                    <input type="hidden" name="class_id" value="<?= $result['id'] ?>">

                                    <div class="mb-3">
                                        <label for="">class name</label>
                                        <input type="text" name="class_name" value="<?= $result['class_name'] ?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">No Of Students</label>
                                        <input type="number" name="no_of_student" value="<?= $result['no_of_student'] ?>" required class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_class" class="btn btn-primary">Update class</button>
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