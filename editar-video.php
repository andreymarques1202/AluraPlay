<?php
    $dbPath = __DIR__ . '/banco.sqlite';
    $pdo = new PDO("sqlite:$dbPath");

    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
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

    if($id === false && $id === null) {
        header("Location: /?sucesso=0");
        exit();
    }

    $query = "UPDATE videos SET url = :url, title = :title WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':url', $url);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    if( $stmt->execute() === false) {
        header("Location: /?sucesso=0");
    } else {
        header("Location: /?sucesso=1");
    }