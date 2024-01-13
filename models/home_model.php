<?php
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php?page=home");
    exit();
}

if(isset($_POST['ajouter_wiki'])){
    $id_user= $_SESSION['id'];
    $titre = $_POST['titre'];
    $content = $_POST['content'];
    $selectedTags = $_POST['selectedTags'];
    $category = $_POST['category'];
    $selectedTags = explode(',', $selectedTags);

    $errors = [
        "titre" => Validation::validatetitre($titre),
        "content" => Validation::validateContent($content),
    ];

    if (array_filter($errors)) {

        echo json_encode(["errors" => $errors]);

        exit;
    }

    $id_article=wiki::ajouterArticle($titre,$content,$id_user,$category);
    foreach ($selectedTags as $id_Tag) {
        global $db;
        $sql = "INSERT INTO articles_tags (id_article, id_tag) VALUES (:id_article, :id_tag)";
        $stm = $db->prepare($sql);
        $stm->bindParam(':id_article', $id_article, PDO::PARAM_INT);
        $stm->bindParam(':id_tag', $id_Tag, PDO::PARAM_INT);
        $stm->execute();
    }



}

$latestWiki = wiki::getTheLatestWiki();
