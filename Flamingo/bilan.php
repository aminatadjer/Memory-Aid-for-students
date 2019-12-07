<?php 
putenv("TZ=EURPE/Paris");
$bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
if ($_COOKIE['ID']==0) {
  header('Location:page1.php');
}

$sql = "SELECT *  FROM  utilisateur Where id_user='".$_COOKIE['ID']."' ";

$req = $bdd->prepare($sql);
$req->execute();
$users = $req->fetch();
$date=date('Y-m-d H:i:s');
$query="SELECT * FROM events Where id_user='".$_COOKIE['ID']."' ";
$result=$bdd->prepare($query);
$result->execute();
$cpt=0.00000000000001;
$cpt1=0;
$cpt2=0;
$cpt3=0;

while ($row = $result->fetch()) {
    $cpt=$cpt+1;

    if ($row['end']<$date) {
        # code...
   

    if ($row['Faite']==1) {$cpt1=$cpt1+1;  } 
    else {$cpt2=$cpt2+1;} }
    else{$cpt3=$cpt3+1;}
}
$perc1=$cpt1/$cpt;
$perc2=$cpt2/$cpt;
$perc3=$cpt3/$cpt;
$perc1=round($perc1,4);
$perc2=round($perc2,4);
$perc3=round($perc3,4);




 ?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <!-- Theme initialization -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 

           <link href="css/style.css" rel="stylesheet">
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
                                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="Utilisateur/deconnex.php">
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
                           <li class=""> <a href="contact.php">
                            <i class="fa fa-user"></i> Carnet d'adresses
                        </a> </li>
                           <li class="active"> <a href="bilan.php">
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
                <div class="  main">
       
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bilan général : <small>(Depuis la première connexion)</small></h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            
            <div class="col-xs-6 col-md-4">
                <span style="color: #1ebfae; font-size: 20px;margin-left: 80px;" >   Tahes réalisées  </span>
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $perc1*100 ?>" ><span class="percent"><?php echo $perc1*100; ?>%</span></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4">
                <span style="color: #ffb53e; font-size: 20px;margin-left: 80px;" >   Taches en attente  </span>
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $perc3*100 ?>" ><span class="percent"><?php echo $perc3*100; ?>%</span></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4">
                <span style="color: #f9243f; font-size: 20px;margin-left: 60px;" >   Taches non réalisées  </span>
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $perc2*100 ?>" ><span class="percent"><?php echo $perc2*100; ?>%</span></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bilan hebdomadaire</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Taches programmées/ taches non réalisées cette dérnière semaine
                        
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
            <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Activitées et leurs taches
                       
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <canvas class="chart" id="radar-chart" ></canvas>
                        </div>
                    </div>
                </div>
            </div>
              <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bilan du moi(4 dérnières semaines)</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bar Chart
                
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->      
        
     
  
   </div>



                </article>
                <footer class="footer">
             
                </footer>
              
   
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>


    <script src="js/chart.min.js"></script>
    <?php require('js/chart.php') ?>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
    window.onload = function () {
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleFontColor: "#c5c7cc"
    });
    var chart2 = document.getElementById("bar-chart").getContext("2d");
    window.myBar = new Chart(chart2).Bar(barChartData, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleFontColor: "#c5c7cc"
    });
    var chart3 = document.getElementById("doughnut-chart").getContext("2d");
    window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
    responsive: true,
    segmentShowStroke: false
    });
    var chart4 = document.getElementById("pie-chart").getContext("2d");
    window.myPie = new Chart(chart4).Pie(pieData, {
    responsive: true,
    segmentShowStroke: true
    });
    var chart5 = document.getElementById("radar-chart").getContext("2d");
    window.myRadarChart = new Chart(chart5).Radar(radarData, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.05)",
    angleLineColor: "rgba(0,0,0,.2)"
    });
    var chart6 = document.getElementById("polar-area-chart").getContext("2d");
    window.myPolarAreaChart = new Chart(chart6).PolarArea(polarData, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    segmentShowStroke: false
    });
};
    </script>   
    </body>
    <div class="modal" tabindex="-1" role="dialog" id="alo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
<script >
     $(document).ready(function()
 {
   $('#easypiechart-blue').click(function(){ 
        $('#alo').modal('show'); 
           
      }); });

</script>

