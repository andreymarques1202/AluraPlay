<?php
    $dbPath = __DIR__ . '/banco.sqlite';
    $pdo = new PDO("sqlite:$dbPath");
    
    $id = $_GET["id"];

    $query = "DELETE FROM videos WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    if( $stmt->execute() === false) {
        header("Location: /?sucesso=0");
    } else {
        header("Location: /?sucesso=1");
    }