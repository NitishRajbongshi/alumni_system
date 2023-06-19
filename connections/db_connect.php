<?php
function connect_db()
{
    $include_json = __DIR__.'/../config/config.json';
    $config = file_get_contents($include_json);
    $data = json_decode($config, TRUE);

    $server = $data['server'];
    $username = $data['username'];
    $password = $data['password'];
    $dbname = $data['dbname'];

    try {
        $dsn = "mysql:host=" . $server . ";dbname=" . $dbname . ";charset=UTF8";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error :" . $e->getMessage();
    }
    return $conn;
}