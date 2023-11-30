<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center"><?= $translation->t("login") ?></h3>
                </div>
                <div class="card-body">
                    <?= $data['failed_login'] ? '<div class="alert alert-danger">'. $translation->t("error_valid_login") . '</div>' : false ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="username"><?= $translation->t("username") ?> :</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><?= $translation->t("password") ?> :</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"><?= $translation->t("login") ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
