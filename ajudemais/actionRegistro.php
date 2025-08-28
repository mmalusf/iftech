<!-- Inclui o header.php -->
<?php include "header.php" ?>

    <div class="container mt-3 mb-3">

        <?php

            //Verifica o método de requisição do servidor
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Bloco para declaração de variáveis
                $cpfDoador = $nomeDoador = $dataNascimentoDoador = $cidadeDoador = $telefoneDoador = $emailDoador = $senhaDoador = $confirmarSenhaDoador = "";

                //Variável booleana para controle de erros de preenchimento
                $erroPreenchimento = false;

                if(empty($_POST["cpfDoador"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $cpfDoador = filtrar_entrada($_POST["cpfDoador"]);
                    
                    //Utiliza a função preg_match() para verificar se há apenas letras no nome
                    

                }

                //Validação do campo nomeDoador
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["nomeDoador"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $nomeDoador = filtrar_entrada($_POST["nomeDoador"]);
                    
                    //Utiliza a função preg_match() para verificar se há apenas letras no nome
                    if(!preg_match('/^[\p{L} ]+$/u', $nomeDoador)){
                        echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> deve conter apenas letras!</div>";
                        $erroPreenchimento = true;
                    }

                }

                //Validação do campo dataNascimentoDoador
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["dataNascimentoDoador"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>DATA DE NASCIMENTO</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $dataNascimentoDoador = filtrar_entrada($_POST["dataNascimentoDoador"]);

                    //Aplicar a função strlen() para verificar o comprimento da string da dataNascimentoDoador
                    if(strlen($dataNascimentoDoador) == 10){

                        //Aplicar a função substr() para gerar substrings para armazenar dia, mês e ano de nascimento do usuário
                        $diaNascimentoDoador = substr($dataNascimentoDoador, 8, 2);
                        $mesNascimentoDoador = substr($dataNascimentoDoador, 5, 2);
                        $anoNascimentoDoador = substr($dataNascimentoDoador, 0, 4);

                        //Aplicar a função checkdate() para verificar se trata-se de uma data válida
                        if(!checkdate($mesNascimentoDoador, $diaNascimentoDoador, $anoNascimentoDoador)){
                            echo "<div class='alert alert-warning text-center'><strong>DATA INVÁLIDA</strong></div>";
                            $erroPreenchimento = true;
                        }
                    }
                    else{
                        echo "<div class='alert alert-warning text-center'><strong>DATA INVÁLIDA</strong></div>";
                        $erroPreenchimento = true;
                    }
                }

                //Validação do campo cidadeDoador
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["cidadeDoador"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CIDADE</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $cidadeDoador = filtrar_entrada($_POST["cidadeDoador"]);
                }

                //Validação do campo telefoneDoador
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["telefoneDoador"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>TELEFONE</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $telefoneDoador = filtrar_entrada($_POST["telefoneDoador"]);
                }

                //Validação do campo emailDoador
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["emailDoador"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>EMAIL</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $emailDoador = filtrar_entrada($_POST["emailDoador"]);
                }

                //Validação do campo senhaDoador
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["senhaDoador"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>SENHA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $senhaDoador = md5(filtrar_entrada($_POST["senhaDoador"]));
                }

                //Validação do campo confirmarSenhaDoador
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["confirmarSenhaDoador"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $confirmarSenhaDoador = md5(filtrar_entrada($_POST["confirmarSenhaDoador"]));
                    //Compara se as senhas são diferentes
                    if($senhaDoador != $confirmarSenhaDoador){
                        echo "<div class='alert alert-warning text-center'>As <strong>SENHAS</strong> informadas são diferentes!</div>";
                        $erroPreenchimento = true;
                    }
                }

                //Início da validação da foto do usuário
                $diretorio    = "img/"; //Define para qual diretório as imagens serão movidas
                $fotoDoador  = $diretorio . basename($_FILES['fotoDoador']['name']); //img/joaozinho.jpg
                $tipoDaImagem = strtolower(pathinfo($fotoDoador, PATHINFO_EXTENSION)); //Pega o tipo do arquivo em letras minúsculas
                $erroUpload   = false; //Variável para controle do upload da foto

                //Verifica se o tamanho do arquivo é DIFERENTE DE ZERO
                if($_FILES['fotoDoador']['size'] != 0){

                    //Verifica se o tamanho do arquivo é maior do que 5 MegaBytes (MB) - Medida em Bytes
                    if($_FILES['fotoDoador']['size'] > 5000000){
                        echo "<div class='alert alert-warning text-center'>A <strong>FOTO</strong> deve ter tamanho máximo de 5MB!</div>";
                        $erroUpload = true;
                    }

                    //Verifica se a foto está nos formatos JPG, JPEG, PNG ou WEBP
                    if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp"){
                        echo "<div class='alert alert-warning text-center'>A <strong>FOTO</strong> deve estar nos formatos JPG, JPEG, PNG ou WEBP</div>";
                        $erroUpload = true;
                    }

                    //Verifica se a imagem foi movida para o diretório IMG, utilizando a função move_uploaded_file
                    if(!move_uploaded_file($_FILES['fotoDoador']['tmp_name'], $fotoDoador)){
                        echo "<div class='alert alert-danger text-center'>Erro ao tentar mover a <strong>FOTO</strong> para o diretório $diretorio!</div>";
                        $erroUpload = true;
                    }

                }
                else{
                    echo "<div class='alert alert-warning text-center'>O campo <strong>FOTO</strong> é obrigatório!</div>";
                    $erroUpload = true;
                }

                //Se não houver erro de preenchimento, exibe alerta de sucesso e uma tabela com os dados informados
                if(!$erroPreenchimento && !$erroUpload){

                    //Cria uma variável para armazenar a QUERY para realizar a inserção dos dados do Usuário na tabela Doadors
                    $inserirDoador = "INSERT INTO Doador (cpf, nome, email, senha, data_nascimento, endereco, telefone, FOTO) VALUES ('$cpfDoador','$nomeDoador', '$emailDoador','$senhaDoador','$dataNascimentoDoador', '$cidadeDoador', '$telefoneDoador', '$fotoDoador')";

                    //Inclui o arquivo de conexão com o Banco de Dados
                    include("conexaoBD.php");

                    //Se conseguir executar a query para inserção, exibe alerta de sucesso e a tabela com os dados informados
                    if(mysqli_query($conn, $inserirDoador)){

                        echo "<div class='alert alert-success text-center'><strong>Usuário</strong> cadastrado(a) com sucesso!</div>";
                        echo "
                            <div class='container mt-3'>
                                <div class='container mt-3 text-center'>
                                    <img src='$fotoDoador' style='width:150px;' title='Foto de $nomeDoador'>
                                </div>
                                <table class='table'>
                                    <tr>
                                        <th>NOME</th>
                                        <td>$nomeDoador</td>
                                    </tr>
                                    <tr>
                                        <th>DATA DE NASCIMENTO</th>
                                        <td>$diaNascimentoDoador/$mesNascimentoDoador/$anoNascimentoDoador</td>
                                    </tr>
                                    <tr>
                                        <th>CIDADE</th>
                                        <td>$cidadeDoador</td>
                                    </tr>
                                    <tr>
                                        <th>TELEFONE</th>
                                        <td>$telefoneDoador</td>
                                    </tr>
                                    <tr>
                                        <th>EMAIL</th>
                                        <td>$emailDoador</td>
                                    </tr>
                                </table>
                            </div>
                        ";
                        mysqli_close($conn); //Essa função encerra a conexão com o Banco de Dados
                    }
                    else{
                        echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar <strong>Usuário</strong> no Banco de Dados $database!</div>" . mysqli_error($conn);
                    }
                }
            }
            else{
                //Redireciona o usuário para o formDoador.php
                header("location:formDoador.php");
            }

            //Função para filtrar entrada de dados
            function filtrar_entrada($dado){
                $dado = trim($dado); //Remove espaços desnecessários
                $dado = stripslashes($dado); //Remove barras invertidas
                $dado = htmlspecialchars($dado); // Converte caracteres especiais em entidades HTML

                //Retorna o dado após filtrado
                return($dado);
            }
        ?>

    </div>

<!-- Inclui o footer.php -->
<?php include "footer.php" ?>