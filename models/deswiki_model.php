<?php
if(isset($_GET['id']) ){
    $id =$_GET['id'];
    $article = wiki::get_Wiki($id);
 //   print_r($article);
    $catgoier = wiki::getCategoryDetails($id);
    $tags = wiki::getTagsDetails($id);

}