<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
abstract class Database {
    protected PDO $pdo;

    public function __construct(){
        try {
        $this->pdo = new PDO('sqlite:' . dirname(__FILE__,2) . '/database.sqlite');
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            echo "Connection error" . $e->getMessage();
            exit;
        }
    }

    public function query($task){
        return $this->pdo->query($task);
    }

}