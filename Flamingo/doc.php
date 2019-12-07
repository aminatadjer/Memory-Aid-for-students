<?php require_once('emp/bdd.php');
                                $id_user = $_COOKIE['ID'];
                                $req = $bdd->prepare("SELECT * FROM document WHERE (id_user='$id_user')");
                                $req->execute(); 
$sqlio = "SELECT *  FROM  Utilisateur Where id_user='".$_COOKIE['ID']."' ";

$reqio = $bdd->prepare($sqlio);
$reqio->execute();
$users = $reqio->fetch();


                                ?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>  Flamingo </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <!-- Theme initialization -->
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
                               
                                      <li class="active"> <a href="">
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
                                        <li class="active"> <a href=doc.php>
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
                           <li class=""> <a href="contact.php">
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
                 <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"> Document  <button type="button" name="addDoc" id="addDoc" data-toggle="modal" data-target="#ModalAddDocument" class="btn btn-primary btn-sm" >Ajouter</button>
                                        <!--
                 -->
                                      
                                    </h3>
                                   
                                </div>
                            </div>
                        </div>
                        
                        
                    
                    </div>
                    <div class="card items container " style="">
                        <ul class="item-list striped">
                            <li class="item item-list-header hidden-sm-down">
                                <div class="item-row">
                                   <div class="col-md-4">
                                    <div class="item-col item-col-header  ">
                                        <div> <span>Designation</span> </div>
                                    </div> </div>
                                    <div class="col-md-3">
                                    <div class="item-col item-col-header  ">
                                        <div> <span>Tache associée</span> </div>
                                    </div> </div>
                                     <div class="col-md-2">
                                    <div class="item-col item-col-header  ">
                                        <div> <span>Taille</span> </div>
                                    </div> </div>
                                     <div class="col-md-2">
                                    <div class="item-col item-col-header  ">
                                        <div> <span>Modifié le :</span> </div>
                                    </div> </div>
                                       <div class="col-md-1">
                                    <div class="item-col item-col-header  ">
                                        <div> <span></span> </div>
                                    </div> </div>

                                    
                                    
                                </div>
                            </li>
                            <?php  while ($emp = $req->fetch()) { ?>
                            <div id="liste">
                            <li class="item ">
                                <div class="item-row" id="<?php echo $emp['id_document'] ?>">
                                  
                                    <div class="col-md-4">
                                   <div class="item-col  ">
                                    <div class="item-heading">Designation</div>
                                     <?php echo '<a onclick="OuvrirPopup(\' ' . $emp['emplacement'] . '\')" href="javascript:void(0)">'.$emp['designation'].'</a>'; ?>
                                    </div> </div>
                                      <div class="col-md-3">
                                      <div class="item-col ">
                                        <div class="item-heading">Tache associée</div>
                                     <?php $sqlim = "SELECT *  FROM  events Where id='".$emp['id']."' ";

                                    $reqim = $bdd->prepare($sqlim);
                                    $reqim->execute(); 
                                    while ($row=$reqim->fetch()) {
                                     echo  $row['title'];
                                    }

                                    ?>
                                    </div> </div>
                                    <div class="col-md-2">
                                      <div class="item-col ">
                                        <div class="item-heading">Taille</div>
                                        <?php echo $emp['taille']; ?> ko
                                    
                                    </div> </div>
                                  
                                    <div class="col-md-2">
                                      <div class="item-col ">
                                        <div class="item-heading">Modifié le</div>
                                        <?php echo $emp['date'] ?>
                                     
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
                                                    <li> <a class="remove" href="" data-toggle="modal" data-target="#suppModal" id="<?php echo $emp['id_document'] ?>">
                                            <i class="fa fa-trash-o "></i>
                                        </a> </li>
                                                
                                                </ul>
                                            </div>
                                        </div>
                                    </div> </div>
                                </div>
                            </li> <?php } ?> </div>
                          
                           
                        </ul>
                    </div>

  
                     <!-- Contenu -->









                </article>
                <footer class="footer">
             
                </footer>
            </div>
        </div>
              
   
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
    </body>

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

<div class="modal fade" id="ModalAddDocument" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="doc/ajout.php" enctype="multipart/form-data">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter Document</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="designation" class="col-sm-2 control-label small">Designation:</label>
                        <div class="col-sm-10">
                            <input type="text" name="designation" class="form-control" id="designation"
                                   placeholder="Designation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emplacement" type="file" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="file" name="file" class="" id="emplacement"
                                   placeholder="Emplacement">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
  <div class="modal fade" id="suppModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" id="supp_doc">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Supression</h4>
        </div>
        <div class="modal-body">       
         <h4 style="font-size: 16px;">Etes vous sur de vouloir supprimer ce document ? </h4>     
       <input type="hidden" name="doc" id="doc" value="">
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

<script type="text/javascript">
    function OuvrirPopup(page) {
        window.open(page);
    }

      $(document).ready(function()
 {
        $(document).ready(function(){
    $(document).on('click','.remove',function(){
      var doc = $(this).attr("id");
      $('#doc').val(doc);
      $('#suppModal').modal('show');
  
    });
  });
  
 $('#supp_doc').on('submit', function(event){ 
  event.preventDefault();  
 
   $.ajax({  
    url:"doc/sup.php",  
    method:"POST",  
    data:$('#supp_doc').serialize(),  
   
    success:function(data){  
      
     $('#suppModal').modal('hide');  
     $('#'+data).remove();
     
     
  
    }  
   });    
 });
});
</script>