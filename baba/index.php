<?php

include("../includes/header_admin.php");
require_once "../scripts/db/database.php";

if (isset($_POST["Submit"])) {
    $email = $_POST["Email"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM admin WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<div class='alert alert-danger'>SQL statement failed</div>";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $passwordCheck = password_verify($password, $row['password']);
            if ($passwordCheck == false) {
                echo "<div class='alert alert-danger'>Wrong password</div>";
            } elseif ($passwordCheck == true) {
                $_SESSION['user'] = $row['email'];
                header("Location: administer.php");
                exit();
            }
        } else {
            echo "<div class='alert alert-danger'>No user found with this email</div>";
        }
    }
}

echo '
<!-- <body style= "background-image:url(pexels-binyaminmellish-106399.jpg);background-size:cover;"> -->
<div id = "container">   
   <image src="../images/new-logo-final.png" height="150" width="200" style="justify-content: center; display:flex; margin: auto;"></image>

<form action="index.php" method="post">
   <div id="heading">
    <b>Admin Login</b>
   
   </div>
   <div>
    
    <input type ="text"  class ="form-control" name ="Email" required placeholder="Enter your E-mail Address" Style = "border-radius:15px; width:500px;">
   
    <input type ="Password" class = "form-control" name = "password" required placeholder ="Enter your Password"Style = "border-radius:15px; width:500px; margin:2% auto;">
    <input  style ="margin:5% auto; width:100px" type ="Submit" name = "Submit" value ="Log In">
   </div>';
include('../includes/footer_admin.php');
?>