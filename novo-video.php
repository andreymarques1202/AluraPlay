<?php

require_once "./connect.php";

$data = $_POST;

$url = $data["url"];
$title = $data["titulo"];

$query = "INSERT INTO videos (url, title) VALUES (:url, :title)";

$stmt = $connect->prepare($query);

$stmt->bindParam(":url", $url);
$stmt->bindParam(":title", $title);

if ($stmt->execute() === false) {
    header("Location: ./index.php?sucesso=0");
} else {
    header("Location: ./index.php?sucesso=1");
}
 


