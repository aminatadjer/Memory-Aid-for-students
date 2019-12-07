<!DOCTYPE html>
<html>
<head>
	<title>Notifications</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			 <ul class="nav navbar-nav navbar-right"> 
			 	<li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span style="font-size:18px;"><i class="fas fa-bell" style="color:#90EE90;"></i> Notifications</span></a>
                 <ul class="dropdown-menu"></ul>
                </li>
			 </ul>
		</div>
	</nav>
</div>
</body>
</html>
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    { 
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 
 $(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
 });

 setInterval(function(){ 
  load_unseen_notification();
 }, 2000);

  setInterval(function(){ 
  	 $.ajax({
   url:"notif.php",
   method:"POST",
   data:{},
   success:function(data)
   {
    
   }
  });
 
 }, 3000);
});
</script>