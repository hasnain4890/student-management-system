<?php
include('dbconn.php');

include_once('schoolcontroller.php');
$db = new DatabaseConnection;

if (isset($_POST['update_school'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['school_id']);
    $inputData = [
        'name' => mysqli_real_escape_string($db->conn, $_POST['name']),
        'no_of_floor' => mysqli_real_escape_string($db->conn, $_POST['no_of_floor']),

    ];
    $school = new schoolController;
    $result = $school->update_school($inputData, $id);

    if ($result) {

        $_SESSION['message'] = "school updated Successfully";
        header("Location: school-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "school Not updated";
        header("Location: school-view.php");
        exit(0);
    }
}
