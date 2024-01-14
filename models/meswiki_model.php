<?php
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php?page=home");
    exit();
}
if(isset($_GET['id'])){

    $id = $_GET['id'];

    wiki::deleteWikiById($id);
    header("Location: index.php?page=meswiki");

}
$id=$_SESSION['id'];



$latestWiki = wiki::getWik_User($id);
