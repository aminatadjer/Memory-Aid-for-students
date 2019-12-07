<?php 

$bdd = new PDO('mysql:host=localhost;dbname=flamingo;charset=utf8', 'root', '');

$sql = "SELECT *  FROM  Utilisateur Where id_user='".$_COOKIE['ID']."' ";


$req = $bdd->prepare($sql);
$req->execute();
$users = $req->fetch();



?>


<!DOCTYPE html>

<html>
<head>
	<title> Flamingo</title>
	<style type="text/css">
		
	</style>
	 <link href="css/bootstrap.min.css" rel="stylesheet">
	     <meta charset="utf-8">
	     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
         <script src="js/jquery.js"></script>

      <script src="js/bootstrap.min.js"></script>
	
       <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
       <script src="js/bootstrap.min.js"></script>
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
                                <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> FlaminGo </div>
                        </div>
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">
                              >
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
                           <li class=""> <a href="bilan.php">
                            <i class="fa fa-bar-chart"></i> Bilan
                        
                             </a>
                                
                                </li>
                                    <li class=""> <a href="guide.html " target="_blank">
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


             <div class="" id="list" style="width: 1600px; padding-top: 120px;padding-left:250px;" ">
    <div class="row" style=" ">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    
                    <div class="col-sm-2 col-md-4 col-xs-6">
                       <img src='<?php echo $users['Photo']?>' style="width: 170px;height :200px;" onclick="pic()" class="img-rounded img-responsive">
                    </div>
                    <div class="col-sm-10 col-md-8 col-xs-6">
                        <h4> <?php echo $users['nom'].' '. $users['prenom'] ?>  </h4>
                       
                        <p>
                            <i class="glyphicon glyphicon-envelope"> </i> <?php echo $users['mail'] ?> 
                            <br />
                            <i class="fa fa-phone"></i><a href="#"> <?php echo $users['tel'] ?></a>
                            <br />
                            <br/>
                        
                            <button type="button" style="margin: 0.5em;"  class="btn btn-primary btn-sm btn-xm small col-lg-8 col-md-12" onclick="show()" > <span class=" fa fa-gears "></span> 
                                Modifier </button>
                            <button type="button" style="margin: 0.5em;" class="btn btn-primary btn-sm btn-xm small col-lg-8 col-md-12" onclick="showpwd()">Changer password</button>
                            </button>

                             <button type="button" style="margin: 0.5em;" class="btn btn-primary btn-sm btn-xm small col-lg-8 col-md-12" onclick="showmail()" >  <span class=" fa fa-user"></span> Changer compte </button>
                            </button>
                          
                    </div>
                </div>
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
    </body>





<!--bouton-->



<div class="modal fade" id="Motdepasse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" >
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" >Changer le mot de passe :</h4>
			  </div>
			  <div class="modal-body">

                 <div class="form-group">
					<label for="ancpwd" class="col-sm-4 control-label">Ancien password:</label>
					<div class="col-sm-6">
						<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>

					  <input type="password" name="ancpwd" class="form-control" id="ancpwd" >
					  </div>
					  <div id="erreurancpwd" class="small" style="color: red"></div>
					</div>
				  </div>

				  <div class="form-group">
					<label for="newpwd" class="col-sm-4 control-label">Nouveau password:</label>
					<div class="col-sm-6">
						<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
					  <input type="password" name="newpwd" class="form-control" id="newpwd" >
					  </div>
					  <div id="erreurnewpwd" class="small" style="color: red"></div>
					</div>
				  </div>
            

				  <div class="form-group">
					<label for="newpwd" class="col-sm-4 control-label">Confirmez password :</label>
					<div class="col-sm-6">
						<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
					  <input type="password" name="confpwd" class="form-control" id="confpwd" >
					  </div>
					  <div id="erreurconfpwd" class="small" style="color: red"></div>
					</div>
				  </div>



</div>
    <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				<button type="submit" class="btn btn-primary" id="submitpwd">Enregistrer </button>
			  </div>
			  
