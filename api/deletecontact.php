<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');


require_once "../classes/Contact.php";
require_once "../classes/Post.php";

$_POST = json_decode(trim(file_get_contents('php://input')),true);
if (isset($_POST['params']['updates'][0]['value'])) {
    $pdo = new Post();
    $pdo->deleteUserByID($_POST['params']['updates'][0]['value']);
    echo json_encode($_POST['params']['updates'][0]['value']);
}