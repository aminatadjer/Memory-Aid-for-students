<?php
function getContactByName($id_user,$nom)//fonction qui permet de charger un contact selon son prenom
{
    try
    {
        $bdd= new PDO('mysql:host=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $nom='%'.$nom.'%';
    $requete = $bdd->prepare("SELECT * FROM contacts where id_user ='$id_user' AND  nom LIKE '$nom'   ");
    $requete->execute();
    return $requete;
}

// je récupère ma variable JS
$name = $_POST['name'];
if ($name!="") {
	

$id_user=$_COOKIE['ID'];
$res=getContactByName($id_user,$name);

$retour = null;
$retour =    ' <table class="table">  ';
while($dn1 = $res->fetch()){
$retour =    ' <table class="table">  
                     <tr>  
                         <td width="70%">' . $dn1["nom"] . '</td> 
                          <td width="15%"><input type="button" name="edit1" value="edit" id="'.$dn1["id_contact"].'" class="btn btn-info btn-xs edit_data" /></td>  
                         <td width="15%"><input type="button" name="view1" value="view" id="'.$dn1["id_contact"].'" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>
</table>'
;
echo $retour; // envoi de la réponse (ça pourrait être du code html, un objet serializé etc.. l'important c'est qu'il s'agit d'un String)
}}
?>