<?php
require_once('bdd.php');
$sql = "SELECT id, title, start, end, day FROM emploi1 ";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title class="count1">Bare </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- FullCalendar -->
    <link href='css/fullcalendar.css' rel='stylesheet' />

        <link rel="apple-touch-icon" href="../apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="../css/vendor.css">
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="../css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="../css/app.css">');
            }
        </script>
   

    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 70px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
        #calendar {
            max-width: 800px;
        }
        .col-centered{
            float: none;
            margin: 0 auto;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


        
        <!-- /top navigation -->

        <!-- page content -->
        
       <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
                <i class="fa fa-bars"></i>
            </button> </div>
                    <div class="header-block header-block-search hidden-sm-down">
                        <form role="search">
                            <div class="input-container"> <i class="fa fa-search"></i> <input type="search" placeholder="Search">
                                <div class="underline"></div>
                            </div>
                        </form>
                    </div>
                    <div class="header-block header-block-buttons"> <a href="https://github.com/modularcode/modular-admin-html" class="btn btn-sm header-btn">
                <i class="fa fa-github-alt"></i>
                <span>View on GitHub</span>
            </a> <a href="https://github.com/modularcode/modular-admin-html/stargazers" class="btn btn-sm header-btn">
                <i class="fa fa-star"></i>
                <span>Star Us</span>
            </a> <a href="https://github.com/modularcode/modular-admin-html/releases/download/v1.1.1/modular-admin-html-1.1.1.zip" class="btn btn-sm header-btn">
                <i class="fa fa-cloud-download"></i>
                <span>Download .zip</span>
            </a> </div>
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
                                    <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div> <span class="name">
                      John Doe
                    </span> </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1"> <a class="dropdown-item" href="#">
                      <i class="fa fa-user icon"></i>
                      Profile
                    </a> <a class="dropdown-item" href="#">
                      <i class="fa fa-bell icon"></i>
                      Notifications
                    </a> <a class="dropdown-item" href="#">
                      <i class="fa fa-gear icon"></i>
                      Settings
                    </a>
                                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="login.html">
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
                                <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Modular Admin </div>
                        </div>
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">
                                <li class="active"> <a href="index.html">
                            <i class="fa fa-home"></i> Dashboard
                        </a> </li>
                                <li> <a href="">
                            <i class="fa fa-th-large"></i> Items Manager
                            <i class="fa arrow"></i>
                        </a>
                                    <ul>
                                        <li> <a href="items-list.html">
                                    Items List
                                </a> </li>
                                        <li> <a href="item-editor.html">
                                    Item Editor
                                </a> </li>
                                    </ul>
                                </li>
                                <li> <a href="">
                            <i class="fa fa-bar-chart"></i> Charts 
                            <i class="fa arrow"></i>
                        </a>
                                    <ul>
                                        <li> <a href="charts-flot.html">
                                    Flot Charts
                                </a> </li>
                                        <li> <a href="charts-morris.html">
                                    Morris Charts
                                </a> </li>
                                    </ul>
                                </li>
                                <li> <a href="">
                            <i class="fa fa-table"></i> Tables
                            <i class="fa arrow"></i>
                        </a>
                                    <ul>
                                        <li> <a href="static-tables.html">
                                    Static Tables
                                </a> </li>
                                        <li> <a href="responsive-tables.html">
                                    Responsive Tables
                                </a> </li>
                                    </ul>
                                </li>
                                <li> <a href="forms.html">
                            <i class="fa fa-pencil-square-o"></i> Forms
                        </a> </li>
                                <li> <a href="">
                            <i class="fa fa-desktop"></i> UI Elements
                            <i class="fa arrow"></i>
                        </a>
                                    <ul>
                                        <li> <a href="buttons.html">
                                    Buttons
                                </a> </li>
                                        <li> <a href="cards.html">
                                    Cards
                                </a> </li>
                                        <li> <a href="typography.html">
                                    Typography
                                </a> </li>
                                        <li> <a href="icons.html">
                                    Icons
                                </a> </li>
                                        <li> <a href="grid.html">
                                    Grid
                                </a> </li>
                                    </ul>
                                </li>
                                <li> <a href="">
                            <i class="fa fa-file-text-o"></i> Pages
                            <i class="fa arrow"></i>
                        </a>
                                    <ul>
                                        <li> <a href="login.html">
                                    Login
                                </a> </li>
                                        <li> <a href="signup.html">
                                    Sign Up
                                </a> </li>
                                        <li> <a href="reset.html">
                                    Reset
                                </a> </li>
                                        <li> <a href="error-404.html">
                                    Error 404 App
                                </a> </li>
                                        <li> <a href="error-404-alt.html">
                                    Error 404 Global
                                </a> </li>
                                        <li> <a href="error-500.html">
                                    Error 500 App
                                </a> </li>
                                        <li> <a href="error-500-alt.html">
                                    Error 500 Global
                                </a> </li>
                                    </ul>
                                </li>
                                <li> <a href="https://github.com/modularcode/modular-admin-html">
                            <i class="fa fa-github-alt"></i> Theme Docs
                        </a> </li>
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


  <div class="col-lg-12 text-center " style="margin-bottom: 20px; padding-bottom: 50px;">
                <div id="calendar" class="col-centered">






                </article>
                <footer class="footer">
             
                </footer>
              
   
        <script src="../js/vendor.js"></script>
        <script src="../js/app.js"></script>
    </body>
            
          
                




<!-- Page Content -->

    <!-- /.row -->

    <!-- Modal -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="controll.php">

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
                <form class="form-horizontal" method="POST" action="DeleteEmploi.php">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modifier</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Titre</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="day" class="col-sm-3 control-label">Jour</label>
                            <div class="col-sm-8">
                                    <select name="day" class="form-control" id="day"  required>
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
                                <input type="time" name="start" class="form-control" id="start1" required onblur="verifDate('start1','end1');">
                                <div id="erreurE" style="color: #ff3030"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end" class="col-sm-3 control-label">Heure Fin</label>
                            <div class="col-sm-8">
                                <input type="time" name="end" class="form-control" id="end1" required onblur="verifDate('start1','end1');">
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label style="color: crimson"><input type="checkbox"  name="delete"> Supprimer</label>
                                </div>
                            </div>
                        </div>


                        <input type="hidden" name="id" class="form-control" id="id">
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

<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js">
</script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- FullCalendar -->
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src="fullcalendar/fullcalendar.js"></script>
<script src="fullcalendar/locale/fr.js"></script>

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


</html>
  <script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"../notification/select.php",
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
   url:"../notification/notif.php",
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
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"../projet-2cpi-/notification/select.php",
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
   url:"../projet-2cpi-/notification/notif.php",
   method:"POST",
   data:{},
   success:function(data)
   {
    
   }
  });
 
 }, 3000);
});
</script>
  