<?php 
 function ajouter_pp($id_user,$hd,$hf,$module,$title,$color) /*insertion dans la base de donné sans aucune verification*/
{
$bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
$req=$bdd->prepare("INSERT INTO emp (id_user,hd,hf,module,title,color) VALUES('$id_user','$hd','$hf','$module','$title','$color')");
$req->execute();
}
 function verification_pp($dd,$df,$id_user)/*verifer s'il ya pas chevauchement*/
 {
  $bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
  $req=$bdd->prepare("SELECT hd,hf FROM emp where (id_user='$id_user')");
  $req->execute();
  $debut=new DateTime($dd);
  $fin=new DateTime($df);
  $condition='true';
  while (($ligne=$req->fetch()) AND ($condition=='true')) 
  {
      $debut1=new DateTime($ligne['hd']);
      $fin1=new DateTime($ligne['hf']);
      $c=$debut1->diff($debut);
      $c1=$c->invert;
      $b=$fin1->diff($debut);
      $b1=$b->invert;
      if ($c1==0 AND $b1==1){$condition='false';}
      $c=$fin->diff($fin1);
      $c1=$c->invert;
      $b=$fin->diff($debut1);
      $b1=$b->invert;
      if ($c1==0 AND $b1==1){$condition='false';}
      $c=$debut->diff($debut1);
      $c1=$c->invert;
      $b=$fin->diff($debut1);
      $b1=$b->invert;
      if ($c1==0 AND $b1==1){$condition='false';}
       $c=$fin1->diff($fin);
      $c1=$c->invert;
      $b=$fin1->diff($debut);
      $b1=$b->invert;
      if ($c1==0 AND $b1==1){$condition='false';}
    }
 return ($condition);
 }
 function transf_to_day($jour)/*la fonction de php qui renvoie la date est en anglais on la transforme en francais */
 {
   if ($jour=="Fri"){ $chaine="vendredi";}
   if ($jour=="Sat"){ $chaine="samedi";}
   if ($jour=="Sun"){ $chaine="dimanche";}
   if ($jour=="Mon"){ $chaine="lundi";}
   if ($jour=="Tue"){ $chaine="mardi";}
   if ($jour=="Wed"){ $chaine="mercredi";}
   if ($jour=="Thu"){ $chaine="jeudi";}
   return $chaine;

 }

 function verif_week($date,$week)/*les jours de weekends sont supposés entrés dans un tableau*/
 {
 $i=0;
 $condition='true';
 $d=new DateTime($date);
 $day=$d->format('D');
 $jour=transf_to_day($day);
 while(($i<count($week)) AND ($condition=='true'))
 {
  
  if (strtolower($week[$i])==$jour){$condition='false';}
  $i++;
 }
return $condition;

 }
 
 /************************************************************************************************/
 $week= array ("samedi","vendredi");


$id_user=2;

 
if (isset($_POST['type']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST ['title']))
{
$type=htmlspecialchars(trim($_POST['type']));
$start=htmlspecialchars(trim($_POST['start']));
$end=htmlspecialchars(trim($_POST['end']));
$title=htmlspecialchars(trim($_POST['title']));

switch ($type) {
	case 'Vacances':
		$color ="#40E0D0";
		break;
	    case 'Examens':
		$color = "#FF0000";
		break;
		case 'Cour/Td/Tp':
		$color = "#008000";
		break;
	default;
		break;
}
//**************** Si les champs ne sont pas vides ********************//
	if (!empty($_POST['type']) && !empty($_POST['start']) && !empty($_POST['end']) && !empty($_POST['title'])) 
 {


	 //***** verification du champ programme*********//
	
	 if (strlen($title)>30)
	 {
  
	    $erreur['title']='Nom de titre trop long, veuillez le réduire';	
	 }
    
     $debut=new DateTime($start);
     $fin=new DateTime($end);
     $c=$debut->diff($fin);
     $c1=$c->invert;
     if ($c1==0)
	 {
        $c=verif_week($start,$week);
        if ($c=='false')
        {
        	die ('la journée correspendante a cette date debut est un weekend');
          //$erreur['date']='la journée correspendante a cette daye est un weekend';
        }
        else{
        $c=verif_week($end,$week);
      
        if ($c=='false')
        {
          die ('la journée correspendante a cette date fin est un weekend');
    
        }
        else
        {
	    $cond=verification_pp($start,$end,$id_user);
	    if ($cond=='false') 
	    {
        die ('veuillez consulter votre planning pedagogique et entrer un intervalle cohérent');
       
	    }
        }
        }
     }
	   else 
	   {
        die('Date debut inferieure ou égale à date fin');
	 	  
	   }
   }
   

   
  
  else
   {  //*******  un champ est vide ************//

   
    if (empty($_POST['type'])) {die('le type est un champ obligatoire');}
  	if (empty($_POST['start'])) {die ('la date debut  est champ obligatoire');}
    if (empty($_POST['end'])) {die ('la date fin est champ obligatoire');}
    if (empty($_POST['title'])) {die ('le titre est champ obligatoire');}

   }
 
      
   
   	ajouter_pp ($id_user,$start,$end,$type,$title,$color);
 
   }
    











 ?>