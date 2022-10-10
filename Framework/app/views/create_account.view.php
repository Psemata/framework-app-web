<?php
    $title = "Se connecter";
    require('partials/header.php')
?>
<h1>Créer un compte</h1>

<!-- Account creation form -->
<main>
  <form action=<?= urlencode("create"); ?> method="post">
    <label for="name">Entrez votre nom :</label>
    <input type="text" id="name" name="name" placeholder="Jean">
    <br>

    <label for="firstname">Entrez votre prénom :</label>
    <input type="text" id="firstname" name="firstname" placeholder="Dupont">
    <br>

    <label for="pseudo">Entrez votre pseudonyme :</label>
    <input type="text" id="pseudo" name="pseudo" placeholder="Xxx_Jean_xxX">
    <br>

    <label for="admin">Administrateur :</label>
    <input type="checkbox" id="admin" name="admin" value=1>
    <br>

    <label for="email">Entrez votre adresse email :</label>
    <input type="email" id="email" name="email" placeholder="exemple@xyz.ch">
    <br>

    <label for="pwd">Entrez votre mot de passe : </label>
    <input type="password" id="password" name="password">
    <br>

    <label for="pwd">Réentrez votre mot de passe : </label>
    <input type="password" id="password" name="password">
    <br>

    <input type="submit" value="Valider">
  </form>
</main>
<br>
<br>
Si vous avez déjà un compte : <a href=<?= urlencode("signin"); ?> >Connectez-vous</a

<?php require('partials/footer.php') ?>
