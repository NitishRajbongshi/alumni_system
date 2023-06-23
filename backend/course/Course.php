<?php
include_once __DIR__ . "/../../connections/db_connect.php";

class Course
{
    private $conn;
    private $course_table;

    public function __construct()
    {
        $this->conn = connect_db();

        $include_json = __DIR__ . '/../../config/config.json';
        $config = file_get_contents($include_json);
        $data = json_decode($config, TRUE);

        $this->course_table = $data['course'];
    }

    public function add_course($code, $name)
    {
        $query = "
        INSERT INTO " . $this->course_table . " SET course_code = :code, course_name = :name;
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam("code", $code);
        $stmt->bindParam("name", $name);
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1)
                return true;
            else
                return false;
        } else
            return false;
    }

    public function get_code_by_id($id) {
        $query = "
        SELECT course_code FROM " . $this->course_table . " WHERE course_id = :course_id;
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam("course_id", $id);
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                $code = $stmt->fetch(PDO::FETCH_ASSOC);
                return $code['course_code'];
            } else
                return false;
        }
    }

    public function get_course()
    {
        $query = "
            SELECT * FROM " . $this->course_table . " WHERE 1;
        ";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return $stmt;
            } else
                return false;
        }
    }

    public function get_course_count()
    {
        $query = "
        SELECT COUNT(*) AS total_number FROM ".$this->course_table." WHERE 1;
        ";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
