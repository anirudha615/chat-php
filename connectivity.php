<?php

$host = "localhost";
$user = "root"; // retrieving info from database NICE :D
$pass = "";

mysql_connect($host,$user,$pass) || die ('Could not connect') ;
mysql_select_db('chat') || die ('could not connect to the required database');
echo 'Connected Successfully<br><br>';

function formatDate($date){
    return date('g:i a', strtotime($date));
}


?>