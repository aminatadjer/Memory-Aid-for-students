<?php 
   require'bdd.php';
   require('index1.php');
   $sql = "SELECT *  FROM  utilisateur Where id_user='".$_COOKIE['ID']."' ";

$req = $bdd->prepare($sql);
$req->execute();
$users = $req->fetch();
   $mail='ga_tadjer@esi.dz';
   $nom='amina';
   $id_user=$_COOKIE['ID'];
   function notif($id_event,$alarme,$id_user,$message){
   	$vu='0';
   	 $bdd1= new PDO('mysql:host=localhost;dbname=flamingo','root','');
    $res=$bdd1->prepare("INSERT INTO notif(id_event,alarme,message,id_user,vu) VALUES ('$id_event','$alarme','$message','$id_user','$vu') ");
    $res->execute();
   }
     $query="SELECT * FROM events ";
     $result=$bdd->prepare($query);
     $result->execute();
    
     while($row=$result->fetch()){
     	$dateH=explode(" ",$row['AlarmeH']);
       	$dateJ=explode(" ",$row['AlarmeJ']);
     	$dateS=explode(" ",$row['AlarmeS']);
     	
     	if($dateH[0]==date('Y-m-d'))
     	{  
           $verif=explode(":",$dateH[1]);
           if ($verif[2]=="00")
           {
             	$heure=$verif[0].':'.$verif[1];
            	if ($heure==date('H:i'))

           	    {$nouv=$dateH[0].' '.$verif[0].':'.$verif[1].':01';
           	    echo $nouv;
           	     $result1=$bdd->prepare("UPDATE events SET AlarmeH='$nouv' WHERE  id = '".$row["id"]."'");
                 $result1->execute();
                 $msg=$row['title'];
                 notif($row['id'],$row['start'],$row['id_user'],$msg);
                 $khrus=$bdd->prepare("SELECT *  FROM  utilisateur Where id_user='".$_row['id_user']."' ");
                 $requs = $bdd->prepare($khrus);
$requs->execute();
$user = $requs->fetch();

                  sendmail($user['mail'],$nom,'Ceci est un rappel de: <br> '.$msg.'<br> <b> Date et heure début de la tache/evenement: </b>'.$row['start']);
           	
            	 }
          	}
     	}

     	if($dateJ[0]==date('Y-m-d'))
     	{  
           $verif=explode(":",$dateJ[1]);
           if ($verif[2]=="00")
           {
             	$heure=$verif[0].':'.$verif[1];
            	if ($heure==date('H:i'))

           	    {$nouv=$dateJ[0].' '.$verif[0].':'.$verif[1].':01';
           	    echo $nouv;
           	     $result1=$bdd->prepare("UPDATE events SET AlarmeJ='$nouv' WHERE  id = '".$row["id"]."'");
                 $result1->execute();
                 $msg=$row['title'];
                 notif($row['id'],$row['start'],$row['id_user'],$msg);
                    $khrus=$bdd->prepare("SELECT *  FROM  utilisateur Where id_user='".$_row['id_user']."' ");
                 $requs = $bdd->prepare($khrus);
$requs->execute();
$user = $requs->fetch();

                  sendmail($user['mail'],$nom,'Ceci est un rappel de: <br> '.$msg.'<br> <b> Date et heure début de la tache/evenement: </b>'.$row['start']);
            
           	
            	 }
          	}
     	}

     	if($dateS[0]==date('Y-m-d'))
     	{  
           $verif=explode(":",$dateS[1]);
           if ($verif[2]=="00")
           {
             	$heure=$verif[0].':'.$verif[1];
            	if ($heure==date('H:i'))

           	    {$nouv=$dateS[0].' '.$verif[0].':'.$verif[1].':01';
           	    echo $nouv;
           	     $result1=$bdd->prepare("UPDATE events SET AlarmeS='$nouv' WHERE  id = '".$row["id"]."'");
                 $result1->execute();
                 $msg=$row['title'];
                 notif($row['id'],$row['start'],$row['id_user'],$msg);
                   $khrus=$bdd->prepare("SELECT *  FROM  utilisateur Where id_user='".$_row['id_user']."' ");
                 $requs = $bdd->prepare($khrus);
$requs->execute();
$user = $requs->fetch();

                  sendmail($user['mail'],$nom,'Ceci est un rappel de: <br> '.$msg.'<br> <b> Date et heure début de la tache/evenement: </b>'.$row['start']);
            
            	 }
          	}
     	}



     }
  

    
 ?>