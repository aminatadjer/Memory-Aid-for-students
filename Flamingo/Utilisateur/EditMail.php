<?php 

$id_user= $_COOKIE['ID'];
$bdd = new PDO('mysql:host=localhost;dbname=flamingo;charset=utf8', 'root', '');
/*
$sql = "SELECT *  FROM  Utilisateur Where id_user='$id_user' ";

$req = $bdd->prepare($sql);
$req->execute();
$users = $req->fetch();*/






//verifier le mail est existant 


if (isset($_POST['newmail'])  ) {

	$newmail = $_POST['newmail'] ;


$sql = "SELECT mail  FROM  Utilisateur Where mail='$newmail'";

$req = $bdd->prepare($sql);
$req->execute();

$exist = $req->rowCount();

if($exist > 0){ 
	die('Compte existant deja') ;
}

	//verifier si sont format est adapté 
else{
	//si format adapté die('ok') sinon die('format non adapté') ;
	if (filter_var($newmail, FILTER_VALIDATE_EMAIL)) {
    
} else {
    die ('Cet email a un format non adapté.');
}
}

}

if (isset($_POST['pwd']))  {
	//si le mot de passe est compatible alors changer sinon ne pas changer ;

    $sql = "SELECT * FROM  Utilisateur Where id_user='$id_user'";

$req = $bdd->prepare($sql);
$req->execute();
$select = $req->fetch();
$pwd = $select['pwd'] ;

if($pwd != sha1($_POST['pwd'])){
	die('Mot de passe incorrecte') ;
}

	
}

if(isset($_POST['pwd']) && isset($_POST['newmail'])){
	$mail = $_POST['newmail'] ;

	$sql = "UPDATE utilisateur SET mail='$mail' WHERE id_user = '$id_user' ";

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