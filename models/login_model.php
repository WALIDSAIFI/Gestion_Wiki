<?php
global $db;
if (isset($_POST["login"]) && $_POST["login"] == "login") {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $errors = [
        "email_err" => Validation::validateEmail($email),
        "password_err" => Validation::validatePassword($password),
    ];
    if (array_filter($errors)) {
        echo json_encode(["errors" => $errors]);
        exit;
    }


     $user = user::login($password,$email);
     if($user) {
         $_SESSION['role'] = $user['role'];
         $_SESSION['id'] = $user['id'];
         $_SESSION['email'] = $user['email'];


         if ($user['role'] == 'author') {

             echo json_encode(["redirect" => "index.php?page=home"]);
             exit;
         } else {

             echo json_encode(["redirect" => "index.php?page=dashboard"]);
             exit;
         }
     }

    //echo json_encode(["success" => "User regist successfully"]);
   // exit;

}

