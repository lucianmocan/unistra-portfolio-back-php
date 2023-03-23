<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

$postdata = file_get_contents("php://input");
echo json_encode($postdata);
//header('Content-Type: application/json');