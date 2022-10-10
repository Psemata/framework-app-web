# FrameworkAppWeb

Small exercise of the creation of a small web application framework

## Framework password
Mot de passe :
1234

## Answer to a quizz given by our teacher
Est-ce une bonne idée de mettre dans git un fichier pouvant contenir des mots de passe comme config-production.php ?

À cette question j'ai deux réponses :
- Si la base de données est hébergée dans un serveur public et facile d'accès, un fichier de configuration est hors de question.
  En effet, rien qu'en regardant dans le dépot git, tous les accès seront mis à disposition et ainsi la sécurité de l'application et de la base de données
  est gravement compromise.
  
- Si la base de données est local (localhost : 127.0.0.1), ce genre de fichier ne pose pas vraiment problème. 
  Sauf si la machine hébergeant l'application se fait attaquée.