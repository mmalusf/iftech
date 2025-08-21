<!DOCTYPE html>
<html lang="pt-br">
    <head>
         <style>
        body {
            background-color: #ffe4b4; /* cor personalizada */
        }
    </style>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ajude +</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

         <!-- CDNs para Máscaras JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <!-- CDN para Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

        <!-- Script JQuery para a máscara do telefone -->
        <script>
            $(document).ready(function(){
                $("#telefoneUsuario").mask("(00) 00000-0000");
                $("#telefoneOng").mask("(00) 00000-0000");
                //$("#cepUsuario").mask("00000-000");
                $("#cpfUsuario").mask("000.000.000-00");
            });
        </script>
    </head>
    <body>
        
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-red bg-red">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="img/loguinho.png" width="100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Página Inicial</a></li>
                        <li class="nav-item"><a class="nav-link" href="formONG.php">Cadastrar ONG</a></li>
                        <li class="nav-item"><a class="nav-link" href="formLogin.php">Login</a></li> 
                        <li class="nav-item"><a class="nav-link" href="sobreNos.php">Sobre Nós</a></li>
                        <li class="nav-item"><a class="nav-link" href="ajudeagora.php">Ajude Agora</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        

        