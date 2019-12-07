<?php 
if (isset($_POST['view'])){
	$bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
  $id_user=$_COOKIE['ID'];
	if ($_POST['view']!='') {
		$result=$bdd->prepare("UPDATE notif SET vu=1 WHERE vu=0 AND id_user='$id_user'");
		$result->execute();
	}
	$result=$bdd->prepare("SELECT * FROM notif WHERE id_user='$id_user'  ORDER BY id DESC ");
	$result->execute();
	 $output = '';
	 if ($result->rowCount() > 0){
	 	 while($row = $result->fetch())
        {
            $output .= '
               <li>
                  <a href="#">
                    <strong>'.$row["message"].'</strong><br />
                    <small><em>'.$row["alarme"].'</em></small>
                  </a>
               </li>
           
           ';
        }
    }
    else {
           $output .= '<li><a href="#" class="text-bold text-italic">Aucune notification</a></li>';
         }
         $result1=$bdd->prepare("SELECT * FROM notif WHERE vu=0 AND id_user='$id_user'");
         $result1->execute();
         $cpt=$result1->rowCount();
          $data = array(
                'notification'   => $output,
                'unseen_notification' => $cpt
               );
           echo json_encode($data);
}


 ?>