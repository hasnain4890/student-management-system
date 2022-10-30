<?php
include('dbcon.php');
include_once('departmentcontroller.php');
$db = new DatabaseConnection;
if (isset($_POST['deletedepartment'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['deletedepartment']);
    $department = new departmentController;
    $result = $department->delete($id);
    if ($result) {
        $_SESSION['message'] = "department deleted Successfully";
        header("Location: department-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "department Not deleted";
        header("Location: department-view.php");
        exit(0);
    }
}
