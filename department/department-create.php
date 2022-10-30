<?php
session_start();


include_once('departmentcontroller.php');
include('dbconn.php');

$db = new DatabaseConnection;

if (isset($_POST['save_department'])) {
    $inputData = [
        'dept_name' => mysqli_real_escape_string($db->conn, $_POST['dept_name']),
        'no_of_teacher' => mysqli_real_escape_string($db->conn, $_POST['no_of_teacher']),

    ];

    $department = new departmentController;
    $result = $department->create($inputData);

    if ($result) {
        $_SESSION['message'] = "department Added Successfully";
        header("Location: department-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Not Inserted";
        header("Location: department-add.php");
        exit(0);
    }
}
