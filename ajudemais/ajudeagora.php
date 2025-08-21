<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8">
    <title>Ajude uma ONG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h1 class="mb-4 text-center">Escolha uma ONG para Ajudar</h1>

    <form action="processar.php" method="post">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $ongs = [
                [
                    "nome" => "Amigos dos Animais",
                    "descricao" => "Resgata e cuida de animais abandonados.",
                    "imagem" => "img/pata.png" 
                ],
                [
                    "nome" => "Criança Feliz",
                    "descricao" => "Oferece apoio e educação para crianças carentes.",
                    "imagem" => "img/criança.webp"
                ],
                [
                    "nome" => "Verde Vivo",
                    "descricao" => "ONG dedicada à preservação ambiental.",
                    "imagem" => "img/arvore.jpg"
                ]];

            foreach ($ongs as $index => $ong) {
                echo '
                <div class="col">
                    <div class="card h-100">
                        <img src="' . $ong["imagem"] . '" class="card-img-top" alt="' . $ong["nome"] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $ong["nome"] . '</h5>
                            <p class="card-text">' . $ong["descricao"] . '</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ajuda['.$index.']" value="servico" id="servico'.$index.'">
                                <label class="form-check-label" for="servico'.$index.'">Ajudar com serviços</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ajuda['.$index.']" value="dinheiro" id="dinheiro'.$index.'">
                                <label class="form-check-label" for="dinheiro'.$index.'">Ajudar com dinheiro</label>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Enviar Escolhas</button>
        </div>
    </form>
</div>

</body>
</html>
<?php include "footer.php" ?>