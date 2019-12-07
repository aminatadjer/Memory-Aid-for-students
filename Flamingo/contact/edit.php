<?php 
if(isset($_POST["employe"]))
{

 $connect = new PDO('mysql:host=localhost;dbname=flamingo','root','');
 $query = "SELECT * FROM contacts WHERE id_contact = '".$_POST["employe"]."' AND id_user='".$_COOKIE['ID']."'";
 $result = $connect->prepare($query);
 $result->execute();
$row=$result->fetch();
echo json_encode($row) ;
}

 ?>