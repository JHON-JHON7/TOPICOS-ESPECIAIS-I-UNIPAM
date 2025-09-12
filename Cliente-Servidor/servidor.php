<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    echo "Olá, ". $nome . "<br>" . "Seu e-mail é: " . $email ."<br>";

} else if ($_SERVER["REQUEST_METHOD"] === "GET"){
    
    $nome = $_GET["nome"];
    $email = $_GET["email"];

    if ((!empty($_GET["nome"]) && !empty($_GET["email"]))) {
        echo $nome . "<br>" . $email;
    } else {
        echo "Nome ou email vazio";
    }

}