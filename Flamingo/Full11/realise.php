<?php 
require_once('bdd.php');

$id_user=$_COOKIE['ID'];

if (isset($_POST['id']) ) {
$num= '1';
$id=$_POST['id'];
$sql = "UPDATE events SET  Faite='$num' WHERE id = '$id'  ";

	$query = $bdd->prepare( $sql );
	$query->execute();

}

if (isset($_POST['nid']) ) {
$num= '0';
$id=$_POST['nid'];
$sql = "UPDATE events SET  Faite='$num' WHERE id = '$id'  ";

	$query = $bdd->prepare( $sql );
	$query->execute();

}


if (isset($_POST['idfaite'])) {

	$id = $_POST['idfaite'] ;

$sql = "SELECT * FROM events Where id=$id ";

$req = $bdd->prepare($sql);
$req->execute();
$tache = $req->fetch();

if($tache['Faite'] =='1')
die('1'); 
else die('0') ;


}

?>