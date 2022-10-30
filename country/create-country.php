<?php
session_start();

include('dbconn.php');
//include('StudentController.php');
include('countrycontroller.php');
//include_once ('C:\xampp\htdocs\crud_oop\dbconn.php');

$db = new DatabaseConnection;

if (isset($_POST['save_country'])) {
    $inputData = [
        'country_name' => mysqli_real_escape_string($db->conn, $_POST['country_name']),

    ];

    $student = new countryController;
    $result = $student->create($inputData);

    if ($result) {
        $_SESSION['message'] = "country Added Successfully";
        header("Location: country-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Not Inserted";
        header("Location: country-add.php");
        exit(0);
    }
}
