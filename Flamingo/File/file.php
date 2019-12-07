<?php
      /******Afficher la liste des documents *******************/
     require_once ('bdd.php');
     $id_user=2;
     $designation='camilia';
     $req=$bdd->prepare("SELECT * FROM document WHERE (id_user='$id_user')");
     $req->execute();
      while ($emp=$req->fetch()){
           
           $art_title=$emp['designation'];
           $lien=$emp['emplacement'];
         
           echo '<li>'.'<a onclick="OuvrirPopup(\' '.$lien.'\')" href="javascript:void(0)">'.$art_title.'</a></li>';
        
           }
     ?>
<script type="text/javascript">
    function OuvrirPopup(page) {
        window.open(page);
    }
</script>
