<?php
session_start();

//include('dbconn.php');
//include('StudentController.php');
include_once('schoolcontroller.php');
include('dbconn.php');

$db = new DatabaseConnection;

if (isset($_POST['save_room'])) {
    $inputData = [
        'name' => mysqli_real_escape_string($db->conn, $_POST['name']),
        'no_of_seat' => mysqli_real_escape_string($db->conn, $_POST['no_of_seat']),
        'id_room_floor' => mysqli_real_escape_string($db->conn, $_POST['floor_name']),

    ];

    $floor = new schoolController;
    $result = $floor->create($inputData);

    if ($result) {
        $_SESSION['message'] = "room Added Successfully";
        header("Location: school-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Not Inserted";
        header("Location: school-view.php");
        exit(0);
    }
}
