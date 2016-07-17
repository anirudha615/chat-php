<?php
ob_start();
session_start();
$current = $_SERVER['SCRIPT_NAME'];
$page = $_SERVER['PHP_SELF'];
$sec = "20";


function logger(){
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
        return true;
    }else{
        return false;
    }
}


?>