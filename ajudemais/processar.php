<?php include "header.php" ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajuda"])) {
    $ongs = [
        "Amigos dos Animais",
        "Criança Feliz",
        "Verde Vivo"
    ];

     include("conexaoBD.php");

    echo "<h1>Obrigado por sua ajuda!</h1><ul>";

    foreach ($_POST["ajuda"] as $index => $forma) {
        echo "<li><strong>{$ongs[$index]}</strong> — Ajuda com <em>{$forma}</em></li>";
    }

    echo "</ul>";
} else {
    echo "<p>Nenhuma opção selecionada.</p>";
}
?>

<?php include "footer.php" ?>