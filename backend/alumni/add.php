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

    private function check_duplicacy($registration) {
        $query = "
        SELECT * FROM ".$this->alumni_table." WHERE registration_no = :registration
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam("registration", $registration);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0)
                return true;
            else
                return false;
        } else
            return false;
    }

    public function add_alumni($registration, $rollno, $fname, $mname, $lname, $dob, $phone, $email, $batch, $pass_year, $cgpa, $course, $address, $position)
    {
        if($this->check_duplicacy($registration)) {
            return 2;
        } else {
            $query = "
            INSERT INTO " . $this->alumni_table . " SET registration_no = :registration, rollno = :rollno, fname = :fname, mname = :mname, lname = :lname, dob = :dob, phone = :phone, email = :email, batch = :batch, pass_year = :pass_year, cgpa = :cgpa, course = :course, address = :address, position = :position
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
            $stmt->bindParam("batch", $batch);
            $stmt->bindParam("pass_year", $pass_year);
            $stmt->bindParam("cgpa", $cgpa);
            $stmt->bindParam("course", $course);
            $stmt->bindParam("address", $address);
            $stmt->bindParam("position", $position);
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1)
                    return 1;
                else
                    return false;
            } else
                return false;
        }
    }

    public function count_alumni()
    {
        $query = "
        SELECT course_table.course_code, COUNT(alumni_table.course) AS alumni_count
        FROM course_table
        LEFT JOIN alumni_table ON course_table.course_code = alumni_table.course
        GROUP BY course_table.course_code;
        ";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $alumnies = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $alumnies;
            } else
                return false;
        }
    }

    public function get_all_alumni() {
        $query = "
        SELECT * FROM ".$this->alumni_table." WHERE 1;
        ";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return $stmt;
            } else
                return false;
        }
    }
}
