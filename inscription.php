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
    //Préparation de la requête et exécution
    $req = $bdd->prepare('INSERT INTO utilisateurs(id, pseudo) VALUES(:id, :pseudo)');//Preparer la requête
    $req->bindParam(':id', $idbdd);//Attribuer le paramètre ID
    $req->bindParam(':pseudo', $ajoutbdd);//Attribuer le paramètre item
    $idbdd = 'null';//Définir la valeur du paramètre ID
    $ajoutbdd = $_POST['pseudo'];//Définir la valeur du paramètre item
    $req->execute();//Exécuter la requête
    echo "<h4>Inscription réussie !</h4>";
    echo "<meta http-equiv='refresh' content='1;URL=accueil.html'>";
  }
  catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
?>
