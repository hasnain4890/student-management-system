<?php
session_start();

include('dbconn.php');
//include('StudentController.php');
include_once('classcontroller.php');
//include_once('E:\crud_oop\dbconn.php');

$db = new DatabaseConnection;

if (isset($_POST['save_class'])) {
    $inputData = [
        'class_name' => mysqli_real_escape_string($db->conn, $_POST['class_name']),
        'no_of_student' => mysqli_real_escape_string($db->conn, $_POST['no_of_student']),

    ];

    $class = new classController;
    $result = $class->create($inputData);

    if ($result) {
        $_SESSION['message'] = "country Added Successfully";
        header("Location: class-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Not Inserted";
        header("Location: class-add.php");
        exit(0);
    }
}
