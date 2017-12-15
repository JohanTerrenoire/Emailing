<?php
  try {
    //Connexion à la base de données.
    $user = 'usermail';//L'utilisateur pour se connecter
    $mdp = 'passmail';//Son mot de passe
    $machine = 'localhost';//Adresse de la machine où est stockée la base
    $basename = 'email';//Nom de la base de données
    $bdd = new PDO('mysql:host='.$machine.';dbname='.$basename.';charset=utf8', $user, $mdp);
  } catch (Exception $e) {
    //En cas d'erreur d'ouverture de la base, afficher les erreurs.
    die('Erreur : ' . $e->getMessage());
  }
  try {
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = :user');//Préparer la requête
    $req->bindParam('user', $_POST['pseudo']);
    $req->execute();
  }
  catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  if($row = $req->fetch()){//Si la requête renvoie quelque chose, l'utilisateur existe
    echo "<h3>Bienvenue</h3>";
    echo "<meta http-equiv='refresh' content='1;URL=reception.php'>";
  }else {
    echo "<h3>L'utilisateur n'existe pas !</h3>";
    echo "<meta http-equiv='refresh' content='1;URL=accueil.html'>";
  }
 ?>
