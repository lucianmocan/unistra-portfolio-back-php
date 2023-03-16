<?php

abstract class Database {
    protected PDO $pdo;

    public function __construct(){
        try {
        $this->pdo = new PDO('sqlite:' . dirname(__FILE__) . '/database.sqlite');
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            echo "Connection error" . $e->getMessage();
            exit;
        }
    }

}