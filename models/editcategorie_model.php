<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $cat = Categorie::get_categorie($id);
}

if(isset($_POST['modifier'])){
    $id=$_GET['id'];
    $name = $_POST['cat'];
    Categorie::update_catigo($id,$name);
    header("Location: http://localhost/WALID_SAIFI_Wiki/index.php?page=dashboard");



}