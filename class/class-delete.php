<?php
include('dbconn.php');
include_once('classController.php');
$db = new DatabaseConnection;
if (isset($_POST['deleteclass'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['deleteclass']);
    $class = new classController;
    $result = $class->delete($id);
    if ($result) {
        $_SESSION['message'] = "class deleted Successfully";
        header("Location: class-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "class Not deleted";
        header("Location: class-view.php");
        exit(0);
    }
}
