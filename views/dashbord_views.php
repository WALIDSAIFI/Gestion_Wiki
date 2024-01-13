<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Gestion des Wiki</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="btn btn-danger px-3" href="#">Déconnexion</a>
        </div>

    </div>
</header>

<div class="container-fluid">
    <div class="row  w-35 p-5">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse pl-3">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#tag" data-bs-whatever="@mdo">Ajouter un Tag</button>
                    </li>
                    <li class="nav-item mb-2">
                        <!-- Ajoutez ici votre deuxième élément de navigation ou laissez vide si nécessaire -->
                    </li>
                    <li class="nav-item mb-2">
                        <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#categories" data-bs-whatever="@mdo">Ajouter une Catégorie</button>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                          Liste des Wiki
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                           List des Utilisateur
                        </a>
                    </li>
                </ul>
            </div>
        </nav>




        <div class="modal fade" id="tag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Titre:</label>
                                <input type="text" class="form-control" id="titre" name="titre">
                            </div>
                            <span id="titre_err" class="text-danger small"></span>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="ajouter" name="ajouter" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>




        <div class="modal fade" id="categories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un categories</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">nom de categories:</label>
                                <input type="text" class="form-control" id="nom_categories" name="nom_categories">
                            </div>
                            <span id="categories_err" class="text-danger small"></span>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="ajouter_categories" name="ajouter_categories" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>














        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                    </div>
                </div>
            </div>





            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card text-dark bg-warning">
                            <div class="card-body">
                                <i class="fas fa-tags fa-2x"></i>
                                <h5 class="card-title">Nombre de Tags</h5>
                                <p class="card-text"><?php echo $nbrTag;   ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card text-dark bg-warning">
                            <div class="card-body">
                                <i class="fas fa-folder fa-2x"></i>
                                <h5 class="card-title">Nombre de Catégories</h5>
                                <p class="card-text"><?php echo $nbrCat; ?></p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card text-dark bg-warning">
                            <div class="card-body">
                                <i class="fas fa-book fa-2x"></i>
                                <h5 class="card-title">Nombre de Wikis</h5>
                                <p class="card-text"><?php echo$nbrwiki; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card text-dark bg-warning">
                            <div class="card-body">
                                <i class="fas fa-users fa-2x"></i>
                                <h5 class="card-title">Nombre d'Utilisateurs</h5>
                                <p class="card-text"><?php echo $nbruser; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <div class="container mt-4">
                <div class="row">
                    <!-- Div pour les cartes d'informations -->
                    <div class="col-md-4 mb-3">
                        <div class="card text-dark bg-warning">
                            <div class="card-body">
                                <i class="fas fa-tags fa-2x"></i>
                                <h5 class="card-title">Tags</h5>
                                <div class="table-responsive">
                                    <?php

                                    $allTags = Tag::getAll_tag();
                                    ?>

                                    <table class="table">
                                        <thead>
                                        <tr>

                                            <th scope="col">Tag Name</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>
                                        <?php foreach ($allTags as $tag) : ?>
                                            <tr>

                                                <td><?= $tag['name']; ?></td>
                                                <td class="d-flex justify-content-between">
                                                    <a href="index.php?page=dashbord&id=<?= $tag['id']; ?>" class="btn btn-danger">Supprimer</a>
                                                    <a href="index.php?page=edittag&id=<?= $tag['id']; ?>" class="btn btn-primary">Éditer</a>



                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Div pour les catégories -->
                    <div class="col-md-8 mb-3">
                        <div class="card text-dark bg-warning">
                            <div class="card-body">
                                <i class="fas fa-folder fa-2x"></i>
                                <h5 class="card-title">Catégories</h5>
                                <div class="table-responsive">
                                    <?php
                                    // Include your database connection and Categorie class definition here

                                    // Fetch all categories
                                    $allCategories = Categorie::getAll_categorie();
                                    ?>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nom de Catégorie</th>
                                            <th scope="col">Date de Création</th>
                                            <th scope="col">Date de Modification</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($allCategories as $category) : ?>
                                            <tr>
                                                <td><?= $category['name']; ?></td>
                                                <td><?= $category['create_at']; ?></td>
                                                <td><?= $category['edit_at']; ?></td>
                                                <td class="d-flex justify-content-between">
                                                    <a href="index.php?page=dashbord&id_cat=<?= $category['id']; ?>" class="btn btn-danger">Supprimer</a>
                                                    <a href="index.php?page=editCategorie&id=<?= $category['id']; ?>" class="btn btn-primary">Éditer</a>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="card text-white bg-dark">
                    <div class="card-body">
                        <i class="fas fa-folder fa-2x"></i>
                        <h5 class="card-title">Wiki</h5>
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Contenu</th>
                                    <th scope="col">Auteur</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($articles as $article) : ?>
                                    <tr>
                                        <td><?= $article['title']; ?></td>
                                        <td><?= addLineBreaks($article['content']); ?></td>
                                        <td><?= $article['first_name'] . ' ' . $article['last_name']; ?></td>
                                        <td class="d-flex justify-content-between">
                                            <a href="index.php?page=dashbord&id=<?= $article['id']; ?>" class="btn btn-primary">Archiver</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php
                            function addLineBreaks($content)
                            {
                                $contentWithBreaks = wordwrap($content, 50, "<br>\n", true);
                                return $contentWithBreaks;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>






        </main>
