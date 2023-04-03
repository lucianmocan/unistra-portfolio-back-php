<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
require_once 'Database.php';
require_once 'Contact.php';

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

    public function addUser(Contact $user){
        $stmt = $this->pdo->prepare("INSERT INTO contactRequests (
                             firstname, lastname, email, message) 
                            VALUES (:firstName, :lastName, :email, :message)");
        $stmt->bindValue(':firstName', $user->getFirstName());
        $stmt->bindValue(':lastName', $user->getLastName());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':message', $user->getContent());
        $stmt->execute();
    }

    // create 2 php files one which gets called by the httpClient et l'autre qui fait le traitement.
}