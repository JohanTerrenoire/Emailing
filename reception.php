<h2>Boîte de réception</h2>
<?php
  session_start();
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
    $req = $bdd->prepare('SELECT * FROM mailbox WHERE destinataire = :dest');//Preparer la requête
    $req->bindParam(':dest', $destinataire);//Attribuer le paramètre item
    $destinataire = $_SESSION['pseudo'];//Définir la valeur du paramètre item
    $req->execute();//Exécuter la requête
    echo "<ul>";
    foreach ($req as $row) {
      echo "<li>".$row['objet']." - ".$row['message']." - De : ".$row['expediteur']."</li>";
    }
    echo "</ul>";
  }
  catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  echo "<a href='accueil.html'><input type='button' value='Déconnexion'/></a>";
 ?>
