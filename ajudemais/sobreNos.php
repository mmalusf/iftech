<?php include "header.php" ?>

    <style>
    
        body {
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #e4ab56ff;
            color: white;
            padding: 10px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 5px;
        }

        h2 {
            font-size: 1.6rem;
            color: #d4cc82f;
            margin-top: 30px;
        }

        p {
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .missao-visao-valores {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            flex: 1;
            background-color: white;
            padding: 20px;
            border-left: 5px solid #e9b047ff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            min-width: 250px;
        }

      
    </style>
</head>
<body>

    <header style="padding: 20px;">
        <h1>Sobre Nós</h1>
        <p>Conheça a história e o propósito do nosso projeto</p>
    </header>

    <div class="container">
        <h2>Quem Somos</h2>
        <p>
            Nós somos 3 estudantes do terceiro ano de Informática para Internet do campus de Telêmaco Borba-PR.
        </p>

        <h2>O que Fazemos</h2>
        <p>
            O nosso objetivo com a criação do Ajude+ é facilitar a contribuição de voluntários com ONG's de uma maneira mais direta e objetiva a partir de um projeto de ações voluntárias.
        </p>

         <img src="img/nos.jpg" alt="..." />

    </div>
</body>

<?php include "footer.php"; ?>