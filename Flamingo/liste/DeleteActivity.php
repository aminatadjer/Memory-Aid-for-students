<?php
if (isset($_POST['id'])){
    $id_user = $_COOKIE['ID'];
    try
    {
        $bdd=new PDO('mysql:hos=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $id = $_POST['id'];
    $requete = $bdd->prepare("SELECT * FROM activite  WHERE id_activite = '$id' AND id_user ='$id_user' ");
    $requete->execute();
    $ligne = $requete->fetch();
    $designation = $ligne['designation'];
    $requete = $bdd->prepare("DELETE FROM events  WHERE id_activite = '$id' AND id_user = '$id_user'");
    $requete->execute();
    $requete = $bdd->prepare("DELETE FROM activite  WHERE designation = '$designation' AND id_user = '$id_user'");
    $requete->execute();
}