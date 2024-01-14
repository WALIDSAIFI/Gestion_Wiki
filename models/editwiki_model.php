<?php
if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $wiki = wiki::get_Wiki_pour_edit($id);
   // dd($wiki);

}
if(isset($_POST['editWiki'])){
    $id = $_GET['id'];
    $titre = $_POST['title'];
    $content = $_POST['content'];
    $tag = $_POST['tags'];
    $categoier = $_POST['category'];


    if (!is_array($tag)) {
        $tag = [$tag];
    }

    wiki::updateArticle($id, $titre, $content, $categoier, $tag);

    header("Location: index.php?page=meswiki");
}
