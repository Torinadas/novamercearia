<?php

if (isset($_POST["CPF"]) && isset($_POST["senha"])) {
        $cpf = "perino123";
        $senha = "perino123";

        if (isset($_POST["CPF"]) && isset($_POST["senha"])) {

                if ($_POST["CPF"] == "perino123" && $_POST["senha"] == "perino123") {

                        session_start();
                        $_SESSION["CPF"] = $_POST["CPF"];
                        header("Location: calculadora.php");

                } else {

                        header("Location: erro.php");

                }
        }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mercaria do S. João</title>
        <link href="css/index.css" rel="stylesheet" media="screen">
        <link rel="icon" href="css/img/quitanda-nobg.png">
</head>

<body>
        <br>
        <br>
        <br>
        <form method="post" action="index.php">
                <h1>Autenticação</h1>

                <label for="CPF">Login:</label>
                <input type="text" id="CPF" name="CPF" maxlength="11" size="40" required>

                <br>
                <br>
                <br>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" size="40" required>

                <br>
                <br>
                <br>
                <br>

                <input type="submit" value="Entrar" class="botao" href="calculadora.php">

                <br>
                <br>
                <br>
                <div class="cpf">
                        Não possui um cadstro?
                        <a href="mercregistrar.php">
                                Registre-se aqui
                        </a>
                </div>
        </form>

<<<<<<< HEAD
=======
        <?php

       if (isset($_POST["CPF"]) && isset($_POST["senha"])) {
                $cpf = "perino123";
                $senha = "perino123";
                
                if (isset($_POST["CPF"]) && isset($_POST["senha"])) {

                        if ($_POST["CPF"] == "perino123" && $_POST["senha"] == "perino123") {

                                session_start();
                                $_SESSION["CPF"] = $_POST["CPF"];
                                header("Location: calculadora.php");
        
                        } else {
        
                                header("Location: erro.php");
        
                        }
                }       
        }
        ?>

>>>>>>> 3eed686d958f2b85e159e6dea226ecab963213d4
</body>

</html>
