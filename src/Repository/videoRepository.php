<?php

namespace Alura\Mvc\Repossitory;

class VideoRepository {
    public function __construct(private \PDO $pdo){

    }
    
    public function add($video) 
    {
        require_once "./aluraplay/connect.php";
        $query = "INSERT INTO videos (url, title) VALUES (:url, :title)";

        $stmt = $connect->prepare($query);

        $stmt->bindParam(":url", $url);
        $stmt->bindParam(":title", $title);

        $stmt->execute();
    }
}