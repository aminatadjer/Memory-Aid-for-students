<?php
if (isset($_POST['array'])){
    $done = $_POST['array']['faite'];
    $id = $_POST['array']['id'];
    try
    {
        $bdd=new PDO('mysql:hos=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $requete = $bdd->prepare("UPDATE events SET Faite ='$done' WHERE id = '$id' ");
    $requete->execute();

}
