<?php
include_once __DIR__. "/../../connections/db_connect.php";

class AddCourse {
    private $conn;
    private $course_table;

    public function __construct()
    {
        $this->conn = connect_db();

        $include_json = __DIR__.'/../../config/config.json';
        $config = file_get_contents($include_json);
        $data = json_decode($config, TRUE);

        $this->course_table = $data['course'];
    }

    public function add_course($code, $name) {
        $query = "
        INSERT INTO ".$this->course_table." SET course_code = :code, course_name = :name;
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam("code", $code);
        $stmt->bindParam("name", $name);
        if($stmt->execute()) {
            if($stmt->rowCount() == 1) 
                return true;
            else 
                return false;
        } else
            return false;
    }
}