<?php 

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=flamingo;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$date=new Datetime ('now');
$interval = new DateInterval('PT60M');
$date->sub($interval);


/****************************taches  non faite***********************************/
$req1=$bdd->prepare ("SELECT  *from events WHERE Faite='0' AND id_user='".$_COOKIE['ID']."'");/*taches non faites*/
$req1->execute();

$i=0;
$j=0;
$k=0;
$non_faites=0;
$en_attentes=0;
$taches_en_cours=0;
$taches_non_faites=[];
$taches_en_attente=[];
$taches_en_cours=[];
while ($ligne=$req1->fetch())
{
$end =new Datetime($ligne['end']);
$start=new Datetime($ligne['start']);
if ($end<=$date)
	{ 
      $taches_non_faites[$i]=$ligne['title'];

     $i++;
	}
	if ($start>$date)
	{
	$taches_en_attente[$j]=$ligne['title'];
	$j++;
	}
	if ($end>$date && $start<=$date)
	{
	$taches_en_cours[$k]=$ligne['title'];	
	$k++;
	}
	
}

  $non_faites=count($taches_non_faites);
  
/*****************************taches faites ***************************************/
$req2=$bdd->prepare ("SELECT  *from events WHERE Faite='1' AND id_user='".$_COOKIE['ID']."'");/*taches non faites*/
$req2->execute();
 $non_faites=count($taches_non_faites);
 $en_attentes=count($taches_en_attente);
 $faites=$req2->rowCount();
 $taches_en_cours=count($taches_en_cours);
$total=$faites+$non_faites+$en_attentes+$taches_en_cours;

 ?>






