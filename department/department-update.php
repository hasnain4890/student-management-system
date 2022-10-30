<?php
include('dbconn.php');

include_once('departmentcontroller.php');
$db = new DatabaseConnection;

if (isset($_POST['update_department'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['dept_id']);
    $inputData = [
        'dept_name' => mysqli_real_escape_string($db->conn, $_POST['dept_name']),
        'no_of_teacher' => mysqli_real_escape_string($db->conn, $_POST['no_of_teacher']),

    ];
    $dept = new departmentController;
    $result = $dept->update($inputData, $id);

    if ($result) {

        $_SESSION['message'] = "dept updated Successfully";
        header("Location: department-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "dept Not Added";
        header("Location: department-view.php");
        exit(0);
    }
}
