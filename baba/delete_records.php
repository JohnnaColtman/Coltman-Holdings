<?php
include("../includes/header_admin.php");
include("../includes/prohibited.php");
include("../scripts/db/database.php");

$contentMenu = (isset($_GET['action'])) ? $_GET['action']: 'help' ;

if($contentMenu == "delete_owner"){
    delete_owner($conn, $_GET['id']);

  }

  if($contentMenu == "delete_property"){
    delete_property($conn, $_GET['id']);

  }

  if($contentMenu == "delete_tenant"){
    delete_tenant($conn, $_GET['id']);

  }
  if($contentMenu == "delete_contactus"){
    delete_contactus($conn, $_GET['id']);

  }

  


?>