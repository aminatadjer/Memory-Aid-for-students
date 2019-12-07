<?php 
require("traitement.php");

$user=2;
$erreur=[];
if (isset($_POST['title'])  && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['day'])){
	$module=htmlspecialchars(trim($_POST['title']));
	$hd=htmlspecialchars(trim($_POST['start']));
	$hf=htmlspecialchars(trim($_POST['end']));
	$jour=htmlspecialchars(trim($_POST['day']));

  //**************** Si les champs ne sont pas vides ********************//
	if (!empty($_POST['title']) && !empty($_POST['start']) && !empty($_POST['end']) && !empty($_POST['day']) )
 {
	if (strlen($module)>30)
	 {
	 	$erreur['module']='Nom de module trop long, veuillez le réduire';
	 }
	 if ($hd<$hf)
	 {
	 $cond=verification($hd,$hf,$jour,$user);
	 if ($cond=='false') 
	 {
        $erreur['heure']='veuillez consuler votre emploi du temps et entrer un intervalle cohérent';
	 }
	 }
	 else 
	 {
	 	$erreur['heure']='Heure debut inferieure ou égale à heure fin';
	 }
     if ($_POST['day']==0) {
     	$erreur['jour']="Veuillez choisir le jour";
     }

  }
    if (empty($erreur)) { ajouter($user,$jour,$module,$hd,$hf);}
 /*else
   {

    if (empty($_POST['title'])) {$erreur['module']='Champ obligatoire';}
  	if (empty($_POST['start'])) {$erreur['heure']='Champ obligatoire';}
    if (empty($_POST['end'])) {$erreur['heure']='Champ obligatoire';}
   }
   }


  /* else {
   	        $_SESSION['inputs'] = $_POST;
	        $_SESSION['erreur'] = $erreur;
	      
        }
  */

}
header('Location: '.$_SERVER['HTTP_REFERER']);
 ?>