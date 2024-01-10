<?php
global $db;
if (isset($_POST["login"]) && $_POST["login"] == "login") {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $errors = [
        "email_err" => Validation::validateEmail($email),
        "password_err" => Validation::validatePassword($password),
    ];

}

