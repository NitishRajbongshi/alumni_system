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

    public function change_password($email, $current, $new) {
        $query = "
            UPDATE ".$this->admin_table." SET password = :new_password WHERE email = :email AND password = :current_password
        ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam("email", $email);
        $stmt->bindParam("new_password", $new);
        $stmt->bindParam("current_password", $current);
        if($stmt->execute()) {
            if($stmt->rowCount() == 1) {
                return true;
            }
            else 
                return false;
        } 
        else
            return false;
    }
}

