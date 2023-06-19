<?php
include_once __DIR__. "/../../connections/db_connect.php";

class GetCourse {
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

    public function get_course() {
        $query = "
            SELECT * FROM ".$this->course_table." WHERE 1;
        ";
        $stmt = $this->conn->prepare($query);
        if($stmt->execute()) {
            if($stmt->rowCount() > 0) {
                return $stmt;
            }
            else 
                return false;
        }
    }
}