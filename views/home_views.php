<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=home">Home</a>
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
                <h1 class="fw-light">Wiki - Wikipédia </h1>
                <p class="lead text-muted">Bienvenue sur notre Wiki, une encyclopédie collaborative en français. Découvrez des informations passionnantes sur une variété de sujets, partagées et éditées par notre communauté. Explorez, apprenez et contribuez!</p>
                <p>
                    <?php
                    if(isset($_SESSION['email'])) {
                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ajouter un Wiki</button>';


                        echo '<a href="index.php?page=meswiki" class="btn btn-secondary my-2">Modifier mes Wiki</a>';
                    }
                    ?>
                </p>
                <div class="container">
                    <select class="form-select mb-3" aria-label="Default select example"  id="search-type">
                        <option selected>Choix de recherche </option>
                        <option value="title">Recherche par titre</option>
                        <option value="tag">Recherche par tag</option>
                    </select>

                    <form class="d-flex">
                        <input class="form-control me-2" type="search"   id="search-input" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="button" id="search-btn">Search</button>
                    </form>
                </div>

            </div>




            <div class="h-screen" id="search-results-container"></div>

            <script>
                const searchInput = document.getElementById("search-input");
                const resultsContainer = document.getElementById("search-results-container");
                const searchType = document.getElementById("search-type");

                searchInput.addEventListener("input", () => {
                    console.log(searchType.value);
                    if (searchInput.value !== "") {
                        getSearchedResults();
                    } else {
                        resultsContainer.innerHTML = "";
                    }
                });

                function getSearchedResults() {
                    resultsContainer.innerHTML = "";
                    $.get(
                        "index.php?page=home&" + searchType.value + "=true&input_value=" + searchInput.value,
                        (data) => {
                            let searchedData = JSON.parse(data);

                            searchedData.forEach((item) => {
                                console.log(item);
                                resultsContainer.innerHTML += `<div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em" text-anchor="middle" dominant-baseline="middle">${item.title}</text>
                            </svg>

                            <div class="card-body">
                                <h5 class="card-title">${item.first_name}</h5>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="index.php?page=deswiki&id=${item.id}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>`;
                            });
                        }
                    );
                }
            </script>




    </section>





















    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un Wiki</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Titre:</label>
                            <input type="text" class="form-control" id="titre" name="titre">
                        </div>
                        <span id="titre_err" class="text-danger small"></span>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Le contenu de Wiki:</label>
                            <textarea class="form-control" id="content" name="content"></textarea>
                        </div>
                        <span id="content_err" class="text-danger small"></span>
                        <div class="mb-3">
                            <label for="selectMultiple" class="col-form-label">Ajouter les tags:</label>
                            <select multiple class="form-select" id="tags" name="tags[]">
                                <?php

                                $allTags = Tag::getAll_tag();

                                foreach ($allTags as $tag) {
                                    echo "<option value='" . $tag['id'] . "'>" . $tag['name'] . "</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="category" class="col-form-label">Ajouter la catégorie de Wiki : </label>
                            <select class="form-select" id="category" name="category">
                                <?php

                                $allCategories = Categorie::getAll_categorie();


                                foreach ($allCategories as $category) {
                                    echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                                }
                                ?>
                            </select>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="ajouter_wiki" name="ajouter_wiki" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>













    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">





            <!--    <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Wiki</text></svg>

                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div> -->


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
                                        <a href="index.php?page=deswiki&id=<?php echo $article['id_article']; ?>" class="btn btn-sm btn-outline-secondary">View</a>

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