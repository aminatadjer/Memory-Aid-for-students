 <?php 
$bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
$query="SELECT * FROM contacts WHERE categorie='enseignants' ORDER BY nom  ";
$result1=$bdd->prepare($query);
$result1->execute();
$query="SELECT * FROM contacts ORDER BY nom  ";
$result=$bdd->prepare($query);
$result->execute();
$query="SELECT * FROM contacts WHERE categorie='amis' ORDER BY nom  ";
$result2=$bdd->prepare($query);
$result2->execute();
$query="SELECT * FROM contacts WHERE categorie='famille' ORDER BY nom  ";
$result3=$bdd->prepare($query);
$result3->execute();
$query="SELECT * FROM contacts WHERE categorie='autre' ORDER BY nom  ";
$result4=$bdd->prepare($query);
$result4->execute();
function getContactByName($id_user,$nom)//fonction qui permet de charger un contact selon son prenom
{
    try
    {
        $bdd= new PDO('mysql:host=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $nom='%'.$nom.'%';
    $requete = $bdd->prepare("SELECT * FROM contacts where id_user ='$id_user' AND  nom LIKE '$nom'   ");
    $requete->execute();
    return $requete;
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Flamingo | </title>
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/feuille1.css">
    <link rel="stylesheet" type="text/css" href="css/feuille2.css">
    <link rel="stylesheet" type="text/css" href="css/feuille3.css">
    <link rel="stylesheet" type="text/css" href="css/feuille4.css">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fas fa-graduation-cap"></i> <span>Flamingo</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="img/img1.jpeg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Amina !</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fas fa-clipboard-list"></i> Mon planning </a>
                    
                  </li>
                  <li><a><i class="fas fa-calendar-alt"></i> Agenda pédagogique <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="emploi/index.php">Emploi du temps</a></li>
                      <li><a href="plan_pedago/index.php">Planning pédagogique</a></li>
                    </ul>
                  </li>
                  <li><a><i class="far fa-plus-square"></i> Ajouter <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">Tache</a></li>
                      <li><a href="media_gallery.html">Evenement</a></li>
                      <li><a href="typography.html">Activitée</a></li>
                      <li><a href="typography.html">Documents</a></li>
                    </ul>
                  </li>
                  <li><a href=""><i class="fas fa-address-card"></i> Carnet d'adresse <span class=""></span></a>
                   
                  </li>
                  <li><a><i class="fas fa-chart-bar"></i> Bilan <span class=""></span></a>
              
                  </li>
                  
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Configurer">
                <i class="fas fa-cogs"></i>
                <span class="glyphicon " aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Imprimer">
              <i class="fas fa-print"></i>
                <span class="glyphicon " aria-hidden="true"></span>
              </a>
             
      
             
              <a data-toggle="tooltip" data-placement="top" title="Aide" href="login.html">
               <i class="fas fa-question"></i>
                <span class="glyphicon" aria-hidden="true"></span>
              </a>

               <a data-toggle="tooltip" data-placement="top" title="Déconnexion" href="login.html">
                <i class="fas fa-power-off"></i>
                <span class="glyphicon" aria-hidden="true"></span>
               </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="img/img1.jpeg" alt="">Amina
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class=" pull-right"> <i class="fas fa-cogs"></i></span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fas fa-power-off pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle dropdown-toggle1 info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-green count"></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu dropdown-menu1 list-unstyled msg_list" role="menu">
                    <li>
                     
                    </li>
                   
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                <li><span></span></li>
                <li><span></span></li>

                 <h3 style="padding-left: 50px; padding-top: 10px;"> Carnet d'adresse <i class="fas fa-users"></i></h3>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
           <div class="row">
               <div class="col-md-4"> <br><br> <label>Rechercher: </label><input type="text" id="rech" name="rech" onkeyup="rechercher()" class="form-control">
          
                 <div id="resultat">
                 </div>
               </div>
               <div class="table-responsive col-md-8 ">
               <div align="right">
                  <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
               </div>
                <br />
               <div id="employee_table">
                   <table class="table">
                      <tr>
                        <th width="70%">Liste de contacts</th>  
                        <th width="10%">Modifier</th>
                        <th width="10%">Details</th>
                        <th width="10%">Supprimer</th>
                      </tr>
                      <?php
                        while($row = $result->fetch())
                           {
                       ?>
                       <tr>
                      <td><?php echo $row["nom"]; ?></td>
                      <td><input type="button" name="edit" value="edit" id="<?php echo $row["id_contact"]; ?>" class="btn btn-info btn-xs edit_data" /></td>
                      <td><input type="button" name="view" value="view" id="<?php echo $row["id_contact"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                      <td><input type="button" name="supp" value="supp" id="<?php echo $row["id_contact"]; ?>" class="btn btn-info btn-xs supp_data" /></td>
                      </tr>
                     <?php
                        }
                      ?>
                   </table>
               </div>
          </div>  
          </div>
         
        </div>
      </div>
    </div>


    <!-- jQuery -->
  
<!-- Google Analytics -->

  </body>
</html>
<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Employee Details</h4>
   </div>
     <div class="modal-body" id="employee_detail">
    
     </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

  <div class="modal fade" id="suppModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" id="supp_contact">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Supression</h4>
        </div>
        <div class="modal-body">       
         <h4>Etes vous sur de vouloir supprimer ce contact ? </h4>     
       <input type="hidden" name="contact" id="contact" value="">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">NON</button>
        <button type="submit" name="supp1" id="supp1" class="btn btn-primary">OUI</button>
        </div>
      </form>
      </div>
      </div>
    </div>

    </div>

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Ajout de contact</h4>
   </div>
   <div class="modal-body">
    <form method="POST" id="insert_form">
     <label>Nom  :</label>
     <input type="text" name="nom" id="nom" class="form-control" onblur="VerifNomT(this)" placeholder="" required />
     <div id="err1"></div>
     <br />
        <label>Numero de tél: </label>
     <input  type="text"   name="numero" id="numero" class="form-control" onkeyup="contactExistant()" onblur="numeroValide()" required>
        <div style="font-size: 14px; color: red"  id="contactExist"> </div>
     <br />
     <label>Categorie</label>
     <select name="categorie" id="categorie" class="form-control">
      <option value="amis">Amis</option>  
      <option value="famille">Famille</option>
      <option value="enseignants">Enseignants</option>
      <option value="autre">Autre</option>
     </select>
     <br />  
     <label> Adresse mail</label>
     <input type="mail" name="mail" id="mail" class="form-control" onblur="verifMail()"/>
        <div style="font-size: 14px; color: red"  id="falseMail"> </div>
     <br />  
     <label>Site Web</label>
     <input type="text" name="site_web" id="site_web" class="form-control" />
     <br />
      <label>Adresse</label>
     <input type="text" name="adresse" id="adresse" class="form-control" />
     <br />
     <input type="hidden" name="employe" id="employe" value="">
     <input type="submit" name="insert" id="insert" value="Inserer" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>
 $(document).ready(function()
 {
   $('#add').click(function(){  
           $('#insert').val("Inserer");  
           $('#employe').val("");
           $('#insert_form')[0].reset();  
      });
 $('#insert_form').on('submit', function(event){ 

  event.preventDefault();  

   $.ajax({  
    url:"contact/insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserer");  
    },  
    success:function(data){  
      
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
    
 });
});
  $(document).ready(function()
 {
  
 $('#supp_contact').on('submit', function(event){ 
  event.preventDefault();  
 
   $.ajax({  
    url:"contact/supp.php",  
    method:"POST",  
    data:$('#supp_contact').serialize(),  
   
    success:function(data){  
      
     $('#suppModal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });    
 });
});


  $(document).ready(function(){
    $(document).on('click','.edit_data',function(){
      var employe = $(this).attr("id");
      if (employe!='') {
        $.ajax({
                   url: "contact/edit.php",
                   type: "POST",
                   data: {employe:employe},
                   dataType: "json",
                   success:function(data){
                    $('#nom').val(data.nom);
                    $('#numero').val(data.numero);
                    $('#categorie').val(data.categorie);
                    $('#mail').val(data.mail);
                    $('#site_web').val(data.site_web);
                    $('#adresse').val(data.adresse);
                    $('#insert').val("Modifier");
                    $('#employe').val(data.id_contact);
                    $('#add_data_Modal').modal('show');
                
                   }
        });
      }
    });
  });
    $(document).ready(function(){
    $(document).on('click','.supp_data',function(){
      var contact = $(this).attr("id");
      $('#contact').val(contact);
      $('#suppModal').modal('show');
  
    });
  });



  $(document).ready(function(){
    $(document).on('click','.view_data',function(){
      var employe = $(this).attr("id");
      if (employe!='') {
        $.ajax({
                   url: "contact/select.php",
                   type: "POST",
                   data: {employe:employe},
                   success:function(data){
                    $('#employee_detail').html(data);
                    $('#dataModal').modal('show');
                
                   }
        });
      }
    });
  });
   function VerifNomT(champ){
  if ( champ.value.length==0 || champ.value.length>10 ){
    var data='<h1>hello</h>';
    champ.placeholder="obligatoire";

    return false ;
  }
  else{
    champ.placeholder="";
  return true ;
  }
}


</script>
<script type="text/javascript">
   function contactExistant() {
        var numero = document.getElementById('numero').value;
        $.ajax({
            type : "POST",
            url : "contact/Controller.php",
            data:{numero : numero},
            success: function(msg){ // je récupère la réponse dans la variable msg
                $('#contactExist').empty();
                $('#contactExist').append(msg);
            }
        });
    }
    function numeroValide() {
        var numero = document.getElementById('numero').value;
        $.ajax({
            type : "POST",
            url : "contact/Controller.php",
            data:{numero : numero},
            success: function(msg){ // je récupère la réponse dans la variable msg
                $('#contactExist').empty();
                $('#contactExist').append(msg);
            }
        });
    }
  function verifMail() {
        var mail = document.getElementById('mail').value;

            $.ajax({
                type : "POST",
                url : "contact/Controller.php",
                data :{mail : mail},
                success : function (msg) {
                    $('#falseMail').empty();
                    $('#falseMail').html(msg);
                }
            });

    }
function rechercher()
{
var name = document.getElementById('rech').value;
$.ajax({
type: "POST",
url: "contact/some.php",
data: {name: name}, // je passe la variable JS
success: function(msg){ // je récupère la réponse dans la variable msg
$('#resultat').empty();
$('#resultat').append(msg);
}
});
}
</script>

    <!-- Bootstrap -->
    <script src="js/main5.js"></script>

    <!-- Bootstrap -->

    <!-- Notifications -->
    <script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"notification/select.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu1').html(data.notification);
    if(data.unseen_notification > 0)
    { 
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 
 $(document).on('click', '.dropdown-toggle1', function(){
 $('.count').html('');
 load_unseen_notification('yes');
 });

 setInterval(function(){ 
  load_unseen_notification();
 }, 2000);

  setInterval(function(){ 
     $.ajax({
   url:"notification/notif.php",
   method:"POST",
   data:{},
   success:function(data)
   {
    
   }
  });
 
 }, 3000);
});
</script>
