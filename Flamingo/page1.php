<?php
require('projet front/model.php');
require('connexion.php');



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FlaminGo</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/feuille.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/feuille.js"></script>
    <style type="text/css">

    </style>
</head>
<body>
<div class="headi sticky-top">
    <header class=" containerfluid header">
        <div class="container">
            <div class="logo">
                <a href="">Flamingo</a>
            </div>
            <nav class="menu">
                <a href="">Acceuil</a>
                <a href="#inscription">Inscription</a>
                <a href="#about">A-propos</a>

            </nav>
        </div>

    </header>
</div>
<section class="container-fluid banner">
    <div class="ban">
        <img src="img/img1.jpg">
    </div>
    <div class="inner-banner">
        <div class="row">
            <article class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <h1>Bienvenue sur le site </h1>
                <br> <br>

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <h2 style="font-size:25px; ">Découvrer toutes les fonctionalitées de cette application!</h2>
                            <p style="font-size:21px; "> Programmez des taches et des évenements dans votre planning </p>
                            <p style="font-size:21px; "> Vous pouvez tout de meme plannifier des activitées </p>
                            <p>  </p>
                        </div>
                        <div class="carousel-item">
                            <h2 style="font-size:21px; ">Ajoutez vos contacts sur votre carnet d'adresse</h2>
                            <p style="font-size:21px; "> Recevez des notifications et emails comme rappels</p>
                        </div>
                        <div class="carousel-item">
                            <h2></h2>
                            <h1 style="font-size:21px; ">Vous voullez savoir si vous respectez votre planning, alors consultez régulièrement votre bilan</h1>
                        </div>

            </article>
            <article class="col-lg-4 col-md-4 col-xs-12 col-sm-12 " style="border-left: ridge; "
            ">
            <div class="container col-lg-8 ">
                <h1> Connexion</h1>
                <form method="POST">
                    <input type="email" name="email" placeholder="Votre adresse mail " class="form-control"
                           style="height: 40px;"
                           value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ""; ?>">
                    <div style="color: crimson; font-size: small ;"><?= isset($_SESSION['erreurs']['email']) ? $_SESSION['erreurs']['email'] : ""; ?></div>
                    <br>
                    <input type="password" name="password" placeholder="Mot de passe" class="form-control" style="height: 40px;">
                   <div style="color: crimson ; font-size: small"><?= isset($_SESSION['erreurs']['password']) ? $_SESSION['erreurs']['password'] : ""; ?></div>
                    <button class="submit btn btn-primary" name="connexion" style=" background-color: #0B5159; ">
                        connexion
                    </button>
                </form>
                </article>
            </div>
        </div>

    </div>

