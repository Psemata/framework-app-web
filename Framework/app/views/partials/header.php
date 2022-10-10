<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlentities($title) ?></title>
    <link rel="stylesheet" href="app/views/stylesheet/stylesheet.css">
    <script type="text/javascript" src="app/views/javascript/script.js"></script>
    <?php
    if($data != [] && is_numeric($data[0])){
      //Login error
      if($data[0] == 1){
        $str = "Ce compte n'existe pas ou vous vous êtes trompé dans l'écriture de votre mot de passe ou de votre adresse email";
        echo "<div class=\"error\">";
        echo htmlentities($str);
        echo "</div>";
      // Create account error
      }else if($data[0] == 2){
        $str = "Cet email est déjà existant";
        echo "<div class=\"error\">";
        echo htmlentities($str);
        echo "</div>";
      } else if($data[0] == 3){
        $str = "Vous n'avez pas les droits pour consulter cette tâche";
        echo "<div class=\"error\">";
        echo htmlentities($str);
        echo "</div>";
      }
    }
    ?>
  </head>
  <body>
