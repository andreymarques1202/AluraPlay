<?php
    require_once "./connect.php";

    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
    $title = filter_input(INPUT_POST, "titulo");

    if($url === false) {
        header("Location: ./index.php?sucesso=0");
        exit();
    }
    if($title === false) {
        header("Location: ./index.php?sucesso=0");
        exit();
    }

    if($id === false) {
        header("Location: ./index.php?sucesso=0");
        exit();
    }

    $query = "UPDATE videos SET url = :url, title = :title WHERE id = :id";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":url", $url);
    $stmt->bindParam(":title", $title);
    if( $stmt->execute() === false) {
        header("Location: ./index.php?sucesso=0");
    } else {
        header("Location: ./index.php?sucesso=1");
    }