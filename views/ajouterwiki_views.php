<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter un Wiki</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                    <label for="titre" class="col-form-label">Titre:</label>
                    <input type="text" class="form-control" id="titre" name="titre">
                </div>

                <div class="mb-3">
                    <label for="content" class="col-form-label">Le contenu de Wiki:</label>
                    <textarea class="form-control" id="content" name="content"></textarea>
                </div>

                <div class="mb-3">
                    <label for="selectMultipleTags" class="col-form-label">Ajouter les tags:</label>
                    <select multiple class="form-select" id="selectMultipleTags" name="selectMultipleTags">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="selectCategory" class="col-form-label">Ajouter la catégorie de Wiki:</label>
                    <select class="form-select" id="selectCategory" name="selectCategory">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" id="ajouter" name="ajouter" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
