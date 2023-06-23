<!DOCTYPE html>
<html lang="pt-br">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mercaria do S. João</title>
        <link href="css/mercregistrar.css" rel="stylesheet" media="screen">
        <link rel="icon" href="css/img/quitanda-nobg.png">
</head>

<body>
        <br>
        <br>
        <br>
        <br>
        <form class="form" action="mercregistrar.php" method="POST">

                <h1>
                        Registre-se:
                </h1>

                <label for="CPF">
                        CPF:
                </label>

                <input type="text" id="CPF" name="CPF" maxlength="11" minlength="11" size="40" required>
                <br>
                <br>
                <br>
                <label for="senha">
                        Senha:
                </label>

                <input type="text" id="senha" name="senha" required size="40" required>
                <br>
                <br>
                <br>
                <label for="senha2">
                        Confirme a senha:
                </label>

                <input type="text" id="senha2" name="senha2" required size="40" required>
                <br>
                <br>
                <br>
                <br>


                <input type="submit" value="Cadastrar" class="botao" href="mercregistrar copy.php">
                <br>


                <br>
                <br>
                <div class="cadastro"> Já possui uma conta? <a href="index.php">Faça o login</a></div>

        </form>

        <br>
        <form class="form2" action="mercregistrar.php" method="POST">
                <?php
                if (isset($_POST["CPF"]) && isset($_POST["senha"]) && isset($_POST["senha2"])) {
                        $CPF = $_POST["CPF"];
                        $SENHA = $_POST["senha"];
                        $SENHA2 = $_POST["senha2"];

                        echo "<h1>Valores digitados:</h1>";
                        echo "<h3> <strong>CPF:</strong> </h3> " . $CPF;
                        echo "<br>";
                        echo "<br>";
                        echo "<strong>Senha:</strong> " . $SENHA;
                        echo "<br>";
                        echo "<br>";
                        echo "<strong>Confirme a senha:</strong> " . $SENHA2;
                        echo "</div>";
                }
                ?>
        </form>

</body>

</html>