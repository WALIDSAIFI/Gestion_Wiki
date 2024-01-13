<?php
if(isset($_GET['id']) ){
    $id =$_GET['id'];
    $article = wiki::get_Wiki($id);
}