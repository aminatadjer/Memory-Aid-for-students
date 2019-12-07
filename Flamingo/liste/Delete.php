<?php
if (isset($_POST['id'])){
  $id = $_POST['id'];
    $id_user = $_COOKIE['ID'];
   try
    {
        $bdd=new PDO('mysql:hos=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $requete = $bdd->prepare("DELETE FROM events  WHERE id = '$id' and id_user = '$id_user' ");
    $requete->execute();

}
