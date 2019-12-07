<?php
require('model.php');
require('connexion.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FlaminGo</title>
    <link rel="stylesheet" type="text/css" href="css1/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css1/feuille.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="css1/feuille.js"></script>
    <style type="text/css">

    </style>
</head>
<body>
<div class="headi">
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
                            <h2>jfkqzh fjkqshjhfl q</h2>
                            <p> Dazkjedlkajzedlkjazemlkdjmzalkjdkmzaejd </p>
                            <p> Dazkjedlkajzedlkjazemlkdjmzalkjdkmzaqsfmqskfmlqsjgmqkljsgm</p>
                            <p> ajzedlkjazemlkdjmzalkjdkmzaejd </p>
                        </div>
                        <div class="carousel-item">
                            <h2>jfkqzh fjkqshjhfsdnjksfl q</h2>
                            <p> jqhsdjklqhf ljqshflkjsfkfmlskfml q hsflkjqshfl kjqshfljksqhf lqjskhf ljsfh qljhsf</p>
                        </div>
                        <div class="carousel-item">
                            <h2>hze sejh</h2>
                            <h1>jshdf slfdjhskdjhfljksdhf lkjsdhf ljkshdf lksjhf lsjdkhf lkj hfkljsdhflkjsd f</h1>
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
                <h1>Premier article </h1>
                <p> jhqjh qjshf qkjshfjkazdhe ajklzehdjkzeahdkjzeahdjkzeahdljkzhaed qjshf qjs hflq
                    JHFSLQJKHFLJQSHFJSFHJQS JFHQJ ljhj jhlkj hljh ljh ljh ljhlkjh ljh lkjh lkjh lkjh jklh lkjhlkj </p>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <h1>Deuxième article </h1>
                <p>jhqjh qjshf qkjshf qjekdjzalkjelkdjakzdjlkzajdmlkazejdmklaejdasezajkdhazk jedh zajkehdhf qjs hflq
                    JHFSLQJKHFLJQSHFJSFHJQS JFHQJ ljhj jhlkj hljh ljh ljh ljhlkjh ljh lkjh lkjh lkjh jklh lkjhlkj</p>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <h1>Troisième article </h1>
                <p>jhqjh qjshf qkjshf hjfg jhdzakje qjshf qjs hflq JHFSLQJKHFLJQSHFJSFHJQS JFHQJ ljhj jhlkj hljh ljh ljh
                    ljhlkjh ljh lkjh lkjh lkjh jklh lkjhldzajedlkjzaeklmdjzaemlkdjzmlkajdmzakjedmkzajdzaemkdjkj</p>
            </article>
        </div>
    </div>
    <section class="containerfluid images">
        <div class="container">
            <div class="row">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <img src="img/img1.jpg">
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <img src="img/img2.jpg">
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <img src="img/img2.jpg">
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

                        <form id="inscription" action="Controls.php" method="post">
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
                url: "Verif.php",
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
                url: "Verif.php",
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