<!-- Inclui o header.php -->
<?php include "header.php" ?>

    <div class="container mt-3 mb-3">

        <?php

            //Verifica o método de requisição do servidor
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Bloco para declaração de variáveis
                $nomeOng = $emailOng = $senhaOng = $enderecoOng = $telefoneOng = $causaOng = $confirmarSenhaOng = "";

                //Variável booleana para controle de erros de preenchimento
                $erroPreenchimento = false;

             

                //Validação do campo nomeUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["nomeOng"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $nomeOng = filtrar_entrada($_POST["nomeOng"]);
                    
                    //Utiliza a função preg_match() para verificar se há apenas letras no nome
                    if(!preg_match('/^[\p{L} ]+$/u', $nomeOng)){
                        echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> deve conter apenas letras!</div>";
                        $erroPreenchimento = true;
                    }

                }

                //Validação do campo cidadeUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["causaOng"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CAUSA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $causaOng = filtrar_entrada($_POST["causaOng"]);
                }

                //Validação do campo cidadeUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["enderecoOng"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>ENDEREÇO</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $enderecoOng = filtrar_entrada($_POST["enderecoOng"]);
                }

                //Validação do campo telefoneUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["telefoneOng"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>TELEFONE</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $telefoneOng = filtrar_entrada($_POST["telefoneOng"]);
                }

                //Validação do campo emailUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["emailOng"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>EMAIL</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $emailOng = filtrar_entrada($_POST["emailOng"]);
                }

                //Validação do campo senhaUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["senhaOng"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>SENHA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $senhaOng = md5(filtrar_entrada($_POST["senhaOng"]));
                }

                //Validação do campo confirmarSenhaUsuario
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["confirmarSenhaOng"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $confirmarSenhaOng = md5(filtrar_entrada($_POST["confirmarSenhaOng"]));
                    //Compara se as senhas são diferentes
                    if($senhaOng != $confirmarSenhaOng){
                        echo "<div class='alert alert-warning text-center'>As <strong>SENHAS</strong> informadas são diferentes!</div>";
                        $erroPreenchimento = true;
                    }
                }
                //Se não houver erro de preenchimento, exibe alerta de sucesso e uma tabela com os dados informados
                if(!$erroPreenchimento){

                    //Cria uma variável para armazenar a QUERY para realizar a inserção dos dados do Usuário na tabela Usuarios
                    $inserirOng = "INSERT INTO ong (nome, email, senha, endereco, telefone, causa) VALUES ('$nomeOng', '$emailOng','$senhaOng','$enderecoOng', '$telefoneOng', '$causaOng')";

                    //Inclui o arquivo de conexão com o Banco de Dados
                    include("conexaoBD.php");

                    //Se conseguir executar a query para inserção, exibe alerta de sucesso e a tabela com os dados informados
                    if(mysqli_query($conn, $inserirOng)){

                        echo "<div class='alert alert-success text-center'><strong>ONG</strong> cadastrado(a) com sucesso!</div>";
                        echo "
                            <div class='container mt-3'>
                                <table class='table'>
                                    <tr>
                                        <th>NOME</th>
                                        <td>$nomeOng</td>
                                    </tr>
                                    <tr>
                                        <th>EMAIL</th>
                                        <td>$emailOng</td>
                                    </tr>
                                    <tr>
                                        <th>ENDEREÇO</th>
                                        <td>$enderecoOng</td>
                                    </tr>
                                    <tr>
                                        <th>TELEFONE</th>
                                        <td>$telefoneOng</td>
                                    </tr>
                                    <tr>
                                        <th>CAUSA</th>
                                        <td>$causaOng</td>
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
                //Redireciona o usuário para o formOng.php
                header("location:formONG.php");
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