<?php

class departmentController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData)
    {
        $dept_name = $inputData['dept_name'];
        $no_of_teacher = $inputData['no_of_teacher'];

        $classQuery = "INSERT INTO department (dept_name,no_of_teacher) VALUES ('$dept_name','$no_of_teacher')";
        $result = $this->conn->query($classQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        $departmentQuery = "SELECT * FROM department";
        $result = $this->conn->query($departmentQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $department_id = mysqli_real_escape_string($this->conn, $id);
        $deptDeleteQuery = "DELETE FROM department WHERE id='$department_id' LIMIT 1";
        $result = $this->conn->query($deptDeleteQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function index_single($getid)
    {
        $departmentQuery = "SELECT * from department WHERE department.id=$getid";
        $result = $this->conn->query($departmentQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $dept_id = mysqli_real_escape_string($this->conn, $id);
        $deptQuery = "SELECT * FROM department WHERE id='$dept_id' LIMIT 1";
        $result = $this->conn->query($deptQuery);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function update($inputData, $id)
    {
        $dept_id = mysqli_real_escape_string($this->conn, $id);
        $dept_name = $inputData['dept_name'];
        $no_of_teacher = $inputData['no_of_teacher'];


        $deptQuery = "UPDATE department SET dept_name='$dept_name',no_of_teacher='$no_of_teacher' WHERE id='$dept_id' LIMIT 1";
        $result = $this->conn->query($deptQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
