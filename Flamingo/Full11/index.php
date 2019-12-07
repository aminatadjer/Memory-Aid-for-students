<?php
     require_once('bdd.php');
     
     $id_user =  '2';
     $sql = "SELECT * FROM events Where id_user ='$id_user' ";
     
     $req = $bdd->prepare($sql);
     $req->execute();
     $events = $req->fetchAll();
     
     $reqact = $bdd->prepare("SELECT designation FROM activite WHERE id_user = '2' ORDER BY designation");
     $reqact->execute();
     $reqact1 = $bdd->prepare("SELECT designation FROM activite WHERE id_user = '2' ORDER BY designation");
     $reqact1->execute();
     $reqact2 = $bdd->prepare("SELECT designation FROM activite WHERE id_user = '2' ORDER BY designation");
     $reqact2->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- FullCalendar -->
    <link href='css/fullcalendar.css' rel='stylesheet'/>


    <!-- Custom CSS -->
    <style>

    .boutonfaite{
    border: none;
}
.glyphicon-remove{
    font-size: 30px; 
}
    .glyphicon-ok {
    font-size: 30px;
}
        body {
            padding-top: 70px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }

        #calendar {
            max-width: 800px;
        }

        .col-centered {
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

<body>


<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12 text-center">
            <h1></h1>
            <p class="lead"></p>
            <div id="calendar" class="col-centered">
            </div>
        </div>

    </div>
    <!-- /.row -->


    <!-- Modal*************************************************************************************************************************** -->

    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="addEvent.php" id="AddForm"
                      enctype="multipart/form-data" onsubmit="return Envoyer(this,'ModalAdd')">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Ajouter</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="choix" class="col-sm-2 control-label">Tache/Event</label>
                            <div class="col-sm-4">
                                <select class="form-control col-lg-2" name="choix" id="choix" onchange="dis(this)">
                                    <option value="0">Tâche</option>
                                    <option value="1">Evenement</option>
                                </select>
                            </div>

                            <label for="designation" class="col-sm-2 control-label">Activité :</label>
                            <div class="col-sm-4">

                                <select name="designation" id="designation" class="form-control">
                                    <option value="">Choisissez</option>
                                     <?php while ($ligne = $reqact->fetch()) {
                                          ?>
                                         <option style="color:#0071c5;"
                                                 value="<?php echo $ligne['designation'] ?> "> <?php echo $ligne['designation'] ?></option>
                                     <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="title" class="col-sm-2 control-label">Nom :</label>
                            <div class="col-sm-4">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Nom"
                                       onblur="VerifNomT(this,'ModalAdd')">
                                <div id="addtitle" class="small" style="color: red "></div>

                            </div>


                            <label for="Pr" class="col-sm-2 control-label">Priorité :</label>
                            <div class="col-sm-4">
                                <select class="form-control col-lg-2" name="Pr" id="Pr">
                                    <option value="1">Priorité faible</option>
                                    <option value="2">Priorité moyenne</option>
                                    <option value="3">Priorité élevée</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="start" class="col-sm-2 control-label small">Date debut :</label>
                            <div class="col-sm-4">
                                <input type="date" name="start" class="form-control" id="start"
                                       onclick="VerifStart(document.getElementById('AddForm'),'ModalAdd')">
                                <div id="adddebut" style="color: red" class="small"></div>

                            </div>
                            <label for="starthour" class="col-sm-2 control-label small">Heure début </label>

                            <div class="col-sm-4">
                                <input type="time" name="starthour" class="form-control" id="starthour"
                                       onkeyup="VerifStart(document.getElementById('AddForm'),'ModalAdd')">
                                <div id="addstarthour" style="color: red" class="small"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end" class="col-sm-2 control-label"></label>
                            <div class="col-sm-4">

                            </div>
                            <label for="end" class="col-sm-2 control-label small">Heure fin :</label>
                            <div class="col-sm-4">
                                <input type="time" name="endhour" class="form-control" id="endhour"
                                       onkeyup="VerifStart(document.getElementById('AddForm'),'ModalAdd')">
                                <div id="addendhour" style="color: red" class="small"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group">
                                <label for="lieu" class="col-sm-2 control-label">Lieu</label>
                                <div class="col-sm-4">
                                    <input type="text" name="lieu" class="form-control" id="lieu" placeholder="Lieu"
                                           disabled="true">
                                    <div id="addlieu" style="color: red" class="small"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nomdoc" class="col-sm-2 control-label small">Nom du document</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nomdoc" class="form-control" id="nomdoc" placeholder="">
                                </div>

                                <div class="col-sm-6">
                                    <input type="file" name="doc"  id="doc" placeholder="">
                                </div>

                            </div>

                            <div class="col-lg-3"> Alarme :</div>
                            <div class="form-group col-lg-6">

                                <div class="col-sm-12">
                                    <select class="form-control" name="Alarmeh" id="alarmh"
                                            onchange="alarmeheure(document.getElementById('AddForm'),'ModalAdd')">

                                        <option value="0" id="to_hide1">Heures avant</option>
                                        <option value="1">1 heure avant</option>
                                        <option value="2">2 heures avant</option>
                                        <option value="3">3 heures avant</option>
                                        <option value="4">4 heures avant</option>
                                        <option value="5">5 heures avant</option>
                                        <option value="6">6 heures avant</option>

                                    </select>
                                    <div id="addheure" style="color: red" class="small"></div>
                                </div>
                                <div class="col-sm-12">
                                     <select class="form-control " name="Alarmej" id="alarmj"
                                             onchange="alarmejour(document.getElementById('AddForm'),'ModalAdd')">

                                        <option value="0" id="to_hide2">Jours avant</option>
                                        <option value="1">1 jour avant</option>
                                        <option value="2">2 jours avant</option>
                                        <option value="3">3 jours avant</option>
                                        <option value="4">4 jours avant</option>
                                        <option value="5">5 jours avant</option>
                                        <option value="6">6 jours avant</option>
                                    </select>
                                    <div id="addjour" style="color: red" class="small"></div>
                                </div>
                                <div class="col-sm-12">
                                     <select class="form-control" name="AlarmeS" id="alarms"
                                             onchange="alarmesemaine(document.getElementById('AddForm'),'ModalAdd')">

                                        <option value="0" id="to_hide3">Semaines avant</option>
                                        <option value="1">1 semaine avant</option>
                                        <option value="2">2 semaine avant</option>
                                    </select>
                                    <div id="addsemaine" style="color: red" class="small"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" id="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--*****************************************************************************************************-->


    <!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <form class="form-horizontal" method="POST" action="editEventTitle.php" id="EditForm"
                      onsubmit="return Envoyer(this,'ModalEdit') || document.getElementById('delete').checked ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Nom :</label>
                            <div id="addtitle" style="color: red" class="small"></div>
                            <div class="col-sm-4">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                                       onkeyup="VerifNomT(this,'ModalEdit')">
                                <div id="addtitle" style="color: red" class="small"></div>
                            </div>
                            <!--    -->

                            <label for="designation" class="col-sm-2 control-label">
                                <div id="abel">Activité :</div>
                            </label>

                            <div class="col-sm-4">
                                <select name="designation" id="designation" class="form-control">
                                    <option value=""> Choisissez</option>
                                     <?php while ($ligne = $reqact1->fetch()) {
                                          ?>
                                         <option style="color:#0071c5;"
                                                 value="<?php echo $ligne['designation'] ?> "> <?php echo $ligne['designation'] ?></option>
                                     <?php } ?>
                                </select>
                            </div>
                            <!--    -->

                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Etat :</label>
                            <div class="col-sm-4">
                                <input type="button" name="etat" class="form-control" id="etat">
                            </div>
                            <div class="col-sm-6">
                             
                             <button type="button" class="btn btn-link" name="boutonfaite" id="boutonfaite" onclick="Faite()">
                             <span class=" glyphicon glyphicon-ok"></span>
                                         </button>

                             <button type="button" class="btn btn-link" name="boutonnonfaite" id="boutonnonfaite" onclick="nonFaite()">
                             <span class=" glyphicon glyphicon-remove"></span>
                                         </button>


                                         

                            </div>
                        </div>



                        <input type="hidden" name="choix" class="form-control" id="choix">
                        <input type="hidden" name="faite" class="form-control" id="faite">


                        <div class="form-group">
                            <label for="start" class="col-sm-2 control-label small">Date debut :</label>
                            <div class="col-sm-4">
                                <input type="date" name="datedebut" class="form-control" id="start"
                                       onblur="VerifStart(document.getElementById('EditForm'),'ModalEdit')">
                                <div id="adddebut" style="color: red" class="small"></div>

                            </div>
                            <label for="starthour" class="col-sm-2 control-label small">Heure début </label>

                            <div class="col-sm-4">
                                <input type="time" name="hourdebut" class="form-control" id="starthour"
                                       onkeyup="VerifStart(document.getElementById('EditForm'),'ModalEdit')">
                                <div id="addstarthour" style="color: red" class="small"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end" class="col-sm-2 control-label"></label>
                            <div class="col-sm-4">

                            </div>
                            <label for="end" class="col-sm-2 control-label small">Heure fin :</label>
                            <div class="col-sm-4">
                                <input type="time" name="hourfin" class="form-control" id="endhour"
                                       onkeyup="VerifStart(document.getElementById('EditForm'),'ModalEdit')">
                                <div id="addendhour" style="color: red" class="small"></div>
                            </div>
                        </div>
                        <!--   ********************************** -->
                        <div class="form-group">
                            <label for="Pr" class="col-sm-2">Priorité</label>
                            <div class="col-sm-4">
                                <select class="form-control " name="Pr" id="Pr">
                                    <option value="1">Priorité faible</option>
                                    <option value="2">Priorité moyenne</option>
                                    <option value="3">Priorité élevée</option>
                                </select>
                            </div>


                            <label for="lieu" class="col-sm-2 control-label">Lieu :</label>
                                <div id="addlieu" style="color: red" class="small"></div>
                                <div class="col-sm-4">
                                    <input type="text" name="lieu" class="form-control" id="lieu" placeholder="Lieu">
                                </div>
                        </div>

                        
                          <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Document:</label>
                            <div class="col-sm-4">


                            <button type="button" id="editdoc" class="btn btn-link">Aucun document</button>
                            
                               </div>
                               
                            
                        </div>
                      
                            <div class="form-group">
                                <label for="alarme" class="col-sm-3 control-label">Alarme :</label>
                            </div>

                            <div class="form-group">

                                <div class="col-sm-4">
                                    <select class="form-control" name="Alarmeh" id="alarmh"
                                            onchange="alarmeheure(document.getElementById('EditForm'),'ModalEdit')">
                                        <option value="0" id="to_hide1">Heures avant</option>
                                        <option value="1">1 heure avant</option>
                                        <option value="2">2 heures avant</option>
                                        <option value="3">3 heures avant</option>
                                        <option value="4">4 heures avant</option>
                                        <option value="5">5 heures avant</option>
                                        <option value="6">6 heures avant</option>

                                    </select>
                                    <div id="addheure" style="color: red" class="small"></div>
                                </div>
                                <div class="col-sm-4">
                                     <select class="form-control " name="Alarmej" id="alarmj"
                                             onchange="alarmejour(document.getElementById('EditForm'),'ModalEdit')">
                                        <option value="0" id="to_hide2">Jours avant</option>
                                        <option value="1">1 jour avant</option>
                                        <option value="2">2 jours avant</option>
                                        <option value="3">3 jours avant</option>
                                        <option value="4">4 jours avant</option>
                                        <option value="5">5 jours avant</option>
                                        <option value="6">6 jours avant</option>
                                    </select>
                                    <div id="addjour" style="color: red" class="small"></div>
                                </div>
                                <div class="col-sm-4">
                                     <select class="form-control" name="AlarmeS" id="alarms"
                                             onchange="alarmesemaine(document.getElementById('EditForm'),'ModalEdit')">
                                        <option value="0" id="to_hide3">Semaines avant</option>
                                        <option value="1">1 semaine avant</option>
                                        <option value="2">2 semaine avant</option>
                                    </select>
                                    <div id="addsemaine" style="color: red" class="small"></div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label class="text-danger"><input type="checkbox" id="delete" name="delete">Supprimer
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id" class="form-control" id="id">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!--****************************************************************************************************-->

<div class="modal fade" id="ModalAddActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="AddActivity.php">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter activité </h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="designation" class="col-sm-2 control-label small">Nom de l'activité :</label>
                        <div class="col-sm-10">
                            <input type="text" name="designation" class="form-control" id="designation"
                                   placeholder="Designation">
                        </div>
                    </div>
                 

                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Type :</label>
                        <div class="col-sm-10">
                            <input type="text" name="type" class="form-control" id="type" placeholder="Type">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--****************************************************************************************************-->
<div class="modal fade" id="ModalAddDocument" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="AddDocument.php" enctype="multipart/form-data">

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


<!-- /.container -->

<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- FullCalendar -->
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src="fullcalendar/fullcalendar.js"></script>
<script src='fullcalendar/locale-all.js'></script>
<script type="text/javascript">
    function OuvrirPopup(page) {
        window.open(page);
    }

</script>
<script>


    $(document).ready(function () {

        $('#calendar').fullCalendar({

                customButtons: {
                    AddActivity: {
                        text: 'Ajouter Activite',
                        click: function () {
                            $('#ModalAddActivity').modal('show');
                        },
                    },
                    AddDocument: {
                        text: 'AjouterDoc',
                        click: function () {
                            $('#ModalAddDocument').modal('show');
                        },
                    },
                },
                header: {
                    left: 'prev,next today  AddActivity, AddDocument ',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                defaultDate: Date(),
                locale: 'fr',
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function (start, end) {

                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
                    $('#ModalAdd #starthour').val('');
                    $('#ModalAdd #endhour').val('');
                    $('#ModalAdd #adddebut').html('');
                    $('#ModalAdd #addstarthour').html('');
                    $('#ModalAdd #addendhour').html('');
                    $('#ModalAdd #addtitle').html('');
                    $('#ModalAdd #addheure').html('');
                    $('#ModalAdd #addjour').html('');
                    $('#ModalAdd #addsemaine').html('');
                    $('#ModalAdd #designation').val('');
                    $('#ModalAdd #title').val('');
                    $('#ModalAdd').modal('show');

                },
                eventRender: function (event, element) { //intilialiser les atribus
                    element.bind('dblclick', function () {
                        let now = new Date();
                        $('#ModalEdit #id').val(event.id);

                    var data = {'id':$('#ModalEdit #id').val()}
                    
                       $.ajax({

                url: 'affiche.php',
                type: "POST",
                data: data ,
                success: function (rep) {
                    if(rep == " "){
                        $('#editdoc').html('Aucun document');
                           $('#editdoc').click(function(e){
                        });
                    }else{
                        lien = rep.split(" ") ;
                        $('#editdoc').html(lien[1]);
                       
                        $('#editdoc').click(function(e){
                            OuvrirPopup(lien[0]);
                            

                        });
                    }
                   
                }
            });



                        $('#ModalEdit #adddebut').html(' ');
                        $('#ModalEdit #addstarthour').html(' ');
                        $('#ModalEdit #addendhour').html(' ');
                        $('#ModalEdit #addtitle').html(' ');
                        $('#ModalEdit #addheure').html(' ');
                        $('#ModalEdit #addjour').html(' ');
                        $('#ModalEdit #addsemaine').html(' ');
                        $('#ModalEdit #id').val(event.id);
                        $('#ModalEdit #choix').val(event.TE);

                        if (event.TE == '0') {
                            document.getElementById('boutonfaite').disabled = false;
                             document.getElementById('boutonnonfaite').disabled = false ;
                            $('#ModalEdit #myModalLabel').html('Modifier Tache');
                            document.getElementById('EditForm').lieu.disabled = true;
                            document.getElementById('EditForm').endhour.disabled = false;
                            document.getElementById('EditForm').designation.style.display = 'block';
                            document.getElementById('abel').style.display = 'block';


                            $('#ModalEdit #endhour').val(event.end.format('HH:mm:ss'));
                            $('#ModalEdit #designation').val(event.designation);


                            var data = {'idfaite': $('#ModalEdit #id').val()};
                            $.ajax({

                                url: 'realise.php',
                                type: "POST",
                                data: data,
                                success: function (rep) {


                                    if (rep == '1') document.getElementById('etat').value = "Tâche réalisé ";
                                    else {
                                        let datedebut = event.start.format('YYYY-MM-DD').split('-');
                                        let heuredebut = event.start.format('HH:mm:ss').split(':');
                                        DateStart = new Date(datedebut[0], datedebut[1] - 1, datedebut[2], heuredebut[0], heuredebut[1]);

                                        let datedebut1 = event.end.format('YYYY-MM-DD').split('-');
                                        let heuredebut1 = event.end.format('HH:mm:ss').split(':');
                                        DateStart1 = new Date(datedebut1[0], datedebut1[1] - 1, datedebut1[2], heuredebut1[0], heuredebut1[1]);
                                        DateStart2 = new Date(DateStart1.getFullYear(), DateStart1.getMonth(), DateStart1.getDate(), DateStart1.getHours(), DateStart1.getMinutes());

                                        if (DateStart.getTime() < now.getTime() && DateStart2.getTime() > now.getTime() && rep != '1') {

                                            document.getElementById('etat').value = "En cours";
                                        }

                                        else if (DateStart2.getTime() < now.getTime() && rep != '1') {
                                            document.getElementById('etat').value = " Terminé ";
                                        }
                                        else if (rep != '1')
                                            document.getElementById('etat').value = " En attente ";

                                    }
                                }
                            });
                        }

                        if (event.TE == '1') {
                            $('#ModalEdit #myModalLabel').html('Modifier Evenement');
                            document.getElementById('boutonfaite').disabled = true;
                           document.getElementById('boutonnonfaite').disabled = true;

                            document.getElementById('EditForm').lieu.disabled = false;
                            document.getElementById('EditForm').endhour.disabled = true;
                            document.getElementById('EditForm').designation.style.display = 'none';
                            document.getElementById('abel').style.display = 'none';


                            let datedebut = event.start.format('YYYY-MM-DD').split('-');
                            let heuredebut = event.start.format('HH:mm:ss').split(':');
                            DateStart = new Date(datedebut[0], datedebut[1] - 1, datedebut[2], heuredebut[0], heuredebut[1]);


                            todayevent = new Date(datedebut[0], datedebut[1] - 1, datedebut[2], 0, 0);
                            today = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 0, 0);


                            if (today.getTime() == todayevent.getTime()) {
                                document.getElementById('etat').value = "Aujourd'hui";
                            }
                            else {
                                if (DateStart.getTime() < now.getTime()) {
                                    document.getElementById('etat').value = "Dejà passé";
                                }

                                if (DateStart.getTime() > now.getTime()) {
                                    document.getElementById('etat').value = " en attente ";
                                }


                            }
                        }
                        $('#ModalEdit #lieu').val(event.Lieu);
                        $('#ModalEdit #title').val(event.title);
                        $('#ModalEdit #color').val(event.color);
                        $('#ModalEdit #start').val(event.start.format('YYYY-MM-DD'));
                        $('#ModalEdit #starthour').val(event.start.format('HH:mm:ss'));
                        $('#ModalEdit #Pr').val(event.Pr);
                        $('#ModalEdit #alarmh').val(event.AlarmeH);
                        $('#ModalEdit #alarmj').val(event.AlarmeJ);
                        $('#ModalEdit #alarms').val(event.AlarmeS);
                        $('#ModalEdit #choix').val(event.TE);


                        //alert(event.start);
                        //alert(event.end) ;

                     
                        $('#ModalEdit').modal('show');
                        //la requette avec ajax


                    });
                },

                events: [
                     <?php foreach($events as $event):
                     
                     $start = $event['start'];
                     $choix = $event['TE'];
                     
                     
                     ?>
                    {
                        iduser: '<?php echo $event['id_user']; ?>',

                        id: '<?php echo $event['id']; ?>',
                        title: '<?php echo $event['title']; ?>',
                        start: '<?php echo $start; ?>',
                        end: '<?php echo $event['end'] ?>',
                        color: '<?php echo $event['color']; ?>',
                        TE: '<?php echo $choix; ?>',
                        Lieu: '<?php echo $event['Lieu']; ?>',
                        Pr: '<?php echo $event['priority']; ?>',
                        AlarmeH: '<?php echo $event['AlarmeHvalue']; ?>',
                        AlarmeJ: '<?php echo $event['AlarmeJvalue']; ?>',
                        AlarmeS: '<?php echo $event['AlarmeSvalue']; ?>',
                        faite: '<?php echo $event['Faite']; ?>',
                        designation: '<?php echo $event['designation']; ?>',


                    },
                     <?php endforeach; ?>
                ]
            }
        );


        function edit(event) {

            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if (event.end) {
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            } else {
                end = start;
            }

            id = event.id;

            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;

            $.ajax({
                url: 'editEventDate.php',
                type: "POST",
                data: {Event: Event},
                success: function (rep) {
                    if (rep == 'OK') {
                        alert('Saved');
                    } else {
                        alert('Could not be saved. try again.');
                    }
                }
            });
        }
    });


    function nonFaite(event){
         document.getElementById('etat').value = "Tâche non réalisé";

        var data = {'nid': $('#ModalEdit #id').val()};

        $.ajax({
            url: 'realise.php',
            type: "POST",
            data: data,
            success: function (rep) {


            }
        });


    }
    function Faite(event) {
        document.getElementById('etat').value = "Tâche réalisé";

        var data = {'id': $('#ModalEdit #id').val()};

        $.ajax({
            url: 'realise.php',
            type: "POST",
            data: data,
            success: function (rep) {

            }
        });

    }

    function VerifNomT(champ, id) {
        if (champ.value.length == 0) {
            $('#' + id + ' #addtitle').html('Entrez un nom');
            return false;
        } else if (champ.value.length > 100) {
            $('#' + id + ' #addtitle').html('Nom trop long');
            return false;
        }

        else $('#' + id + ' #addtitle').html('');
        return true;

    }


    function VerifStart(champ, id) {

        let now = new Date();
        dateExacte = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now.getMinutes());

        let choix = champ.choix;
        if (choix.value == '1') {
            if (choix.value == '1' && champ.start.value.length > 0 && champ.starthour.value.length > 0) {
                debut = champ.start.value.split('-');
                heuredebut = champ.starthour.value.split(':');

                dateDebut = new Date(debut[0], debut[1] - 1, debut[2], heuredebut[0], heuredebut[1]);

                if (dateDebut.getTime() < dateExacte.getTime()) {
                    $('#' + id + ' #adddebut').html('Date passé');

                    return false;
                } else {
                    $('#' + id + ' #adddebut').html('');

                    return true;
                }
            }
        }
        if (choix.value == '0') {
            if (champ.start.value.length > 0 && champ.starthour.value.length > 0 && champ.endhour.value.length > 0 && choix.value == '0') {

                debut = champ.start.value.split('-');
                heuredebut = champ.starthour.value.split(':');
                heurefin = champ.endhour.value.split(':');

                dateDebut = new Date(debut[0], debut[1] - 1, debut[2], heuredebut[0], heuredebut[1]);

                dateFin = new Date(debut[0], debut[1] - 1, debut[2], heurefin[0], heurefin[1]);

                if (dateDebut.getTime() < dateExacte.getTime()) {
                    $('#' + id + ' #adddebut').html('Date passé');

                    return false;
                } else {
                    $('#' + id + ' #adddebut').html(' ');


                    if (dateFin.getTime() <= dateDebut.getTime()) {
                        $('#' + id + ' #addendhour').html('Heure invalide');
                        return false;

                    } else {
                        $('#' + id + ' #addendhour').html(' ');
                        return true;
                    }
                }
            } else {

                if (champ.start.value.length > 0) {
                    debut = champ.start.value.split('-');
                    dateDebut = new Date(debut[0], debut[1] - 1, debut[2]);

                    if (dateDebut.getTime() < dateExacte.getTime()) {
                        $('#' + id + ' #adddebut').html('Date passé');
                        return false;
                    }
                    else $('#' + id + ' #adddebut').html('');
                }

                if (champ.start.value.length > 0 && champ.starthour.value.length > 0) {

                    debut = champ.start.value.split('-');
                    heuredebut = champ.starthour.value.split(':');
                    dateDebut = new Date(debut[0], debut[1] - 1, debut[2], heuredebut[0], heuredebut[1]);

                    if (dateDebut.getTime() < dateExacte.getTime()) {
                        $('#' + id + ' #adddebut').html('Date passé');
                        $('#' + id + ' #addstarthour').html('Heure invalide');

                        return false;
                    } else {
                        $('#' + id + ' #adddebut').html(' ');
                        $('#' + id + ' #addstarthour').html('');

                    }
                }

                if (champ.start.value.length == 0) {
                    $('#' + id + ' #adddebut').html('Entrez la date');

                } else $('#' + id + ' #adddebut').html(' ');


                if (champ.starthour.value.length == 0) {
                    $('#' + id + ' #addstarthour').html('Entrez l\'heure');


                } else $('#' + id + ' #adddebut').html(' ');

                if (champ.endhour.value.length == 0) {
                    $('#' + id + ' #addendhour').html('Entrez l\'heure');

                } else $('#' + id + ' #addendhour').html(' ');


                return false;
            }
        }
    }


    function alarmeheure(champ, id) {
        let now = new Date();
        let dateExacte = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now.getMinutes());
        if (champ.alarmh.options[champ.alarmh.selectedIndex].value == "0") {
            //champ.alarmh.style.borderColor="";
            $('#' + id + ' #addheure').html('');
            return true;
        }
        else {
            if ((champ.start.value.length > 0) && (champ.starthour.value.length > 0)) {

                let debut = champ.start.value.split('-');
                let heureSaisie = champ.starthour.value.split(':');
                let dateDebut = new Date(debut[0], debut[1] - 1, debut[2], heureSaisie[0], heureSaisie[1]);


                if (dateDebut.getTime() >= dateExacte.getTime()) {
                    let nbHeure = champ.alarmh.options[champ.alarmh.selectedIndex].value;
                    let nb = parseInt(nbHeure);
                    let datealarmH = new Date(dateDebut.getFullYear(), dateDebut.getMonth(), dateDebut.getDate(), dateDebut.getHours() - nb, dateDebut.getMinutes());
                    if (datealarmH.getTime() < dateExacte.getTime()) {
                        $('#' + id + ' #addheure').html('Alarme dans le passé');
                        return false;
                    }
                    else {
                        $('#' + id + ' #addheure').html('');
                        return true;
                    }
                }
            }
            else {
                $('#' + id + ' #addheure').html('');
                return false;
            }
        }

    }

    function alarmejour(champ, id) {
        let now = new Date();
        let dateExacte = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now.getMinutes());
        if (champ.alarmj.options[champ.alarmj.selectedIndex].value == "0") {
            $('#' + id + ' #addjour').html('');
            return true;
        }
        else {
            if ((champ.start.value.length > 0) && (champ.starthour.value.length > 0)) {
                let debut = champ.start.value.split('-');
                let heureSaisie = champ.starthour.value.split(':');
                let dateDebut = new Date(debut[0], debut[1] - 1, debut[2], heureSaisie[0], heureSaisie[1]);


                if (dateDebut.getTime() >= dateExacte.getTime()) {
                    let nbHeure = champ.alarmj.options[champ.alarmj.selectedIndex].value;
                    let nb = parseInt(nbHeure);
                    let datealarmH = new Date(dateDebut.getFullYear(), dateDebut.getMonth(), dateDebut.getDate() - nb, dateDebut.getHours(), dateDebut.getMinutes());
                    if (datealarmH.getTime() < dateExacte.getTime()) {
                        $('#' + id + ' #addjour').html('Alarme dans le passé');
                        return false;
                    }
                    else {
                        $('#' + id + ' #addjour').html('');
                        return true;
                    }
                }
            }


            else {
                $('#' + id + ' #addjour').html('');
                return false;
            }
        }

    }

    function alarmesemaine(champ, id) {
        let now = new Date();
        let dateExacte = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now.getMinutes());
        if (champ.alarms.options[champ.alarms.selectedIndex].value == "0") {
            $('#' + id + ' #addsemaine').html('');
            return true;
        }
        else {
            if ((champ.start.value.length > 0) && (champ.starthour.value.length > 0)) {
                let debut = champ.start.value.split('-');
                let heureSaisie = champ.starthour.value.split(':');
                let dateDebut = new Date(debut[0], debut[1] - 1, debut[2], heureSaisie[0], heureSaisie[1]);


                if (dateDebut.getTime() >= dateExacte.getTime()) {
                    let nbHeure = champ.alarms.options[champ.alarms.selectedIndex].value;
                    let nb = parseInt(nbHeure);
                    let datealarmH = new Date(dateDebut.getFullYear(), dateDebut.getMonth(), dateDebut.getDate() - nb * 7, dateDebut.getHours(), dateDebut.getMinutes());
                    if (datealarmH.getTime() < dateExacte.getTime()) {
                        $('#' + id + ' #addsemaine').html('Alarme dans le passé');
                        return false;
                    }
                    else {
                        $('#' + id + ' #addsemaine').html('');
                        return true;
                    }
                }
            }
            else {
                $('#' + id + ' #addsemaine').html('');
                return false;
            }
        }

    }

    function Envoyer(champ, id) {


        var cond = (VerifNomT(champ.title, id) && VerifStart(champ) && alarmeheure(champ, id) && alarmejour(champ, id) && alarmesemaine(champ, id));
        if (cond == true) {

            var data = {'date': $('#' + id + ' #start').val()}
            $.ajax({
                url: 'planning.php',
                type: "POST",
                data: data,
                success: function (rep) {
                    if(rep!='Cour/Td/Tp') alert('Attention ! vous programez une tâche dans la période de ',rep);
                    else alert('Votre tâche a bien été programmée ');

                }
            });

            return true;
        }

        else return false;

    }


    function dis(champ) {
        form = document.getElementById('AddForm');
        if (champ.value == '0') {
            form.lieu.disabled = true;
            form.endhour.disabled = false;
        }
        if (champ.value == '1') {
            form.lieu.disabled = false;
            form.endhour.disabled = true;
        }

    }
</script>

</body>

</html>
