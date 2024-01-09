<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['registre'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        user::register($username,$email,$password);
    }
}
