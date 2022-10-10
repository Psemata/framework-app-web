<?php
    $title = "Home";
    require('partials/header.php')
?>
<h1>Se connecter</h1>

<main>
  <!-- Connection form -->
  <form action=<?= urlencode("signin")?> method="post">
      <label for="email">Entrez votre adresse email :</label>
      <input type="email" id="email" name="email" placeholder="exemple@xyz.ch">
      <br>

      <label for="pwd">Mot de passe : </label>
      <input type="password" id="password" name="password">
      <br>

      <input type="submit" value="Valider">
  </form>
  <br>
  <br>
  Si vous n'avez pas de compte : <a href=<?= urlencode("create")?>>Crées-en un</a>
</main>

<?php require('partials/footer.php') ?>
