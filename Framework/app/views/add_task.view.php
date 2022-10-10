<?php
    $title = "Add New Task";
    require('partials/header.php')
?>
<!-- Add task form -->
<h1>Ajout d'une nouvelle tâche</h1>
<main>
    <p>
        Ce formulaire permet d'ajouter une tâche
    </p>
    <form action=<?= urlencode("add_task"); ?> method="post">
      <input type="text" name="description" required>
      <input type="checkbox" name="completed">
      <input type="date" name="deadline">
      <input type="submit" value="Ajout">
    </form>
</main>
<?php require('partials/footer.php') ?>
