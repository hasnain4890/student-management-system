<?php

use LDAP\Result;

include('dbconn.php');
include_once('schoolcontroller.php');
$db = new DatabaseConnection;

// echo $schoolid;
// exit;
//if (isset($_POST['delete'])) {
// $id = mysqli_real_escape_string($db->conn, $_POST['delete']);
//$floorid = $_GET['floorid'];
//$schoolid = $_GET['schoolid'];
//$roomid = $_GET['roomid'];


if (isset($_GET['roomid'])) {
    $roomid = $_GET['roomid'];
    $room = new schoolController;
    $Result = $room->roomdelete($roomid);
}
if (isset($_GET['floorid'])) {


    $floorid = $_GET['floorid'];
    $floor = new schoolController;
    $Result1 = $floor->floordelete($floorid);
}
if (isset($_GET['schoolid'])) {

    $schoolid = $_GET['schoolid'];
    $school = new schoolController;
    $Result2 = $school->schooldelete($schoolid);
}

// exit;
//$schoolid = $_GET['schoolid'];

if ($result2) {
    $_SESSION['message'] = "room deleted Successfully";
    header("Location: school-view.php");
    exit(0);
} else {
    $_SESSION['message'] = "room Not deleted";
    header("Location: school-view.php");
    exit(0);
}
//}
