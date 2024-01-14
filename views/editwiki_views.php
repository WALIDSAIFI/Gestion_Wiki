<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="mb-0">Edit Wiki</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group mb-3">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="titre de wiki" value="<?= $wiki['title'] ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="content">Content:</label>
                            <textarea name="content" class="form-control" id="content" placeholder="content" rows="5" required><?= $wiki['content'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="selectMultiple" class="col-form-label">Ajouter les tags:</label>
                            <select multiple class="form-select" id="tags" name="tags[]  required">
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
                            <select class="form-select" id="category" name="category" required>
                                <?php
                                $allCategories = Categorie::getAll_categorie();
                                foreach ($allCategories as $category) {
                                    echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit"  name="editWiki" class="btn btn-primary btn-block">Update Wiki</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <!-- Add a link to go back to the home page or wherever you want -->
                    <p class="mb-0"><a href="index.php?page=home" class="text-primary">Home</a></p>
                </div>
            </div>
        </div>
    </div>
</div>