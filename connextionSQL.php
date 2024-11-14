<?php
/*
$user = 'grp_7_1';
$pass = '2WFYYWGcTsokJt';

try 
{
    $db = new PDO('mysql:host=localhost;dbname=bdd_7_1',$user ,$pass);

} catch (Exception $e) 
{
    die('Erreur : '.$e->getMessage());
}
*/

$user2 = 'root';
$pass2 = 'root';

try 
{
    $db = new PDO('mysql:host=localhost;dbname=runner',$user2 ,$pass2);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) 
{
    die('Erreur : '.$e->getMessage());
}


?>