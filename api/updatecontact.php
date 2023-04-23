<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');


require_once "../classes/Contact.php";
require_once "../classes/Post.php";

$_POST = json_decode(file_get_contents("php://input"), true);
if (isset($_POST)) {
    $contact = new Contact($_POST);
    $pdo = new Post();
    $pdo->updateUserByID(intval($_POST['id'], 10), $contact);
}