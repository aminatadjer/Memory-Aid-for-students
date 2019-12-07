<?php 
$id_user= $_COOKIE['ID'];
$bdd = new PDO('mysql:host=localhost;dbname=flamingo;charset=utf8', 'root', '');

$sql = "SELECT *  FROM  Utilisateur Where id_user='$id_user' ";

$req = $bdd->prepare($sql);
$req->execute();
$users = $req->fetch();


$pwd = $users['pwd'] ;


if (isset($_POST['ancpwd']) && isset($_POST['newpwd']) && isset($_POST['confpwd'])   ){

$ancpwd = sha1($_POST['ancpwd']);
$newpwd = sha1($_POST['newpwd']);
$confpwd = sha1($_POST['confpwd']);

if($ancpwd == $pwd){
 if($newpwd == $confpwd) // les deux mots de passes sont identiques
{

	$sql = "UPDATE utilisateur SET  pwd = '$newpwd' WHERE id_user = '$id_user' ";

	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	} else die('OK') ;

} else die('Confirmez votre mot de passe');



}
else die('Mot de passe incorrecte');




}





?>