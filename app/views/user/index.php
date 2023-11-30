<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
        <h2><?= $translation->t("users") ?></h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col"><?= $translation->t("id") ?></th>
              <th scope="col"><?= $translation->t("user") ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['users'] as $user) { ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['name'] ?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
