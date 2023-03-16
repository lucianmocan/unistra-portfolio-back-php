<?php

require_once 'Database.php';

class Post extends Database {
    public function __construct(){
        parent::__construct();
        $this->initTable();
    }

    private function initTable(){
        $this->pdo->query('CREATE TABLE IF NOT EXISTS contactRequests (
            id INTEGER PRIMARY KEY AUTOINCREMENT, 
            firstname VARCHAR(255) NOT NULL, 
            lastname VARCHAR(255) NOT NULL, 
            email VARCHAR(255) NOT NULL,
            message TEXT NOT NULL
        )');
    }

    // create 2 php files one which gets called by the httpClient et l'autre qui fait le traitement.
}