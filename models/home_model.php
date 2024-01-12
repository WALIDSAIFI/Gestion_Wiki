<?php
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php?page=home");
    exit();
}

if(isset($_POST['ajouter_wiki'])){

    $titre = $_POST['titre'];
    $content = $_POST['content'];
    $selectedTags = $_POST['selectedTags'];
    $category = $_POST['category'];

    $errors = [
        "titre" => Validation::validatetitre($titre),
        "content" => Validation::validateContent($content),
    ];


    if (array_filter($errors)) {

        echo json_encode(["errors" => $errors]);

        exit;
    }
}
