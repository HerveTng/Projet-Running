<?php

$user = 'grp_7_1';
$pass = '2WFYYWGcTsokJt';

try 
{
    $db = new PDO('mysql:host=localhost;dbname=grp_7_1',$user ,$pass);

} catch (Exception $e) 
{
    die('Erreur : '.$e->getMessage());
}



?>