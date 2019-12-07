<?php
     require_once('../emp/bdd.php');
     $outpout = '';
     $id_user = $_COOKIE['ID'];
     $em=$_POST['doc'];
     $req = $bdd->prepare("DELETE FROM document WHERE id_document='" . $_POST['doc'] . "'");
     $req->execute();
     $outpout = '<label class="text-success"> Document supprimé </label>';
     $req1 = $bdd->prepare("SELECT * FROM document WHERE (id_user='$id_user')");
     $req1->execute();
     
     
 /**    while ($emp = $req1->fetch()) {
          
          $art_title = $emp['designation'];
          $lien = $emp['emplacement'];
       $outpout.='<li class="item ">
                                <div class="item-row">
                                  
                                    <div class="col-md-4">
                                   <div class="item-col  ">
                                    <div class="item-heading">Designation</div>
                                      <a onclick="OuvrirPopup(\' ' . $emp['emplacement'] . '\')" href="javascript:void(0)">'.$emp['designation'].'</a>
                                    </div> </div>
                                      <div class="col-md-3">
                                      <div class="item-col ">
                                        <div class="item-heading">Tache associée</div>
                                     
                                    </div> </div>
                                    <div class="col-md-2">
                                      <div class="item-col ">
                                        <div class="item-heading">Taille</div>
                                    
                                    </div> </div>
                                  
                                    <div class="col-md-2">
                                      <div class="item-col ">
                                        <div class="item-heading">Modifié le</div>
                                     
                                    </div></div>


                                    
                                      
                                  <div class="col-md-1">
                                    <div class="item-col fixed item-col-actions-dropdown">
                                        <div class="item-actions-dropdown"> <a class="item-actions-toggle-btn">
                                <span class="inactive">
                                    <i class="fa fa-cog"></i>
                                </span>
                                <span class="active">
                                <i class="fa fa-chevron-circle-right"></i>
                                </span>
                            </a>
                                            <div class="item-actions-block">
                                                <ul class="item-actions-list">
                                                    <li> <a class="remove" href="" data-toggle="modal" data-target="#suppModal" id="'.$emp['id_document'].'">
                                            <i class="fa fa-trash-o "></i>
                                        </a> </li>
                                                    <li> <a class="edit" href="item-editor.html">
                                            <i class="fa fa-pencil"></i>
                                        </a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> </div>
                                </div>
                            </li>' ; }**/
        
        echo $em;

?>