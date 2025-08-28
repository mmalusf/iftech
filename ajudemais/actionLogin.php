<?php

    session_start(); //função para inciar uma sessão
    include("conexaoBD.php");

    $emailDoador = mysqli_real_escape_string($conn, $_POST["emailDoador"]);
    $senhaDoador = mysqli_real_escape_string($conn, $_POST["senhaDoador"]);


    $buscarLogin ="SELECT *
                   FROM Doador 
                    WHERE email = '$emailDoador'
                    AND senha = md5('$senhaDoador')
                    ";

    
    $efetuarLogin = mysqli_query($conn, $buscarLogin);
    
    if($registro = mysqli_fetch_assoc($efetuarLogin)){
        $quantidadeLogin = mysqli_num_rows($efetuarLogin);
  
        $emailDoador = $registro["email"];
        $nomeDoador = $registro["nome"];


        $_SESSION["emailDoador"] = $emailDoador;
        $_SESSION["nomeDoador"]  = $nomeDoador;
        $_SESSION["logado"]       = true;

        header("location:index.php"); //Funçao que rediereciona para uma determinada pagina


        //echo "<h1>Foram encontrados $quantidadeLogin com os dados informados!</h1>";

    }
    else{
        echo"<h1>Não existe login para os dados informados! </h1>";
        header("location:FormLogin.php?erroLogin='dadosInvalidos'");
    }
?>