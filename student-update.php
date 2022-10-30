<?php
include('dbconn.php');
include_once('StudentController.php');
$db = new DatabaseConnection;
if (isset($_POST['update_student'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['student_id']);
    $id = $_POST['id'];
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
        $_SESSION['message'] = "Student updated Successfully";
        header("Location: student-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not updated";
        header("Location: student-view.php");
        exit(0);
    }
}
