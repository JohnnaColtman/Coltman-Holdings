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
            <li><b><u>About us</u></b></li>
            <li style ="color:grey">Properties</li>
            <!-- <li><image src="../images/new logo final2.png" height="50px" width="70px" style = "margin:-25% auto; margin-right: 30px;"></image></li> -->
            <li style ="color:grey">Pay</li>
            <li style ="color:grey">Contact us</li>
        </ul>
    </div> 
    MENU;
}
else {
    $title = $_SESSION['page_title'];
    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : "Guest";
    $topmenu_nav = <<<MENU
    <div id="List">
        <ul>
            <li><b><u><a href ="index.php">About us</a></u></b></li>
            <li><a href="../connected/properties.php">Properties</a></li>
            <!-- <li><image src="../images/new logo final2.png" height="50px" width="70px" style = "margin:-25% auto; margin-right: 30px;"></image></li> -->
            <li><a href="../connected/pay.php">Pay</a></li>
            <li><a href="../public/contactus.php">Contact us</a></li>
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
    
    <body>
    '.$topmenu_nav;
?>