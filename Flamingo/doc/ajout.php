<?php
     require_once ('../emp/bdd.php');
     if ((isset($_FILES['file'])) && isset($_POST['designation']) ) {
          $file = $_FILES['file'];
          $file_name = $file['name'];
          $file_tmp = $file['tmp_name'];
          $taille = $file['size'];
          $title1 = $_POST['designation'];
          $id_user=$_COOKIE['ID'];
          $id_tache=0;
          $date=date('Y-m-d');
         
          $file_ext = explode('.', $file_name);
          $file_ext = strtolower(end($file_ext));
          
                   
                    $file_name_new = uniqid('', true) . '.' . $file_ext;
                   
                    $file_destination ='../Uploadfile/'. $file_name_new;
                    $dest='Uploadfile/'. $file_name_new;
     
             
                    move_uploaded_file($file_tmp, $file_destination);
                         
                              $sql1 = "INSERT INTO document(designation,emplacement,id,id_user,taille,date) values ('$title1', '$dest','$id_tache','$id_user','$taille','$date')";
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
      header('Location:../doc.php');

?>