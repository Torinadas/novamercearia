<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="css/img/quitanda-nobg.png">
    <title>Calculadora</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/calculadora.css">
    <!--Booststrap JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</head>

<?php
session_start();

if (!isset($_SESSION["CPF"])) {
    header("location:index.php");
}
?>

<body>
    <!--Começo Barra de navegação-->
    <nav class="navbar col-12 m-auto navbar-expand-lg navbar-dark bg-dark position-fixed">
        <a class="navbar-brand" style="color: white;">Mercearia do S.João</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
            aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <!--Começo Dropdown-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Navegar
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Sair</a>
                        <a class="dropdown-item" href="sobre.php" target="_blank">Sobre</a>
                    </div>
                </li>
                <!--Fim Dropdown-->
            </ul>
        </div>
    </nav>
    <!--Fim Barra de navegação-->
    <br>
    <br>
    <br>
    <br>
    <div class="calculator">
        <div class="input" id="input"></div>
        <div class="buttons">
            <div class="operators">
                <div>+</div>
                <div>-</div>
                <div>&times;</div>
                <div>&divide;</div>
            </div>
            <div class="leftPanel">
                <div class="numbers">
                    <div>7</div>
                    <div>8</div>
                    <div>9</div>
                </div>
                <div class="numbers">
                    <div>4</div>
                    <div>5</div>
                    <div>6</div>
                </div>
                <div class="numbers">
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                </div>
                <div class="numbers">
                    <div>0</div>
                    <div>.</div>
                    <div id="clear">C</div>
                </div>
            </div>
            <div class="equal" id="result">=</div>
        </div>
    </div>


</body>
<script>
    "use strict";

    var input = document.getElementById('input'), // input/output button
        number = document.querySelectorAll('.numbers div'), // number buttons
        operator = document.querySelectorAll('.operators div'), // operator buttons
        result = document.getElementById('result'), // equal button
        clear = document.getElementById('clear'), // clear button
        resultDisplayed = false; // flag to keep an eye on what output is displayed

    // adding click handlers to number buttons
    for (var i = 0; i < number.length; i++) {
        number[i].addEventListener("click", function (e) {

            // storing current input string and its last character in variables - used later
            var currentString = input.innerHTML;
            var lastChar = currentString[currentString.length - 1];

            // if result is not diplayed, just keep adding
            if (resultDisplayed === false) {
                input.innerHTML += e.target.innerHTML;
            } else if (resultDisplayed === true && lastChar === "+" || lastChar === "-" || lastChar === "×" || lastChar === "÷") {
                // if result is currently displayed and user pressed an operator
                // we need to keep on adding to the string for next operation
                resultDisplayed = false;
                input.innerHTML += e.target.innerHTML;
            } else {
                // if result is currently displayed and user pressed a number
                // we need clear the input string and add the new input to start the new opration
                resultDisplayed = false;
                input.innerHTML = "";
                input.innerHTML += e.target.innerHTML;
            }

        });
    }

    // adding click handlers to number buttons
    for (var i = 0; i < operator.length; i++) {
        operator[i].addEventListener("click", function (e) {

            // storing current input string and its last character in variables - used later
            var currentString = input.innerHTML;
            var lastChar = currentString[currentString.length - 1];

            // if last character entered is an operator, replace it with the currently pressed one
            if (lastChar === "+" || lastChar === "-" || lastChar === "×" || lastChar === "÷") {
                var newString = currentString.substring(0, currentString.length - 1) + e.target.innerHTML;
                input.innerHTML = newString;
            } else if (currentString.length == 0) {
                // if first key pressed is an opearator, don't do anything
                console.log("enter a number first");
            } else {
                // else just add the operator pressed to the input
                input.innerHTML += e.target.innerHTML;
            }

        });
    }

    // on click of 'equal' button
    result.addEventListener("click", function () {

        // this is the string that we will be processing eg. -10+26+33-56*34/23
        var inputString = input.innerHTML;

        // forming an array of numbers. eg for above string it will be: numbers = ["10", "26", "33", "56", "34", "23"]
        var numbers = inputString.split(/\+|\-|\×|\÷/g);

        // forming an array of operators. for above string it will be: operators = ["+", "+", "-", "*", "/"]
        // first we replace all the numbers and dot with empty string and then split
        var operators = inputString.replace(/[0-9]|\./g, "").split("");

        console.log(inputString);
        console.log(operators);
        console.log(numbers);
        console.log("----------------------------");

        // now we are looping through the array and doing one operation at a time.
        // first divide, then multiply, then subtraction and then addition
        // as we move we are alterning the original numbers and operators array
        // the final element remaining in the array will be the output

        var divide = operators.indexOf("÷");
        while (divide != -1) {
            numbers.splice(divide, 2, numbers[divide] / numbers[divide + 1]);
            operators.splice(divide, 1);
            divide = operators.indexOf("÷");
        }

        var multiply = operators.indexOf("×");
        while (multiply != -1) {
            numbers.splice(multiply, 2, numbers[multiply] * numbers[multiply + 1]);
            operators.splice(multiply, 1);
            multiply = operators.indexOf("×");
        }

        var subtract = operators.indexOf("-");
        while (subtract != -1) {
            numbers.splice(subtract, 2, numbers[subtract] - numbers[subtract + 1]);
            operators.splice(subtract, 1);
            subtract = operators.indexOf("-");
        }

        var add = operators.indexOf("+");
        while (add != -1) {
            // using parseFloat is necessary, otherwise it will result in string concatenation :)
            numbers.splice(add, 2, parseFloat(numbers[add]) + parseFloat(numbers[add + 1]));
            operators.splice(add, 1);
            add = operators.indexOf("+");
        }

        input.innerHTML = numbers[0]; // displaying the output

        resultDisplayed = true; // turning flag if result is displayed
    });

    // clearing the input on press of clear
    clear.addEventListener("click", function () {
        input.innerHTML = "";
    })
</script>

</html>