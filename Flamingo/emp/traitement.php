<?php 
function ajouter($id_user,$jour,$title,$start,$end) {

$bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
$req=$bdd->prepare("INSERT INTO emploi1(title,start,end,day,id_user)  VALUES('$title','$start','$end','$jour','$id_user')");
    $req->execute();

}
function verification($hd,$hf,$jour,$user) {
	$bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
	$req=$bdd->prepare("SELECT start,end FROM emploi1 WHERE (id_user='$user' AND day ='$jour') ");
	$req->execute();
	$condition='true';
	while (($ligne=$req->fetch()) AND ($condition=='true')) {
		if (($hd>=$ligne['start']) AND ($hd<$ligne['start'])) {$condition='false';}
		if (($hf>$ligne['start']) AND ($hf<=$ligne['end'])) {$condition='false';}
		if (($hd<=$ligne['start']) AND ($hf>$ligne['start'])) {$condition='false';}
		if (($hd<$ligne['end']) AND ($hf>=$ligne['end'])) {$condition='false';}
	}
 return $condition;
}
function verification1($hd,$hf,$jour,$id) {
    $bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
    $req=$bdd->prepare("SELECT start,end FROM emploi1 WHERE ( day ='$jour' and id != '$id') ");
    $req->execute();
    $condition='true';
    while (($ligne=$req->fetch()) AND ($condition=='true')) {
        if (($hd>=$ligne['start']) AND ($hd<$ligne['start'])) {$condition='false';}
        if (($hf>$ligne['start']) AND ($hf<=$ligne['end'])) {$condition='false';}
        if (($hd<=$ligne['start']) AND ($hf>$ligne['start'])) {$condition='false';}
        if (($hd<$ligne['end']) AND ($hf>=$ligne['end'])) {$condition='false';}
    }
    return $condition;
}
 ?>
