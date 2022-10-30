<?php
include('dbconn.php');
include_once('studentController.php');
header("Content-Type:application/json");


echo $_POST['post'];

if ($_POST['post'] == "single") {
    $getid = $_POST['id'];
    $country = new studentController;
    $result = $country->index_single($getid);
    while ($row = mysqli_fetch_assoc($result)) {
        $test[] = $row;
        print json_encode($test);
    }
}

if ($_POST['post'] == "all") {

    $country = new studentController;
    $result = $country->index();
    while ($row = mysqli_fetch_assoc($result)) {


        $test[] = $row;
    }
    print json_encode($test);
}

if ($_POST['post'] == "delete") {

    $id = $_POST['id'];
    $country = new studentController;
    $result = $country->delete($id);
}
if ($_POST['post'] == "insert") {
    //echo "jdsjn";

    $firstname = $_POST['firstname'];;
    $lastname = $_POST['lastname'];
    $rollnumber = $_POST['rollnumber'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $class_name = $_POST['class_id'];
    $country_name = $_POST['country_id'];


    $photo = $_POST['photo'];

    // to get name of file
    $filename = $photo['name'];
    // to get path of file
    $filepath = $photo['tmp_name'];
    $fileerror = $photo['error'];
    // print_r($fileerror);
    // exit;

    // this is to separate file name and extension and store extension in this variable i.e JPG
    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));
    // we want only these type of extension waly pics
    $file_extension_stored = array('png', 'jpg', 'jpeg');
    if (in_array($filecheck, $file_extension_stored)) {
        $destfile = 'upload/' . $filename;
        // to move uploaded file to upload folder i.e destination
        move_uploaded_file($filepath, $destfile);
    }


    $country = new studentController;
    $result = $country->create($firstname, $lastname, $rollnumber, $address, $phone, $country_name, $class_name, $photo);
}

if ($_POST['post'] == "update") {
    //echo "jdsjn";
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
    $result = $student->update($id, $firstname, $lastname, $rollnumber, $address, $phone, $class_name, $country_name, $photo);
}
