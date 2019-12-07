<?php
require_once('emp/bdd.php');
$sqlo = "SELECT *  FROM  Utilisateur Where id_user='".$_COOKIE['ID']."' ";

$reqo = $bdd->prepare($sqlo);
$reqo->execute();
$users = $reqo->fetch();
$sql = "SELECT * FROM  emp";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Flamingo </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="emp/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css" rel="stylesheet"/>
   
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
         <script src="js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="emp/js/jquery.js"></script>
           <script src='emp/js/moment.min.js'></script>

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
                                     <div class="img" style="background-image: url('<?php echo $users['Photo']?>')"></div> <span class="name">
                    <?php echo $users['prenom']; ?>
                    </span> </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1"><a class="dropdown-item" href="user.php">
                      <i class="fa fa-user icon"></i>
                      Profile
                    </a>     <div class="dropdown-divider"></div> <a class="dropdown-item" href="page1.php">
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
                                <li class="active"> <a href="plan.php">
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
                <article class="content dashboard-page">
                     <!-- Contenu -->






                 <div class="row" style="margin-left: 100px; margin-right: 100px;">
            <div align="right">
                <button type="button" id="ajout" name="ajout" data-toggle="modal" data-target="#ModalAdd" class="btn btn-primary">Ajouter</button>
            </div>
            <div class="col-lg-12 text-center">
                <div id="calendar" class="col-centered">
                </div>
            </div>
            
        </div>


                </article>
                <footer class="footer">
             
                </footer>
            </div>
        </div>
              
   
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
    <script src="emp/fullcalendar/locale/fr.js" ></script>
    <script src="emp/fullcalendar/fullcalendar.js" ></script>

    </body>


