<?php
function userExistTel( $tel)
{
    try
    {
        $bdd=new PDO('mysql:hos=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $requete=$bdd->prepare("SELECT * FROM utilisateur WHERE tel='$tel' ");
    $res=$requete->rowCount();
    if ($res == 0)
    {
        return 'false';
    }
    else
    {
        return'true';
    }
}
function userExistMail( $mail)
{
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
        return 'false';
    }
    else
    {
        return'true';
    }
}
function insererUser($nom,$prenom,$mail,$tel,$pwd)
{
    try
    {
        $bdd=new PDO('mysql:hos=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $pic= 'Uploadfile/5ae875dd5710d0.27039320.png';

    $requete=$bdd->prepare("INSERT INTO utilisateur(nom,prenom,mail,tel,pwd,Photo) VALUES ('$nom','$prenom','$mail','$tel','$pwd','$pic')");
    $requete->execute();
}
?>