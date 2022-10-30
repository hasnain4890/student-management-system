<?php
include('dbconn.php');
include_once('teachercontroller.php');
$db = new DatabaseConnection;
if (isset($_POST['deleteteacher'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['deleteteacher']);
    $teacher = new teacherController;
    $result = $teacher->delete($id);
    if ($result) {
        $_SESSION['message'] = "teacher deleted Successfully";
        header("Location: teacher-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "teacher Not deleted";
        header("Location: teacher-view.php");
        exit(0);
    }
}
