<?php 
include("../includes/prohibited.php");
session_start();
$_SESSION['page_title'] = 'Coltman Home Login';
$url = "../";
redirect($url);
?>