<?php
if(isset($_GET['id'])){

    $id=$_GET['id'];
    $tag = Tag::get_tag($id);
}




if(isset($_POST['modifier'])){

    $id=$_GET['id'];
    $name = $_POST['titre'];
   Tag::update_tag($id,$name);

    header("Location: index.php?page=dashbord");

}

$nbrCat=Categorie::getNombreCategories();
$nbrTag = Tag::getNombreTags();
$nbruser = user::getNombreUtilisateurs();
$nbrwiki  = Wiki::getNombreWiki();