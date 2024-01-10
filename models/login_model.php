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

      $_SESSION['role'] =$user['role'];
      $_SESSION['id'] = $user['id'];
      $_SESSION['email'] = $user['email'];

      
      if($user['role'] == 'admin'){
      header("http://localhost/WALID_SAIFI_Wiki/index.php?page=dashdord");
      }else{
          header("http://localhost/WALID_SAIFI_Wiki/index.php?page=home");
      }

    echo json_encode(["success" => "User registered successfully"]);
    exit;

}

