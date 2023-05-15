<?php
require_once "./connect.php";
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$video = [
    "url" => "",
    "title" => ""
];

if($id !== false && $id !== null) {
    $query = "SELECT * FROM videos WHERE id = :id";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $video = $stmt->fetch(\PDO::FETCH_ASSOC);
}




require_once "./inicio-html.php";

?>

    <main class="container">

        <form class="container__formulario" method="POST">
            <h2 class="formulario__titulo">Envie um vídeo!</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name="url" value= "<?= $video["url"]; ?>" class="campo__escrita" required
                        placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' />
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="titulo" value="<?= $video["title"]; ?>" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo"
                        id='titulo' />
                </div>

                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>

</body>

</html>