<?php 
$bdd = new PDO('mysql:host=localhost;dbname=flamingo;charset=utf8', 'root', '');
$id_user = $_COOKIE['ID'] ;


if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['pwd'])) {

	$nom = htmlspecialchars($_POST['nom'] );
    $prenom = htmlspecialchars($_POST['prenom']) ;
  
    $tel = htmlspecialchars($_POST['tel']);
    $pwd = sha1($_POST['pwd']) ;

    $sql = $bdd->prepare("SELECT pwd FROM utilisateur WHERE id_user ='$id_user' ") ;
    $sql->execute();
    $user = $sql->fetch();

   $MotDePasse = $user['pwd'];
   if($MotDePasse != $pwd) {
   	die('ERREUR');
   }
   
	$sql = "UPDATE utilisateur SET nom = '$nom', prenom = '$prenom', tel= '$tel' , pwd = '$pwd' WHERE id_user = '$id_user' ";

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

}




?>