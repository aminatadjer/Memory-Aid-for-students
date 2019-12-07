<?php
function ContactExist($id_user,$tel)
{

    try
    {
        $bdd=new PDO('mysql:hos=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $requete = $bdd->prepare("SELECT * FROM  contacts WHERE  id_user='$id_user' and numero ='$tel'");
    $requete->execute();
    $result=$requete->rowCount();
    if ($result == 0)
    {
        return "" ;
    }
    else
    {
        return 'Contact Existant';
    }

}
if (isset($_POST['numero'])) {
    $numero = $_POST['numero'];
    $id_user = 2;
        $retour = ContactExist($id_user, $numero);
        echo $retour;

}
if(isset($_POST['numero'])){
    if (!preg_match("#^0(5[-. ]?5|5[-. ]?6|5[-. ]?4|6[-. ]?6|6[-. ]?5|6[-. ]?7|7[-. ]?7|7[-. ]?8|7[-. ]?9)[0-9][-. ]?([0-9]{2}[-. ]?){3}$#",$numero)){
        echo 'Ce numéro a un format non adapté';
    }
    else echo "";
}
if(isset($_POST['mail'])){
    $mail = $_POST['mail'];
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo "";
    } else {
        echo "Cet email a un format non adapté";
    }
}