</form>
</div>
</div>
</div>

<div class="modal fade" id="editmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" >
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" >Changer de compte</h4>
			  </div>
			  <div class="modal-body">
               <div class="form-group">
					<label for="newmail" class="col-sm-4 control-label">E-mail :</label>
					<div class="col-sm-6">
						<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
					  <input type="email" name="newmail" class="form-control" id="newmail" >
					  </div>
					  <div id="erreurmail" class="small" style="color: red"></div>
					</div>
				</div> 
      

     <div class="form-group">
					<label for="confpwd2" class="col-sm-4 control-label">Confirmez votre mot de passe :</label>
					<div class="col-sm-6">
						<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
					  <input type="password" name="confpwd2" class="form-control" id="confpwd2" >
					  </div>
					  <div id="erreurconfpwd2" class="small" style="color: red"></div>
					</div>
				  </div>
   </div>
    <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				<button type="submit" class="btn btn-primary" id="mailsubmit">Enregistrer </button>
			  </div>
			  </form>
</form>
</div>
</div>
</div>

<div class="modal fade" id="editpic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
<div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="Utilisateur/Editpic.php" enctype="multipart/form-data" >
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" >Chnager La photo de profile </h4>
			  </div>
			  <div class="modal-body">

           <center>
			  <img src='<?php echo $users['Photo']?>' style="width: 200px;height :200px;" class="arrondie">
            </center>
			  <div class="form-group">
			  <center>
			  
			  <input type="file" accept="image/*" name="pic"  />
			  	</center>
			  </div>

</div>
			 <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				<button type="submit" class="btn btn-primary" id="picsubmit">Enregistrer </button>
			  </div>
			  </form>
</form>
</div>
</div>
</div>  

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" >
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" >Configurer votre compte</h4>
			  </div>
                    <div class="modal-body">
                  <div class="form-group">
                         
					<label for="nom" class="col-sm-3 control-label">Nom :</label>
					<div class="col-sm-7">
					<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
					  <input type="text" name="nom" class="form-control" id="nom" >
					  </div>
					</div>
				  </div>

				   <div class="form-group">

					<label for="prenom" class="col-sm-3 control-label">Prenom :</label>
					<div class="col-sm-7">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
					  <input type="text" name="prenom" class="form-control" id="prenom" >
					  </div>
					</div>
				  </div>
				   
				   <div class="form-group">
					<label for="nom" class="col-sm-3 control-label">Tel :</label>
					<div class="col-sm-7">
					<div class="input-group">
			<span class="input-group-addon">
			<i class="fa fa-phone"></i>
			</span>
					  <input type="text" name="tel" class="form-control" id="tel" >
					  </div>
					</div>
				  </div>
				  <div class="form-group">

					<label for="nom" class="col-sm-3 control-label">Mot de Passe : </label>
					<div class="col-sm-7">
						<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
					  <input type="password" name="pwd" class="form-control" id="pwd" >
					  </div>
					  <div id="erreurpwd" class="small"  style="color: red"></div>
					</div>
				  </div>

					

       </div>
    <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				<button type="submit" class="btn btn-primary" id="submit">Enregistrer </button>
			  </div>
			  </form>
</form>
</div>
</div>
</div>






<script type="text/javascript">


