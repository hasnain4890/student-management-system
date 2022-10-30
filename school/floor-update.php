<?php
include('dbconn.php');

include_once('schoolcontroller.php');
$db = new DatabaseConnection;

if (isset($_POST['update_floor'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['floor_id']);
    $inputData = [
        'name' => mysqli_real_escape_string($db->conn, $_POST['name']),
        'no_of_room' => mysqli_real_escape_string($db->conn, $_POST['no_of_room']),

    ];
    $floor = new schoolController;
    $result = $floor->update_floor($inputData, $id);

    if ($result) {

        $_SESSION['message'] = "floor updated Successfully";
        header("Location: school-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "floor Not updated";
        header("Location: school-view.php");
        exit(0);
    }
}
