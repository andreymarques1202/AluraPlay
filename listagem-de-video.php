<?php
require_once "./connect.php";
$query = "SELECT * FROM videos";
$stmt = $connect->prepare($query);
$stmt->execute();

$videolist = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    require_once "./inicio-html.php";
?>

    <ul class="videos__container" alt="videos alura">
        <?php foreach ($videolist as $video): ?>
        <?php 
            if(!str_starts_with($video["url"], "http")) {
                $video["url"] = "https://www.youtube.com/embed/qJxk1leG1wY";
            }
        
        ?>
        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?= $video["url"] ?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <div class="descricao-video">
                <img src="./img/logo.png" alt="logo canal alura">
                <h3><?= $video["title"] ?></h3>
                <div class="acoes-video">
                    <a href="/editar-video?id=<?= $video["id"];?>">Editar</a>
                    <a href="./remover-video?id=<?= $video["id"];?>">Excluir</a>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>