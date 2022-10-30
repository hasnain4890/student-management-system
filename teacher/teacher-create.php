<?php
session_start();


include_once('teachercontroller.php');
include('dbconn.php');

$db = new DatabaseConnection;

if (isset($_POST['save_teacher'])) {

    $inputData = [
        'teacher_name' => $_POST['teacher_name'],
        'qualification' => $_POST['qualification'],
        'address' => $_POST['address'],
        'gender' => $_POST['gender'],
        'teacher_salary' => $_POST['teacher_salary'],
        'dept_name' => $_POST['dept_name'],

        'subjects' => array_values($_POST['subjects']),

    ];
    // print_r($inputData);
    // exit();

    $class = new teacherController;
    $result = $class->create($inputData);

    if ($result) {
        $_SESSION['message'] = "country Added Successfully";
        header("Location: teacher-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Not Inserted";
        header("Location: teacher-view.php");
        exit(0);
    }
}
