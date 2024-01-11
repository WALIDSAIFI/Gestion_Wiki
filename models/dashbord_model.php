<?php
global $db;
if (isset($_POST["ajouter"])){
    $titre = $_POST["titre"];

    $errors = [
        "titre" => Validation::validateUsername($titre),

    ];


    if (array_filter($errors)) {

        echo json_encode(["errors" => $errors]);

        exit;
    }
     tag::ajouter_tag($titre);
    echo json_encode(["success" => "Tag ajouté avec succès."]);
    exit;
}

