<?php
include_once __DIR__. "/../../connections/db_connect.php";

class Admin {
    private $conn;
    private $admin_table;

    public function __construct()
    {
        $this->conn = connect_db();

        $include_json = __DIR__.'/../../config/config.json';
        $config = file_get_contents($include_json);
        $data = json_decode($config, TRUE);

        $this->admin_table = $data['admin'];
    }

    public function login($email, $password) {
        $query = "
            SELECT * FROM ".$this->admin_table." WHERE email = :email AND password = :password
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam("email", $email);
        $stmt->bindParam("password", $password);

        if($stmt->execute()) {
            if($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return true;
            }
            return false;
        }
        return false;
    }
}

