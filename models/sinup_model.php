<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['registre']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email'])) {

        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        user::register($prenom,$nom,$email,$password);

    }
}
