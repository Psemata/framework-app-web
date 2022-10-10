<?php
    $title = "Affichage des tâches";
    require("partials/header.php");
?>
    <!-- Tasks display -->
    <h1>Mes tâches</h1>
    <div class="flex-container">
      <div>ID</div>
      <div>Description</div>
      <div>Completée</div>
      <div>Deadline</div>
    </div>
      <?php
      foreach ($data[1] as $task) {
      	echo $task->display();
      }
      ?>
    <br>

    <!-- Erase and update forms -->
    <?php
      if(isset($_GET['id']) && $_SESSION['rights'] == true){
        echo "<input class=\"modifForm\" onclick=\"showForm()\" value=\"Modifier la tâche\" type=\"submit\"></input>";
        echo "<input class=\"deleteTask\" onclick=\"deleteTask()\" value=\"Supprimer la tâche\" type=\"submit\"></input>";
      }
    ?>
    <div id="removeTask" style="display:none">
      <form action=<?= urlencode("erase_task")?> method="post">
        <h1>Voulez vous vraiment supprimer cette tâche ?</h1>
        <input class="deleteTask" type="submit" value="Oui"></input>
      </form>
      <input class="deleteTask" type="submit" onclick="dontDelete()" value="Non"></input>
    </div>

    <form id="changeTask" action=<?= urlencode("update_task")?> method="post" style="display:none">
      <input type="text" name="description" required></input>
      <input type="checkbox" name="completed" value=0></input>
      <input type="date" name="deadline"></input>
      <input type="submit" value="Valider la modification de la tâche"></input>
    </form>
<br>

<?php
  require("partials/footer.php");
?>
