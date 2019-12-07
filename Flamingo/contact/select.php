<?php  
//select.php  
if(isset($_POST["employe"]))
{ $id_user=$_COOKIE['ID'];
 $output = '';
 $connect = new PDO('mysql:host=localhost;dbname=flamingo','root','');
 $query = "SELECT * FROM contacts WHERE id_user='$id_user' AND  id_contact = '".$_POST["employe"]."'";
 $result = $connect->prepare($query);
 $result->execute();
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = $result->fetch())
    {
     $output .= '
     <tr>  
            <td width="30%"><label>Adresse</label></td>  
            <td width="70%">'.$row["adresse"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Site Web</label></td>  
            <td width="70%">'.$row["site_web"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Categorie</label></td>  
            <td width="70%">'.$row["categorie"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Numéro</label></td>  
            <td width="70%">'.$row["numero"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Mail</label></td>  
            <td width="70%">'.$row["mail"].'</td>  
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;

}

?>