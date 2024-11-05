<?php

$user = 'root';
$pass = 'root';

try 
{
    $db = new PDO ('mysql:host=localhost;dbname=runner',$user ,$pass);

} catch (Exception $e) 
{
    die('Erreur : '.$e->getMessage());
}



?>