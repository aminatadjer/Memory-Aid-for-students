<?php
     
     // Connexion à la base de données
     require_once('bdd.php');
     //echo $_POST['title'];
     $title = $_POST['designation'];
     $req=$bdd->prepare("SELECT designation FROM activite where id_user='".$_COOKIE['ID']."' AND  designation ='$title'");
     $req->execute();
     $compte=$req->rowCount();
     if ($compte==0)
     {
     if (isset($_POST['designation']) && isset($_POST['type']) ){
          
          $title = $_POST['designation'];
          $start = $_POST['type'];
          $id_user=$_COOKIE['ID'];
          $sql = "INSERT INTO activite(designation,type,id_user) values ('$title', '$start','$id_user')";
          //$req = $bdd->prepare($sql);
          //$req->execute();
          
          echo $sql;
          
          $query = $bdd->prepare( $sql );
          if ($query == false) {
               print_r($bdd->errorInfo());
               die ('Erreur prepare');
          }
          $sth = $query->execute();
          if ($sth == false) {
               print_r($query->errorInfo());
               die ('Erreur execute');
          }
          
     }
     }
     
     header('Location: '.$_SERVER['HTTP_REFERER']);


?>
