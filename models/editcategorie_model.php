<?php



$nbrCat=Categorie::getNombreCategories();
$nbrTag = Tag::getNombreTags();
$nbruser = user::getNombreUtilisateurs();
$nbrwiki  = Wiki::getNombreWiki();



$id = $_GET['id_cat'];
$cat = Categorie::get_categorie($id);


if (isset($_POST['modifier_cat'])) {
    $name = $_POST['cat'];


    Categorie::update_categorie($id, $name);

    header("Location: index.php?page=dashbord");
}

