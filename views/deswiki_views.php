<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
        </div>
        <?php
        if (empty($_SESSION['email'])) {
            echo '<a href="index.php?page=login" class="btn btn-danger ml-auto">Login</a>';
        } else {
            echo '<form action="index.php?page=home" method="post">';
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
          </svg>';
            echo '<span>' . $_SESSION['email'] . '</span>';
            echo '<button type="submit"  name="logout" class="btn btn-danger ml-auto">Déconnexion</button>';
            echo '</form>';
        }
        ?>


    </div>
</nav>

<?php
// Supposons que vous avez déjà inclus votre fichier contenant la définition de la fonction et la configuration de la base de données.

// Récupérer l'ID depuis la requête GET
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Vérifier si l'ID est présent
if ($id) {
    // Appeler la fonction pour récupérer les données de l'article
    $article = wiki::get_Wiki($id);

    // Vérifier si l'article existe
    if ($article) {
        ?>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h1 class="card-title"><?php echo $article['title']; ?></h1>
                            <p class="card-text">
                                Date de création: <?php echo date('F j, Y', strtotime($article['create_at'])); ?><br>
                                Catégorie: <?php echo $article['id_category']; ?>
                            </p>
                            <h2 class="card-text"><?php echo $article['content']; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    } else {

        echo "Article non trouvé.";
    }
} else {

    echo "ID d'article non spécifié.";
}
?>



