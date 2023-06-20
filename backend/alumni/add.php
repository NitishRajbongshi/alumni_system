<?php
include_once __DIR__ . "/../../connections/db_connect.php";

class AddAlumni
{
    private $conn;
    private $alumni_table;

    public function __construct()
    {
        $this->conn = connect_db();

        $include_json = __DIR__ . '/../../config/config.json';
        $config = file_get_contents($include_json);
        $data = json_decode($config, TRUE);

        $this->alumni_table = $data['alumni'];
    }

    public function add_alumni($registration, $rollno, $fname, $mname, $lname, $dob, $phone, $email, $pass_year, $cgpa, $course, $address, $position)
    {
        $query = "
        INSERT INTO " . $this->alumni_table . " SET registration_no = :registration, rollno = :rollno, fname = :fname, mname = :mname, lname = :lname, dob = :dob, phone = :phone, email = :email, pass_year = :pass_year, cgpa = :cgpa, course = :course, address = :address, position = :position
        ;
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam("registration", $registration);
        $stmt->bindParam("rollno", $rollno);
        $stmt->bindParam("fname", $fname);
        $stmt->bindParam("mname", $mname);
        $stmt->bindParam("lname", $lname);
        $stmt->bindParam("dob", $dob);
        $stmt->bindParam("phone", $phone);
        $stmt->bindParam("email", $email);
        $stmt->bindParam("pass_year", $pass_year);
        $stmt->bindParam("cgpa", $cgpa);
        $stmt->bindParam("course", $course);
        $stmt->bindParam("address", $address);
        $stmt->bindParam("position", $position);
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1)
                return true;
            else
                return false;
        } else
            return false;
    }
}
