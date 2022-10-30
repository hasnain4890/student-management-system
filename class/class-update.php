<?php
include('dbconn.php');

include_once('classController.php');
$db = new DatabaseConnection;

if (isset($_POST['update_class'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['class_id']);
    $inputData = [
        'class_name' => mysqli_real_escape_string($db->conn, $_POST['class_name']),
        'no_of_student' => mysqli_real_escape_string($db->conn, $_POST['no_of_student']),

    ];
    $class = new classController;
    $result = $class->update($inputData, $id);

    if ($result) {

        $_SESSION['message'] = "class updated Successfully";
        header("Location: class-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "class Not Added";
        header("Location: class-view.php");
        exit(0);
    }
}
