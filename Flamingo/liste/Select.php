<?php
$id_user = $_COOKIE['ID'];
function chargerActivites($id_user)
{
    try {
        $bdd = new PDO('mysql:hos=localhost;dbname=flamingo', 'root', '');
    } catch (Exception $e) {
        die('Erreur :' . $e->getMessage());
    }
    $requete = $bdd->prepare("SELECT * FROM activite WHERE id_user = '$id_user'  ORDER BY type  ");
    $requete->execute();
    return $requete;
}

function chargerTaches($designation,$id_user)
{
    try {
        $bdd = new PDO('mysql:hos=localhost;dbname=flamingo', 'root', '');
    } catch (Exception $e) {
        die('Erreur :' . $e->getMessage());
    }
    $requete = $bdd->prepare("SELECT * FROM events WHERE designation = '$designation' and id_user = '$id_user'  ");
    $requete->execute();
    return $requete;
}

$table = chargerActivites($id_user);
$output = '';
$donnee = $table->fetch();
while ($donnee != false) {
    $type = $donnee['type'];
    $idActivite = $donnee['id_activite'];
    $output .= '<h3>' . $type . '</h3>';
    $output .= '<p>
                <a class="btn btn-primary collapsed" data-toggle="collapse" id="id' . $idActivite . '"  href="#act' . $idActivite . '" role="button" aria-expanded="true">'
        . $donnee['designation'] .
        '</a> </p>';
    $liste = chargerTaches($donnee['designation'],$id_user);
    $output .= '<div class="row">
                <div class="col-lg-12">
                    <div class="collapse multi-collapse in" id="act' . $idActivite . '" aria-expanded="true">
                        <div class="card card-body">
                            <div class="card tasks sameheight-item" data-exclude="xs,sm">
                                <div class="card-header bordered">
                                    <div class="header-block">
                                        <h3 class="title"> Taches </h3>
                                        
                                    </div>
                                   <div class="header-block pull-right" style="padding-left: 0px" >
                                          <a class="removeActivite" href="#"  data-toggle="modal" data-target="#confirm-modal">
                                            <i class="fa fa-trash-o " id="' . $idActivite . ' " style="color: crimson"></i>
                                          </a>
                                         </div>
                                </div>
                                <div class="card-block">
                                    <div class="tasks-block">
                                        <ul class="item-list">';
    if ($liste->rowCount() == 0) $output .= ' <li class="item">
                                              
                                                    <div class="item-col item-col-title">
                                                        <label>
                                                            <span>Aucune Tache Programmée Pour Cette Activité</span>
                                                        </label>
                                                    </div>
                                            
                                            </li>';
    while ($tache = $liste->fetch()) {
        $id = $tache['id'];
        $nom = $tache['title'];
        if ($tache['Faite'] == 0) $done = ''; else $done = "checked";
        $output .= ' <li class="item" id =" amine">
                                                <div class="item-row">
                                                    <div class="item-col item-col-title">
                                                        <label>
                                                            <input class="checkbox" type="checkbox"id="' . $id . '" ' . $done . '>
                                                            <span>' . $nom . '</span>
                                                        </label>
                                                    </div>
                                                    <div class="item-col fixed item-col-actions-dropdown">
                                                        <div class="item-actions-dropdown">
                                                            <a class="item-actions-toggle-btn">
                                                               <span class="inactive">
                                                                   <i class="fa fa-cog"></i>
                                                               </span>
                                                                <span class="active">
                                                                    <i class="fa fa-chevron-circle-right"></i>
                                                                </span>
                                                            </a>
                                                            <div class="item-actions-block">
                                                                <ul class="item-actions-list">
                                                                    <li><a class="remove" href="#"  data-toggle="modal"
                                                                           data-target="#confirm-modal">
                                                                            <i class="fa fa-trash-o " id="' . $id . ' "></i>
                                                                        </a></li>
                                                                    
                                                                 
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>';
    }
    $output .= '                      </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          ';
    $arret = false;
    while (!$arret) {
        $donnee = $table->fetch();
        if ($donnee['type'] != $type || $donnee == false) {
            $arret = true;
        } else {
            $idActivite = $donnee['id_activite'];
            $output .= ' <p>
                 <a class="btn btn-primary collapsed" data-toggle="collapse" id="id' . $idActivite . '"  href="#act' . $idActivite . '" role="button" aria-expanded="true">'
                . $donnee['designation'] .
                '</a> </p>';


            $liste = chargerTaches($donnee['designation'],$id_user);
            $output .= '<div class="row">
                <div class="col-lg-12">
                    <div class="collapse multi-collapse in" id="act' . $idActivite . '" aria-expanded="true">
                        <div class="card card-body">
                            <div class="card tasks sameheight-item" data-exclude="xs,sm">
                                <div class="card-header bordered">
                                    <div class="header-block ">
                                        <h3 class="title"> Taches </h3>
                                       
                                    </div>
                                  <div class="header-block pull-right" style="padding-left: 0px" >
                                          <a class="removeActivite" href="#"  data-toggle="modal" data-target="#confirm-modal">
                                            <i class="fa fa-trash-o " id="' . $idActivite . ' " style="color: crimson"></i>
                                          </a>
                                         </div>
                                </div>
                                <div class="card-block">
                                    <div class="tasks-block">
                                        <ul class="item-list">';
            if ($liste->rowCount() == 0) $output .= ' <li class="item">
                                              
                                                    <div class="item-col item-col-title">
                                                        <label>
                                                            <span>Aucune Tache Programmée Pour Cette Activité</span>
                                                        </label>
                                                    </div>
                                            
                                            </li>';
            while ($tache = $liste->fetch()) {
                $id = $tache['id'];
                $nom = $tache['title'];
                if ($tache['Faite'] == 0) $done = ''; else $done = "checked";
                $output .= ' <li class="item">
                                                <div class="item-row">
                                                    <div class="item-col item-col-title">
                                                        <label>
                                                            <input class="checkbox" type="checkbox"id="' . $id . '" ' . $done . '>
                                                            <span>' . $nom . '</span>
                                                        </label>
                                                    </div>
                                                    <div class="item-col fixed item-col-actions-dropdown">
                                                        <div class="item-actions-dropdown">
                                                            <a class="item-actions-toggle-btn">
                                                               <span class="inactive">
                                                                   <i class="fa fa-cog"></i>
                                                               </span>
                                                                <span class="active">
                                                                    <i class="fa fa-chevron-circle-right"></i>
                                                                </span>
                                                            </a>
                                                            <div class="item-actions-block">
                                                                <ul class="item-actions-list">
                                                                    <li><a class="remove" href="#"  data-toggle="modal"
                                                                           data-target="#confirm-modal">
                                                                            <i class="fa fa-trash-o " id="' . $id . ' "></i>
                                                                        </a></li>
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>';
            }
            $output .= '                      </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
           ';
        }
    }
}