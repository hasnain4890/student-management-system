<?php
session_start();

include('dbconn.php');
include('StudentController.php');

$db = new DatabaseConnection;

if (isset($_POST['save_student'])) {

    $firstname = $_POST['firstname'];;
    $lastname = $_POST['lastname'];
    $rollnumber = $_POST['rollnumber'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $class_name = $_POST['class_id'];
    $country_name = $_POST['country_id'];
    $photo = $_POST['photo'];




    $student = new StudentController;
    $result = $student->create($firstname, $lastname, $rollnumber, $address, $phone, $country_name, $class_name, $photo);

    if ($result) {

        $_SESSION['message'] = "Student Added Successfully";
        header("Location: student-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Not Inserted";
        header("Location: student-add.php");
        exit(0);
    }
}
