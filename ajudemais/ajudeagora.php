<?php include "header.php"; ?>
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
            // Conexão com o banco de dados
            //Inclui o arquivo de conexão com o Banco de Dados
            include("conexaoBD.php");

            // Consulta as ONGs
            $sql = "SELECT ID, NOME, CAUSA, FOTO FROM ong";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $index = 0;
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col">
                        <div class="card h-100">
                            <img src="' . htmlspecialchars($row["FOTO"]) . '" class="card-img-top" alt="' . htmlspecialchars($row["NOME"]) . '">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($row["NOME"]) . '</h5>
                                <p class="card-text">' . htmlspecialchars($row["CAUSA"]) . '</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ajuda['.$row["ID"].']" value="servico" id="servico'.$index.'">
                                    <label class="form-check-label" for="servico'.$index.'">Ajudar com serviços</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ajuda['.$row["ID"].']" value="dinheiro" id="dinheiro'.$index.'">
                                    <label class="form-check-label" for="dinheiro'.$index.'">Ajudar com dinheiro</label>
                                </div>
                            </div>
                        </div>
                    </div>';
                    $index++;
                }
            } else {
                echo '<p class="text-center">Nenhuma ONG cadastrada no momento.</p>';
            }

            $conn->close();
            ?>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Enviar Escolhas</button>
        </div>
    </form>
</div>

</body>
</html>
<?php include "footer.php"; ?>
