<?php

class countryController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData)
    {
        $country_name = $inputData['country_name'];

        $countryQuery = "INSERT INTO country (country_name) VALUES ('$country_name')";
        $result = $this->conn->query($countryQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        $countryQuery = "SELECT * FROM country";
        $result = $this->conn->query($countryQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }



    public function index_single($getid)
    {
        $countryQuery = "SELECT * from country WHERE country.id=$getid";
        $result = $this->conn->query($countryQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $country_id = mysqli_real_escape_string($this->conn, $id);
        $countryQuery = "SELECT * FROM country WHERE id='$country_id' LIMIT 1";
        $result = $this->conn->query($countryQuery);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function update($inputData, $id)
    {
        $country_id = mysqli_real_escape_string($this->conn, $id);
        $country_name = $inputData['country_name'];


        $countryQuery = "UPDATE country SET country_name='$country_name' WHERE id='$country_id' LIMIT 1";
        $result = $this->conn->query($countryQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $student_id = mysqli_real_escape_string($this->conn, $id);
        $countryDeleteQuery = "DELETE FROM country WHERE id='$student_id' LIMIT 1";
        $result = $this->conn->query($countryDeleteQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
