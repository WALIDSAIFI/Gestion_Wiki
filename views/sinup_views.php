<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="mb-0">Register</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mb-3">
                            <label for="prenom">Prénom:</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Enter votre Prénom"  onsubmit="return validateForm()">
                        </div>
                        <span id="First_err" class="text-danger small"></span>

                        <div class="form-group mb-3">
                            <label for="nom">Nom:</label>
                            <input type="text" name="nom" class="form-control" id="nom" placeholder="Enter votre Nom">
                        </div>

                        <span id="last_err" class="text-danger small"></span>

                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter votre email">
                        </div>
                        <span id="email_err" class="text-danger small"></span>

                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter votre password">
                        </div>
                        <span id="password_err" class="text-danger small"></span>

                        <button type="button" id="signup" name="signup" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">Already have an account? <a href="index.php?page=login" class="text-primary">Login</a></p>
                </div>
            </div>
        </div>
    </div>