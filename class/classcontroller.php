<?php

class classController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData)
    {
        $class_name = $inputData['class_name'];
        $no_of_student = $inputData['no_of_student'];

        $classQuery = "INSERT INTO class (class_name,no_of_student) VALUES ('$class_name','$no_of_student')";
        $result = $this->conn->query($classQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        $classQuery = "SELECT * FROM class";
        $result = $this->conn->query($classQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function index_single($getid)
    {
        $classQuery = "SELECT * from class WHERE class.id=$getid";
        $result = $this->conn->query($classQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $class_id = mysqli_real_escape_string($this->conn, $id);
        $classQuery = "SELECT * FROM class WHERE id='$class_id' LIMIT 1";
        $result = $this->conn->query($classQuery);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function update($inputData, $id)
    {
        $class_id = mysqli_real_escape_string($this->conn, $id);
        $class_name = $inputData['class_name'];
        $no_of_student = $inputData['no_of_student'];


        $countryQuery = "UPDATE class SET class_name='$class_name',no_of_student='$no_of_student' WHERE id='$class_id' LIMIT 1";
        $result = $this->conn->query($countryQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $class_id = mysqli_real_escape_string($this->conn, $id);
        $classDeleteQuery = "DELETE FROM class WHERE id='$class_id' LIMIT 1";
        $result = $this->conn->query($classDeleteQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
