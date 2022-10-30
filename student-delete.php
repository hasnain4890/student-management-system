<?php
include('dbconn.php');
include_once('StudentController.php');
$db = new DatabaseConnection;
if(isset($_POST['deleteStudent']))
{
    $id = mysqli_real_escape_string($db->conn, $_POST['deleteStudent']);
    $student = new StudentController;
    $result = $student->delete($id);
    if($result)
    {
        $_SESSION['message'] = "Student deleted Successfully";
        header("Location: student-view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not deleted";
        header("Location: student-view.php");
        exit(0);
    }
}
