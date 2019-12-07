<?php 
$bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
if(isset($_POST['nom']) && isset($_POST['numero']) && isset($_POST['mail']) && isset($_POST['site_web']) && isset($_POST['categorie']) && isset($_POST['adresse']) ) {
  $output = '';
  $nom=($_POST['nom']);
  $numero=($_POST['numero']);
  $mailo=($_POST['mail']);
  $site=($_POST['site_web']);
  $adresse=($_POST['adresse']);
  $categorie=($_POST['categorie']);
  $id_user=$_COOKIE['ID'];
  if ($_POST['employe']!='') {
    
    $req=$bdd->prepare("UPDATE contacts SET nom='$nom',numero='$numero',categorie='$categorie',mail='$mailo',adresse='$adresse',site_web='$site' WHERE id_user='$id_user' AND  id_contact = '".$_POST["employe"]."'");
   $output .= '<label class="text-success">Contact modifié</label>';
  } else { 
  $req=$bdd->prepare("INSERT INTO contacts(id_user,categorie,nom,adresse,numero,mail,site_web) VALUES ('$id_user','$categorie','$nom','$adresse','$numero','$mailo','$site')");
   $output .= '<label class="text-success">Contact inséré</label>'; }
$req->execute();

     $select_query = "SELECT * FROM  contacts WHERE id_user='$id_user' ORDER BY nom ";
     $result=$bdd->query($select_query);
     $output .= '
      <table class="table ">  
                    <tr>  
                         <th width="70%">Nom</th> 
                         <th width="10%">Modifier</th> 
                         <th width="10%">Details</th>  
                           <th width="10%">Supprimer</th>
                    </tr>

     ';
     while($row = $result->fetch())
     {
      $output .= '
       <tr>  
                         <td>' . $row["nom"] . '</td> 
                          <td><input type="button" name="edit" value="edit" id="' . $row["id_contact"] . '" class="btn btn-info btn-xs edit_data" /></td>  
                         <td><input type="button" name="view" value="view" id="' . $row["id_contact"] . '" class="btn btn-info btn-xs view_data" /></td>  
                         <td><input type="button" name="supp" value="supp" id="' . $row["id_contact"] . '" class="btn btn-info btn-xs supp_data" /></td>
                    </tr>
      ';
     }
     $output .= '</table>';
    
    echo $output;
}
?>