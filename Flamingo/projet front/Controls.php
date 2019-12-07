<?php
require ('model.php');
 $erreur = [];
 if (isset($_POST['nom']) && $_POST['prenom']
     && $_POST['mail'] && $_POST['tel'] && $_POST['pwd'] && $_POST['pwdConfirm']){
     if ( !empty($_POST['nom']) &&  !empty($_POST['prenom']) &&  !empty($_POST['tel'])&&  !empty($_POST['mail'])
         &&  !empty($_POST['pwd']) &&  !empty($_POST['pwdConfirm'])){
         $nom=htmlspecialchars(trim($_POST['nom']));
         $prenom=htmlspecialchars(trim($_POST['prenom']));
         $tel=htmlspecialchars(trim($_POST['tel']));
         $mail=htmlspecialchars(trim($_POST['mail']));
         $pwd=sha1( htmlspecialchars(trim($_POST['pwd'])));
         $pwdConfirm=sha1(htmlspecialchars(trim($_POST['pwdConfirm'])));
         if (!filter_var($mail,FILTER_VALIDATE_EMAIL))
         {
             $erreur['mail']='mail invalide';

         }
         if (strlen ($pwd ) < 8)
         {
             $erreur['pwd']='Mot de passe Très petit';

         }
         if ( $pwd != $pwdConfirm)
         {
             $erreur['pwd']='Mots de passe Incompatibles';

         }
         if ( userExistTel($tel)== 'true')
         {
             $erreur['tel']='Numéro existant';
         }
         if ( userExistMail($mail) == 'true')
         {
             $erreur['mail']='Mail existant';
         }
         if (!isset($erreur['mail']) && !isset($erreur['tel']) && !isset($erreur['pwd']) )
         {
             insererUser($nom,$prenom,$mail,$tel,$pwd);
         }
     }
     else
     {
         if ( empty($_POST['nom']))
         {
             $erreur['nom']='Champs obligatoire';
         }
         if ( empty($_POST['prenom']))
         {
             $erreur['prenom']='Champs obligatoire';
         }
         if ( empty($_POST['tel']))
         {
             $erreur['tel']='Champs obligatoire';
         }
         if ( empty($_POST['mail']))
         {
             $erreur['mail']='Champs obligatoire';
         }
         if ( empty($_POST['pwd']))
         {
             $erreur['pwd']='Champs obligatoire';
         }
         if ( empty($_POST['pwdConfirm']))
         {
             $erreur['pwdConfirm']='Champs obligatoire';
         }
     }
 }
header('Location: '.$_SERVER['HTTP_REFERER']);