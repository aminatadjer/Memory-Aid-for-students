<?php

require_once('bdd.php');
$id_user = $_COOKIE['ID'];

if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM events WHERE id = $id AND id_user='$id_user' ";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}
elseif (isset($_POST['title']) && isset($_POST['datedebut']) && isset($_POST['hourdebut'])  && isset($_POST['id']) && isset($_POST['Pr']) &&  isset($_POST['faite']) && isset($_POST['choix']))
{
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$starts = $_POST['datedebut'].' '.$_POST['hourdebut'];
	$end = $starts ;
	$lieu = '';
	$color = "#40E0D0";
	$designation = "";
	$priorite = $_POST['Pr'] ;
	if (isset($_POST['lieu']))
	      $lieu = $_POST['lieu']; 
	if ($_POST['choix'] == '0' && isset($_POST['hourfin'])){
		
 if ($priorite==1)
      	$color="#ABEBC6";
       elseif ($priorite==2)
       {
       	$color="#F8C471";
       }
       else
       {
       	$color="#F1948A";
       }

	$end = $_POST['datedebut'].' '.$_POST['hourfin'] ;
	$designation = $_POST['designation'];
     }

	$priorite = $_POST['Pr'];
	$faite =  $_POST['faite'] ;

                 $start = new DateTime($starts);

 	 		 	if($_POST['Alarmeh']!="0"){
 	 		 		$halarm = $start->modify('-'.$_POST['Alarmeh'].'hours');
 	 		 		$halarme = $halarm->format('Y-m-d H:i:s');
 	 		 		
 	 		 		
 	 		 	}else  		$halarme = '0000-00-00 00:00:00';

 	 		 	    $start = new DateTime($starts);

                if($_POST['Alarmej'] !="0"){
 	 		 		$jalarm = $start->modify('-'.$_POST['Alarmej'].'days');

 	 		 		$jalarme = $jalarm->format('Y-m-d H:i:s');
 	 		 		
         
 	 		 		
 	 		 	} else     $jalarme = '0000-00-00 00:00:00';
 	 		 	    $start = new DateTime($starts);

 	 		 	
 	 		 	if ($_POST['AlarmeS']!="0"){
 	 		 		$salarm = $start->modify('-'.$_POST['AlarmeS'].'weeks');
 	 		 		$salarme = $salarm->format('Y-m-d H:i:s');
 	 		 		

 	 		 	}
 	 		 	else		$salarme = '0000-00-00 00:00:00';
 	 		 	    $start = new DateTime($starts);


 	 		 	


	
$sql = "UPDATE events SET title = '$title', color = '$color', start = '$starts', AlarmeH= '$halarme',AlarmeJ='$jalarme',AlarmeS='$salarme',priority= '$priorite', end = '$end', faite='$faite' ,lieu ='$lieu' ,designation='$designation' WHERE id = $id AND id_user='$id_user' ";

	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: ../pro.php');

	
?>
