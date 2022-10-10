<?php
    $title = "Home";
    require('partials/header.php')
?>
<h1>Home</h1>

<p>
     ToDoList : <a class="hyperlink" href=<?= urlencode("tasks"); ?>>Tâches</a>
     <br>
     <br>
     Connexion : <a class="hyperlink" href=<?= urlencode("signin"); ?>>Connexion</a>
     <br>
     <br>
     Création de compte : <a class="hyperlink" href=<?= urlencode("create"); ?>>Création de compte</a>
     <br>
</p>

<?php require('partials/footer.php') ?>
