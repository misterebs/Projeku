<?php
session_start();
 
$logged_in = false;
 
//jika session username belum dibuat, atau session username kosong
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
    $logged_in = true;
}
 
include_once('config.php');
include_once('login.php');
?>
