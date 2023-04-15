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
            firstName VARCHAR(255) NOT NULL, 
            lastName VARCHAR(255) NOT NULL, 
            email VARCHAR(255) NOT NULL,
            content TEXT NOT NULL
        )');
    }

    public function addUser(Contact $user){
        $stmt = $this->pdo->prepare("INSERT INTO contactRequests (
                             firstName, lastName, email, content) 
                            VALUES (:firstName, :lastName, :email, :content)");
        $stmt->bindValue(':firstName', $user->getFirstName());
        $stmt->bindValue(':lastName', $user->getLastName());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':content', $user->getContent());
        $stmt->execute();
    }

    public function getUserById(int $id){
        $stmt = $this->pdo->prepare('SELECT * FROM contactRequests WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function deleteUserByID(int $id){
        $stmt = $this->pdo->prepare('DELETE FROM contactRequests WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public function updateUserByID(int $id, Contact $user){
        $stmt = $this->pdo->prepare('UPDATE contactRequests SET 
                             firstName = :firstName, lastName = :lastName, 
                             email = :email, content = :content WHERE id = :id');
        $stmt->bindValue(':firstName', $user->getFirstName());
        $stmt->bindValue(':lastName', $user->getLastName());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':content', $user->getContent());
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    // create 2 php files one which gets called by the httpClient et l'autre qui fait le traitement.
}