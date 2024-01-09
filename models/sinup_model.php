<?php

if (isset($_POST["req"]) && $_POST["req"] == "signup") {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $errors = [
        "firstName_err" => Validation::validateUsername($prenom),
        "lastName_err" => Validation::validateUsername($nom),
        "email_err" => Validation::validateEmail($email),
        "password_err" => Validation::validatePassword($password),
        "userexists_err" => Validation::userChecker($email, $db),
    ];

    if (array_filter($errors)) {

        echo json_encode(["errors" => $errors]);

        exit;
    }
    
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    user::register($prenom,$nom,$email,$password);
    echo json_encode(["success" => "User registered successfully"]);
    exit;
}

 