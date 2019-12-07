
<?php

$id_user=$_COOKIE['ID'];



require_once('bdd.php');
if (isset($_POST['date']))
{
    $date = $_POST['date'] ;



    $req=$bdd->prepare("SELECT * FROM emp WHERE id_user=$id_user ");
    $req->execute();
   // $i=$req->rowCount();
    //echo $i;
    $mod='0';
    while (  $interv = $req->fetch())
    {
        if (($interv['hd'] <= $date) AND ($interv['hf'] >= $date))
        {
             $mod= $interv['module'];
        }

    }
   
    echo $mod ;
}
?>
