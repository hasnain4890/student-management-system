<?php
include('dbconn.php');

include_once('countryController.php');
$db = new DatabaseConnection;

if(isset($_POST['update_country']))
{
    $id = mysqli_real_escape_string($db->conn,$_POST['student_id']);
    $inputData = [
        'country_name' => mysqli_real_escape_string($db->conn,$_POST['country_name']),
       
    ];
    $student = new countryController;
    $result = $student->update($inputData, $id);

    if($result)
    {
        
        $_SESSION['message'] = "country updated Successfully";
        header("Location: country-view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Added";
        header("Location: country-view.php");
        exit(0);
    }
}