</html>
<!-- Modal -->
        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-horizontal"   onsubmit="return verifLogique('start','end','ModalAdd') && valide_titre ('title','ModalAdd')" >
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">planning pedagogique</h4>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"  style="font-size:  14px;">Title</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title"   onblur="valide_titre ('title','ModalAdd')" required>
                      <div id="addtitre" style="color: red" class="small"></div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="type" class="col-sm-2 control-label"  style="font-size:  14px;">Type</label>
                      <div class="col-sm-10">
                          <select name="type" class="form-control" id="type" required>
                              <option id="Vacances" value="Vacances">Vacances</option>
                              <option id="Examens" value="Examens">Examens</option>
                              <option id="Cour/Td/Tp" value="Cour/Td/Tp">Cour/Td/Tp</option>
                          </select>
                           <div id="addtype" style="color: red" class="small"></div>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="start" class="col-sm-2 control-label"  style="font-size:  14px;">Debut</label>
                    <div class="col-sm-10">
                      <input type="date" name="start" class="form-control" id="start"  required onblur="verifLogique ('start','end','ModalAdd')" >
                       <div id="adddebut" style="color: red" class="small"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="end" class="col-sm-2 control-label"  style="font-size:  14px;" >Fin</label>
                    <div class="col-sm-10">
                      <input type="date" name="end" class="form-control" id="end"  required onblur="verifLogique ('start','end','ModalAdd')" >
                       <div id="addfin" style="color: red" class="small"></div>
                    </div>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="submit"  id ="envoyer" class="btn btn-primary">Sauvegarder</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        
        
        
        <!-- Modal -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-horizontal"  onsubmit="return verifLogique('start1','end1','ModalEdit') && valide_titre('title1','ModalEdit')">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modifier</h4>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label" style="font-size:  14px;">Titre</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title1" placeholder="Title" required   onblur="valide_titre ('title1','ModalEdit')">
                      <div id="addtitre" style="color: red" class="small"></div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="type" class="col-sm-2 control-label" style="font-size:  14px;">Type</label>
                       <div class="col-sm-10">
                          <select name="type" class="form-control" id="type1">
             
                              <option  value="Vacances">Vacances</option>
                              <option  value="Examens">Examens</option>
                              <option  value="Cour/Td/Tp">Cour/Td/Tp</option>
                          </select>
                            <div id="addtype" style="color: red" class="small"></div>
                      </div>
                  </div>
                 
                  <div class="form-group">
                      <label for="start" class="col-sm-2 control-label" style="font-size:  14px;">Debut</label>
                      <div class="col-sm-10">
                          <input type="date" name="start" class="form-control" id="start1" required  onblur="verifLogique ('start1','end1','ModalEdit')">
                          <div id="adddebut" style="color: red" class="small"></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="end" class="col-sm-2 control-label" style="font-size:  14px;">Fin</label>
                      <div class="col-sm-10">
                          <input type="date" name="end" class="form-control" id="end1" required onblur="verifLogique ('start1','end1','ModalEdit')">
                      <div id="addfin" style="color: red" class="small"></div>
                      </div>
                  </div>
                  <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="">
                                    <label style="color: crimson"><input type="checkbox" class="" name="delete" id="delete"> Supprimer</label>
                                </div>
                            </div>
                        </div>
                  
                  <input type="hidden" name="id" class="form-control" id="id">
                
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary" id="envoyer1" >Sauvegarder</button>
              </div>
            </form>
            </div>
          </div>
        </div>

    </div>
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
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next, today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },

            defaultView : 'listYear',
            allDayText : ' ' ,
            locale :'fr',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            
            select: function(start, end) {

                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
                $('#ModalAdd #adddebut').html('');
                $('#ModalAdd #addtitre').html('');
                $('#ModalAdd #addfin').html('');
                $('#ModalAdd #addtype').html('');
                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #adddebut').html('  ');
                    $('#ModalEdit #addtitre').html('  ');
                    $('#ModalEdit #addfin').html('  ');
                    $('#ModalEdit #addtype').html('  ');
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title1').val(event.title);
                    $('#ModalEdit #start1').val(event.start1);
                    $('#ModalEdit #end1').val(event.end1);
                    $('#ModalEdit #type1').val(event.type);
                    $('#ModalEdit').modal('show');

                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position

                edit(event);

            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                edit(event);

            },
            events: [
            <?php foreach($events as $event):

                $start=$event['hd'];
                $end=$event['hf'];

            ?>
                {
                    id: '<?php echo $event['id']; ?>',
                    title: '<?php echo $event['title']; ?>',
                    start: '<?php echo $start;?>',
                    start1: '<?php echo $start;?>',
                    end: '<?php echo $start;?>',
                    end1:'<?php echo $end; ?>',
                    color: '<?php echo $event['color']; ?>',
                    type: '<?php echo $event['module']; ?>',
            
                },
            <?php endforeach;?>
            ]
        });

            
           $("#envoyer").click(function(e){
            e.preventDefault() ;
      
        var data ={'type':$("#type").val() ,'title':$("#title").val() , 'start': $("#start").val()  , 'end':$("#end").val() }
        $.ajax({
             url: 'Full peda/addplanning.php',
             type: "POST",
             data: data ,
             success: function(rep) {
                    
                    if (rep=='le type est un champ obligatoire') 
                    {
                     $('#ModalAdd #addtype').html('le type est un champ obligatoire');
                    }
                    else{
                        if (rep=='la date debut  est champ obligatoire')
                        {
                       $('#ModalAdd #adddebut').html('la date debut est  un champ obligatoire');

                        }
                        else
                        {
                        if (rep=='la date fin est champ obligatoire')
                        {
                       $('#ModalAdd #addend').html('la date fin est un  champ obligatoire');

                        }
                        else{
                        if (rep=='le titre est champ obligatoire')
                        {
                       $('#ModalAdd #addtitre').html('le titre est  un champ obligatoire');

                        }
                            

                    else{ 
                        if (rep=='Nom de titre trop long, veuillez le réduire')
                        {
                             $('#ModalAdd #addtitre').html('Nom de titre trop long, veuillez le réduire');
                        }
                    else{
                    if(rep =='la journée correspendante a cette date debut est un weekend'){
                         $('#ModalAdd #adddebut').html('la journée correspendante a cette date debut est un weekend');
             
                    }
                    else
                    {

                        if (rep=='la journée correspendante a cette date fin est un weekend'){

                            $('#ModalAdd #addfin').html('la journée correspendante a cette date fin est un weekend');
             
                        }else{

                            if (rep=='veuillez consulter votre planning pedagogique et entrer un intervalle cohérent')
                            {
                                 $('#ModalAdd #adddebut').html('veuillez consulter votre planning pedagogique et entrer un intervalle cohérent');

                            }else{

                                if (rep=='Date debut inferieure ou égale à date fin')
                                {
                                    $('#ModalAdd #adddebut').html('Date debut inferieure ou égale à date fin');
                                }
                                else {
                                    document.location='plan.php';
                                }
                            }

                        }
                         

                    }     
                    
                }}}}

            }}


    }); 
   }); 

