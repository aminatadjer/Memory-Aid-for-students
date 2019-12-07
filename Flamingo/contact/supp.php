<?php 
$bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
$output='';

    $id_user=$_COOKIE['ID'];
      $req=$bdd->prepare("DELETE FROM contacts WHERE id_user='$id_user' AND id_contact =  '".$_POST["contact"]."'");
      
    
      $req->execute();
      $output .= '<label class="text-success">Contact supprimé</label>';
      $select_query = "SELECT * FROM  contacts WHERE id_user='$id_user'     ORDER BY nom ";
      $result=$bdd->query($select_query);
      $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="70%">Employee Name</th> 
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


?>