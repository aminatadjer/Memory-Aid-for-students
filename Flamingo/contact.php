 <?php 
$bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
$sql = "SELECT *  FROM  Utilisateur Where id_user='".$_COOKIE['ID']."' ";

$req = $bdd->prepare($sql);
$req->execute();
$users = $req->fetch();
$query="SELECT * FROM contacts WHERE categorie='enseignants' ORDER BY nom  ";
$result1=$bdd->prepare($query);
$result1->execute();
$query="SELECT * FROM contacts WHERE id_user='".$_COOKIE['ID']."'     ORDER BY nom  ";
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

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>  Flamingo </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <!-- Theme initialization -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
            }
        </script>
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
                <i class="fa fa-bars"></i>
            </button> </div>
                   
                    <div class="header-block header-block-collapse">
                         <span class="counter "></span>
                    </div>
          
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="notifications new "> <a  class="hola" href="" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <sup>
                      <span class="counter count"></span>
                    </sup>
                  </a>
                                <div class="dropdown-menu notifications-dropdown-menu">
                                    <ul class="notifications-container">
                                        
                                    </ul>
                                    <footer>
                                        <ul>
                                            <li> <a href="">
                            View All
                          </a> </li>
                                        </ul>
                                    </footer>
                                </div>
                            </li>
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="img" style="background-image: url('<?php echo $users['Photo']?>')"> </div> <span class="name">
                      <?php echo $users['prenom']; ?>
                    </span> </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1"> <a class="dropdown-item" href="user.php">
                      <i class="fa fa-user icon"></i>
                      Profile
                    </a> 
                                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="page1.php">
                      <i class="fa fa-power-off icon"></i>
                      Logout
                    </a> </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                       <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> FlaminGo </div>
                        </div>
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">
                                
                                      <li> <a href="">
                            <i class="fa fa-tasks"></i> Liste
                            <i class="fa arrow"></i>
                        </a>
                                    <ul class="active">
                                          <li> <a href=tache.php>
                                    <i class="fa fa-list-ol"></i> Taches
                                </a> </li>
                                        <li class=""> <a href="liste.php">
                                    <i class="fa fa-check-square-o"></i> Taches/activitées
                                </a> </li>
                                        <li> <a href=doc.php>
                                    <i class="fa fa-file-text-o"></i> Document 
                                </a> </li>
                                    </ul>
                                </li>
                                   </li>
                                <li class=""> <a href="plan.php">
                            <i class="fa fa-calendar-o"></i> Planning pédagogique
                           
                        </a>
                               
                                </li>
                               <li class=""> <a href="pro.php">
                            <i class="fa fa-list-alt"></i> Planning
                        
                             </a>
                                
                                </li>
                                 
                                
                             
                             
                        <li class=""> <a href="emp.php">
                            <i class="fa fa-table"></i> Emploi du temps
                        </a> </li>
                           <li class="active"> <a href="contact.php">
                            <i class="fa fa-user"></i> Carnet d'adresses
                        </a> </li>
                           <li class=""> <a href="bilan.php">
                            <i class="fa fa-bar-chart"></i> Bilan
                        
                             </a>
                                
                                </li>
                                    <li class=""> <a href="guide.html" target="_blank">
                            <i class="fa fa-question"></i> Aide en ligne
                        
                             </a>
                                
                                </li>
                               
                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="nav metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">
                                                <div class="col-xs-4"> </div>
                                                <div class="col-xs-4"> <label class="title">fixed</label> </div>
                                                <div class="col-xs-4"> <label class="title">static</label> </div>
                                            </div>
                                            <div class="row hidden-md-down">
                                                <div class="col-xs-4"> <label class="title">Sidebar:</label> </div>
                                                <div class="col-xs-4"> <label>
                                            <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed" >
                                            <span></span>
                                        </label> </div>
                                                <div class="col-xs-4"> <label>
                                            <input class="radio" type="radio" name="sidebarPosition" value="">
                                            <span></span>
                                        </label> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"> <label class="title">Header:</label> </div>
                                                <div class="col-xs-4"> <label>
                                            <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                            <span></span>
                                        </label> </div>
                                                <div class="col-xs-4"> <label>
                                            <input class="radio" type="radio" name="headerPosition" value="">
                                            <span></span>
                                        </label> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"> <label class="title">Footer:</label> </div>
                                                <div class="col-xs-4"> <label>
                                            <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                            <span></span>
                                        </label> </div>
                                                <div class="col-xs-4"> <label>
                                            <input class="radio" type="radio" name="footerPosition" value="">
                                            <span></span>
                                        </label> </div>
                                            </div>
                                        </div>
                                        <div class="customize-item">
                                            <ul class="customize-colors">
                                                <li> <span class="color-item color-red" data-theme="red"></span> </li>
                                                <li> <span class="color-item color-orange" data-theme="orange"></span> </li>
                                                <li> <span class="color-item color-green active" data-theme=""></span> </li>
                                                <li> <span class="color-item color-seagreen" data-theme="seagreen"></span> </li>
                                                <li> <span class="color-item color-blue" data-theme="blue"></span> </li>
                                                <li> <span class="color-item color-purple" data-theme="purple"></span> </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul> <a href="">
                        <i class="fa fa-cog"></i> Customize
                    </a> </li>
                        </ul>
                    </footer>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <article class="content dashboard-page">
                     <!-- Contenu -->
                   <div class="row">
                      
                 <div class="col-md-4"> <br><br> <label>Rechercher: </label><input type="text" id="rech" name="rech" onkeyup="rechercher()" class="form-control">
                 <div id="resultat">
                 </div>
                </div>
               <div class="table-responsive col-md-8 ">
               <div align="right">
                  <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary-outline" >Ajouter</button>
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
        
        




                </article>
                <footer class="footer">
             
                </footer>
              
   
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
    </body>
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
        <button type="button" class="btn btn-default-outline" data-dismiss="modal">NON</button>
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
     <input type="text" name="nom" id="nom" class="form-control underlined" onblur="VerifNomT(this)" placeholder="" required />
     <div id="err1"></div>
     <br />
        <label>Numero de tél: </label>
     <input  type="text"   name="numero" id="numero" class="form-control underlined" onkeyup="contactExistant()" onblur="numeroValide()" required>
        <div style="font-size: 14px; color: red"  id="contactExist"> </div>
     <br />
     <label>Categorie</label>
     <select name="categorie" id="categorie" class="form-control underlined" style="height: 40px;">
      <option value="amis">Amis</option>  
      <option value="famille">Famille</option>
      <option value="enseignants">Enseignants</option>
      <option value="autre">Autre</option>
     </select>
     <br />  
     <label> Adresse mail</label>
     <input type="mail" name="mail" id="mail" class="form-control underlined" onblur="verifMail()"/>
        <div style="font-size: 14px; color: red"  id="falseMail"> </div>
     <br />  
     <label>Site Web</label>
     <input type="text" name="site_web" id="site_web" class="form-control underlined" />
     <br />
      <label>Adresse</label>
     <input type="text" name="adresse" id="adresse" class="form-control underlined" />
     <br />
     <input type="hidden" name="employe" id="employe" value="">
     <input type="submit" name="insert" id="insert" value="Inserer" class="btn btn-primary-outline" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

</html>
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
    $('.notifications-dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    { 
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 
 $(document).on('click', '.hola', function(){
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