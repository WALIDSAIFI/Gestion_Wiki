<?php
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php?page=home");
    exit();
}
$id=$_SESSION['id'];



$latestWiki = wiki::getWik_User($id);
