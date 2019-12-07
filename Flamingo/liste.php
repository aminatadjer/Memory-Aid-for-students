<?php
require('liste/Select.php');
$bdd = new PDO('mysql:host=localhost;dbname=flamingo;charset=utf8', 'root', '');
$sql = "SELECT *  FROM  Utilisateur Where id_user='" . $_COOKIE['ID'] . "' ";

$req = $bdd->prepare($sql);
$req->execute();
$users = $req->fetch();
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
    <script>
        var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
        var themeName = themeSettings.themeName || '';
        if (themeName) {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
        }
        else {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
        }
    </script>
</head>

<body>
<div class="main-wrapper">
    <div class="app" id="app">
        <header class="header">
            <div class="header-block header-block-collapse hidden-lg-up">
                <button class="collapse-btn" id="sidebar-collapse-btn">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="header-block header-block-search hidden-sm-down">
                <form role="search">
                    <div class="input-container"><i class="fa fa-search"></i> <input type="search" placeholder="Search">
                        <div class="underline"></div>
                    </div>
                </form>
            </div>
            <div class="header-block header-block-collapse">
                <span class="counter "> Liste des Activités</span>
            </div>

            <div class="header-block header-block-nav">
                <ul class="nav-profile">
                    <li class="notifications new "><a class="hola" href="" data-toggle="dropdown">
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
                                    <li><a href="">
                                            View All
                                        </a></li>
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
                            </a></div>
                    </li>
                </ul>
            </div>
        </header>
        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <div class="brand">
                        <div class="logo"><span class="l l1"></span> <span class="l l2"></span> <span
                                    class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span></div>
                        Modular Admin
                    </div>
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
                                        <li class="active"> <a href="liste.php">
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
                                        <div class="col-xs-4"></div>
                                        <div class="col-xs-4"><label class="title">fixed</label></div>
                                        <div class="col-xs-4"><label class="title">static</label></div>
                                    </div>
                                    <div class="row hidden-md-down">
                                        <div class="col-xs-4"><label class="title">Sidebar:</label></div>
                                        <div class="col-xs-4"><label>
                                                <input class="radio" type="radio" name="sidebarPosition"
                                                       value="sidebar-fixed">
                                                <span></span>
                                            </label></div>
                                        <div class="col-xs-4"><label>
                                                <input class="radio" type="radio" name="sidebarPosition" value="">
                                                <span></span>
                                            </label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4"><label class="title">Header:</label></div>
                                        <div class="col-xs-4"><label>
                                                <input class="radio" type="radio" name="headerPosition"
                                                       value="header-fixed">
                                                <span></span>
                                            </label></div>
                                        <div class="col-xs-4"><label>
                                                <input class="radio" type="radio" name="headerPosition" value="">
                                                <span></span>
                                            </label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4"><label class="title">Footer:</label></div>
                                        <div class="col-xs-4"><label>
                                                <input class="radio" type="radio" name="footerPosition"
                                                       value="footer-fixed">
                                                <span></span>
                                            </label></div>
                                        <div class="col-xs-4"><label>
                                                <input class="radio" type="radio" name="footerPosition" value="">
                                                <span></span>
                                            </label></div>
                                    </div>
                                </div>
                                <div class="customize-item">
                                    <ul class="customize-colors">
                                        <li><span class="color-item color-red" data-theme="red"></span></li>
                                        <li><span class="color-item color-orange" data-theme="orange"></span></li>
                                        <li><span class="color-item color-green active" data-theme=""></span></li>
                                        <li><span class="color-item color-seagreen" data-theme="seagreen"></span></li>
                                        <li><span class="color-item color-blue" data-theme="blue"></span></li>
                                        <li><span class="color-item color-purple" data-theme="purple"></span></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <a href="">
                            <i class="fa fa-cog"></i> Customize
                        </a></li>
                </ul>
            </footer>
        </aside>
        <div class="sidebar-overlay" id="sidebar-overlay"></div>
        <article class="content dashboard-page">
            <?php echo $output; ?>
        </article>
        <footer class="footer">

        </footer>

        <!-- /.modal -->
        <div class="modal fade" id="confirm-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"><i class="fa fa-warning"></i></h4>
                    </div>
                    <div class="modal-body">
                        <p>Etes vous sur de vouloir supprimer cet element?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary supp" data-dismiss="modal">Oui</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
</body>


</html>
<script>
    $(document).ready(function () {

        function load_unseen_notification(view = '') {
            $.ajax({
                url: "notification/select.php",
                method: "POST",
                data: {view: view},
                dataType: "json",
                success: function (data) {
                    $('.notifications-dropdown-menu').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('.count').html(data.unseen_notification);
                    }
                }
            });
        }

        load_unseen_notification();


        $(document).on('click', '.hola', function () {
            $('.count').html('');
            load_unseen_notification('yes');
        });

        setInterval(function () {
            load_unseen_notification();
        }, 2000);

        setInterval(function () {
            $.ajax({
                url: "notification/notif.php",
                method: "POST",
                data: {},
                success: function (data) {

                }
            });

        }, 3000);
    });
    $('.remove').click(function (element) {
        let id = element.target.id;
        let lesParents = $(element.target).parents();
        let i = 0;
        let cpt = 0;
        while (i < lesParents.length && cpt != 5) {
            if (lesParents[i].tagName != "LI") {
                cpt++;
            }
            i += 1;
        }
        $('.supp').click(function () {
            if (i < lesParents.length)
                lesParents[i].remove();
            $.ajax({
                url: "liste/Delete.php",
                method: "POST",
                data: {id: id},
            });a
        });


    });
    $('.checkbox').click(function (element) {
        let id = element.target.id;
        let done = $('#' + id).is(':checked');
        if (done == true) faite = 1;
        else faite = 0;
        let array = {id: id, faite: faite};
        $.ajax({
            url: "liste/Update.php",
            method: "POST",
            data: {array: array},
        });
    });
    $('.removeActivite').click(function (element) {
        let id = element.target.id;
        $('.supp').click(function () {
            $("#act"+id).remove();
            $("#id"+id).remove();
             $.ajax({
                  url :"liste/DeleteActivity.php",
                  method : "POST",
                  data : {id:id},
              });
        });

    });
</script>
