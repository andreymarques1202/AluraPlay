<?php
    require_once "./connect.php";

    $id = $_GET["id"];

    $query = "DELETE FROM videos WHERE id = :id";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(":id", $id);
    if( $stmt->execute() === false) {
        header("Location: /?sucesso=0");
    } else {
        header("Location: /?sucesso=1");
    }