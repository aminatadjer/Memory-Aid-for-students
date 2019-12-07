<?php  
$id_user = $_COOKIE['ID'];
  require_once('bdd.php');
     
     if(isset($_POST['id'])){
     	$id = $_POST['id'] ;
      
        $sql = "SELECT * FROM document WHERE id='$id' AND id_user='$id_user' ";

         $req = $bdd->prepare($sql);
         $req->execute();
         $doc = $req->fetch();

         die ( $doc['emplacement'] .' '.$doc['designation']);


     }
   
     
    


?>