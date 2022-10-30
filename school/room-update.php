<?php
include('dbconn.php');

include_once('schoolcontroller.php');
$db = new DatabaseConnection;

if (isset($_POST['update_room'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['room_id']);
    $inputData = [
        'name' => mysqli_real_escape_string($db->conn, $_POST['name']),
        'no_of_seat' => mysqli_real_escape_string($db->conn, $_POST['no_of_seat']),

    ];
    $room = new schoolController;
    $result = $room->update_room($inputData, $id);

    if ($result) {

        $_SESSION['message'] = "room updated Successfully";
        header("Location: school-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "room Not updated";
        header("Location: school-view.php");
        exit(0);
    }
}
