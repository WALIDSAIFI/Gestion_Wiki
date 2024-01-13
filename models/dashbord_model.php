<?php
global $db;
if (isset($_POST["ajouter"])){
    $titre = $_POST["titre"];

    $errors = [
        "titre" => Validation::validateTag($titre),

    ];


    if (array_filter($errors)) {

        echo json_encode(["errors" => $errors]);

        exit;
    }
     tag::ajouter_tag($titre);
    echo json_encode(["success" => "Tag ajouté avec succès."]);
    exit;
}

if (isset($_POST['ajouter_categories'])){
    $categories = $_POST['nom_categories'];

    $errors = [
        "categories" => Validation::validateCategories($categories),

    ];
    if (array_filter($errors)) {

        echo json_encode(["errors" => $errors]);

        exit;

    }
     Categorie::ajouterCategorie($categories);

    echo json_encode(["success" => " categories ajouté avec succès."]);

    exit;
}


if(isset($_GET['id'])){
    $id=$_GET['id'];
    tag::delete_tag($id);
}
if(isset($_GET['id_cat'])){
    $id=$_GET['id_cat'];
    Categorie::deletcatgo($id);
}

$nbrCat=Categorie::getNombreCategories();
$nbrTag = Tag::getNombreTags();
$nbruser = user::getNombreUtilisateurs();
$nbrwiki  = Wiki::getNombreWiki();
$articles = wiki::getAllWiki();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    wiki::softDeleteArticle($id);

}

