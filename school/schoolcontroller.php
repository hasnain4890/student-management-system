<?php

class schoolController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData)
    {
        if (isset($_POST['save_school'])) {

            $name = $inputData['name'];
            $no_of_floor = $inputData['no_of_floor'];

            $schoolQuery = "INSERT INTO school (name,no_of_floor,parent_id) VALUES ('$name','$no_of_floor','0')";
            $result = $this->conn->query($schoolQuery);
        } elseif (isset($_POST['save_floor'])) {

            // $parent_id = $inputData['parent_id'];
            // parent id for floor will be the primary id of school
            $id = $inputData['id'];
            $name = $inputData['name'];
            $no_of_room = $inputData['no_of_room'];
            $floorQuery = "INSERT INTO school (name,no_of_room,parent_id) VALUES ('$name','$no_of_room','$id')";
            $result2 = $this->conn->query($floorQuery);
        } else {
            $name = $inputData['name'];
            $no_of_seat = $inputData['no_of_seat'];
            $id_room_floor = $inputData['id_room_floor'];
            //echo $id_room_floor;

            $floor_room_query = "INSERT INTO school (name,no_of_seat,parent_id) VALUES ('$name','$no_of_seat','$id_room_floor')";
            $result3 = $this->conn->query($floor_room_query);
        }

        if ($result3) {
            return true;
        } else {
            return false;
        }
    }

    public function display()
    {
        $sql = "SELECT * FROM school where parent_id=0";
        $result1 = $this->conn->query($sql);
        // $schoolQuery = "SELECT a.id as 'id' ,a.no_of_floor as 'floornumber',a.no_of_room as roomnumber,a.no_of_seat as seatnumber, a.name as 'schoolname', b.name as 'floorname',c.name AS 'roomname' FROM school AS a LEFT JOIN school AS b ON a.id=b.parent_id LEFT JOIN school AS c ON c.parent_id=b.id";
        //$schoolQuery = "SELECT a.name FROM school AS a LEFT JOIN school AS b ON a.id=b.parent_id LEFT JOIN school AS c ON c.parent_id=b.id";
        // $result = $this->conn->query($sql);
        if ($result1->num_rows > 0) {

            return $result1;
        } else {
            return false;
        }
    }

    public function school_view_single($getid)
    {
        $countryQuery = "SELECT * from school where $getid=id";
        $result = $this->conn->query($countryQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function floor_view_single($getid)
    {
        $floorQuery = "SELECT * from school where $getid=id";
        $result = $this->conn->query($floorQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function room_view_single($getid)
    {
        $roomQuery = "SELECT * from school where $getid=id";
        $result = $this->conn->query($roomQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function edit_school($id)
    {
        $school_id = mysqli_real_escape_string($this->conn, $id);
        $schoolQuery = "SELECT * FROM school where id=$school_id limit 1";
        $result = $this->conn->query($schoolQuery);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function update_school($inputData, $id)
    {
        $school_id = mysqli_real_escape_string($this->conn, $id);

        $name = $inputData['name'];
        $no_of_floor = $inputData['no_of_floor'];


        $schoolQuery = "UPDATE school SET name='$name',no_of_floor='$no_of_floor' WHERE id='$school_id' LIMIT 1";
        $result = $this->conn->query($schoolQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_floor($id)
    {
        $floor_id = mysqli_real_escape_string($this->conn, $id);
        $floorQuery = "SELECT * FROM school where id=$floor_id limit 1";
        $result = $this->conn->query($floorQuery);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function update_floor($inputData, $id)
    {
        $floor_id = mysqli_real_escape_string($this->conn, $id);

        $name = $inputData['name'];
        $no_of_room = $inputData['no_of_room'];


        $schoolQuery = "UPDATE school SET name='$name',no_of_room='$no_of_room' WHERE id='$floor_id' LIMIT 1";
        $result = $this->conn->query($schoolQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function edit_room($id)
    {
        $room_id = mysqli_real_escape_string($this->conn, $id);
        $roomQuery = "SELECT * FROM school where id=$room_id limit 1";
        $result = $this->conn->query($roomQuery);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function update_room($inputData, $id)
    {
        $room_id = mysqli_real_escape_string($this->conn, $id);

        $name = $inputData['name'];
        $no_of_seat = $inputData['no_of_seat'];


        $roomQuery = "UPDATE school SET name='$name',no_of_seat='$no_of_seat' WHERE id='$room_id' LIMIT 1";
        $result = $this->conn->query($roomQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function roomdelete($roomid)
    {


        $roomid = mysqli_real_escape_string($this->conn, $roomid);
        $roomDeleteQuery = "DELETE FROM school WHERE id='$roomid' LIMIT 1";
        $result = $this->conn->query($roomDeleteQuery);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function floordelete($floorid)
    {

        $floorid = mysqli_real_escape_string($this->conn, $floorid);
        $DeleteQuery1 = "DELETE p, c FROM school p LEFT OUTER JOIN school c ON p.id=c.parent_id WHERE p.id='$floorid' AND c.parent_id='$floorid'";
        $result1 = $this->conn->query($DeleteQuery1);

        if ($result1) {
        }
        if ($result1) {

            return true;
        } else {
            return false;
        }
    }
    public function schooldelete($schoolid)
    {


        $schoolid = mysqli_real_escape_string($this->conn, $schoolid);
        $DeleteQuery1 = "DELETE p, c,c1 FROM school p LEFT OUTER JOIN school c ON p.id=c.parent_id LEFT OUTER JOIN school c1 ON  c.id=c1.parent_id WHERE p.id='$schoolid' AND c.parent_id='$schoolid'";
        $result1 = $this->conn->query($DeleteQuery1);


        // $selectQuery1 = "DELETE FROM school where id=$schoolid";
        // $result1 = $this->conn->query($selectQuery1);





        // $DeleteQuery2 = "SELECT * FROM school where parent_id=$schoolid";
        // $result2 = $this->conn->query($DeleteQuery2);


        // if ($result1) {

        //     $DeleteQuery3 = "DELETE FROM school where parent_id=$schoolid";
        //     $result3 = $this->conn->query($DeleteQuery3);
        // }
        // if ($result3) {
        //     //  foreach ($result3 as $data) {}
        //     $DeleteQuery3 = "DELETE FROM school where id=$schoolid OR parent_id=$schoolid ";
        //     $result3 = $this->conn->query($DeleteQuery3);
        // }






        //$DeleteQuery11 = "DELETE p, c FROM school p LEFT OUTER JOIN school c ON p.id=c.parent_id WHERE p.id='$schoolid' AND c.parent_id='$schoolid'";

        if ($result1) {
            return true;
        } else {
            return false;
        }
    }
}
