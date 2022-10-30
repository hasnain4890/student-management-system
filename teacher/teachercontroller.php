<?php

class teacherController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData)
    {
        $teacher_name = $inputData['teacher_name'];
        $qualification = $inputData['qualification'];
        $address = $inputData['address'];
        $gender = $inputData['gender'];
        $teacher_salary = $inputData['teacher_salary'];
        $dept_name = $inputData['dept_name'];


        $sql = "INSERT INTO teacher (teacher_name,qualification,address,gender,teacher_salary,dept_id)VALUES('$teacher_name','$qualification','$address','$gender','$teacher_salary','$dept_name')";
        $result = $this->conn->query($sql);



        //get last record and then take the only id from that record
        $teacher_Query_LATEST_RECORD = "SELECT * FROM teacher ORDER BY id DESC LIMIT 1";
        $result1 = $this->conn->query($teacher_Query_LATEST_RECORD);
        while ($row = mysqli_fetch_array($result1)) {

            $id    = $row['id'];
        }
        $subjects = array_values($inputData['subjects']);

        //loop through subjects against same teacher_id
        //$items = array();
        foreach ($subjects as $item) {

            $sql1 = "INSERT INTO `subject` (subject_name,teacher_id) VALUES ('$item','$id')";
            $result2 = $this->conn->query($sql1);
            //$items[] = $item;
        }
        //print_r($items);
        //echo implode(", ", $items);
        //exit();
        if ($result2) {
            return true;
        } else {
            return false;
        }
    }

    public function show()
    {
        $teacherQuery = "SELECT teacher.id,department.dept_name,teacher.teacher_name,teacher.qualification,teacher.address,teacher.gender,teacher.teacher_salary FROM teacher JOIN department ON teacher.dept_id=department.id";
        $result = $this->conn->query($teacherQuery);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    // this function is to get all the subjects name against a specific teacher 
    public function subject($id)
    {
        $sql = "SELECT subject_name from `subject` where teacher_id=$id";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $teacher_id = mysqli_real_escape_string($this->conn, $id);
        $teacherDeleteQuery = "DELETE FROM teacher WHERE id='$teacher_id' LIMIT 1";
        $result = $this->conn->query($teacherDeleteQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function index_single($getid)
    {
        $teacherQuery = "SELECT teacher.id,department.dept_name,teacher.teacher_name,teacher.qualification,teacher.address,teacher.gender FROM teacher JOIN department ON teacher.dept_id=department.id where teacher.id=$getid";

        $result = $this->conn->query($teacherQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $teacher_id = mysqli_real_escape_string($this->conn, $id);
        $teacherQuery = "SELECT * FROM teacher WHERE id='$teacher_id' LIMIT 1";
        $result = $this->conn->query($teacherQuery);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    // this function is used to get dept_id 
    // public function getdeptid($teacher_id)
    // {
    //     $id = "SELECT * FROM teacher where dept_id=$teacher_id";
    //     $result1 = $this->conn->query($id);
    //     while ($row = mysqli_fetch_array($result1)) {

    //         $dept_id = $row['dept_id'];
    //     }

    //     if ($dept_id) {
    //         return $dept_id;
    //     } else {
    //         return false;
    //     }
    // }

    public function update($inputData, $id)
    {
        $teacher_id = mysqli_real_escape_string($this->conn, $id);
        $teacher_name = $inputData['teacher_name'];
        $qualification = $inputData['qualification'];
        $address = $inputData['address'];
        $gender = $inputData['gender'];
        $dept_id = $inputData['dept_name'];
        $subjects = $inputData['subjects'];

        $teacherQuery = "UPDATE teacher SET teacher_name='$teacher_name',qualification='$qualification',address='$address',gender='$gender',dept_id='$dept_id' WHERE id='$teacher_id' LIMIT 1";
        $result = $this->conn->query($teacherQuery);

        foreach ($subjects as $value) {

            $subjectquery = "UPDATE `subject` SET  subject_name='$value' where id=$teacher_id";
            $result1 = $this->conn->query($subjectquery);
        }


        if ($result1) {
            return true;
        } else {
            return false;
        }
    }

    public function first_high_salary()
    {
        //$first_high_salary_query = "SELECT * max(teacher_salary) from teacher";
        $first_high_salary_query = "SELECT * from teacher order by  teacher_salary desc limit 0,1";

        $result = $this->conn->query($first_high_salary_query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function second_high_salary()
    {
        $second_high_salary_query = "SELECT * from teacher order by  teacher_salary desc limit 1,1";
        $result = $this->conn->query($second_high_salary_query);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function third_high_salary()
    {
        //$first_high_salary_query = "SELECT * max(teacher_salary) from teacher";
        $high_salary_query = "SELECT * from teacher order by  teacher_salary desc limit 2,1";

        $result = $this->conn->query($high_salary_query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
