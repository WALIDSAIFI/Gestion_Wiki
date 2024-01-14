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

<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Mes Wiki  </h1>
                <p class="lead text-muted">Bienvenue sur notre Wiki, une encyclopédie collaborative en français. Découvrez des informations passionnantes sur une variété de sujets, partagées et éditées par notre communauté. Explorez, apprenez et contribuez!</p>

                </div>

            </div>
    </section>




















    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">







                <?php



                foreach ($latestWiki as $article) {
                    ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em" text-anchor="middle" dominant-baseline="middle"><?php echo $article['title']; ?></text>
                            </svg>

                            <div class="card-body">
                                <h5 class="card-title"><?php echo "Auteur : " . $article['first_name']; ?></h5>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="index.php?page=deswiki&id=<?php echo $article['id']; ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                        <a href="index.php?page=meswiki&id=<?php echo $article['id']; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>

                                    </div>
                                    <small class="text-muted"><?php echo $article['create_at']; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>









</main>

<footer class="text-muted py-5">

</footer>