/*****************************************************************************************************/
     
     $("#envoyer1").click(function(e){
            e.preventDefault() ;
       var cochee = $("#delete").is(':checked');
        var data ={'type':$("#type1").val() ,'title':$("#title1").val() , 'start': $("#start1").val()  , 'end':$("#end1").val(), 'id':$("#id").val(),'cochee':cochee 
          

    }
    

        $.ajax({
             url: 'Full peda/editplanning.php',
             type: "POST",
            
             data: data ,
             success: function(rep) {
                
                    if (rep=='le type est un champ obligatoire') 
                    {
                     $('#ModalEdit #addtype').html('le type est un champ obligatoire');
                    }
                    else{
                        if (rep=='la date debut  est champ obligatoire')
                        {
                       $('#ModalEdit #adddebut').html('la date debut est un champ obligatoire');

                        }
                        else
                        {
                        if (rep=='la date fin est champ obligatoire')
                        {
                       $('#ModalEdit #addfin').html('la date fin est un  champ obligatoire');

                        }
                        else{
                        if (rep=='le titre est champ obligatoire')
                        {
                       $('#ModalEdit #addtitre').html('le titre est  un champ obligatoire');

                        }else{
                            if (rep=='Date debut invalide')
                            {
                             $('#ModalEdit #adddebut').html('Date debut invalide');
          
                            }
                            else{
                                if (rep=='Date fin invalide')
                            {
                             $('#ModalEdit #addend').html('Date fin invalide');
                            }
                        

                    else{ 
                        if (rep=='Nom de titre trop long, veuillez le réduire')
                        {
                             $('#ModalEdit #addtitre').html('Nom de titre trop long, veuillez le réduire');
                        }
                    else{
                    if(rep =='la journée correspendante a cette date debut est un weekend'){
                         $('#ModalEdit #adddebut').html('la journée correspendante a cette date debut est un weekend');
             
                    }
                    else
                    {

                        if (rep=='la journée correspendante a cette date fin est un weekend'){

                            $('#ModalEdit #addfin').html('la journée correspendante a cette date fin est un weekend');
             
                        }else{

                            if (rep=='veuillez consulter votre planning pedagogique et entrer un intervalle cohérent')
                            {
                                 $('#ModalEdit #adddebut').html('veuillez consulter votre planning pedagogique et entrer un intervalle cohérent');

                            }else{

                                if (rep=='Date debut inferieure ou égale à date fin')
                                {
                                    $('#ModalEdit #adddebut').html('Date debut inferieure ou égale à date fin');
                                }
                                else {
                                    document.location ='plan.php';
                                }
                            }

                        }
                         

                    }     
                    
                }}}}

            }}}}


    });





});
    });
///**/********************************verification de la champs titre *********************/


function valide_titre  (idtitre ,id) 
{
titre =document.getElementById(idtitre);
if (titre.value.length==0)
{
      $('#'+id+' #addtitre').html(' le titre est champ obligatoire');
    return false;
}
    else
    {
        $('#'+id+' #addtitre').html(' ');   
        return true;
    }

}

/********************la verification  la date vide  *************************/
    function dateValide(idDebut,id )
    {
        var d = document.getElementById(idDebut);
        var inter =d.value.split('-');
         var  date = new Date (inter[0], inter[1]-1, inter[2]);
        var max = new Date ('2050','01','01');
        var now = new Date();
        var min =new Date(now.getFullYear(),now.getMonth(),now.getDate());
        
         if (d.value.length==0)
         {

          $('#'+id+' #adddebut').html(' date debut est champ obligatoire');
           return false; 
           }
         else {
        if (date.getTime() > max.getTime()  )
        {
          
            $('#'+id+' #adddebut').html('Date invalide');
           
            return false;
        }
       else
       { 
       
        $('#'+id+' #adddebut').html(' ');
         return true;
       }
      }
     
    } 
    /******************************verification de la date de fin*****************************************************/
    function dateValidefin(idFin,id)
    {
        var d = document.getElementById(idFin);
         var inter =d.value.split('-');
         var  date = new Date (inter[0], inter[1]-1, inter[2]);
        var max = new Date ('2050','01','01');
        var now = new Date();
        var min =new Date(now.getFullYear(),now.getMonth(),now.getDate());
        if ( d.value.length==0)
        {
            $('#'+id+' #addfin').html(' date fin est champ obligatoire');
             
             return false;
        }
        

       else {
        if (date.getTime() > max.getTime() )
        {
          
            $('#'+id+'  #addfin').html('Date invalide');
            return false;
        }
       else
       {
         $('#'+id+'  #addfin').html(' ');
         return true;
       }
      }
     
    }
    /***************************verification de tous **********************************/
 function verifLogique (idDebut,idFin,id){
     var debut = document.getElementById(idDebut);
     var fin = document.getElementById(idFin);
      var b= dateValide(idDebut,id);
     
     
     var b1= dateValidefin(idFin,id);
        
         var  Debut = debut.value.split("-");
         var  Fin = fin.value.split("-");
         var  dateDebut =new Date(Debut[0],Debut[1],Debut[2]);
         var datefin =new Date(Fin[0],Fin[1],Fin[2]);
         if (b==true && b1==true)
         {
              
         if  (dateDebut.getTime() > datefin.getTime())
         {
             $('#'+id+' #adddebut').html('Date debut est superiuer a date fin');
             return false;
         }
         else
         {
            
            $('#'+id+' #adddebut').html(' ');
            return true;
         }
    
}
else 
{
    return (b1 && b);
}
}

</script>