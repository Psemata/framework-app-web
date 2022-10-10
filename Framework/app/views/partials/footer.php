  </body>
  <!-- Buttons in the footer part -->
  <?php
    if(isset($_SESSION['user'])){
  ?>
        <footer class="footer">
        <?php
        if(strpos($_SERVER['REQUEST_URI'], "add_task") === false){
        ?>
              <a class="hyperlink" href="add_task">Ajout de tâches</a>
        <?php
        }
        ?>
        <a class="hyperlink" href="index">Menu principal - Hub</a>
        <?php
        if(isset($_SESSION['user'])){
        ?>
            <a class="hyperlink" href="disconnect">Déconnexion</a>
        <?php
        }
        ?>
        </footer>
  <?php
    }
  ?>
</html>
