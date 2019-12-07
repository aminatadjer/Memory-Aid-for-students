<?php
     require_once ('bdd.php');
     if ((isset($_FILES['file'])) && isset($_POST['designation']) ) {
          $file = $_FILES['file'];
          $file_name = $file['name'];
          $file_tmp = $file['tmp_name'];
          $file_size = $file['size'];
          $title1 = $_POST['designation'];
          $id_user=2;
          $id_tache=0;
         
          $file_ext = explode('.', $file_name);
          $file_ext = strtolower(end($file_ext));
          
               if ($file_size <= 9999999999999) {
                   
                    $file_name_new = uniqid('', true) . '.' . $file_ext;
                   
                    $file_destination ='Uploadfile/'. $file_name_new;
     
             
                    move_uploaded_file($file_tmp, $file_destination);
                         
                              $sql1 = "INSERT INTO document(designation,emplacement,id_tache,id_user) values ('$title1', '$file_destination','$id_tache','$id_user')";
                              echo $sql1;
          
                              $query1 = $bdd->prepare( $sql1 );
                              if ($query1 == false) {
                                   print_r($bdd->errorInfo());
                                   die ('Erreur prepare');
                              }
                              $sth = $query1->execute();
                              if ($sth == false) {
                                   print_r($query->errorInfo());
                                   die ('Erreur execute');
                              }
                              
                         header('Location: '.$_SERVER['HTTP_REFERER']);
                         
                         
                         
                    
                    
               }
          
          
          
     }

?>
