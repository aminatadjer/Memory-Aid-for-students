<?php 
$id_user=$_COOKIE['ID'];

 require_once ('bdd.php');
     if (isset($_FILES['pic']) ) {
          $file = $_FILES['pic'];
          $file_name = $file['name'];
          $file_tmp = $file['tmp_name'];
          $file_size = $file['size'];
         
         
          $file_ext = explode('.', $file_name);
          $file_ext = strtolower(end($file_ext));
          
                   
                    $file_name_new = uniqid('', true) . '.' . $file_ext;
                   
                    $file_destination ='../Uploadfile/'. $file_name_new;
                    $fiile = 'Uploadfile/'. $file_name_new;
     
             
                    move_uploaded_file($file_tmp, $file_destination);
                         
                              $sql1 = "UPDATE utilisateur SET Photo='$fiile'  WHERE id_user='$id_user' ";
                              echo $sql1;
                              $query1 = $bdd->prepare( $sql1 );
                              if ($query1 == false) {
                                   print_r($bdd->errorInfo());
                                   die ('Erreur prepare');
                              }
                              $sth = $query1->execute();
                              if ($sth == false) {
                                   print_r($query1->errorInfo());
                                   die ('Erreur execute');
                              }
                              
                        
                         
                         
                         
                    
                    
            
          
          
          
     }
      header('Location: '.$_SERVER['HTTP_REFERER']);
?>