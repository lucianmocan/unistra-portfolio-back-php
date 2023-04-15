<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');


require_once "Contact.php";
require_once "Post.php";

if (isset($_GET)) {
    $pdo = new Post();
    if (isset($_GET['id'])){
        echo json_encode($pdo->getUserById($_GET['id']));
    }
    else {
        echo json_encode($pdo->query('SELECT * FROM contactRequests')
            ->fetchAll());
    }
}