$(document).ready(function(){
	$('#afficher').click(function(e){
	
    document.getElementById('list').style.display ="block" ;
	});


    $("#submit").click(function(e){
    	e.preventDefault() ;
      
       var data ={'nom':$("#nom").val(), 'prenom' :$("#prenom").val() , 'tel':$("#tel").val() , 'pwd':$('#pwd').val() } 

        $.ajax({
			 url: 'Utilisateur/config.php',
			 type: "POST",
			 data: data ,
			 success: function(rep) {
                alert(rep);
					if(rep == 'OK'){
						document.location.href ='user.php' ;
						 $('#erreurpwd').html('') ;
						

					}else{
						if (rep=='ERREUR') { $('#erreurpwd').html('Mot de Passe incorrecte') ;
					     }
					     		
					}
				}

			});

    } 

   );
    $("#submitpwd").click(function(e){

    	e.preventDefault() ;

    	var data={'ancpwd':$('#ancpwd').val() , 'newpwd':$('#newpwd').val() , 'confpwd':$('#confpwd').val()  }

    	  $.ajax({
			 url: 'Utilisateur/EditPwd.php',
			 type: "POST",
			 data: data ,
			 success: function(rep) {
					if(rep == 'OK'){
						document.location.href ='user.php' ;
					}else{
						if(rep == 'Confirmez votre mot de passe') { $('#erreurconfpwd').html('Confirmez votre mot de passe') ;
						$('#erreurancpwd').html('');

					}
					    if (rep == 'Mot de passe incorrecte' ) {$('#erreurancpwd').html('Mot de Passe incorrecte') ;
					    $('#erreurconfpwd').html('');
					}
						
					}
				}

			});
    }
  );

    $('#mailsubmit').click(function(e){
    	e.preventDefault();



    });


    $('#newmail').blur(function(e){
     //vérifier le mail existant
        var data ={'newmail':$('#newmail').val()}
         $.ajax({
			 url: 'Utilisateur/EditMail.php',
			 type: "POST",
			 data: data ,
			 success: function(rep) {


			 	if(rep== 'Compte existant deja') $('#erreurmail').html('Compte existant deja') ;
			 	else if( rep == 'Cet email a un format non adapté.') $('#erreurmail').html('Cet email a un format non adapté.') ;
			 	else $('#erreurmail').html('');

        }
       });

    }); //

    $('#confpwd2').keyup(function(e){
     //vérifier le mail existant
        var data ={'pwd':$('#confpwd2').val()}
         $.ajax({
			 url: 'Utilisateur/EditMail.php',
			 type: "POST",
			 data: data ,
			 success: function(rep) {
			 	if (rep== 'Mot de passe incorrecte') $('#erreurconfpwd2').html('Mot de passe incorrecte');
			 	else{ $('#erreurconfpwd2').html(''); }
			 	
              }

       });


    });

$('#mailsubmit').click(function(e){
     //vérifier le mail existant
        var data ={'pwd':$('#confpwd2').val() , 'newmail':$('#newmail').val()}
         $.ajax({
			 url: 'Utilisateur/EditMail.php',
			 type: "POST",
			 data: data ,
			 success: function(rep) {
			 	if (rep== 'OK') {

                $('#erreurmail').html('') ;
                $('#erreurconfpwd2').html('');
                document.location.href='user.php' ;

			 	}else {

			 	if(rep== 'Compte existant deja') $('#erreurmail').html('Compte existant deja') ;
			 	if(rep == 'Cet email est correct.')  $('#erreurmail').html('') ;
			 	if( rep == 'Cet email a un format non adapté.') $('#erreurmail').html('Cet email a un format non adapté.') ;
			 	if(rep == 'Mot de passe incorrecte') $('#erreurconfpwd2').html('Mot de passe incorrecte');
			 }
              }

       });



    });


});




function show(){
	$('#erreurpwd').html('');
	$('#nom').val(  '<?php echo $users['nom'] ?> ' ) ;
	$('#prenom').val('<?php echo $users['prenom'] ?>') ;
    $('#tel').val( '<?php echo $users['tel'] ?> ' ) ;
    $('#pwd').val('');
	$('#edit').modal('show');
}
function showpwd(){
	$('#ancpwd').val(''); 
$('#newpwd').val('');
$('#confpwd').val('') ;
	 $('#erreurconfpwd').html('') ;
	 $('#erreurancpwd').html('');

	$('#Motdepasse').modal('show');
}
function showmail(){
	$('#newmail').val('');
$('#erreurmail').html('');
$('#confpwd2').val('');
$('#erreurconfpwd2').html('');

	$('#editmail').modal('show');
}
function pic(){
	$('#editpic').modal('show');
}
</script>
 <!-- jQuery Version 1.11.1 -->

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