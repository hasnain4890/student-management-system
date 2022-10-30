<?php

class StudentController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($firstname, $lastname, $rollnumber, $address, $phone, $country_name, $class_name, $photo)
    {


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








        $studentQuery = "INSERT INTO student_details (firstname,lastname,rollnumber,address,phone,photo) VALUES ('$firstname','$lastname','$rollnumber','$address','$phone','$destfile')";
        $result = $this->conn->query($studentQuery);


        //get last record and then take the only id from that record
        $student_Query_LATEST_RECORD = "SELECT * FROM student_details ORDER BY id DESC LIMIT 1";
        $result1 = $this->conn->query($student_Query_LATEST_RECORD);
        while ($row = mysqli_fetch_array($result1)) {

            $id    = $row['id'];
        }

        $insert_ids = "INSERT INTO studentt (country_id,class_id,student_detail_id) VALUES ('$country_name','$class_name','$id')";
        $result2 = $this->conn->query($insert_ids);


        if ($result2) {
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        //$studentQuery="SELECT * FROM student";
        $studentQuery = "SELECT class.class_name,country.country_name,student_details.id,student_details.firstname,student_details.photo,student_details.lastname,student_details.rollnumber,student_details.address,student_details.phone FROM `studentt` JOIN `student_details` ON student_details.id = studentt.student_detail_id JOIN `class` ON studentt.class_id=class.id JOIN `country` ON studentt.country_id=country.id";
        $result = $this->conn->query($studentQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }



    public function index_single($getid)
    {

        $studentQuery = "SELECT class.class_name,country.country_name,student_details.id,student_details.photo,student_details.firstname,student_details.lastname,student_details.rollnumber,student_details.address,student_details.phone FROM `studentt` JOIN `student_details` ON student_details.id = studentt.student_detail_id join `class` ON class.id=studentt.class_id JOIN `country` ON studentt.country_id=country.id where student_details.id=$getid";
        $result = $this->conn->query($studentQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $student_id = mysqli_real_escape_string($this->conn, $id);
        $studentQuery = "SELECT * FROM student_details WHERE id='$student_id' LIMIT 1";
        $result = $this->conn->query($studentQuery);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    // this function is used to get class_id and country_id and used in country and class dropdown 
    public function getcountryclassid($student_id)
    {
        $id = "SELECT * FROM studentt where student_detail_id=$student_id";
        $result1 = $this->conn->query($id);
        while ($row = mysqli_fetch_array($result1)) {

            $class_id    = $row['class_id'];
            $country_id    = $row['country_id'];
        }

        if ($country_id) {
            return array($country_id, $class_id);
        } else {
            return false;
        }
    }


    public function update($id, $firstname, $lastname, $rollnumber, $address, $phone, $class_name, $country_name, $photo)
    {



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
            $destination_file = 'upload/' . $filename;
            // to move uploaded file to "upload" folder i.e destination
            move_uploaded_file($filepath, $destination_file);
        }



        $studentQuery = "UPDATE student_details SET firstname='$firstname',lastname='$lastname',rollnumber='$rollnumber',address='$address',phone='$phone',photo='$destination_file' WHERE id='$id' LIMIT 1";
        $result = $this->conn->query($studentQuery);

        // QUERY TO UPDATE CLASS AND COUNTRY ID
        $studentQuery1 = "UPDATE studentt SET class_id='$class_name',country_id='$country_name' WHERE student_detail_id='$id'";
        $result2 = $this->conn->query($studentQuery1);

        if ($result2) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $student_id = mysqli_real_escape_string($this->conn, $id);
        $studentDeleteQuery = "DELETE FROM student_details WHERE id='$student_id' LIMIT 1";
        $result = $this->conn->query($studentDeleteQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // public function searchfilter()
    // {
    //     if (isset($_GET['search'])) {
    //         $filtervalues = $_GET['search'];
    //         $searchquery = "SELECT * FROM student_details WHERE CONCAT(firstname,lastname,address) LIKE '%" . $filtervalues . "%'";
    //         $query_run = $this->conn->query($searchquery);
    //         if ($query_run->num_rows > 0) {

    //             $data = $query_run->fetch_array();
    //             return $data;
    //         } else {
    //             return false;
    //         }
    //     }
    // }
}
