<?php

class Tag
{
    private $id;
    private $name;

    public function __construct($id) {
        global $db;
        $sql = "SELECT * FROM tags WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $tag = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $tag['id'];
        $this->name = $tag['name'];
    }

    static public function ajouter_tag($titre){
        global $db;
            $sql = "INSERT INTO tags(name) VALUES (:titre)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
            $stmt->execute();
            
    }


}
