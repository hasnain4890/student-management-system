<?php
session_start();

include('dbconn.php');
//include('StudentController.php');
include_once('schoolcontroller.php');
//include_once('C:\xampp\htdocs\crud_oop\dbconn.php');

$db = new DatabaseConnection;

if (isset($_POST['save_floor'])) {
    $inputData = [
        'name' => mysqli_real_escape_string($db->conn, $_POST['name']),
        'no_of_room' => mysqli_real_escape_string($db->conn, $_POST['no_of_room']),
        'id' => mysqli_real_escape_string($db->conn, $_POST['school_name']),

    ];

    $floor = new schoolController;
    $result = $floor->create($inputData);

    if ($result) {
        $_SESSION['message'] = "floor Added Successfully";
        header("Location: school-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Not Inserted";
        header("Location: school-view.php");
        exit(0);
    }
}
