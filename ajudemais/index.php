<?php include "header.php" ?>
<?php include "exibirLogo.php" ?>
    <!-- Content section-->
      
        <!-- Image element - set the background image for the header in the line below-->
        
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                         <body class="bg-light">

<div class="container my-0">
    <h1 class="mb-4 text-center">Escolha sua contribuição:</h1>

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
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Quero Ajudar</button>
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

        
    </form>
</div>

</body>
                    </div>
                </div>
            </div>
        </section>
        
<?php include "footer.php" ?>