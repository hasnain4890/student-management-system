<?php
session_start();

//include('dbconn.php');
//include('StudentController.php');
include_once('schoolcontroller.php');
include('dbconn.php');

$db = new DatabaseConnection;

if (isset($_POST['save_school'])) {
    $inputData = [
        'name' => mysqli_real_escape_string($db->conn, $_POST['name']),
        'no_of_floor' => mysqli_real_escape_string($db->conn, $_POST['no_of_floor']),
        'parent_id' => mysqli_real_escape_string($db->conn, $_POST['parent_id']),

    ];

    $school = new schoolController;
    $result = $school->create($inputData);

    if ($result) {
        $_SESSION['message'] = "school Added Successfully";
        header("Location: school-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Not Inserted";
        header("Location: school-view.php");
        exit(0);
    }
}
