<?php
require_once('emp/bdd.php');
$sqlo = "SELECT *  FROM  Utilisateur Where id_user='".$_COOKIE['ID']."' ";

$reqo = $bdd->prepare($sqlo);
$reqo->execute();
$users = $reqo->fetch();
$sql = "SELECT id, title, start, end, day FROM emploi1 ";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Flamingo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="emp/css/bootstrap.min.css" rel="stylesheet">
        <link href='emp/css/fullcalendar.css' rel='stylesheet' />
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
                    </a>    <div class="dropdown-divider"></div> <a class="dropdown-item" href="login.html">
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
                             
                             
                        <li class="active"> <a href="emp.php">
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

   <div class="row" style="">
            <div align="right">
                
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
       
            <script src='emp/js/moment.min.js'></script>
    <script src="emp/fullcalendar/locale/fr.js" ></script>
    <script src="emp/fullcalendar/fullcalendar.js" ></script>
    </body>
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="emp/controll.php">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" >Ajouter</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="titre" class="col-sm-3 control-label">Titre</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="day" class="col-sm-3 control-label">Jour</label>
                            <div class="col-sm-8">
                                <select name="day" class="form-control" id="day" required>
                                    <option value="2018-06-03">Dimanche</option>
                                    <option  value ="2018-06-04">Lundi</option>
                                    <option  value ="2018-06-05">Mardi</option>
                                    <option value="2018-06-06" >Mercredi</option>
                                    <option value="2018-06-07" >Jeudi</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="start" class="col-sm-3 control-label">Heure Debut</label>
                            <div class="col-sm-8">
                                <input type="time" name="start" class="form-control" id="start" required onblur="verifDate('start','end');">
                                <div id="erreurA" style="color: #ff3030"></div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="end" class="col-sm-3 control-label">Heure Fin</label>
                            <div class="col-sm-8">
                                <input type="time" name="end" class="form-control" id="end" required onblur="verifDate('start','end');">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" onsubmit="verifDate('start1','end1');" >Inserer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="emp/DeleteEmploi.php">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modifier</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Titre</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" class="form-control underlined" id="title" placeholder="Title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="day" class="col-sm-3 control-label">Jour</label>
                            <div class="col-sm-8">
                                    <select name="day" class="form-control underlined" id="day"  required>
                                        <option value="2018-06-03">dimanche</option>
                                        <option  value ="2018-06-04">Lundi</option>
                                        <option  value ="2018-06-05">mardi</option>
                                        <option value="2018-06-06" >Mercredi</option>
                                        <option value="2018-06-07" >jeudi</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="start" class="col-sm-3 control-label">Heure Debut</label>
                            <div class="col-sm-8">
                                <input type="time" name="start" class="form-control underlined" id="start1" required onblur="verifDate('start1','end1');">
                                <div id="erreurE" style="color: #ff3030"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end" class="col-sm-3 control-label">Heure Fin</label>
                            <div class="col-sm-8">
                                <input type="time" name="end" class="form-control underlined" id="end1" required onblur="verifDate('start1','end1');">
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="">
                                    <label style="color: crimson"><input type="checkbox" class="" name="delete"> Supprimer</label>
                                </div>
                            </div>
                        </div>


                        <input type="hidden" name="id" class="form-control underlined" id="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" onsubmit="verifDate('start1','end1');">Appliquer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- /.container -->

</html>
<script>
    function  verifDate(idDebut,idFin) {

        let debut = document.getElementById(idDebut);
        let fin = document.getElementById(idFin);
        let execute = true;
        let Debut = debut.value.split(":");
        let Fin = fin.value.split(":");
        let now = new Date();
      
        let  dateDebut =new Date(now.getFullYear(),now.getMonth(),now.getDay(),Debut[0],Debut[1],Debut[2]);
        let datefin =new Date(now.getFullYear(),now.getMonth(),now.getDay(),Fin[0],Fin[1],Fin[2]);
       
        let diff = dateDebut.getTime() - datefin.getTime();
            if ( diff >=0){
                $('#ModalAdd #erreurA').html("Heures Incoherentes");
                $('#ModalEdit #erreurE').html("Heures Incoherentes");
                execute = false ;
            }
            else{
                $('#ModalAdd #erreurA').html("");
                $('#ModalEdit #erreurE').html("");
            }

      return execute;
    }
</script>
<script>
    $('#calendar').fullCalendar({
        header: {
            left: '',
            center: '',
            right: ''
        },
       locale : 'fr',
        firstDay : 0,
        minTime : '08:00:00',
        maxTime : '18:00:00',
        hiddenDays : [5,6],
        allDaySlot: false,
        columnFormat: 'dddd',
        slotDuration: '00:30:00',
        defaultView : 'agendaWeek',
        defaultDate : '2018-06-03',
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        selectable: true,
        selectHelper: true,
       dayClick : function(start) {

           $('#ModalAdd #start').val(moment(start).format('HH:mm:ss'));
           $('#ModalAdd #end').val(moment(start).format('HH:mm:ss'));
           $('#ModalAdd #day').val(moment(start).format('YY-MM-DD'));
           $('#ModalAdd #erreurA').html("");
           $('#ModalAdd #day ').val(  moment(start).format('YYYY-MM-DD'));
           $('#ModalAdd').modal('show');
       },
        eventRender: function(event, element) { //intilialiser les atribus
            element.bind('dblclick', function() {
                $('#ModalEdit #id').val(event.id);
                $('#ModalEdit #title').val(event.title);
                $('#ModalEdit #start1').val(event.start.format('HH:mm:ss'));
                $('#ModalEdit #end1').val(event.end.format('HH:mm:ss'));
                $('#ModalEdit #day ').val(event.day);
                $('#ModalAdd #erreurE').html("");
                $('#ModalEdit').modal('show');
            });
        },
       eventDrop: function(event, delta, revertFunc) { // si changement de position

           edit(event);

       },
       eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

           edit(event);

       },
        events : [
            <?php foreach($events as $event):
                $start = $event['day'].'T'.$event['start'];
                $end= $event['day'].'T'.$event['end'];

            ?>
            {
                id : '<?php echo $event['id'] ?>' ,
                title :'<?php echo $event['title'] ?>' ,
                start:'<?php echo $start ?>' ,
                end : '<?php echo $end ?>',
                day : '<?php echo $event['day'] ?>',
                color: '',
            },
            <?php endforeach; ?>

        ],
    });


</script>


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