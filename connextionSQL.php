<?php

$user = 'grp_7_1';
$pass = '2WFYYWGcTsokJt';

try 
{
    $db = new PDO('mysql:host=moduleweb.esigelec.fr/grp_7_1;dbname=bdd_7_1',$user ,$pass);

} catch (Exception $e) 
{
    die('Erreur : '.$e->getMessage());
}



?>