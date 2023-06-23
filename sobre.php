<!DOCTYPE html>
<html>

<head>
    <link href="css/sobre.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercaria do S. João</title>
    <link rel="icon" href="css/img/quitanda-nobg.png">
    <title>Sobre o Projeto desenvolvido pelos alunos do curso de Análise e Desenvolvimento de Sistemas do SENAI Ourinhos
    </title>
</head>

<body>
    <a href="calculadora.php">
        <input type="button" value="Sair" class="sair">
    </a>
    <form>
        <h1>Projeto desenvolvido por alunos do curso de Análise e Desenvolvimento de Sistemas do SENAI Ourinhos
        </h1>
        <p>Este projeto foi desenvolvido por cinco alunos do curso de Análise e Desenvolvimento de Sistemas do
            SENAI
            Ourinhos:</p>
        <form>
            <ul>
                <li>Felipe Matheus Torini</li>
                <li>Guilherme Perino Feitosa</li>
                <li>Matheus Boletti Fortes</li>
                <li>Pedro Altafini Camargo</li>
                <li>Pedro Lucca dos Santos Silva</li>
            </ul>
            <p>Para entrar em contato:</p>
            <ul>
                <li>Email: <a href="mailto:felipetorini023@gmail.com">felipetorini023@gmail.com</a></li>
                <li>Telefone: <a href="tel:+5514998164177">+55 (14) 99816-4177</a></li>
            </ul>
</body>

</html>

<?php
session_start();

if (!isset($_SESSION["CPF"])) {
    header("location:index.php");
}

?>