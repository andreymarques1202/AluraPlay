<?php

namespace Alura\Mvc\Repository;

use Alura\Mvc\Entity\Video;
use PDO;


class VideoRepository {
    public function __construct(private PDO $pdo){

    }
    
    public function add(Video $video): bool
    {
        
        $query = "INSERT INTO videos (url, title) VALUES (:url, :title)";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(":url", $video->url);
        $stmt->bindValue(":title", $video->title);

        $result = $stmt->execute();

        $id = $this->pdo->lastInsertId();

        $video->setId(intval($id));
        
        return $result;
    }

    public function remove(int $id): bool
    {
        $query = "DELETE FROM videos WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id);

        return $stmt->execute();
    }

    public function update(Video $video): bool
    {
        $query = "UPDATE videos SET url = :url, title = :title WHERE id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindValue(':url', $video->url);
    $stmt->bindValue(':title', $video->title);
    $stmt->bindValue(':id', $video->id, PDO::PARAM_INT);

    return $stmt->execute();
    }

    public function all(): array
    {
        $videolist = $this->pdo->query('SELECT * FROM videos;')->fetchAll(PDO::FETCH_ASSOC);


        return array_map(function (array $videoData) {
            $video = new Video($videoData["url"], $videoData["title"]);
            $video->setId($videoData["id"]);

            return $video;
        }, $videolist);
    }

    public function find(int $id) {
        $stmt = $this->pdo->prepare("SELECT * FROM videos WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $this->hydrateVideo($stmt->fetch(PDO::FETCH_ASSOC));
    
    }

    private function hydrateVideo(array $videoData): Video {
        $video = new Video($videoData["url"], $videoData["title"]);
        $video->setId($videoData["id"]);

        return $video;
    }
}