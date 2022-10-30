<?php
include('dbconn.php');
include_once('teachercontroller.php');
$db = new DatabaseConnection;

if (isset($_POST['update_teacher'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['teacher_id']);
    $inputData = [
        'teacher_name' => mysqli_real_escape_string($db->conn, $_POST['teacher_name']),
        'qualification' => mysqli_real_escape_string($db->conn, $_POST['qualification']),
        'address' => mysqli_real_escape_string($db->conn, $_POST['address']),
        'gender' => mysqli_real_escape_string($db->conn, $_POST['gender']),
        'dept_name' => mysqli_real_escape_string($db->conn, $_POST['dept_name']),
        'subjects' => array_values($_POST['subjects']),

    ];

    $teacher = new teacherController;
    $result = $teacher->update($inputData, $id);
    // print_r($inputData);
    // exit;

    if ($result) {
        $_SESSION['message'] = "teacher updated Successfully";
        header("Location: teacher-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "teacher Not updated";
        header("Location: teacher-view.php");
        exit(0);
    }
}
