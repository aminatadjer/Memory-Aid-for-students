<?php
require ('projet front/model.php');
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
        echo 'Mail inexistant';
    }
    else
    {
        echo'';
    }
}

if (isset($_POST['data'][0]) && isset($_POST['data'][1])){
    $mail = $_POST['data'][0];
    $pwd = sha1($_POST['data'][1]);
    try
    {
        $bdd=new PDO('mysql:hos=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $reqpwd=$bdd->prepare("SELECT * FROM utilisateur WHERE mail='$mail' AND pwd='$pwd'");
    $reqpwd->execute();
    $id= $reqpwd->fetch();
    if ($reqpwd->rowCount()== 0) // si le mot de pass est incorrect
    {
        echo 'Mot de passe incorrect!' ;

    }
    else {

        echo '';
    }

}

?>