
<?php

$bdd= new PDO('mysql:host=localhost;dbname=flamingo','root','');

if (isset($_POST['connexion']) && isset($_POST['email']) && isset($_POST['password']))
{
    $mail= htmlspecialchars(trim($_POST['email']));
    //$pwd=($_POST['pwd']);
    $pwd=sha1($_POST['password']);
    $erreur[]='';
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $reqmail=$bdd->prepare("SELECT * FROM utilisateur WHERE  mail='$mail'");
        $reqmail->execute();

        if ($reqmail->rowCount()== 0)  // si le mail n'existe pas
        {
            $erreur['email'] ='Adresse mail inexistante!' ;
        }

        else
        {

            $reqpwd=$bdd->prepare("SELECT * FROM utilisateur WHERE mail='$mail' AND pwd='$pwd'");
            $reqpwd->execute();
            $id= $reqpwd->fetch();
            if ($reqpwd->rowCount()== 0) // si le mot de pass est incorrect
            {
                $erreur['password'] ='Mot de passe incorrect!' ;

            }
            else {
                setCookie('ID',$id['id_user'],time()+3600*24*365);
                setCookie('nom',$id['prenom'],time()+3600*24*365);
                header('Location:pro.php');
                exit();

            }

        }
    }
    else
    {
        if(!array_key_exists('email',$_POST)||$_POST['email']=='')
        {
            $erreur['email']=" champ obligatoire !!!";
        }

        if(!array_key_exists('password',$_POST)||$_POST['password']=='')
        {
            $erreur['password']=" champ obligatoire !!!";
        }
    }

}
if (!empty($erreur)) {
    $_SESSION['inputs'] = $_POST;
    $_SESSION['erreurs'] = $erreur;
}
?>
