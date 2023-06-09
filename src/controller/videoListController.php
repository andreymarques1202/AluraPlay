<?php

namespace Alura\Mvc\Controller;
use Alura\Mvc\Repository\VideoRepository;


class VideoListController {

    public function __construct(private VideoRepository $videoRepository) {
        
    }
    
    public function processaRequisicao (): void
    {
        $videolist = $this->videoRepository->all();

        require_once __DIR__ . "/../../views/video-list.php";

    } 

}