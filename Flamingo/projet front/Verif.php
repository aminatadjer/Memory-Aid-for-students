<?php

if (isset($_POST['tel'])){
   $tel = $_POST['tel'];
    try
    {
        $bdd=new PDO('mysql:hos=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $requete=$bdd->prepare("SELECT * FROM utilisateur WHERE tel='$tel' ");
    $requete->execute();
    $res=$requete->rowCount();

    if ($res == 0)
    {
        echo '';
    }
    else
    {
        echo 'Numero Existant';
    }
}
if ( isset($_POST['mail'])){

    $mail = $_POST['mail'];
    try
    {
        $bdd=new PDO('mysql:hos=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $requete= $bdd->prepare("SELECT * FROM utilisateur WHERE mail='$mail'");
    $requete->execute();
    $res=$requete->rowCount();
    if ($res == 0)
    {
        echo '';
    }
    else
    {
        echo'Mail existant';
    }
}
?>