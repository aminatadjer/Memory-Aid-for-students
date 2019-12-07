<?php

$id_user=$_COOKIE['ID'];
require_once('bdd.php');


if(isset($_POST['title'])&& isset($_POST['start'])   && isset($_POST['starthour'])  && isset($_POST['Alarmeh']) && isset($_POST['Alarmej']) && isset($_POST['AlarmeS']) && isset($_POST['Pr']) && isset($_POST['choix'])){
	//si c'est une tache
    $choix = $_POST['choix'] ;
	$title = htmlspecialchars( $_POST['title']);	 
	$starts = $_POST['start'].' '.$_POST['starthour'];
 
	$priorite = $_POST['Pr'];
    $jalarmevalue = $_POST['Alarmej']  ;
    $halarmevalue = $_POST['Alarmeh'] ;
    $salarmevalue = $_POST['AlarmeS'] ;
    $faite = '0' ;
    $designation = " " ;
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

 if($choix =='0' && isset($_POST['endhour']) && isset($_POST['designation'])){
	
	$end =  $_POST['start'].' '.$_POST['endhour'] ;
	$lieu  ='';

	$designation = $_POST['designation'] ; 
         
	}
	elseif ($choix=='1' && isset($_POST['lieu'])){
		$lieu = htmlspecialchars($_POST ['lieu']);
		$end = $_POST['start'].' '.$_POST['starthour'];
		$color = "#40E0D0";
	}

                $start = new DateTime($starts);
               
 	 		 	if($_POST['Alarmeh']!="0"){
 	 		 		$halarm = $start->modify('-'.$_POST['Alarmeh'].'hours');
 	 		 		$halarme = $halarm->format('Y-m-d H:i:s');
 	 		 		
 	 		 		
 	 		 	} else $halarme = '0000-00-00 00:00:00';

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
$starts1 = $starts.':00';
$end1= $end.':00';


	$sql = "INSERT INTO events(TE,title, start, end , color, AlarmeH , AlarmeJ,AlarmeS,priority, Lieu , AlarmeHvalue , AlarmeJvalue , AlarmeSvalue ,faite , designation , id_user  ) values ('$choix','$title','$starts1', '$end1','$color','$halarme','$jalarme','$salarme','$priorite','$lieu','$halarmevalue','$jalarmevalue','$salarmevalue' ,'$faite','$designation' ,'$id_user')";
	

	
	echo $sql;
	
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
//avoir l'id de la tache
     $que= $bdd->prepare("SELECT * FROM events WHERE id_user='$id_user'");
     $que->execute();
     while ($rep = $que->fetch()) {
          $id_tache = $rep['id'];
          
     }
     
     if($_FILES['doc']['error']==UPLOAD_ERR_NO_FILE) // tester si y a pas de fichiers
     {
          $nofile=1;
     }
     else{
          
          $nomdoc = "document";
          if (!empty($_POST['nomdoc'])) {
               $nomdoc = $_POST['nomdoc'];
          }
          
          $file = $_FILES['doc'];
          $file_name = $file['name'];
          $file_tmp = $file['tmp_name'];
          $file_size = $file['size'];
          $taille=$file_size;
             $date=date('Y-m-d');
          
          $file_ext = explode('.', $file_name);
          $file_ext = strtolower(end($file_ext));
          
          
          $file_name_new = uniqid('', true) . '.' . $file_ext;
          
          $file_destination = '../Uploadfile/' . $file_name_new;
          $fiile='Uploadfile/' . $file_name_new;
          
          
          $f = move_uploaded_file($file_tmp, $file_destination);
          
          $sql1 = "INSERT INTO document(designation,emplacement,id,id_user,taille,date) values ('$nomdoc', '$fiile','$id_tache','$id_user','$taille','$date')";
          
          
          $query1 = $bdd->prepare($sql1);
          $query1->execute();
          
     }

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	

