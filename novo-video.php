<?php

require_once "./connect.php";


$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, "titulo");

if($url === false) {
    header("Location: /?sucesso=0");
    exit();
}
if($title === false) {
    header("Location: /?sucesso=0");
    exit();
}

$query = "INSERT INTO videos (url, title) VALUES (:url, :title)";

$stmt = $connect->prepare($query);

$stmt->bindParam(":url", $url);
$stmt->bindParam(":title", $title);

if ($stmt->execute() === false) {
    header("Location: /?sucesso=0");
} else {
    header("Location: /?sucesso=1");
}
 