</section>
<section class="container-fluid about">
    <div class="container">
        <h1 id="about"> A propos de l'application </h1>
        <hr class="separator">
        <div class="row">
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <h1>Carnet d'adresse </h1>
                <p> Vous pouvez ajouter des contacts , modifier leurs informations personelles , les supprimer, et effectuer une recherche </p>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <h1>Planning des taches et évenemnts </h1>
                <p>Programmez des taches et des évenement dans le planning , vous pouvez l'afficher par jour/semaine/moi</p>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <h1>Documents </h1>
                <p>Vous pouvez ajouter des documents pour vous aider à réviser, ainsi pour chaque tache vous pouvez lui associer son document</p>
            </article>
        </div>
    </div>
    <section class="containerfluid images">
        <div class="container">
            <div class="row">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <img src="img/Capture.png">
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <img src="img/Capture1.png">
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <img src="img/Capture3.png">
                </article>
            </div>
        </div>


         <div class="container">
        <div class="row">
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <h1>Planning pédaogogique </h1>
                <p> Ajoutez votre planning pédagogique( vaccances/examens/cours/td/tp)</p>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <h1>Emploi du temps </h1>
                <p>Cette application vous permet d'intégrer aussi votre emploi du temps</p>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <h1>Bilan </h1>
                <p>Le bilan vous donne les informations sur votre comportement vis-à-vis de votre planning , et vous renvois les statistiques</p>
            </article>
        </div>
    </div>
    <section class="containerfluid images">
        <div class="container">
            <div class="row">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <img src="img/Capture4.png">
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <img src="img/Capture5.png">
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <img src="img/a26.png">
                </article>
            </div>
        </div>

    </section>
    <section class="container-fluid inscription">
        <div class="container">
            <div class="form">


                <div class="tab-content">
                    <div id="signup">
                        <h1 id="inscription">Inscrivez-vous</h1>
                        <hr class="separator">

                        <form id="inscription" action="projet front/Controls.php" method="post">
                            <div class="top-row">
                                <div class="field-wrap">
                                    <label>
                                        <span class="req"></span>
                                    </label>
                                    <input type="text" required autocomplete="off" name="nom" id="nom" placeholder="Nom"
                                           class="form-control " style="height: 40px;"/>
                                </div>


                                <div class="field-wrap">
                                    <label>
                                        <span class="req"></span>
                                    </label>
                                    <input type="text" required autocomplete="off" name="prenom" id="prenom"
                                           placeholder="Prénom" class="form-control " style="height: 40px;"/>
                                </div>
                                <div class="field-wrap">
                                    <label>
                                        <span class="req"></span>
                                    </label>
                                    <input type="email" required autocomplete="on" name="mail"
                                           placeholder="Adresse mail" class="form-control " id="mail"
                                           style="height: 40px;" onblur="mailExistant()"/>
                                    <div id="erreurMail" style="color: crimson"></div>
                                </div>
                            </div>
                            <div class="field-wrap">
                                <label>
                                    <span class="req"></span>
                                </label>
                                <input type="text" required autocomplete="off" name="tel" id="tel"
                                       placeholder="Numéro de téléphone" class="form-control " style="height: 40px;"
                                       onkeyup="VerifTel()"/>
                                <div id="erreurTel" style="color: crimson"></div>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    <span class="req"></span>
                                </label>
                                <input type="password" name="pwd" required autocomplete="off" id="pwd"
                                       placeholder="Mot de passe" class="form-control " style="height: 40px;"
                                       onkeydown="verifPwd()"/>
                                <span id="erreurPwd" style="color: crimson"></span>
                            </div>
                            <div class="field-wrap">
                                <label>
                                    <span class="req"></span>
                                </label>
                                <input name="pwdConfirm" id="pwdConfirm" type="password" required autocomplete="off"
                                       placeholder="Confirmer Mot de passe" class="form-control " style="height: 40px;"
                                       onblur="verifPwdConfirm()"/>
                                <span id="erreurPwdConfirm" style="color: crimson"></span>
                            </div>

                            <button type="submit" name="submit" class="button button-block"/>
                            Valider</button>

                        </form>

                    </div>

                    <div id="login">
                        <h1>Welcome Back!</h1>


                    </div>

                </div><!-- tab-content -->

            </div> <!-- /form -->

        </div>


    </section>
    <footer class="footer">

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        function VerifTel() {
            let tel = $('#inscription #tel').val();
            $.ajax({
                url: "projet front/Verif.php",
                method: "POST",
                data: {tel: tel},
                success: function (data) {
                    $('#inscription #erreurTel').html(data);
                }
            });
        }

        function verifPwdConfirm() {
            let pwd = $('#inscription #pwd').val();
            if (pwd.length == 0) $('#inscription #erreurPwd').html('Mot de passe trop court');
            let pwdC = $('#inscription #pwdConfirm').val();
            if (pwd == pwdC) {
                $('#inscription #erreurPwdConfirm').html('');
            }
            else {
                $('#inscription #erreurPwdConfirm').html('Mots de passes incompatibles');
            }
        }

        function verifPwd() {
            let pwd = $('#inscription #pwd').val();
            if (pwd.length < 8) $('#inscription #erreurPwd').html('Mot de passe trop court');
            else $('#inscription #erreurPwd').html('');
        }


        function mailExistant() {
            let mail = $('#inscription #mail').val();
            $.ajax({
                url: "projet front/Verif.php",
                method: "POST",
                data: {mail: mail},
                success: function (data) {
                    $('#inscription #erreurMail').html(data);
                }
            });
        }

    </script>
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