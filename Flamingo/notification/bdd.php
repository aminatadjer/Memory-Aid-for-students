<?php 
   try
    {
        $bdd= new PDO('mysql:host=localhost;dbname=flamingo','root','');
    }
    catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
 ?>