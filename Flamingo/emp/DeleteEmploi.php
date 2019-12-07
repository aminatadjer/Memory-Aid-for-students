<?php
require_once('bdd.php');
require("traitement.php");
session_start();
if (isset($_POST['delete']) && isset($_POST['id'])) {


    $id = $_POST['id'];
    $sql = "DELETE FROM emploi1 WHERE id ='$id'";
    $query = $bdd->prepare($sql);
    if ($query == false) {
        print_r($bdd->errorInfo());
        die ('Erreur prepare');
    }
    $res = $query->execute();
    if ($res == false) {
        print_r($query->errorInfo());
        die ('Erreur execute');
    }
}
elseif ( isset($_POST['title']) && isset($_POST['day']) && isset($_POST['id']) && isset($_POST['start'])&& isset($_POST['end'])) {
    $id = $_POST['id'];
    $jour = $_POST['day'];
    $hd = $_POST['start'];
    $hf = $_POST['end'];
    $module = $_POST['title'];
    $erreur=[];
    //**************** Si les champs ne sont pas vides ********************//
    if ($_POST['day'] == 0) {
        $erreur['jour'] = "Veuillez choisir le jour";
    }
    if (strlen($module) > 30) //***** verification du champ module*********//
    {
        $erreur['module'] = 'Nom de module trop long, veuillez le réduire';
    }
    if ($hd < $hf) {
        $cond = verification1($hd, $hf, $jour,$id);
        if ($cond == 'false') {
            $erreur['heure'] = 'veuillez consuler votre emploi du temps et entrer un intervalle cohérent';
        }
    } else {
        $erreur['heure'] = 'Heure debut inferieure ou égale à heure fin';
    }
    if (empty($erreur)) {
        $sql = "UPDATE emploi1 SET  title = '$module',start = '$hd', end = '$hf', day = '$jour' WHERE id = '$id'";


        $query = $bdd->prepare($sql);
        if ($query == false) {
            print_r($bdd->errorInfo());
            die ('Erreur prepare');
        }
        $sth = $query->execute();

    }
}
header('Location: ../emp.php');
