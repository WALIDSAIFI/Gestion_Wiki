<?php
if(isset($_GET['id'])){

    $id=$_GET['id'];
    $tag = Tag::get_tag($id);

}
if(isset($_POST['modifier'])){

    $id=$_GET['id'];
   $name = $_POST['titre'];
   Tag::update_tag($id,$name);

    header("Location: http://localhost/WALID_SAIFI_Wiki/index.php?page=dashboard");



}