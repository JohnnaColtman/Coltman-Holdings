<?php
session_start();
$name = $title = '';
if(!isset($_SESSION['user']))
{
    $_SESSION['page_title'] = "Unauthorized access!";
    $name = "Unauthorized access. Blocked!";
    $topmenu_nav = <<<MENU
    <div id="List">
        <ul>
            <li><a href="../"><b><u>Home</u></b></a></li>
            <li style ="color:grey">Help</li>
        </ul>
    </div> 
    MENU;
}
else {
    //$title = $_SESSION['page_title'];
    $title = "Admin Login";
    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : "Guest";
    $topmenu_nav = <<<MENU
    <div id="List">
        <ul>
            <li><a href="administer.php?menu=owners">Owners</a></li>
            <li><a href="administer.php?menu=properties">Properties</a></li>
            <li><a href="administer.php?menu=tenants">Tenants</a></li>
            <li><a href="../scripts/logout.php">Logout: {$user}</a></li>
        </ul>
    </div>
    MENU;
}

echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'.$title.'</title>
        <link rel ="stylesheet" href ="../styles/styles.css">
    </head>
    
    <body style="background-image:url("../images/pexels-binyaminmellish-106399.jpg"); background-size:cover;">
    '.$topmenu_nav;
?>